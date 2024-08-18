<?php 
session_start();
include_once '../../config.php'; 
include_once '../../conexion.php';

// Recibe el id del rol
if (isset($_GET['id']) || isset($_POST['id_rol'])) {
    $id_rol = isset($_GET['id']) ? $_GET['id'] : $_POST['id_rol'];

    $sql = "SELECT rol FROM rol WHERE id_rol = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id_rol);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "No se encontró el rol.";
        exit();
    }
} else {
    echo "ID de rol no proporcionado.";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $rol = $_POST['rol'];

    // Actualiza la info
    $sql_update = "UPDATE rol SET rol = ? WHERE id_rol = ?";
    $stmt_update = $conn->prepare($sql_update);
    $stmt_update->bind_param('si', $rol, $id_rol);

    if ($stmt_update->execute()) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error al actualizar el rol: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Rol</title>
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
                    <h2 class="nom_form_form1">MODIFICAR ROL</h2>
                </div>
                <form action="update.php" method="POST" class="con_form1">
                    <input type="hidden" name="id_rol" value="<?php echo $id_rol; ?>">
                    <label for="rol" class="label-form1">Nombre del rol:</label>
                    <input type="text" id="rol" name="rol" class="input-form1" value="<?php echo htmlspecialchars($row['rol']); ?>" required>
                    <input type="submit" name="update" value="ENVIAR" class="btn_form1">
                </form>
            </div>
        </div>
    </div>
</body>
</html>
