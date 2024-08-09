<?php include_once '../../config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorías</title>
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
                <h2 class="nom_form_form1">AGREGAR CATEGORÍA</h2>
            </div>
            <form action="create.php" method="POST" class="con_form1">
            <label for="categoria" class="label-form1">Elige una categoría:</label>
                            <select id="categoria" name="categoria" class="input-form1">
                                <option>Artístico</option>
                                <option>Deportivo</option>
                                <option>Cultural</option>
                                <option>Social</option>
                            </select>
                <input type="submit"  name="insert" value="AGREGAR" class="btn_form1">
            </form>
            </div>
        </div>
    </div>
</body>
</html>