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
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>recursos/css/estilo_nosotros.css">
    <title>Miclub.mx|Sobre nosotros</title>
    <title>Document</title>
</head>
<body>
<?php
include_once BASE_PATH . 'includes/header.php';
?>
<div class="container">
    <h1>Conoce más acerca de nosotros</h1>
    <p class="somos_txt">"Conetics" es una empresa dedicada a brindar el servicio de creación,
diseño, desarrollo y mantenimiento de páginas web. Estamos seriamente comprometidos
con nuestros clientes y nuestros propios proyectos para brindar un servicio de calidad
y de esta manera hacer que las proyectos logren tener un buen alcance en el mercado, 
manteniéndose a la vanguardia con tecnologías actualizadas implementadas para la creación 
de sitios web.</p>
</div>
<div class="logo_nosotros">
<img src="<?php echo BASE_URL; ?>recursos/img/conetics.png" class="conetics">
</div>
<?php
include_once BASE_PATH . 'includes/footer.php';
?>
</body>
</html>