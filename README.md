# Sistema MAFI — Plataforma Web de Matemáticas Financieras

<p align="center">
  <img src="img/logo_fes.png" alt="Escudo FES Cuautitlán" height="92" />
  &nbsp;&nbsp;&nbsp;&nbsp;
  <img src="img/logo_unam.jpeg" alt="Escudo UNAM" height="92" />
</p>

<p align="center">
  <strong>Universidad Nacional Autónoma de México</strong><br>
  <strong>Facultad de Estudios Superiores Cuautitlán</strong><br>
  <em>Plataforma Web Interactiva para el Aprendizaje, Simulación y Evaluación de Modelos Financieros</em>
</p>

<p align="center">
  <img src="https://img.shields.io/badge/PHP-8.2-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP 8.2">
  <img src="https://img.shields.io/badge/JavaScript-ES6+-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black" alt="JavaScript">
  <img src="https://img.shields.io/badge/MariaDB%20%2F%20MySQL-10.11-4479A1?style=for-the-badge&logo=mysql&logoColor=white" alt="MariaDB">
  <img src="https://img.shields.io/badge/Bootstrap-5.3.3-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white" alt="Bootstrap">
  <img src="https://img.shields.io/badge/Docker-Compose-2496ED?style=for-the-badge&logo=docker&logoColor=white" alt="Docker">
</p>

<p align="center">
  <img src="img/carrusel/alaslibertad.jpg" alt="FES Cuautitlán UNAM - Alas a la Libertad" width="100%" />
</p>

---

## 📌 Descripción del Proyecto

El **Sistema MAFI** es una plataforma web educativa diseñada para apoyar la formación académica de estudiantes y facilitar las actividades docentes en **Matemáticas Financieras e Ingeniería Económica** de la **FES Cuautitlán (UNAM)**.

Reúne **28 calculadoras y simuladores financieros interactivos**, módulos completos de teoría, ejemplos resueltos paso a paso, ejercicios propuestos y un sistema de aulas virtuales con control de acceso por roles.

---

## ✨ Características Principales

### 🧮 28 Calculadoras y Simuladores Financieros
- **Interés Simple:** Valor final, Principal, Tasa de interés y Plazo.
- **Interés Compuesto:** Capitalización discreta/continua y conversión de tasas equivalentes.
- **Descuento Bancario:** Descuento comercial, racional, principal, tasa y plazo.
- **Amortización (Renta Vencida y Anticipada):** Cálculo de pagos, valor presente y tablas dinámicas periodo a periodo.
- **Fondos de Amortización (Renta Vencida y Anticipada):** Proyecciones de capitalización y tablas de saldo acumulado.
- **Exportación y Productividad:** Copiado rápido de resultados, **copiado de tabla (TSV para Excel)**, **descarga directa a CSV (Excel)** e impresión limpia (`@media print`).

### 👥 Gestión Académica y Roles (RBAC)
- **Administrador:** Gestión global de usuarios, códigos de acceso y auditoría.
- **Docente:** Creación de clases/grupos, publicación de anuncios, seguimiento y administración de alumnos.
- **Alumno:** Acceso a teoría, ejemplos, ejercicios, calculadoras, simuladores y tablón de clases.

### 🎨 UX, Accesibilidad y Rendimiento
- **Modo Oscuro Institucional UNAM (`Tema: Claro / Oscuro`)** y **Tamaño de Fuente Accesible (`Normal / Grande / Extra grande`)** persistentes por usuario desde `Perfil → Configuración`.
- **Buscador Instantáneo y Filtros por Categoría** en el catálogo principal de módulos.
- **Visor Zoom (Lightbox)** al hacer clic en cualquier diagrama, fórmula o tabla de ejemplos.
- **Renderizado Matemático con MathJax v3**, barra de progreso de lectura en módulos de teoría y botón flotante *Volver arriba*.
- **Optimización Web:** Compresión GZIP/DEFLATE, caché de navegador (`.htaccess`), `preconnect` a CDNs, `loading="lazy"` nativo e imágenes HD progresivas.

---

## 🛠️ Stack Tecnológico

| Capa | Tecnología |
| --- | --- |
| **Backend** | PHP 8.2 (arquitectura modular con `includes/layout.php` y `bootstrap.php`) |
| **Frontend** | HTML5, CSS3 (variables institucionales + Dark Mode), JavaScript ES6+ (`calc-core.js`, `mafi-ui.js`, `toc.js`), Bootstrap 5.3.3, Font Awesome 6 |
| **Matemáticas** | MathJax v3 (LaTeX/TeX) |
| **Base de Datos** | MariaDB 10.11 / MySQL 8.x (`utf8mb4_unicode_ci`) |
| **Correo** | PHPMailer 6.x |
| **Infraestructura** | Docker, Docker Compose, Apache 2.4 |

---

## 🚀 Despliegue Rápido en 1 Comando (Docker)

La forma más rápida de probar el sistema en local con base de datos preconfigurada:

```bash
git clone https://github.com/CreamSavage/MAFI.git
cd MAFI
docker compose up -d --build
```

Luego abre tu navegador en 👉 **[http://localhost:8080](http://localhost:8080)**

> La base de datos `mafi` y su esquema (`backup_estructura_mafi.sql`) se inicializan automáticamente en el primer arranque.

---

## 📦 Instalación Manual (Apache + PHP + MySQL)

1. Clona el repositorio en el directorio raíz de tu servidor web (`/var/www/html/` o `htdocs/`):
   ```bash
   git clone https://github.com/CreamSavage/MAFI.git
   ```
2. Crea la base de datos e importa la estructura inicial:
   ```sql
   CREATE DATABASE mafi CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
   ```
   ```bash
   mysql -u root -p mafi < backup_estructura_mafi.sql
   ```
3. Ajusta tus credenciales locales en `conexion.php`.
4. *(Opcional — Envío de correos)* Copia `.env.example` como `.env` y define `MAFI_SMTP_PASS` con tu App Password de Gmail (el archivo `.env` está protegido por `.gitignore` y bloqueado por `.htaccess`).

### 🔒 Credenciales de Demostración (Esquema Inicial)
- **Correo:** `admin@sistema.mafi`
- **Contraseña:** `Admin2025` *(cambiar tras el primer inicio de sesión)*

---

## 👥 Créditos Institucionales

### Equipo de Desarrollo (Synthex)
Jesús Fernando Pérez Ahumada · Diana Villeda Luna · Sergio Ituriel Hernández Escalona · Patricio Lucio Prado · Eduardo Montes Lara · Oscar Ulises Murillo Campos · Hernán Canales Salvador · Laura Andrea Cardoso Olguín

### Equipo Asesor
Dr. Hugo Sánchez Nava · Dr. Leonel Gualberto López Salazar · Dr. José Juan Contreras Espinosa · Dr. Valentín Roldán Vázquez

### Equipo Técnico
Mtro. Gonzalo Iván Hernández Vázquez · Mtro. Iván Núñez Consuelos · Ing. José Juan Rico Castro

---

<p align="center">
  <strong>Facultad de Estudios Superiores Cuautitlán — UNAM</strong><br>
  <em>"Por mi raza hablará el espíritu"</em>
</p>
