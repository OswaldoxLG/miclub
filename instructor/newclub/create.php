<?php 
include_once '../../config.php'; 
include_once '../../conexion.php'; 
session_start();

if (!isset($_SESSION['user_id'])) {
    die("Error: Usuario no autenticado.");
}

$usuario_id = $_SESSION['user_id']; 

$sql_verificar_instructor = "SELECT id_instructor FROM instructor WHERE id_usuario1 = ?";
$stmt_verificar_instructor = $conn->prepare($sql_verificar_instructor);
$stmt_verificar_instructor->bind_param("i", $usuario_id);
$stmt_verificar_instructor->execute();
$result_instructor = $stmt_verificar_instructor->get_result();

if ($result_instructor->num_rows == 0) {
    die("Error: El usuario no está registrado como instructor.");
}

$row_instructor = $result_instructor->fetch_assoc();
$id_instructor = $row_instructor['id_instructor'];

$sql_categorias = "SELECT id_categoria, categoria FROM categoria";
$result_categorias = $conn->query($sql_categorias);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $categoria_id = $_POST['categoria']; 

    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
        $img_name = $_FILES['imagen']['name'];
        $img_tmp_name = $_FILES['imagen']['tmp_name'];
        $img_file_type = strtolower(pathinfo($img_name, PATHINFO_EXTENSION));
        $valid_extensions = array("jpg", "jpeg", "png", "gif");

        if (in_array($img_file_type, $valid_extensions)) {
            $img_name = uniqid() . '.' . $img_file_type;
            $img_folder = BASE_PATH . 'instructor/img_cursos/';
            $img_path = $img_folder . $img_name;

            if (move_uploaded_file($img_tmp_name, $img_path)) {
                $img_url = 'instructor/img_cursos/' . $img_name; 
            } else {
                echo "Hubo un problema al subir la imagen.";
                exit();
            }
        } else {
            echo "Solo se permiten archivos JPG, JPEG, PNG y GIF.";
            exit();
        }
    } else {
        $img_url = null; 
    }

    $sql_insert_curso = "INSERT INTO curso (nom_curso, descripcion, id_categoria1, imagen) VALUES (?, ?, ?, ?)";
    $stmt_insert_curso = $conn->prepare($sql_insert_curso);
    $stmt_insert_curso->bind_param("ssis", $nombre, $descripcion, $categoria_id, $img_url);

    if ($stmt_insert_curso->execute()) {
        $curso_id = $stmt_insert_curso->insert_id;

        $sql_instructor_curso = "INSERT INTO instructor_curso (id_instructor1, id_curso1) VALUES (?, ?)";
        $stmt_instructor_curso = $conn->prepare($sql_instructor_curso);
        $stmt_instructor_curso->bind_param("ii", $id_instructor, $curso_id);

        if ($stmt_instructor_curso->execute()) {
            header("Location: index.php"); 
            exit();
        } else {
            die("Error al asignar el curso al instructor: " . $stmt_instructor_curso->error);
        }
    } else {
        die("Error al crear el curso: " . $stmt_insert_curso->error);
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>recursos/css/bootstrap.min.css">
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
            <form action="create.php" enctype="multipart/form-data" method="POST" class="con_form1">
                <label for="nombre" class="label-form1">Nombre:</label>
                <input type="text" id="nombre" name="nombre" class="input-form1" required>
                
                <label for="descripcion" class="label-form1">Descripción:</label>
                <textarea id="descripcion" name="descripcion" class="input-form1" rows="4" required></textarea>
                
                <label for="imagen" class="label-form1">Sube una imagen:</label>
                <input type="file" id="imagen" name="imagen" class="input-form1">

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
