<?php 
include_once '../../config.php'; 
include_once '../../conexion.php';

// Verificar si se ha recibido el ID del curso
if (isset($_GET['id']) || isset($_POST['id_curso'])) {
    // Obtener el ID del curso
    $id_curso = isset($_GET['id']) ? $_GET['id'] : $_POST['id_curso'];

    // Obtener los datos actuales del curso
    $sql = "SELECT c.nom_curso, c.descripcion, c.id_categoria1, cat.categoria
            FROM curso c
            INNER JOIN categoria cat ON c.id_categoria1 = cat.id_categoria
            WHERE c.id_curso = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id_curso);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "No se encontró el curso.";
        exit();
    }
} else {
    echo "ID de curso no proporcionado.";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $categoria = $_POST['categoria'];

    // Obtener el ID de la categoría seleccionada
    $sql_categoria = "SELECT id_categoria FROM categoria WHERE categoria = ?";
    $stmt_categoria = $conn->prepare($sql_categoria);
    $stmt_categoria->bind_param('s', $categoria);
    $stmt_categoria->execute();
    $result_categoria = $stmt_categoria->get_result();
    
    if ($result_categoria->num_rows > 0) {
        $row_categoria = $result_categoria->fetch_assoc();
        $id_categoria = $row_categoria['id_categoria'];
        
        // Actualizar la información del curso
        $sql_update = "UPDATE curso
                       SET nom_curso = ?, descripcion = ?, id_categoria1 = ?
                       WHERE id_curso = ?";
        $stmt_update = $conn->prepare($sql_update);
        $stmt_update->bind_param('ssii', $nombre, $descripcion, $id_categoria, $id_curso);

        if ($stmt_update->execute()) {
            header("Location: index.php");
            exit();
        } else {
            echo "Error al actualizar el curso: " . $conn->error;
        }
    } else {
        echo "Categoría no encontrada.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Curso</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>recursos/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>recursos/css/styles.css">
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
                    <h2 class="nom_form_form1">MODIFICAR CURSO</h2>
                </div>
                <form action="update.php" method="POST" class="con_form1">
                    <input type="hidden" name="id_curso" value="<?php echo $id_curso; ?>">
                    <label for="nombre" class="label-form1">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" class="input-form1" value="<?php echo htmlspecialchars($row['nom_curso']); ?>" required>
                    
                    <label for="descripcion" class="label-form1">Descripción:</label>
                    <input type="text" id="descripcion" name="descripcion" class="input-form1" value="<?php echo htmlspecialchars($row['descripcion']); ?>" required>
                    
                    <label for="categoria" class="label-form1">Elige una categoría:</label>
                    <select id="categoria" name="categoria" class="input-form1" required>
                        <?php
                        // Obtener las categorías para el select
                        $sql_categorias = "SELECT categoria FROM categoria";
                        $result_categorias = $conn->query($sql_categorias);
                        while ($row_categoria = $result_categorias->fetch_assoc()) {
                            $selected = ($row_categoria['categoria'] == $row['categoria']) ? 'selected' : '';
                            echo "<option value=\"" . htmlspecialchars($row_categoria['categoria']) . "\" $selected>" . htmlspecialchars($row_categoria['categoria']) . "</option>";
                        }
                        ?>
                    </select>
                    
                    <input type="submit" value="ENVIAR" class="btn_form1">
                </form>
            </div>
        </div>
    </div>
</body>
</html>
