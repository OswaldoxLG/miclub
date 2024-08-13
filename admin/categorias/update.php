<?php 
include_once '../../config.php'; 
include_once '../../conexion.php';

// recibe el id de la categoria
if (isset($_GET['id']) || isset($_POST['id_categoria'])) {
    $id_categoria = isset($_GET['id']) ? $_GET['id'] : $_POST['id_categoria'];

    $sql = "SELECT categoria
            FROM categoria 
            WHERE id_categoria = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id_categoria);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "No se encontró la categoría.";
        exit();
    }
} else {
    echo "ID de categoría no proporcionado.";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $categoria = $_POST['categoria'];

    // Actualiza la info
    $sql_update = "UPDATE categoria
                SET categoria = ?
                WHERE id_categoria = ?";
    $stmt_update = $conn->prepare($sql_update);
    $stmt_update->bind_param('si', $categoria, $id_categoria);

    if ($stmt_update->execute()) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error al actualizar la categoría: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Categoría</title>
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
                    <h2 class="nom_form_form1">MODIFICAR CATEGORÍA</h2>
                </div>
                <form action="update.php" method="POST" class="con_form1">
                <input type="hidden" name="id_categoria" value="<?php echo $id_categoria; ?>">
                    <label for="categoria" class="label-form1">Nombre de la categoría:</label>
                    <input type="text" id="categoria" name="categoria" class="input-form1" value="<?php echo htmlspecialchars($row['categoria']); ?>" required>
                    <input type="submit" name="insert" value="ENVIAR" class="btn_form1">
                </form>
            </div>
        </div>
    </div>
</body>
</html>