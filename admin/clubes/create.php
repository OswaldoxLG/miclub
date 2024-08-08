<?php include_once '../../config.php'; ?>
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
                <h2 class="nom_form_form1">AGREGAR CLUB</h2>
            </div>
            <form action="altaalumnos.php" method="POST" class="con_form1">
                <label for="nombre" class="label-form1">Nombre:</label>
                <input type="text" id="nombre" name="nombre" class="input-form1" required>
                <label for="descripcion" class="label-form1">Descripción:</label>
                <input type="text" id="descripcion" name="descipcion" class="input-form1" required>
                <input type="submit"  name="insert" value="AGREGAR" class="btn_form1">
            </form>
            </div>
        </div>
    </div>
</body>
</html>