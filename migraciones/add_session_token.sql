-- Migración: Agregar campo para control de sesión única
-- Fecha: 7 de noviembre de 2025
-- Descripción: Agrega el campo SessionToken para permitir solo una sesión activa por usuario

ALTER TABLE Usuarios 
ADD COLUMN SessionToken VARCHAR(64) NULL AFTER UltimaConexion,
ADD INDEX idx_session_token (SessionToken);

-- Comentario de la columna
ALTER TABLE Usuarios 
MODIFY COLUMN SessionToken VARCHAR(64) NULL 
COMMENT 'Token único de sesión para permitir solo un dispositivo logueado a la vez';
