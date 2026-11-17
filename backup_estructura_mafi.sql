-- ============================================================================
-- SCRIPT DE BASE DE DATOS - SISTEMA MAFI
-- Base de Datos: mafi
-- Charset: utf8mb4
-- Collation: utf8mb4_unicode_ci
-- Fecha: 23 de noviembre de 2025
-- ============================================================================

-- Eliminar base de datos si existe (usar con precaución)
-- DROP DATABASE IF EXISTS mafi;

-- Crear base de datos
CREATE DATABASE IF NOT EXISTS mafi 
CHARACTER SET utf8mb4 
COLLATE utf8mb4_unicode_ci;

USE mafi;

-- ============================================================================
-- TABLA: accesos
-- Descripción: Códigos de acceso para registro de nuevos usuarios
-- ============================================================================
CREATE TABLE IF NOT EXISTS accesos (
    AccesoID INT AUTO_INCREMENT PRIMARY KEY,
    CodigoAcceso VARCHAR(50) UNIQUE NOT NULL,
    Usado TINYINT(1) DEFAULT 0,
    FechaCreacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FechaUso TIMESTAMP NULL DEFAULT NULL,
    INDEX idx_codigo (CodigoAcceso),
    INDEX idx_usado (Usado)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


-- ============================================================================
-- TABLA: usuarios
-- Descripción: Información de todos los usuarios del sistema
-- ============================================================================
CREATE TABLE IF NOT EXISTS usuarios (
    UsuarioID INT AUTO_INCREMENT PRIMARY KEY,
    Nombres VARCHAR(100) NOT NULL,
    ApellidoPaterno VARCHAR(100) NOT NULL,
    ApellidoMaterno VARCHAR(100),
    CorreoElectronico VARCHAR(150) UNIQUE NOT NULL,
    Contrasena VARCHAR(255) NOT NULL,
    Rol ENUM('usuario', 'alumno', 'profesor', 'administrador') DEFAULT 'usuario',
    Estado ENUM('pendiente', 'verificado', 'suspendido') DEFAULT 'pendiente',
    TokenVerificacion VARCHAR(100) DEFAULT NULL,
    ResetToken VARCHAR(100) DEFAULT NULL,
    ResetTokenExpiry DATETIME DEFAULT NULL,
    SessionToken VARCHAR(100) DEFAULT NULL,
    AccesoID INT DEFAULT NULL,
    Tema VARCHAR(20) DEFAULT 'claro',
    TamanoFuente VARCHAR(20) DEFAULT 'medio',
    NotificarAnuncios TINYINT(1) DEFAULT 1,
    NotificarComentarios TINYINT(1) DEFAULT 1,
    FechaRegistro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    UltimaConexion TIMESTAMP NULL DEFAULT NULL,
    
    FOREIGN KEY (AccesoID) REFERENCES accesos(AccesoID) ON DELETE SET NULL,
    INDEX idx_correo (CorreoElectronico),
    INDEX idx_estado (Estado),
    INDEX idx_rol (Rol),
    INDEX idx_token_verificacion (TokenVerificacion),
    INDEX idx_reset_token (ResetToken),
    INDEX idx_session_token (SessionToken)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


-- ============================================================================
-- TABLA: clases
-- Descripción: Clases creadas por profesores
-- ============================================================================
CREATE TABLE IF NOT EXISTS clases (
    ClaseID INT AUTO_INCREMENT PRIMARY KEY,
    CodigoClase VARCHAR(20) UNIQUE NOT NULL,
    Materia VARCHAR(150) NOT NULL,
    Grupo VARCHAR(50),
    Carrera VARCHAR(150),
    Semestre VARCHAR(20),
    Dependencia VARCHAR(150),
    CreadorID INT NOT NULL,
    ConteoAlumnos INT DEFAULT 0,
    FechaCreacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    
    FOREIGN KEY (CreadorID) REFERENCES usuarios(UsuarioID) ON DELETE CASCADE,
    INDEX idx_codigo (CodigoClase),
    INDEX idx_creador (CreadorID),
    INDEX idx_materia (Materia)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


-- ============================================================================
-- TABLA: inscripciones
-- Descripción: Relación entre usuarios y clases
-- ============================================================================
CREATE TABLE IF NOT EXISTS inscripciones (
    InscripcionID INT AUTO_INCREMENT PRIMARY KEY,
    UsuarioID INT NOT NULL,
    ClaseID INT NOT NULL,
    EstadoInscripcion ENUM('pendiente', 'alumno', 'profesor') DEFAULT 'pendiente',
    FechaInscripcion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    UltimaVezVisto TIMESTAMP NULL DEFAULT NULL,
    
    FOREIGN KEY (UsuarioID) REFERENCES usuarios(UsuarioID) ON DELETE CASCADE,
    FOREIGN KEY (ClaseID) REFERENCES clases(ClaseID) ON DELETE CASCADE,
    UNIQUE KEY unique_inscripcion (UsuarioID, ClaseID),
    INDEX idx_usuario (UsuarioID),
    INDEX idx_clase (ClaseID),
    INDEX idx_estado (EstadoInscripcion)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


-- ============================================================================
-- TABLA: anuncios
-- Descripción: Anuncios/publicaciones en el tablón de cada clase
-- ============================================================================
CREATE TABLE IF NOT EXISTS anuncios (
    AnuncioID INT AUTO_INCREMENT PRIMARY KEY,
    ClaseID INT NOT NULL,
    UsuarioID INT NOT NULL,
    Contenido TEXT NOT NULL,
    FechaPublicacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    
    FOREIGN KEY (ClaseID) REFERENCES clases(ClaseID) ON DELETE CASCADE,
    FOREIGN KEY (UsuarioID) REFERENCES usuarios(UsuarioID) ON DELETE CASCADE,
    INDEX idx_clase (ClaseID),
    INDEX idx_usuario (UsuarioID),
    INDEX idx_fecha (FechaPublicacion)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


-- ============================================================================
-- TABLA: comentarios
-- Descripción: Comentarios en los anuncios de clase
-- ============================================================================
CREATE TABLE IF NOT EXISTS comentarios (
    ComentarioID INT AUTO_INCREMENT PRIMARY KEY,
    AnuncioID INT NOT NULL,
    UsuarioID INT NOT NULL,
    Contenido TEXT NOT NULL,
    FechaComentario TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    
    FOREIGN KEY (AnuncioID) REFERENCES anuncios(AnuncioID) ON DELETE CASCADE,
    FOREIGN KEY (UsuarioID) REFERENCES usuarios(UsuarioID) ON DELETE CASCADE,
    INDEX idx_anuncio (AnuncioID),
    INDEX idx_usuario (UsuarioID),
    INDEX idx_fecha (FechaComentario)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


-- ============================================================================
-- TABLA: notificaciones (opcional)
-- Descripción: Sistema de notificaciones para usuarios
-- ============================================================================
CREATE TABLE IF NOT EXISTS notificaciones (
    NotificacionID INT AUTO_INCREMENT PRIMARY KEY,
    UsuarioID INT NOT NULL,
    Tipo ENUM('anuncio', 'comentario', 'sistema') DEFAULT 'sistema',
    Titulo VARCHAR(200),
    Contenido TEXT,
    Leido TINYINT(1) DEFAULT 0,
    EnlaceID INT DEFAULT NULL,
    FechaCreacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    
    FOREIGN KEY (UsuarioID) REFERENCES usuarios(UsuarioID) ON DELETE CASCADE,
    INDEX idx_usuario (UsuarioID),
    INDEX idx_leido (Leido),
    INDEX idx_tipo (Tipo)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


-- ============================================================================
-- DATOS INICIALES
-- ============================================================================

-- Insertar usuario administrador por defecto
-- Contraseña: Admin2025 (cambiar después del primer login)
INSERT INTO usuarios (
    Nombres, 
    ApellidoPaterno, 
    ApellidoMaterno,
    CorreoElectronico, 
    Contrasena, 
    Rol, 
    Estado
) VALUES (
    'Administrador',
    'Sistema',
    'MAFI',
    'admin@sistema.mafi',
    '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', -- Admin2025
    'administrador',
    'verificado'
);

-- Insertar algunos códigos de acceso de ejemplo
INSERT INTO accesos (CodigoAcceso, Usado) VALUES
('MAFI-2025-001', 0),
('MAFI-2025-002', 0),
('MAFI-2025-003', 0),
('MAFI-2025-004', 0),
('MAFI-2025-005', 0),
('MAFI-2025-ADMIN', 0),
('MAFI-2025-PROF', 0),
('MAFI-2025-ALUM', 0),
('FESC-ACC-001', 0),
('FESC-ACC-002', 0);


-- ============================================================================
-- TRIGGERS
-- ============================================================================

-- Trigger para actualizar ConteoAlumnos al insertar inscripción
DELIMITER $$

CREATE TRIGGER after_inscripcion_insert
AFTER INSERT ON inscripciones
FOR EACH ROW
BEGIN
    IF NEW.EstadoInscripcion = 'alumno' THEN
        UPDATE clases 
        SET ConteoAlumnos = (
            SELECT COUNT(*) 
            FROM inscripciones 
            WHERE ClaseID = NEW.ClaseID 
            AND EstadoInscripcion = 'alumno'
        )
        WHERE ClaseID = NEW.ClaseID;
    END IF;
END$$

DELIMITER ;


-- Trigger para actualizar ConteoAlumnos al eliminar inscripción
DELIMITER $$

CREATE TRIGGER after_inscripcion_delete
AFTER DELETE ON inscripciones
FOR EACH ROW
BEGIN
    IF OLD.EstadoInscripcion = 'alumno' THEN
        UPDATE clases 
        SET ConteoAlumnos = (
            SELECT COUNT(*) 
            FROM inscripciones 
            WHERE ClaseID = OLD.ClaseID 
            AND EstadoInscripcion = 'alumno'
        )
        WHERE ClaseID = OLD.ClaseID;
    END IF;
END$$

DELIMITER ;


-- Trigger para actualizar ConteoAlumnos al actualizar inscripción
DELIMITER $$

CREATE TRIGGER after_inscripcion_update
AFTER UPDATE ON inscripciones
FOR EACH ROW
BEGIN
    IF OLD.EstadoInscripcion != NEW.EstadoInscripcion THEN
        UPDATE clases 
        SET ConteoAlumnos = (
            SELECT COUNT(*) 
            FROM inscripciones 
            WHERE ClaseID = NEW.ClaseID 
            AND EstadoInscripcion = 'alumno'
        )
        WHERE ClaseID = NEW.ClaseID;
    END IF;
END$$

DELIMITER ;


-- ============================================================================
-- VISTAS ÚTILES
-- ============================================================================

-- Vista de usuarios con información de acceso
CREATE OR REPLACE VIEW vista_usuarios AS
SELECT 
    u.UsuarioID,
    u.Nombres,
    u.ApellidoPaterno,
    u.ApellidoMaterno,
    CONCAT(u.Nombres, ' ', u.ApellidoPaterno, ' ', IFNULL(u.ApellidoMaterno, '')) AS NombreCompleto,
    u.CorreoElectronico,
    u.Rol,
    u.Estado,
    u.FechaRegistro,
    u.UltimaConexion,
    a.CodigoAcceso
FROM usuarios u
LEFT JOIN accesos a ON u.AccesoID = a.AccesoID;


-- Vista de clases con información del profesor
CREATE OR REPLACE VIEW vista_clases AS
SELECT 
    c.ClaseID,
    c.CodigoClase,
    c.Materia,
    c.Grupo,
    c.Carrera,
    c.Semestre,
    c.Dependencia,
    c.ConteoAlumnos,
    c.FechaCreacion,
    CONCAT(u.Nombres, ' ', u.ApellidoPaterno) AS NombreProfesor,
    u.CorreoElectronico AS EmailProfesor,
    u.UsuarioID AS ProfesorID
FROM clases c
INNER JOIN usuarios u ON c.CreadorID = u.UsuarioID;


-- Vista de inscripciones con detalle
CREATE OR REPLACE VIEW vista_inscripciones AS
SELECT 
    i.InscripcionID,
    i.UsuarioID,
    i.ClaseID,
    i.EstadoInscripcion,
    i.FechaInscripcion,
    i.UltimaVezVisto,
    CONCAT(u.Nombres, ' ', u.ApellidoPaterno) AS NombreUsuario,
    u.CorreoElectronico,
    c.Materia,
    c.Grupo,
    c.CodigoClase
FROM inscripciones i
INNER JOIN usuarios u ON i.UsuarioID = u.UsuarioID
INNER JOIN clases c ON i.ClaseID = c.ClaseID;


-- Vista de anuncios con información completa
CREATE OR REPLACE VIEW vista_anuncios AS
SELECT 
    a.AnuncioID,
    a.ClaseID,
    a.UsuarioID,
    a.Contenido,
    a.FechaPublicacion,
    CONCAT(u.Nombres, ' ', u.ApellidoPaterno) AS NombreAutor,
    c.Materia,
    c.CodigoClase,
    (SELECT COUNT(*) FROM comentarios WHERE AnuncioID = a.AnuncioID) AS NumComentarios
FROM anuncios a
INNER JOIN usuarios u ON a.UsuarioID = u.UsuarioID
INNER JOIN clases c ON a.ClaseID = c.ClaseID;


-- ============================================================================
-- CONSULTAS ÚTILES PARA ADMINISTRACIÓN
-- ============================================================================

-- Ver estadísticas generales
-- SELECT 
--     (SELECT COUNT(*) FROM usuarios) AS TotalUsuarios,
--     (SELECT COUNT(*) FROM usuarios WHERE Estado = 'verificado') AS UsuariosVerificados,
--     (SELECT COUNT(*) FROM clases) AS TotalClases,
--     (SELECT COUNT(*) FROM inscripciones WHERE EstadoInscripcion = 'alumno') AS TotalInscripciones,
--     (SELECT COUNT(*) FROM anuncios) AS TotalAnuncios,
--     (SELECT COUNT(*) FROM comentarios) AS TotalComentarios;

-- Ver usuarios por rol
-- SELECT Rol, COUNT(*) AS Cantidad 
-- FROM usuarios 
-- GROUP BY Rol;

-- Ver clases más populares
-- SELECT 
--     c.Materia,
--     c.Grupo,
--     c.ConteoAlumnos,
--     CONCAT(u.Nombres, ' ', u.ApellidoPaterno) AS Profesor
-- FROM clases c
-- INNER JOIN usuarios u ON c.CreadorID = u.UsuarioID
-- ORDER BY c.ConteoAlumnos DESC
-- LIMIT 10;

-- Ver actividad reciente
-- SELECT 
--     'Anuncio' AS Tipo,
--     a.FechaPublicacion AS Fecha,
--     CONCAT(u.Nombres, ' ', u.ApellidoPaterno) AS Usuario,
--     c.Materia AS Relacionado
-- FROM anuncios a
-- INNER JOIN usuarios u ON a.UsuarioID = u.UsuarioID
-- INNER JOIN clases c ON a.ClaseID = c.ClaseID
-- UNION ALL
-- SELECT 
--     'Comentario' AS Tipo,
--     co.FechaComentario AS Fecha,
--     CONCAT(u.Nombres, ' ', u.ApellidoPaterno) AS Usuario,
--     c.Materia AS Relacionado
-- FROM comentarios co
-- INNER JOIN usuarios u ON co.UsuarioID = u.UsuarioID
-- INNER JOIN anuncios a ON co.AnuncioID = a.AnuncioID
-- INNER JOIN clases c ON a.ClaseID = c.ClaseID
-- ORDER BY Fecha DESC
-- LIMIT 20;


-- ============================================================================
-- FIN DEL SCRIPT
-- ============================================================================

-- Verificar que todas las tablas se crearon correctamente
SHOW TABLES;

-- Verificar las relaciones (foreign keys)
-- SELECT 
--     TABLE_NAME,
--     COLUMN_NAME,
--     CONSTRAINT_NAME,
--     REFERENCED_TABLE_NAME,
--     REFERENCED_COLUMN_NAME
-- FROM INFORMATION_SCHEMA.KEY_COLUMN_USAGE
-- WHERE TABLE_SCHEMA = 'mafi'
-- AND REFERENCED_TABLE_NAME IS NOT NULL;
