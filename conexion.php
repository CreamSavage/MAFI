<?php
// Activar reporte de errores como excepciones (para catch en lógica)
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// --- CONFIGURACIÓN DE LA BASE DE DATOS ---
// Puertos confirmados: MySQL usa 3306
$db_host = 'localhost';
$db_usuario = 'MAFI';
// En MySQL la contraseña pertenece al usuario, no a la base de datos.
$db_contrasena = 'SistemaMAFI2025'; // contraseña del usuario MySQL 'MAFI'
$db_nombre = 'mafi'; // nombre exacto de la base
$db_puerto = 3306; // puerto explícito (puedes cambiar si tu hosting usa otro)

// --- CREAR LA CONEXIÓN ---
global $conexion;
$conexion = new mysqli($db_host, $db_usuario, $db_contrasena, $db_nombre, $db_puerto);

// --- VERIFICAR LA CONEXIÓN ---
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Establecer el conjunto de caracteres a UTF-8
$conexion->set_charset("utf8mb4");

