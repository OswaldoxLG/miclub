<?php 
session_start();
include_once '../../config.php'; 
include_once '../../conexion.php';

// Verificar si se ha recibido el ID de la dirección
if (isset($_GET['id']) || isset($_POST['id_direccion'])) {
    // Obtener el ID de la dirección
    $id_direccion = isset($_GET['id']) ? $_GET['id'] : $_POST['id_direccion'];
    // Obtener los datos actuales
    $sql = "SELECT d.id_direccion, d.calle, d.numero, d.colonia, d.cp
            FROM direccion d
            WHERE d.id_direccion = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id_direccion);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "No se encontró la dirección.";
        exit();
    }
} else {
    echo "ID de dirección no proporcionado.";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $calle = $_POST['calle'];
    $numero = $_POST['numero'];
    $colonia = $_POST['colonia'];
    $cp = $_POST['cp'];

    // Actualizar la información
    $sql_update = "UPDATE direccion
                   SET calle = ?, numero = ?, colonia = ?, cp = ?
                   WHERE id_direccion = ?";
    $stmt_update = $conn->prepare($sql_update);
    $stmt_update->bind_param('sisii', $calle, $numero, $colonia, $cp, $id_direccion);

    if ($stmt_update->execute()) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error al actualizar la dirección: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Dirección</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>recursos/css/bootstrap.min.css">
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
                    <h2 class="nom_form_form1">MODIFICAR DIRECCIÓN</h2>
                </div>
                <form action="update.php" method="POST" class="con_form1">
                    <input type="hidden" name="id_direccion" value="<?php echo $id_direccion; ?>">
                    <label for="calle" class="label-form1">Calle:</label>
                    <input type="text" id="calle" name="calle" class="input-form1" value="<?php echo htmlspecialchars($row['calle']); ?>" required>
                    <label for="numero" class="label-form1">Número:</label>
                    <input type="number" id="numero" name="numero" class="input-form1" value="<?php echo htmlspecialchars($row['numero']); ?>" required>
                    <label for="colonia" class="label-form1">Colonia:</label>
                    <input type="text" id="colonia" name="colonia" class="input-form1" value="<?php echo htmlspecialchars($row['colonia']); ?>" required>
                    <label for="cp" class="label-form1">Código Postal:</label>
                    <input type="number" id="cp" name="cp" class="input-form1" value="<?php echo htmlspecialchars($row['cp']); ?>" required>
                    <input type="submit" value="ENVIAR" class="btn_form1">
                </form>
            </div>
        </div>
    </div>
</body>
</html>
