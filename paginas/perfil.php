<?php
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
    <title>Categorías</title>
</head>
<body>
<?php
include_once BASE_PATH . 'includes/header.php';
include_once BASE_PATH . 'includes/busqueda.php';
?>
<div class="container con_prin_perf">
    <div class="con_barra_perf">
        <div class="con_menu_perf">
            <div class="con_img_perf">
                <img src="<?php echo BASE_URL; ?>recursos/img/avatar.png" alt="imagen de perfil" class="img_perf">
            </div>
            <div class="salu_perf">
                <strong>Hola <?php echo $_SESSION['user_name']; ?></strong>
            </div>
            <?php if (isset($_SESSION['user_role']) && $_SESSION['user_role'] === "Instructor") { ?>
            <div class="con_crear_curso">
            <div class="con_btn_crear">
                <a href="<?php echo BASE_URL; ?>instructor/newclub/index.php" class="in_btn_crear">CREAR CLUB</a>
            </div>
            </div>
            <?php } ?>
        </div>
    </div>
    <div class="con_sec_perf">
        <div class="con_info_perf">
            <div class="con_txt_info">
                <h1 class="txt_perf">MIS CURSOS</h1>
            </div>
            <div class="contenido_cursos_a">
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
        </div>
    </div>
</div>
<?php
include_once BASE_PATH . 'includes/footer.php';
?>
<script src="<?php echo BASE_URL; ?>js/bootstrap.bundle.min.js"></script>
</body>
</html>