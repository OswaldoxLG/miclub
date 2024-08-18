<?php 
session_start();
include_once '../../config.php'; 
include_once '../../conexion.php';

if (isset($_GET['id']) || isset($_POST['id_admin'])) {

    $id_admin = isset($_GET['id']) ? $_GET['id'] : $_POST['id_admin'];
    $sql = "SELECT a.id_admin, u.id_usuario, u.nom_u, u.paterno_u, u.materno_u, u.email, t.id_tel, t.tel 
            FROM administrador a
            INNER JOIN usuario u ON a.id_usuario1 = u.id_usuario
            LEFT JOIN telefono t ON u.id_tel1 = t.id_tel
            WHERE a.id_admin = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id_admin);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "No se encontró el administrador.";
        exit();
    }
} else {
    echo "id de administrador no proporcionado.";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $apellido_paterno = $_POST['apellido-paterno'];
    $apellido_materno = $_POST['apellido-materno'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];

    $conn->begin_transaction();

    try {
        if (!empty($row['id_tel'])) {
            $sql_update_tel = "UPDATE telefono SET tel = ? WHERE id_tel = ?";
            $stmt_update_tel = $conn->prepare($sql_update_tel);
            $stmt_update_tel->bind_param('si', $telefono, $row['id_tel']);
            if ($stmt_update_tel->execute()) {
                echo "Teléfono actualizado correctamente.<br>";
            } else {
                throw new Exception("Error al actualizar el teléfono: " . $stmt_update_tel->error);
            }
        } else {
            $sql_insert_tel = "INSERT INTO telefono (tel) VALUES (?)";
            $stmt_insert_tel = $conn->prepare($sql_insert_tel);
            $stmt_insert_tel->bind_param('s', $telefono);
            if ($stmt_insert_tel->execute()) {
                $new_tel_id = $conn->insert_id;

                $sql_update_usuario = "UPDATE usuario SET id_tel1 = ? WHERE id_usuario = ?";
                $stmt_update_usuario = $conn->prepare($sql_update_usuario);
                $stmt_update_usuario->bind_param('ii', $new_tel_id, $row['id_usuario']);
                if ($stmt_update_usuario->execute()) {
                    echo "Usuario actualizado correctamente con nuevo teléfono.<br>";
                } else {
                    throw new Exception("Error al actualizar el usuario: " . $stmt_update_usuario->error);
                }
            } else {
                throw new Exception("Error al insertar el teléfono: " . $stmt_insert_tel->error);
            }
        }

        // Actualizar info 
        $sql_update_usuario = "UPDATE usuario 
                                SET nom_u = ?, paterno_u = ?, materno_u = ?, email = ? 
                                WHERE id_usuario = ?";
        $stmt_update_usuario = $conn->prepare($sql_update_usuario);
        $stmt_update_usuario->bind_param('ssssi', $nombre, $apellido_paterno, $apellido_materno, $correo, $row['id_usuario']);
        if ($stmt_update_usuario->execute()) {
            echo "Información del usuario actualizada correctamente.<br>";
        } else {
            throw new Exception("Error al actualizar la información del usuario: " . $stmt_update_usuario->error);
        }

        $conn->commit();
        header("Location: index.php");
        exit();
    } catch (Exception $e) {
        $conn->rollback();
        echo "Error al actualizar el administrador: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Administrador</title>
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
                    <h2 class="nom_form_form1">MODIFICAR ADMINISTRADOR</h2>
                </div>
                <form action="update.php" method="POST" class="con_form1">
                    <input type="hidden" name="id_admin" value="<?php echo $id_admin; ?>">
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
                    <input type="submit" value="ENVIAR" class="btn_form1">
                </form>
            </div>
        </div>
    </div>
</body>
</html>
