<?php
require_once __DIR__ . '/../Login/auth.php';

$usuarioID = (int) ($_SESSION['id'] ?? 0);

function generarCodigoClase(mysqli $conexion): string
{
    $caracteres = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $maxIdx = strlen($caracteres) - 1;
    $stmt = $conexion->prepare('SELECT ClaseID FROM clases WHERE CodigoClase = ? LIMIT 1');

    do {
        $parte1 = '';
        $parte2 = '';
        for ($i = 0; $i < 3; $i++) {
            $parte1 .= $caracteres[random_int(0, $maxIdx)];
            $parte2 .= $caracteres[random_int(0, $maxIdx)];
        }
        $codigo = $parte1 . '-' . $parte2;

        $stmt->bind_param('s', $codigo);
        $stmt->execute();
        $stmt->store_result();
        $existe = $stmt->num_rows > 0;
    } while ($existe);

    $stmt->close();
    return $codigo;
}

function actualizarConteoAlumnos(mysqli $conexion, int $claseID): void
{
    $sql = "UPDATE clases c
            SET c.ConteoAlumnos = (
                SELECT COUNT(*)
                FROM inscripciones i
                WHERE i.ClaseID = ? AND i.EstadoInscripcion = 'alumno'
            )
            WHERE c.ClaseID = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param('ii', $claseID, $claseID);
    $stmt->execute();
    $stmt->close();
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_POST['accion'])) {
    header('Location: gestion_clases.php');
    exit;
}

$accion = (string) $_POST['accion'];
$claseIDPost = (int) ($_POST['clase_id'] ?? 0);

if (!verify_csrf()) {
    $enGestionAlumnos = in_array($accion, ['aprobar_alumno', 'rechazar_alumno', 'expulsar_alumno'], true) && $claseIDPost > 0;
    $destino = $enGestionAlumnos
        ? "gestionar_alumnos.php?clase_id=$claseIDPost&error=" . urlencode('Sesión de formulario expirada. Intenta nuevamente.')
        : 'gestion_clases.php?error=' . urlencode('Sesión de formulario expirada. Intenta nuevamente.');
    header('Location: ' . $destino);
    exit;
}

if ($accion === 'crear') {
    $materia = mb_strtoupper(trim((string) ($_POST['materia'] ?? '')), 'UTF-8');
    $carrera = mb_strtoupper(trim((string) ($_POST['carrera'] ?? '')), 'UTF-8');
    $grupo = mb_strtoupper(trim((string) ($_POST['grupo'] ?? '')), 'UTF-8');
    $semestre = (int) ($_POST['semestre'] ?? 0);
    $dependencia = mb_strtoupper(trim((string) ($_POST['dependencia'] ?? '')), 'UTF-8');

    if ($materia === '' || $carrera === '' || $grupo === '' || $semestre <= 0) {
        header('Location: gestion_clases.php?error=' . urlencode('Faltan campos válidos para crear la clase.'));
        exit;
    }

    $codigoClase = generarCodigoClase($conexion);
    $conexion->begin_transaction();

    try {
        $stmtCrear = $conexion->prepare('INSERT INTO clases (CodigoClase, CreadorID, Carrera, Grupo, Materia, Semestre, Dependencia) VALUES (?, ?, ?, ?, ?, ?, ?)');
        $stmtCrear->bind_param('sisssis', $codigoClase, $usuarioID, $carrera, $grupo, $materia, $semestre, $dependencia);
        $stmtCrear->execute();
        $nuevaClaseID = (int) $conexion->insert_id;
        $stmtCrear->close();

        $stmtInsc = $conexion->prepare("INSERT INTO inscripciones (UsuarioID, ClaseID, UltimaVezVisto, EstadoInscripcion) VALUES (?, ?, NOW(), 'profesor')");
        $stmtInsc->bind_param('ii', $usuarioID, $nuevaClaseID);
        $stmtInsc->execute();
        $stmtInsc->close();

        actualizar_rol_usuario_en_bd($conexion, $usuarioID, true);
        $conexion->commit();

        header('Location: gestion_clases.php?success=' . urlencode("Clase creada. El código para unirse es: $codigoClase."));
        exit;
    } catch (mysqli_sql_exception $exception) {
        $conexion->rollback();
        error_log('MAFI crear clase error: ' . $exception->getMessage());
        header('Location: gestion_clases.php?error=' . urlencode('No se pudo crear la clase. Verifica los datos e intenta nuevamente.'));
        exit;
    }
}

if ($accion === 'unirse_por_codigo') {
    $codigoClase = mb_strtoupper(trim((string) ($_POST['codigo_clase'] ?? '')), 'UTF-8');
    if ($codigoClase === '') {
        header('Location: gestion_clases.php?error=' . urlencode('Debes ingresar un código de clase.'));
        exit;
    }

    $stmtBuscar = $conexion->prepare('SELECT ClaseID, CreadorID FROM clases WHERE CodigoClase = ?');
    $stmtBuscar->bind_param('s', $codigoClase);
    $stmtBuscar->execute();
    $resultado = $stmtBuscar->get_result();

    if ($resultado->num_rows === 0) {
        $stmtBuscar->close();
        header('Location: gestion_clases.php?error=' . urlencode('No se encontró ninguna clase con ese código.'));
        exit;
    }

    $clase = $resultado->fetch_assoc();
    $stmtBuscar->close();
    $claseID = (int) $clase['ClaseID'];

    if ((int) $clase['CreadorID'] === $usuarioID) {
        header('Location: gestion_clases.php?error=' . urlencode('No puedes unirte a tu propia clase como alumno.'));
        exit;
    }

    $conexion->begin_transaction();
    try {
        $stmtUnirse = $conexion->prepare("INSERT INTO inscripciones (UsuarioID, ClaseID, UltimaVezVisto, EstadoInscripcion) VALUES (?, ?, NOW(), 'alumno')");
        $stmtUnirse->bind_param('ii', $usuarioID, $claseID);
        $stmtUnirse->execute();
        $stmtUnirse->close();

        actualizarConteoAlumnos($conexion, $claseID);
        actualizar_rol_usuario_en_bd($conexion, $usuarioID, true);

        $conexion->commit();
        header('Location: gestion_clases.php?success=' . urlencode('Te has unido a la clase con éxito.'));
        exit;
    } catch (mysqli_sql_exception $exception) {
        $conexion->rollback();
        if ((int) $exception->getCode() === 1062) {
            header('Location: gestion_clases.php?error=' . urlencode('Ya estás inscrito o tienes una solicitud pendiente para esta clase.'));
        } else {
            error_log('MAFI unirse_por_codigo error: ' . $exception->getMessage());
            header('Location: gestion_clases.php?error=' . urlencode('Error al unirte a la clase.'));
        }
        exit;
    }
}

if ($accion === 'solicitar_unirse') {
    $claseID = (int) ($_POST['clase_id'] ?? 0);
    if ($claseID <= 0) {
        header('Location: gestion_clases.php?error=' . urlencode('ID de clase no válido.'));
        exit;
    }

    $stmtClase = $conexion->prepare('SELECT CreadorID FROM clases WHERE ClaseID = ?');
    $stmtClase->bind_param('i', $claseID);
    $stmtClase->execute();
    $clase = $stmtClase->get_result()->fetch_assoc();
    $stmtClase->close();

    if (!$clase) {
        header('Location: gestion_clases.php?error=' . urlencode('La clase solicitada no existe.'));
        exit;
    }
    if ((int) $clase['CreadorID'] === $usuarioID) {
        header('Location: gestion_clases.php?error=' . urlencode('No puedes solicitar unirte a tu propia clase.'));
        exit;
    }

    try {
        $stmtSol = $conexion->prepare("INSERT INTO inscripciones (UsuarioID, ClaseID, UltimaVezVisto, EstadoInscripcion) VALUES (?, ?, NOW(), 'pendiente')");
        $stmtSol->bind_param('ii', $usuarioID, $claseID);
        $stmtSol->execute();
        $stmtSol->close();

        header('Location: gestion_clases.php?success=' . urlencode('Solicitud enviada. Serás añadido a la clase cuando el profesor te apruebe.'));
        exit;
    } catch (mysqli_sql_exception $exception) {
        if ((int) $exception->getCode() === 1062) {
            header('Location: gestion_clases.php?error=' . urlencode('Ya te has inscrito o has solicitado unirte a esta clase.'));
        } else {
            error_log('MAFI solicitar_unirse error: ' . $exception->getMessage());
            header('Location: gestion_clases.php?error=' . urlencode('Error al solicitar unirse a la clase.'));
        }
        exit;
    }
}

if ($accion === 'aprobar_alumno') {
    $alumnoID = (int) ($_POST['alumno_id'] ?? 0);
    $claseID = (int) ($_POST['clase_id'] ?? 0);

    $stmtCheck = $conexion->prepare('SELECT CreadorID FROM clases WHERE ClaseID = ? AND CreadorID = ?');
    $stmtCheck->bind_param('ii', $claseID, $usuarioID);
    $stmtCheck->execute();
    $esDuenio = $stmtCheck->get_result()->num_rows > 0;
    $stmtCheck->close();

    if (!$esDuenio) {
        header("Location: gestionar_alumnos.php?clase_id=$claseID&error=" . urlencode('No tienes permisos para esta acción.'));
        exit;
    }

    $conexion->begin_transaction();
    try {
        $stmtAprobar = $conexion->prepare("UPDATE inscripciones SET EstadoInscripcion = 'alumno' WHERE UsuarioID = ? AND ClaseID = ? AND EstadoInscripcion = 'pendiente'");
        $stmtAprobar->bind_param('ii', $alumnoID, $claseID);
        $stmtAprobar->execute();
        $stmtAprobar->close();

        actualizarConteoAlumnos($conexion, $claseID);
        actualizar_rol_usuario_en_bd($conexion, $alumnoID, false);

        $conexion->commit();
        header("Location: gestionar_alumnos.php?clase_id=$claseID&success=" . urlencode('Alumno aprobado.'));
        exit;
    } catch (mysqli_sql_exception $exception) {
        $conexion->rollback();
        error_log('MAFI aprobar_alumno error: ' . $exception->getMessage());
        header("Location: gestionar_alumnos.php?clase_id=$claseID&error=" . urlencode('Error al aprobar al alumno.'));
        exit;
    }
}

if ($accion === 'rechazar_alumno') {
    $alumnoID = (int) ($_POST['alumno_id'] ?? 0);
    $claseID = (int) ($_POST['clase_id'] ?? 0);

    $stmtCheck = $conexion->prepare('SELECT CreadorID FROM clases WHERE ClaseID = ? AND CreadorID = ?');
    $stmtCheck->bind_param('ii', $claseID, $usuarioID);
    $stmtCheck->execute();
    $esDuenio = $stmtCheck->get_result()->num_rows > 0;
    $stmtCheck->close();

    if (!$esDuenio) {
        header("Location: gestionar_alumnos.php?clase_id=$claseID&error=" . urlencode('No tienes permisos para esta acción.'));
        exit;
    }

    $stmtRechazar = $conexion->prepare("DELETE FROM inscripciones WHERE UsuarioID = ? AND ClaseID = ? AND EstadoInscripcion = 'pendiente'");
    $stmtRechazar->bind_param('ii', $alumnoID, $claseID);
    $ok = $stmtRechazar->execute();
    $stmtRechazar->close();

    $param = $ok ? 'success=' . urlencode('Solicitud rechazada.') : 'error=' . urlencode('Error al rechazar la solicitud.');
    header("Location: gestionar_alumnos.php?clase_id=$claseID&$param");
    exit;
}

if ($accion === 'salir_clase') {
    $claseID = (int) ($_POST['clase_id'] ?? 0);

    $stmtPrev = $conexion->prepare('SELECT EstadoInscripcion FROM inscripciones WHERE UsuarioID = ? AND ClaseID = ? LIMIT 1');
    $stmtPrev->bind_param('ii', $usuarioID, $claseID);
    $stmtPrev->execute();
    $rowPrev = $stmtPrev->get_result()->fetch_assoc();
    $stmtPrev->close();

    if (!$rowPrev) {
        header('Location: gestion_clases.php?error=' . urlencode('No estás inscrito en esta clase.'));
        exit;
    }
    if ($rowPrev['EstadoInscripcion'] === 'profesor') {
        header('Location: gestion_clases.php?error=' . urlencode("Si eres profesor de esta clase, no puedes 'salir'; debes eliminar la clase si ya no la usarás."));
        exit;
    }

    $conexion->begin_transaction();
    try {
        $stmtDel = $conexion->prepare('DELETE FROM inscripciones WHERE UsuarioID = ? AND ClaseID = ?');
        $stmtDel->bind_param('ii', $usuarioID, $claseID);
        $stmtDel->execute();
        $stmtDel->close();

        actualizarConteoAlumnos($conexion, $claseID);
        actualizar_rol_usuario_en_bd($conexion, $usuarioID, true);

        $conexion->commit();
        header('Location: gestion_clases.php?success=' . urlencode('Has salido de la clase correctamente.'));
        exit;
    } catch (mysqli_sql_exception $exception) {
        $conexion->rollback();
        error_log('MAFI salir_clase error: ' . $exception->getMessage());
        header('Location: gestion_clases.php?error=' . urlencode('Error al salir de la clase.'));
        exit;
    }
}

if ($accion === 'expulsar_alumno') {
    $alumnoID = (int) ($_POST['alumno_id'] ?? 0);
    $claseID = (int) ($_POST['clase_id'] ?? 0);

    $stmtCheck = $conexion->prepare('SELECT CreadorID FROM clases WHERE ClaseID = ? AND CreadorID = ?');
    $stmtCheck->bind_param('ii', $claseID, $usuarioID);
    $stmtCheck->execute();
    $esDuenio = $stmtCheck->get_result()->num_rows > 0;
    $stmtCheck->close();

    if (!$esDuenio) {
        header("Location: gestionar_alumnos.php?clase_id=$claseID&error=" . urlencode('No tienes permisos para esta acción.'));
        exit;
    }

    $conexion->begin_transaction();
    try {
        $stmtExpulsar = $conexion->prepare("DELETE FROM inscripciones WHERE UsuarioID = ? AND ClaseID = ? AND EstadoInscripcion = 'alumno'");
        $stmtExpulsar->bind_param('ii', $alumnoID, $claseID);
        $stmtExpulsar->execute();
        $stmtExpulsar->close();

        actualizarConteoAlumnos($conexion, $claseID);
        actualizar_rol_usuario_en_bd($conexion, $alumnoID, false);

        $conexion->commit();
        header("Location: gestionar_alumnos.php?clase_id=$claseID&success=" . urlencode('Alumno expulsado correctamente.'));
        exit;
    } catch (mysqli_sql_exception $exception) {
        $conexion->rollback();
        error_log('MAFI expulsar_alumno error: ' . $exception->getMessage());
        header("Location: gestionar_alumnos.php?clase_id=$claseID&error=" . urlencode('Error al expulsar al alumno.'));
        exit;
    }
}

if ($accion === 'eliminar_clase') {
    $claseID = (int) ($_POST['clase_id'] ?? 0);

    $stmtCheck = $conexion->prepare('SELECT CreadorID FROM clases WHERE ClaseID = ? AND CreadorID = ?');
    $stmtCheck->bind_param('ii', $claseID, $usuarioID);
    $stmtCheck->execute();
    $claseRow = $stmtCheck->get_result()->fetch_assoc();
    $stmtCheck->close();

    if (!$claseRow) {
        header('Location: gestion_clases.php?error=' . urlencode('No tienes permisos para eliminar esta clase.'));
        exit;
    }

    $profesorID = (int) $claseRow['CreadorID'];
    $alumnosAfectados = [];
    $stmtAlumnos = $conexion->prepare("SELECT DISTINCT UsuarioID FROM inscripciones WHERE ClaseID = ? AND EstadoInscripcion = 'alumno'");
    $stmtAlumnos->bind_param('i', $claseID);
    $stmtAlumnos->execute();
    $resAlumnos = $stmtAlumnos->get_result();
    while ($r = $resAlumnos->fetch_assoc()) {
        $alumnosAfectados[] = (int) $r['UsuarioID'];
    }
    $stmtAlumnos->close();

    $conexion->begin_transaction();
    try {
        $stmtDelCom = $conexion->prepare('DELETE c FROM comentarios c INNER JOIN anuncios a ON c.AnuncioID = a.AnuncioID WHERE a.ClaseID = ?');
        $stmtDelCom->bind_param('i', $claseID);
        $stmtDelCom->execute();
        $stmtDelCom->close();

        foreach ([
            'DELETE FROM anuncios WHERE ClaseID = ?',
            'DELETE FROM inscripciones WHERE ClaseID = ?',
            'DELETE FROM clases WHERE ClaseID = ?',
        ] as $sqlDel) {
            $stmtDel = $conexion->prepare($sqlDel);
            $stmtDel->bind_param('i', $claseID);
            $stmtDel->execute();
            $stmtDel->close();
        }

        foreach ($alumnosAfectados as $uid) {
            actualizar_rol_usuario_en_bd($conexion, $uid, ($uid === $usuarioID));
        }
        actualizar_rol_usuario_en_bd($conexion, $profesorID, ($profesorID === $usuarioID));

        $conexion->commit();
        header('Location: gestion_clases.php?success=' . urlencode('Clase eliminada permanentemente y roles recalculados.'));
        exit;
    } catch (mysqli_sql_exception $exception) {
        $conexion->rollback();
        error_log('MAFI eliminar_clase error: ' . $exception->getMessage());
        header('Location: gestion_clases.php?error=' . urlencode('No se pudo eliminar la clase.'));
        exit;
    }
}

header('Location: gestion_clases.php');
exit;
