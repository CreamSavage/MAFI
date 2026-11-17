<?php
require_once __DIR__ . '/../Login/auth.php';
require_once __DIR__ . '/../includes/mailer.php';

$usuarioID = (int) ($_SESSION['id'] ?? 0);
$nombreUsuarioLogueado = (string) ($_SESSION['nombre_completo'] ?? ($_SESSION['nombre'] ?? 'Usuario'));

if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_POST['accion'], $_POST['clase_id'])) {
    header('Location: gestion_clases.php');
    exit;
}

$accion = (string) $_POST['accion'];
$claseID = (int) $_POST['clase_id'];

if (!verify_csrf()) {
    $destino = $claseID > 0
        ? "ver_clase.php?clase_id=$claseID&error=" . urlencode('Sesión de formulario expirada. Intenta nuevamente.')
        : 'gestion_clases.php?error=' . urlencode('Sesión de formulario expirada. Intenta nuevamente.');
    header('Location: ' . $destino);
    exit;
}

$sqlCheck = "SELECT C.Materia, C.Grupo, C.CreadorID, I.EstadoInscripcion
             FROM inscripciones I
             JOIN clases C ON I.ClaseID = C.ClaseID
             WHERE I.UsuarioID = ? AND I.ClaseID = ? AND I.EstadoInscripcion <> 'pendiente'";
$stmtCheck = $conexion->prepare($sqlCheck);
$stmtCheck->bind_param('ii', $usuarioID, $claseID);
$stmtCheck->execute();
$resultadoCheck = $stmtCheck->get_result();

if ($resultadoCheck->num_rows === 0) {
    $stmtCheck->close();
    header('Location: gestion_clases.php?error=' . urlencode('No tienes permiso para publicar en esta clase.'));
    exit;
}

$clase = $resultadoCheck->fetch_assoc();
$stmtCheck->close();
$esProfesor = ((int) $clase['CreadorID'] === $usuarioID);
$enlaceClase = base_url('Clases/ver_clase.php?clase_id=' . $claseID);

if ($accion === 'crear_anuncio') {
    if (!$esProfesor) {
        header("Location: ver_clase.php?clase_id=$claseID&error=" . urlencode('Solo el profesor puede crear anuncios.'));
        exit;
    }

    $contenido = trim((string) ($_POST['contenido'] ?? ''));
    if ($contenido === '') {
        header("Location: ver_clase.php?clase_id=$claseID&error=" . urlencode('El anuncio no puede estar vacío.'));
        exit;
    }

    $stmt = $conexion->prepare('INSERT INTO anuncios (ClaseID, UsuarioID, Contenido) VALUES (?, ?, ?)');
    $stmt->bind_param('iis', $claseID, $usuarioID, $contenido);
    $stmt->execute();
    $stmt->close();

    $sqlAlumnos = "SELECT U.CorreoElectronico, U.Nombres
                   FROM usuarios U
                   JOIN inscripciones I ON U.UsuarioID = I.UsuarioID
                   WHERE I.ClaseID = ? AND I.EstadoInscripcion = 'alumno' AND U.UsuarioID <> ? AND COALESCE(U.NotificarAnuncios, 1) = 1";
    $stmtAlumnos = $conexion->prepare($sqlAlumnos);
    $stmtAlumnos->bind_param('ii', $claseID, $usuarioID);
    $stmtAlumnos->execute();
    $resAlumnos = $stmtAlumnos->get_result();

    $bccList = [];
    while ($alumno = $resAlumnos->fetch_assoc()) {
        $bccList[] = ['email' => $alumno['CorreoElectronico'], 'name' => $alumno['Nombres']];
    }
    $stmtAlumnos->close();

    if (!empty($bccList)) {
        $materiaEsc = e($clase['Materia']);
        $subject = 'Nuevo anuncio en tu clase: ' . $clase['Materia'];
        $body = 'Hola,<br><br>Tu profesor, ' . e($nombreUsuarioLogueado) . ', ha publicado un nuevo anuncio en la clase <strong>' . $materiaEsc . '</strong>.<br><br>'
            . '<strong>Anuncio:</strong><br><em>' . nl2br(e($contenido)) . '</em><br><br>'
            . '<a href="' . e($enlaceClase) . '" style="display:inline-block; padding:10px 16px; background-color:#002B7A; color:#ffffff; text-decoration:none; border-radius:6px;">Ver el anuncio en la clase</a>';

        $errorCorreo = null;
        if (!mafi_enviar_correo(null, '', $subject, $body, ['fromName' => 'Sistema MAFI (Notificaciones)', 'bcc' => $bccList], $errorCorreo)) {
            header("Location: ver_clase.php?clase_id=$claseID&error=" . urlencode('El anuncio se publicó, pero falló el envío de correos: ' . ($errorCorreo ?? 'error SMTP')));
            exit;
        }
    }

    header("Location: ver_clase.php?clase_id=$claseID&success=" . urlencode('Anuncio publicado correctamente.'));
    exit;
}

if ($accion === 'crear_comentario') {
    $contenido = trim((string) ($_POST['contenido'] ?? ''));
    $anuncioID = (int) ($_POST['anuncio_id'] ?? 0);

    if ($contenido === '' || $anuncioID <= 0) {
        header("Location: ver_clase.php?clase_id=$claseID&error=" . urlencode('El comentario no puede estar vacío.'));
        exit;
    }

    $sqlProf = 'SELECT U.UsuarioID, U.CorreoElectronico, U.Nombres, COALESCE(U.NotificarComentarios, 1) AS NotificarComentarios
                FROM anuncios A
                JOIN usuarios U ON U.UsuarioID = A.UsuarioID
                WHERE A.AnuncioID = ? AND A.ClaseID = ?';
    $stmtProf = $conexion->prepare($sqlProf);
    $stmtProf->bind_param('ii', $anuncioID, $claseID);
    $stmtProf->execute();
    $profesor = $stmtProf->get_result()->fetch_assoc();
    $stmtProf->close();

    if (!$profesor) {
        header("Location: ver_clase.php?clase_id=$claseID&error=" . urlencode('El anuncio seleccionado no pertenece a esta clase.'));
        exit;
    }

    $stmt = $conexion->prepare('INSERT INTO comentarios (AnuncioID, UsuarioID, Contenido) VALUES (?, ?, ?)');
    $stmt->bind_param('iis', $anuncioID, $usuarioID, $contenido);
    $stmt->execute();
    $stmt->close();

    if ((int) $profesor['UsuarioID'] !== $usuarioID && (int) $profesor['NotificarComentarios'] === 1) {
        $subject = 'Nuevo comentario en tu anuncio de la clase ' . $clase['Materia'];
        $body = 'Hola ' . e($profesor['Nombres']) . ',<br><br><strong>' . e($nombreUsuarioLogueado) . '</strong> ha dejado un comentario en uno de tus anuncios en la clase <strong>' . e($clase['Materia']) . '</strong>.<br><br>'
            . '<strong>Comentario:</strong><br><em>' . nl2br(e($contenido)) . '</em><br><br>'
            . '<a href="' . e($enlaceClase) . '" style="display:inline-block; padding:10px 16px; background-color:#002B7A; color:#ffffff; text-decoration:none; border-radius:6px;">Ver el comentario</a>';

        $errorCorreo = null;
        mafi_enviar_correo($profesor['CorreoElectronico'], $profesor['Nombres'], $subject, $body, ['fromName' => 'Sistema MAFI (Notificaciones)'], $errorCorreo);
    }

    header("Location: ver_clase.php?clase_id=$claseID");
    exit;
}

header('Location: gestion_clases.php');
exit;
