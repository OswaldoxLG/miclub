<?php include_once '../../config.php'; 
include_once '../../conexion.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet"  href="<?php echo BASE_URL; ?>recursos/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>recursos/css/styles.css">
</head>
<body>
    <div class="con_prin_form1">
        <div class="con_sec_form1">
            <div class="con_img_form1">
                <img src="<?php echo BASE_URL; ?>recursos/img/logo.png" alt="Imagen de curso" class="img_cur_form1">
            </div>
            <div class="con_ltr_form1">
                <img src="<?php echo BASE_URL; ?>recursos/img/letras.png" alt="Letras del proyecto" class="img_ltr_form1">
            </div>
        </div>
        <div class="con_ter_form1">
            <div class="con_cuar_form1">
            <div class="con_tit_form1">
                <h2 class="nom_form_form1">MODIFICAR INSTRUCTOR</h2>
            </div>
            <form action="create.php" method="POST" class="con_form1">
                <label for="nombre" class="label-form1">Nombre:</label>
                <input type="text" id="nombre" name="nombre" class="input-form1" required>
                <label for="apellido-paterno" class="label-form1">Apellido paterno:</label>
                <input type="text" id="apellido-paterno" name="apellido-paterno" class="input-form1" required>
                <label for="apellido-materno" class="label-form1">Apellido materno:</label>
                <input type="text" id="apellido-materno" name="apellido-materno" class="input-form1" required>
                <label for="correo" class="label-form1">Correo:</label>
                <input type="text" id="correo" name="correo" class="input-form1" required>
                <label for="telefono" class="label-form1">Teléfono:</label>
                <input type="text" id="telefono" name="telefono" class="input-form1">
                <input type="submit"  name="insert" value="ENVIAR" class="btn_form1">
            </form>
            </div>
        </div>
    </div>
</body>
</html>