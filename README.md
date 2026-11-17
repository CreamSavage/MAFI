# Sistema MAFI — Sistema de Matemáticas Financieras

<p align="center">
  <strong>Universidad Nacional Autónoma de México</strong><br>
  <strong>Facultad de Estudios Superiores Cuautitlán</strong><br>
  <em>Plataforma Web Interactiva para el Aprendizaje y Aplicación de Modelos Financieros</em>
</p>

<p align="center">
  <img src="https://img.shields.io/badge/PHP-8.x-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP">
  <img src="https://img.shields.io/badge/JavaScript-ES6+-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black" alt="JavaScript">
  <img src="https://img.shields.io/badge/MySQL-8.x%20%2F%20MariaDB-4479A1?style=for-the-badge&logo=mysql&logoColor=white" alt="MySQL">
  <img src="https://img.shields.io/badge/Bootstrap-5.3.3-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white" alt="Bootstrap">
  <img src="https://img.shields.io/badge/Docker-Ready-2496ED?style=for-the-badge&logo=docker&logoColor=white" alt="Docker">
</p>

---

## 📌 Descripción del Proyecto

El **Sistema MAFI** es una solución web integral diseñada para apoyar la formación académica de estudiantes y facilitar las actividades docentes en materias de **Matemáticas Financieras e Ingeniería Económica** de la Facultad de Estudios Superiores Cuautitlán (UNAM).

El sistema cuenta con un catálogo de **28 calculadoras y simuladores interactivos** organizados modularmente, capaces de resolver problemas complejos de interés, anualidades y amortizaciones, generando dinámicamente tablas detalladas de pagos, desgloses paso a paso y visualización de fórmulas matemáticas.

---

## ✨ Características Principales

### 🧮 28 Calculadoras Financieras Especializadas
1. **Interés Simple**: Monto, Capital, Tasa de Interés y Tiempo.
2. **Interés Compuesto**: Monto, Capital, Tasa y Tiempo (con tasas efectivas, nominales y equivalentes).
3. **Anualidades**:
   - Anualidades Vencidas (Monto, Valor Presente, Renta y Plazo).
   - Anualidades Anticipadas (Monto, Valor Actual, Renta y Plazo).
   - Anualidades Diferidas.
4. **Amortización**:
   - Tablas de amortización con renta vencida y cuota fija.
   - Cálculo de capital insoluto, interés del periodo y amortización real.
5. **Fondos de Amortización**:
   - Proyecciones de capitalización con renta vencida y renta anticipada.
   - Generación automática de tablas de fondo e intereses devengados.
6. **Descuento Bancario y Simuladores**:
   - Descuento comercial y racional.
   - Comparadores financieros y exportación/impresión de tablas de cálculo.

### 👥 Gestión Académica y Control de Acceso por Roles (RBAC)
- **Administrador**: Gestión global de usuarios, monitoreo de accesos, auditoría y configuración institucional.
- **Docente**: Creación y administración de grupos/clases, asignación de tareas y ejercicios prácticos, seguimiento de avance estudiantil y registro de calificaciones.
- **Alumno**: Acceso a módulos de teoría, calculadoras con retroalimentación inmediata, resolución de actividades y consulta de calificaciones.

### 🎨 Experiencia de Usuario e Identidad Institucional
- **Diseño Responsive:** Totalmente adaptado para computadoras de escritorio, tablets y dispositivos móviles con Bootstrap 5.3.3.
- **Renderizado Matemático:** Visualización tipográfica de alta precisión en fórmulas matemáticas complejas mediante integración con **MathJax**.
- **Carrusel Institucional:** Integración visual con hitos arquitectónicos y culturales de la FES Cuautitlán y UNAM.
- **Identidad Visual UNAM / FESC:** Colores representativos institucionales (Azul y Oro UNAM), navegación clara con migas de pan (*breadcrumbs*) y controles de regreso unificados en todo el sistema.

---

## 🛠️ Tecnologías Empleadas

- **Backend:** PHP 8.x con arquitectura estructurada por controladores y vistas.
- **Frontend:** HTML5, CSS3 moderno con variables CSS, JavaScript (ES6+ modular con `calc-core.js`), Bootstrap 5.3.3 y Font Awesome 6.
- **Motor de Renderizado Matemático:** MathJax v3 (notación TeX/LaTeX).
- **Base de Datos:** MySQL / MariaDB (motor InnoDB, cotejamiento `utf8mb4_unicode_ci`).
- **Mailing:** PHPMailer v6.x para recuperación de contraseñas y avisos del sistema.
- **Infraestructura:** Docker y Apache2 (Ubuntu Server).

---

## 🚀 Requisitos Previos

- **Servidor Web:** Apache 2.4+ (con módulo `mod_rewrite` habilitado) o Nginx.
- **PHP:** Versión 8.0 o superior con extensiones activadas:
  - `mysqli`
  - `pdo_mysql`
  - `mbstring`
  - `json`
  - `session`
- **Gestor de Base de Datos:** MySQL 8.0+ o MariaDB 10.4+.
- *(Opcional)* **Docker** y **Docker Compose**.

---

## 📦 Instalación y Configuración

### 1. Clonar el repositorio
```bash
git clone https://github.com/CreamSavage/MAFI.git
cd MAFI
```

### 2. Configurar la Base de Datos
1. Inicia sesión en tu servidor MySQL / MariaDB:
   ```bash
   mysql -u root -p
   ```
2. Crea la base de datos con soporte completo UTF-8:
   ```sql
   CREATE DATABASE mafi CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
   ```
3. Importa el esquema inicial incluido en el proyecto:
   ```bash
   mysql -u root -p mafi < backup_estructura_mafi.sql
   ```

### 3. Configurar Credenciales de Conexión
Edita el archivo `conexion.php` según las credenciales de tu servidor de base de datos:
```php
$db_host       = 'localhost';
$db_usuario    = 'tu_usuario';
$db_contrasena = 'tu_contrasena';
$db_nombre     = 'mafi';
$db_puerto     = 3306;
```

### 4. Ejecución en Entorno Local
Puedes ejecutar rápidamente el servidor integrado de PHP:
```bash
php -S localhost:8080
```
Y abrir en tu navegador: [http://localhost:8080](http://localhost:8080)

---

## 🔒 Credenciales de Acceso Iniciales (Demostración)

El script de base de datos incluye un usuario administrador de ejemplo para pruebas:
- **Correo:** `admin@sistema.mafi`
- **Contraseña:** `Admin2025` *(se recomienda cambiar tras el primer acceso)*

---

## 👥 Créditos y Agradecimientos

### Equipo de Desarrollo (Synthex)
- **Jesús Fernando Pérez Ahumada**
- **Diana Villeda Luna**
- **Sergio Ituriel Hernández Escalona**
- **Patricio Lucio Prado**
- **Eduardo Montes Lara**
- **Oscar Ulises Murillo Campos**
- **Hernán Canales Salvador**
- **Laura Andrea Cardoso Olguín**

### Equipo Asesor
- **Dr. Hugo Sánchez Nava**
- **Dr. Leonel Gualberto López Salazar**
- **Dr. José Juan Contreras Espinosa**
- **Dr. Valentín Roldán Vázquez**

### Equipo Técnico
- **Mtro. Gonzalo Iván Hernández Vázquez**
- **Mtro. Iván Núñez Consuelos**
- **Ing. José Juan Rico Castro**

---

<p align="center">
  <strong>Facultad de Estudios Superiores Cuautitlán — UNAM</strong><br>
  <em>"Por mi raza hablará el espíritu"</em>
</p>
