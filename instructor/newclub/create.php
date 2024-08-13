<?php 
include_once '../../config.php'; 
include_once '../../conexion.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"  href="<?php echo BASE_URL; ?>recursos/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>recursos/css/styles.css">
    <title>MiClub | Crea tu curso</title>
</head>
<body>
<div class="con_prin_form1">
        <div class="con_sec_form1">
            <div class="con_img_form1">
                <img src="<?php echo BASE_URL; ?>recursos/img/logo.png" alt="Logo del Proyecto" class="img_cur_form1">
            </div>
            <div class="con_ltr_form1">
                <img src="<?php echo BASE_URL; ?>recursos/img/letras.png" alt="Nombre del Proyecto" class="img_ltr_form1">
            </div>
        </div>
        <div class="con_ter_form1">
            <div class="con_cuar_form1">
                <div class="con_tit_form1">
                    <h2 class="nom_form_form1">CREA UN CLUB</h2>
                </div>
                <form action="create.php" method="POST" class="con_form1">
                    <label for="nombre" class="label-form1">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" class="input-form1" required>
                    
                    <label for="descripcion" class="label-form1">Descripción:</label>
                    <textarea id="descripcion" name="descripcion" class="input-form1" rows="4" required></textarea>
                    
                    <label for="categoria" class="label-form1">Elige una categoría:</label>
                    <select id="categoria" name="categoria" class="input-form1" required>
                        <option value="">Seleccione una categoría</option>
                        <?php
                        if ($result_categorias->num_rows > 0) {
                            while ($row_categoria = $result_categorias->fetch_assoc()) {
                                echo "<option value=\"" . htmlspecialchars($row_categoria['id_categoria']) . "\">" . htmlspecialchars($row_categoria['categoria']) . "</option>";
                            }
                        } else {
                            echo "<option value=\"\">No hay categorías disponibles</option>";
                        }
                        ?>
                    </select>
                    
                    <input type="submit" name="insert" value="AGREGAR" class="btn_form1">
                </form>
            </div>
        </div>
    </div>
</body>
<script src="../recursos/js/passwd-eye.js"></script>
</html>