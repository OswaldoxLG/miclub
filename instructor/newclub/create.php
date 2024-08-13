<?php 
include_once '../../config.php'; 
include_once '../../conexion.php'; 

$sql_categorias = "SELECT id_categoria, categoria FROM categoria";
$result_categorias = $conn->query($sql_categorias);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $categoria_id = $_POST['categoria']; // ID de la categoría seleccionada
    $instructor_id = $_SESSION['user_id']; // ID del instructor logueado (suponiendo que está en la sesión)

    // Manejo de la subida de la imagen
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
        $img_name = $_FILES['imagen']['name'];
        $img_tmp_name = $_FILES['imagen']['tmp_name'];
        $img_folder = '../../instructor/img_curso/';
        $img_path = $img_folder . basename($img_name);

        // Verificar si el archivo es una imagen
        $img_file_type = strtolower(pathinfo($img_path, PATHINFO_EXTENSION));
        $valid_extensions = array("jpg", "jpeg", "png", "gif");

        if (in_array($img_file_type, $valid_extensions)) {
            if (move_uploaded_file($img_tmp_name, $img_path)) {
                // Imagen subida exitosamente
                $img_url = 'instructor/img_curso/' . basename($img_name); // Guardar la dirección relativa
            } else {
                echo "Hubo un problema al subir la imagen.";
                exit();
            }
        } else {
            echo "Solo se permiten archivos JPG, JPEG, PNG y GIF.";
            exit();
        }
    } else {
        $img_url = null; // Si no se sube imagen, el campo en la base de datos se dejará como NULL
    }

    // Insertar los datos en la tabla curso
    $sql = "INSERT INTO curso (imagen, nom_curso, descripcion, id_categoria1) 
            VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $img_url, $nombre, $descripcion, $categoria_id);

    if ($stmt->execute()) {
        // Obtener el ID del curso insertado
        $curso_id = $stmt->insert_id;

        // Insertar la relación en la tabla instructor_curso
        $sql_instructor_curso = "INSERT INTO instructor_curso (id_instructor1, id_curso1) VALUES (?, ?)";
        $stmt_instructor_curso = $conn->prepare($sql_instructor_curso);
        $stmt_instructor_curso->bind_param("ii", $instructor_id, $curso_id);

        if ($stmt_instructor_curso->execute()) {
            header("Location: index.php"); // Redireccionar a la página de cursos
            exit();
        } else {
            echo "Error al asignar el curso al instructor: " . $stmt_instructor_curso->error;
        }
    } else {
        echo "Error al crear el curso: " . $stmt->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"  href="<?php echo BASE_URL; ?>recursos/css/bootstrap.min.css">
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
                    <input type="file" value="imagen" name="imagen" class="input-form1">

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
