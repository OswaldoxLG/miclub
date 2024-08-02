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
    <title>Document</title>
</head>
<body>
<?php
include_once BASE_PATH . 'includes/header.php';
include_once BASE_PATH . 'includes/busqueda.php';
?>

<div class="centrar_cursos">
    <div class="info_cursos">
        <div class="imagen_cursos">
            <img src="../recursos/img/editar.png">
        </div>
    </div>
</div>
<?php
include_once BASE_PATH . 'includes/footer.php';
?>
</body>
</html>