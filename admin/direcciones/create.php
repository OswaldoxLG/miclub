<?php 
session_start();
include_once '../../config.php';
include_once '../../conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir y validar datos del formulario
    $calle = $_POST['calle'];
    $numero = $_POST['numero'];
    $colonia = $_POST['colonia'];
    $cp = $_POST['cp'];

    // Validar que los campos no estén vacíos (puedes agregar más validaciones según sea necesario)
    $sql_direccion = "INSERT INTO direccion (calle, numero, colonia, cp) VALUES (?, ?, ?, ?)";
    $stmt_direccion = $conn->prepare($sql_direccion);
    
    if ($stmt_direccion) {
        $stmt_direccion->bind_param("sisi", $calle, $numero, $colonia, $cp); // Asegúrate de que 'colonia' es tratado como una cadena
    
            if ($stmt_direccion->execute()) {
                // Redirigir después de la inserción
                header("Location: index.php");
                exit();
            } else {
                echo "Error al agregar la dirección: " . $stmt_direccion->error;
            }
        } else {
            echo "Error en la preparación de la consulta: " . $conn->error;
        }
    
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Dirección</title>
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
                    <h2 class="nom_form_form1">AGREGAR DIRECCIÓN</h2>
                </div>
                <form action="create.php" method="POST" class="con_form1">
                    <label for="calle" class="label-form1">Calle:</label>
                    <input type="text" id="calle" name="calle" class="input-form1" required>
                    <label for="numero" class="label-form1">Número:</label>
                    <input type="number" id="numero" name="numero" class="input-form1" required>
                    <label for="colonia" class="label-form1">Colonia:</label>
                    <input type="text" id="colonia" name="colonia" class="input-form1" required>
                    <label for="cp" class="label-form1">CP:</label>
                    <input type="number" id="cp" name="cp" class="input-form1" required>
                    <input type="submit" name="insert" value="AGREGAR" class="btn_form1">
                </form>
            </div>
        </div>
    </div>
</body>
</html>

