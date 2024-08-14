<?php
session_start();
include_once '../../config.php'; 
include_once '../../conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $categoria = $_POST['categoria'];

    $stmt_categoria = $conn->prepare("INSERT INTO categoria (categoria) VALUES (?)");
    $stmt_categoria->bind_param("s", $categoria);

    if ($stmt_categoria->execute()) {
        echo "Categoría agregada exitosamente";
        header("Location: index.php");
        exit();
    } else {
        echo "Error al insertar categoría: " . $stmt_categoria->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorías</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>recursos/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>recursos/css/styles.css">
</head>
<body>
    <div class="con_prin_form1">
        <div class="con_sec_form1">
            <div class="con_img_form1">
                <img src="<?php echo BASE_URL; ?>recursos/img/logo.png" alt="Imagen de categoría" class="img_cur_form1">
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
                    <label for="categoria" class="label-form1">Nombre de la categoría:</label>
                    <input type="text" id="categoria" name="categoria" class="input-form1" required>
                    <input type="submit" name="insert" value="AGREGAR" class="btn_form1">
                </form>
            </div>
        </div>
    </div>
</body>
</html>
