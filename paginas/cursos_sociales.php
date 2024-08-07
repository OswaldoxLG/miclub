<?php
include_once '../config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"  href="<?php echo BASE_URL; ?>recursos/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>recursos/css/styles.css">
    <title>MiClub.mx | Cursos artísticos</title>
</head>
<body>
<?php
include_once BASE_PATH . 'includes/header.php';
include_once BASE_PATH . 'includes/busqueda.php';
?>

<div class="centrar_cursos">
    <div class="contenido_cursos_s">
        <div class="imagenes_cursos">
            <img src="../recursos/img/curso_futbol.png">
        </div>
        <div class="texto_cursos">
            <h3>TITULO DE EJEMPLO</h3>
            <p>Descripción de curso</p>
            <p>costo</p>
            <button class="boton_cursos"><a href="#" class="accion_cursos">INSCRIBIRSE</a></button>
        </div>
    </div>
    <div class="contenido_cursos_s">
        <div class="imagenes_cursos">
            <img src="../recursos/img/slider1.jpg">
        </div>
        <div class="texto_cursos">
            <h3>TITULO DE EJEMPLO</h3>
            <p>Descripción de curso</p>
            <p>costo</p>
            <button class="boton_cursos"><a href="#" class="accion_cursos">INSCRIBIRSE</a></button>
        </div>
    </div>
    <div class="contenido_cursos_s">
        <div class="imagenes_cursos">
            <img src="../recursos/img/slider2.jpg">
        </div>
        <div class="texto_cursos">
            <h3>TITULO DE EJEMPLO</h3>
            <p>Descripción de curso</p>
            <p>costo</p>
            <button class="boton_cursos"><a href="#" class="accion_cursos">INSCRIBIRSE</a></button>
        </div>
    </div>
    <div class="contenido_cursos_s">
        <div class="imagenes_cursos">
            <img src="#">
        </div>
        <div class="texto_cursos">
            <h3>TITULO DE EJEMPLO</h3>
            <p>Descripción de curso</p>
            <p>costo</p>
            <button class="boton_cursos"><a href="#" class="accion_cursos">INSCRIBIRSE</a></button>
        </div>
    </div>
</div>
<?php
include_once BASE_PATH . 'includes/footer.php';
?>
</body>
</html>