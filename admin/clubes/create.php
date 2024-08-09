<?php
include_once '../../config.php'; 
include_once '../../conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $categoria_nombre = $_POST['categoria'];

    // Obtener el ID de la categoría basada en el nombre proporcionado
    $sql_categoria = "SELECT id_categoria FROM categoria WHERE categoria = ?";
    $stmt_categoria = $conn->prepare($sql_categoria);
    $stmt_categoria->bind_param('s', $categoria_nombre);
    $stmt_categoria->execute();
    $result_categoria = $stmt_categoria->get_result();
    
    if ($result_categoria->num_rows > 0) {
        $row_categoria = $result_categoria->fetch_assoc();
        $id_categoria = $row_categoria['id_categoria'];
        
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
    <title>Agregar Club</title>
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
                    <h2 class="nom_form_form1">AGREGAR CLUB</h2>
                </div>
                <form action="create.php" method="POST" class="con_form1">
                    <label for="nombre" class="label-form1">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" class="input-form1" required>
                    
                    <label for="descripcion" class="label-form1">Descripción:</label>
                    <input type="text" id="descripcion" name="descripcion" class="input-form1" required>
                    
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
