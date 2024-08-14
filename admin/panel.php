<?php
session_start();
include_once '../config.php';
include_once '../conexion.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"  href="<?php echo BASE_URL; ?>recursos/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>recursos/css/styles.css">
    <title>Miclub | Panel del administrador</title>
</head>
<body class="con_body_panel">
<?php 
include_once BASE_PATH . 'includes/header.php';
?>
    <div class="container con_prin_pan">
        <div class="nom_admin_panel">
            <strong>Hola, <?php echo $_SESSION['user_name']; ?></strong>
        </div>
        <div class="tit_cat_pan">
            <h1 class="txt_cat_pan">CATÁLOGOS</h1>
        </div>
    <div class="con_sec_pan">
        <div class="con_cat_pan">
            <div class="con_img_pan">
                <img src="<?php echo BASE_URL; ?>recursos/img/admin.png" alt="imagen administrador" class="img_cat_pan">
            </div>
            <div class="con_info_cat">
                <a href="<?php echo BASE_URL; ?>admin/administradores/index.php"><strong class="nom_cat_pan">ADMINISTRADOR</strong></a>
            </div>
        </div>
        <div class="con_cat_pan">
            <div class="con_img_pan">
                <img src="<?php echo BASE_URL; ?>recursos/img/instructor.png" alt="imagen instructor" class="img_cat_pan">
            </div>
            <div class="con_info_cat">
                <a href="<?php echo BASE_URL; ?>admin/instructores/index.php"><strong class="nom_cat_pan">INSTRUCTOR</strong></a>
            </div>
        </div>
        <div class="con_cat_pan">
            <div class="con_img_pan">
                <img src="<?php echo BASE_URL; ?>recursos/img/alumno.png" alt="imagen alumno" class="img_cat_pan">
            </div>
            <div class="con_info_cat">
                <a href="<?php echo BASE_URL; ?>admin/alumnos/index.php"><strong class="nom_cat_pan">ALUMNOS</strong></a>
            </div>
        </div>
        <div class="con_cat_pan">
            <div class="con_img_pan">
                <img src="<?php echo BASE_URL; ?>recursos/img/categorias.png" alt="imagen categorias" class="img_cat_pan">
            </div>
            <div class="con_info_cat">
                <a href="<?php echo BASE_URL; ?>admin/categorias/index.php"><strong class="nom_cat_pan">CATEGORÍAS</strong></a>
            </div>
        </div>
        <div class="con_cat_pan">
            <div class="con_img_pan">
                <img src="<?php echo BASE_URL; ?>recursos/img/clubes.png" alt="imagen cursos" class="img_cat_pan">
            </div>
            <div class="con_info_cat">
                <a href="<?php echo BASE_URL; ?>admin/clubes/index.php"><strong class="nom_cat_pan">CURSOS</strong></a>
            </div>
        </div>
    </div>
    </div>
    <?php
include_once BASE_PATH . 'includes/footer.php';
?>
</body>
</html>