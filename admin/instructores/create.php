<?php
include_once '../../config.php'; 
include_once '../../conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $apellido_paterno = $_POST['apellido-paterno'];
    $apellido_materno = $_POST['apellido-materno'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];

    // Usar consultas preparadas para evitar inyecciones SQL
    // Primero, insertamos el teléfono
    $stmt_tel = $conn->prepare("INSERT INTO telefono (tel) VALUES (?)");
    $stmt_tel->bind_param("s", $telefono);

    if ($stmt_tel->execute()) {
        $id_tel = $conn->insert_id;

        // Luego, insertamos al usuario
        $stmt_usuario = $conn->prepare("INSERT INTO usuario (nom_u, paterno_u, materno_u, email, id_tel1, id_rol1) VALUES (?, ?, ?, ?, ?, 2)");
        $stmt_usuario->bind_param("ssssi", $nombre, $apellido_paterno, $apellido_materno, $correo, $id_tel);

        if ($stmt_usuario->execute()) {
            $id_usuario = $conn->insert_id;

            // Finalmente, insertamos al instructor
            $stmt_instructor = $conn->prepare("INSERT INTO instructor (id_usuario1) VALUES (?)");
            $stmt_instructor->bind_param("i", $id_usuario);

            if ($stmt_instructor->execute()) {
                echo "Instructor agregado exitosamente";
                header("Location: " . $BASE_URL . "admin/instructores/index.php");
                exit();
            } else {
                echo "Error al insertar instructor: " . $stmt_instructor->error;
            }
        } else {
            echo "Error al insertar usuario: " . $stmt_usuario->error;
        }
    } else {
        echo "Error al insertar teléfono: " . $stmt_tel->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Instructor</title>
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
                    <h2 class="nom_form_form1">AGREGAR INSTRUCTOR</h2>
                </div>
                <form action="<?php echo BASE_URL; ?>admin/instructores/create.php" method="POST" class="con_form1">
                    <label for="nombre" class="label-form1">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" class="input-form1" required>
                    <label for="apellido-paterno" class="label-form1">Apellido paterno:</label>
                    <input type="text" id="apellido-paterno" name="apellido-paterno" class="input-form1" required>
                    <label for="apellido-materno" class="label-form1">Apellido materno:</label>
                    <input type="text" id="apellido-materno" name="apellido-materno" class="input-form1" required>
                    <label for="correo" class="label-form1">Correo:</label>
                    <input type="email" id="correo" name="correo" class="input-form1" required>
                    <label for="telefono" class="label-form1">Teléfono:</label>
                    <input type="text" id="telefono" name="telefono" class="input-form1">
                    <input type="submit" name="insert" value="AGREGAR" class="btn_form1">
                </form>
            </div>
        </div>
    </div>
</body>
</html>
