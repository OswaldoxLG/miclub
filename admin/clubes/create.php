<?php
include_once '../../config.php'; 
include_once '../../conexion.php';

// Obtener todas las categorías para mostrar en el select
$sql_categorias = "SELECT id_categoria, categoria FROM categoria";
$result_categorias = $conn->query($sql_categorias);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $id_categoria = $_POST['categoria'];

    // Insertar el curso en la base de datos
    $stmt_curso = $conn->prepare("INSERT INTO curso (nom_curso, descripcion, id_categoria1) VALUES (?, ?, ?)");
    $stmt_curso->bind_param("ssi", $nombre, $descripcion, $id_categoria);

    if ($stmt_curso->execute()) {
        echo "Curso agregado exitosamente";
        header("Location: index.php");
        exit();
    } else {
        echo "Error al insertar curso: " . $stmt_curso->error;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Curso</title>
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
                    <h2 class="nom_form_form1">AGREGAR CURSO</h2>
                </div>
                <form action="create.php" method="POST" class="con_form1">
                    <label for="nombre" class="label-form1">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" class="input-form1" required>
                    
                    <label for="descripcion" class="label-form1">Descripción:</label>
                    <textarea id="descripcion" name="descripcion" class="input-form1" rows="4" required></textarea>
                    
                    <label for="categoria" class="label-form1">Elige una categoría:</label>
                    <select id="categoria" name="categoria" class="input-form1" required>
                        <option value="">Seleccione una categoría</option>
                        <?php
                        // Verificar si hay categorías disponibles
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
</html>
