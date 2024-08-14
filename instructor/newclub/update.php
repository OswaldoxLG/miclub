<?php 
session_start();
include_once '../../config.php'; 
include_once '../../conexion.php'; 

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "ID de curso inválido.";
    exit();
}

$curso_id = intval($_GET['id']);

$sql_curso = "SELECT nom_curso, descripcion, id_categoria1, imagen FROM curso WHERE id_curso = ?";
$stmt_curso = $conn->prepare($sql_curso);
$stmt_curso->bind_param("i", $curso_id);
$stmt_curso->execute();
$result_curso = $stmt_curso->get_result();

if ($result_curso->num_rows === 0) {
    echo "Curso no encontrado.";
    exit();
}

$curso = $result_curso->fetch_assoc();

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
            $img_folder = '../../instructor/img_curso/';
            $img_path = $img_folder . $img_name;

            if ($curso['imagen'] && file_exists($img_folder . basename($curso['imagen']))) {
                unlink($img_folder . basename($curso['imagen']));
            }

            if (move_uploaded_file($img_tmp_name, $img_path)) {
                $img_url = 'instructor/img_curso/' . $img_name; 
            } else {
                echo "Hubo un problema al subir la imagen.";
                exit();
            }
        } else {
            echo "Solo se permiten archivos JPG, JPEG, PNG y GIF.";
            exit();
        }
    } else {
        $img_url = $curso['imagen'];
    }

    $sql_update = "UPDATE curso SET imagen = ?, nom_curso = ?, descripcion = ?, id_categoria1 = ? WHERE id_curso = ?";
    $stmt_update = $conn->prepare($sql_update);
    $stmt_update->bind_param("sssii", $img_url, $nombre, $descripcion, $categoria_id, $curso_id);

    if ($stmt_update->execute()) {
        header("Location: index.php"); 
        exit();
    } else {
        echo "Error al actualizar el curso: " . $stmt_update->error;
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
    <title>MiClub | Actualiza tu curso</title>
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
                <h2 class="nom_form_form1">ACTUALIZA TU CURSO</h2>
            </div>
            <form action="update.php?id=<?php echo $curso_id; ?>" enctype="multipart/form-data" method="POST" class="con_form1">
                <label for="nombre" class="label-form1">Nombre:</label>
                <input type="text" id="nombre" name="nombre" class="input-form1" value="<?php echo htmlspecialchars($curso['nom_curso']); ?>" required>
                
                <label for="descripcion" class="label-form1">Descripción:</label>
                <textarea id="descripcion" name="descripcion" class="input-form1" rows="4" required><?php echo htmlspecialchars($curso['descripcion']); ?></textarea>
                
                <label for="imagen" class="label-form1">Sube una nueva imagen (opcional):</label>
                <input type="file" id="imagen" name="imagen" class="input-form1">
                
                <label for="categoria" class="label-form1">Elige una categoría:</label>
                <select id="categoria" name="categoria" class="input-form1" required>
                    <option value="">Seleccione una categoría</option>
                    <?php
                    if ($result_categorias->num_rows > 0) {
                        while ($row_categoria = $result_categorias->fetch_assoc()) {
                            $selected = ($row_categoria['id_categoria'] == $curso['id_categoria1']) ? 'selected' : '';
                            echo "<option value=\"" . htmlspecialchars($row_categoria['id_categoria']) . "\" $selected>" . htmlspecialchars($row_categoria['categoria']) . "</option>";
                        }
                    } else {
                        echo "<option value=\"\">No hay categorías disponibles</option>";
                    }
                    ?>
                </select>
                
                <input type="submit" name="update" value="ACTUALIZAR" class="btn_form1">
            </form>
        </div>
    </div>
</div>
</body>
<script src="../recursos/js/passwd-eye.js"></script>
</html>
