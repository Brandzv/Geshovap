# Aplicación web de gestión de horarios, vacaciones y permisos

Es una aplicación web que tiene como objetivo mejorar la eficiencia en la asignación
de horarios, gestión de vacaciones y permisos, cómodamente y centralizando la
información de los empleados, lo que facilita su consulta.

![Geshovap](https://github.com/Brandzv/Geshovap/tree/main/img/ReadMeResource/984729654.jpeg)

<details>
<summary>Contenido</summary>

-   [Características](#características)
-   [Capturas de pantalla](#capturas-de-pantalla)
-   [Stack](#stack)
-   [Instalación](#instalación)
-   [Uso](#uso)

</details>

## Características

-   **Asignación de Horarios:** Permite ajustes de horarios de trabajo de manera cómoda.
-   **Gestión de Vacaciones y Permisos:** Facilita la solicitud, aprobación y seguimiento de los días de vacaciones y permisos.
-   **Actualización Automática de Vacaciones:** Actualiza automáticamente los datos de vacaciones de los empleados cuando cumplen año laboral.
-   **Reportes:** Genera reportes de los horarios, vacaciones y permisos.

## Capturas de pantalla

![Login](https://github.com/Brandzv/Geshovap/tree/main/img/ReadMeResource/658532978651.jpg)
![vacaciones](https://github.com/Brandzv/Geshovap/tree/main/img/ReadMeResource/986167452345.jpg)
![horario](https://github.com/Brandzv/Geshovap/tree/main/img/ReadMeResource/737435675678.jpg)
![panelEmpleadoMovil](https://github.com/Brandzv/Geshovap/tree/main/img/ReadMeResource/856345642354.jpg)

## Stack

[![HTML][html-badge]][html-url]
[![CSS][css-badge]][css-url]
[![JavaScript][js-badge]][js-url]
[![Bootstrap][bootstrap-badge]][bootstrap-url]
[![PHP][php-badge]][php-url]
[![MariaDB][mariadb-badge]][mariadb-url]
[![FPDF][fpdf-badge]][fpdf-url]

[html-url]: https://developer.mozilla.org/en-US/docs/Web/HTML
[html-badge]: https://img.shields.io/badge/HTML-E34F26?style=for-the-badge&logo=html5&logoColor=white
[css-url]: https://developer.mozilla.org/en-US/docs/Web/CSS
[css-badge]: https://img.shields.io/badge/CSS-1572B6?style=for-the-badge&logo=css3&logoColor=white
[js-url]: https://developer.mozilla.org/en-US/docs/Web/JavaScript
[js-badge]: https://img.shields.io/badge/JavaScript-323330?style=for-the-badge&logo=javascript&logoColor=yellow
[bootstrap-url]: https://getbootstrap.com/
[bootstrap-badge]: https://img.shields.io/badge/Bootstrap-563D7C?style=for-the-badge&logo=bootstrap&logoColor=white
[php-url]: https://www.php.net/
[php-badge]: https://img.shields.io/badge/PHP-8.2.12-777BB4?style=for-the-badge&logo=php&logoColor=white
[mariadb-url]: https://www.mysql.com/
[mariadb-badge]: https://img.shields.io/badge/MariaDB-10.4.32-4479A1?style=for-the-badge&logo=mariadb&logoColor=white
[fpdf-url]: http://www.fpdf.org/
[fpdf-badge]: https://img.shields.io/badge/FPDF-1.86-blue?style=for-the-badge&logo=data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAIAAAD8GO2jAAAAA3NCSVQICAjb4U/gAAAAFElEQVQ4T2NkYGB8Y9JwAHZAPACMggAAw4C2RCZAAAAABJRU5ErkJggg==&logoColor=white

## Instalación

1. **Clona el repositorio:**

```bash
git clone https://github.com/Brandzv/Geshovap.git
```

2. **Configura un servidor local:**
   Asegúrate de tener configurado un servidor local con PHP y MySQL (por ejemplo, XAMPP, MAMP o LAMP).

3. **Importa la base de datos:**
   Utiliza phpMyAdmin o la terminal de MySQL para importar el archivo _`geshovap_bd.sql`_.

4. **Configura las credenciales:**
   En caso de ser necesario, actualiza el archivo `conexion.php` con las credenciales correctas de la base de datos.

5. **Accede a la aplicación:**
   Abre el navegador e ingresa a la aplicación a través de la URL proporcionada por el servidor local.

## Uso

1. **Acceso:** Inicia sesión en la aplicación web con las credenciales correctas.
2. **Para Administradores:**

    - Asigna el horario de trabajo de los empleados.
    - Administra las solicitudes y el seguimiento de las vacaciones y los permisos.

3. **Para Empleados:**

    - Visualiza su horario asignado y los detalles relevantes.
    - Solicitar días de vacaciones o permisos desde su panel personal.
