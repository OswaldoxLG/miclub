<?php
session_start();
include_once '../../config.php'; 
include_once '../../conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $rol = $_POST['rol'];

    $stmt_rol = $conn->prepare("INSERT INTO rol (rol) VALUES (?)");
    $stmt_rol->bind_param("s", $rol);

    if ($stmt_rol->execute()) {
        echo "Rol agregado exitosamente";
        header("Location: index.php"); // Redirige a la lista de roles
        exit();
    } else {
        echo "Error al insertar rol: " . $stmt_rol->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Rol</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>recursos/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>recursos/css/styles.css">
</head>
<body>
    <div class="con_prin_form1">
        <div class="con_sec_form1">
            <div class="con_img_form1">
                <img src="<?php echo BASE_URL; ?>recursos/img/logo.png" alt="Imagen de rol" class="img_cur_form1">
            </div>
            <div class="con_ltr_form1">
                <img src="<?php echo BASE_URL; ?>recursos/img/letras.png" alt="Letras del proyecto" class="img_ltr_form1">
            </div>
        </div>
        <div class="con_ter_form1">
            <div class="con_cuar_form1">
                <div class="con_tit_form1">
                    <h2 class="nom_form_form1">AGREGAR ROL</h2>
                </div>
                <form action="create.php" method="POST" class="con_form1">
                    <label for="rol" class="label-form1">Nombre del rol:</label>
                    <input type="text" id="rol" name="rol" class="input-form1" required>
                    <input type="submit" name="insert" value="AGREGAR" class="btn_form1">
                </form>
            </div>
        </div>
    </div>
</body>
</html>
