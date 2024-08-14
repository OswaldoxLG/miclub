<?php 
session_start();
include_once '../../config.php';
include_once '../../conexion.php';

if(isset($_GET['id']) || isset($_POST['id_integrante'])) {
    $id_alumno = isset($_GET['id']) ? $_GET['id'] : $_POST['id_integrante'];

    $sql = "SELECT u.nom_u, u.paterno_u, u.materno_u, u.email, t.tel 
            FROM integrante i
            INNER JOIN usuario u ON i.id_usuario1 = u.id_usuario
            LEFT JOIN telefono t ON u.id_tel1 = t.id_tel
            WHERE i.id_integrante = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_alumno);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    }
} else {
    echo "  No se encontro el alumno";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $apellido_paterno = $_POST['apellido-paterno'];
    $apellido_materno = $_POST['apellido-materno'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];

    // Actualizar la información
    $sql_update = "UPDATE usuario u 
                INNER JOIN integrante i ON u.id_usuario = i.id_usuario1
                LEFT JOIN telefono t ON u.id_tel1 = t.id_tel
                SET u.nom_u = ?, u.paterno_u = ?, u.materno_u = ?, u.email = ?, t.tel = ?
                WHERE i.id_integrante = ?";
    $stmt_update = $conn->prepare($sql_update);
    $stmt_update->bind_param('sssssi', $nombre, $apellido_paterno, $apellido_materno, $correo, $telefono, $id_alumno);

    if ($stmt_update->execute()) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error al actualizar el alumno: " . $conn->error;
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Alumno</title>
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
                    <h2 class="nom_form_form1">MODIFICAR ALUMNO</h2>
                </div>
                <form action="" method="POST" class="con_form1">
                    <label for="nombre" class="label-form1">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" class="input-form1" value="<?php echo htmlspecialchars($row['nom_u']); ?>" required>
                    
                    <label for="apellido-paterno" class="label-form1">Apellido paterno:</label>
                    <input type="text" id="apellido-paterno" name="apellido-paterno" class="input-form1" value="<?php echo htmlspecialchars($row['paterno_u']); ?>" required>
                    
                    <label for="apellido-materno" class="label-form1">Apellido materno:</label>
                    <input type="text" id="apellido-materno" name="apellido-materno" class="input-form1" value="<?php echo htmlspecialchars($row['materno_u']); ?>" required>
                    
                    <label for="correo" class="label-form1">Correo:</label>
                    <input type="text" id="correo" name="correo" class="input-form1" value="<?php echo htmlspecialchars($row['email']); ?>" required>
                    
                    <label for="telefono" class="label-form1">Teléfono:</label>
                    <input type="text" id="telefono" name="telefono" class="input-form1" value="<?php echo htmlspecialchars($row['tel']); ?>">
                    
                    <input type="submit" name="update" value="ENVIAR" class="btn_form1">
                </form>
            </div>
        </div>
    </div>
</body>
</html>
