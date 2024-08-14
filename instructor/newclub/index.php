<?php
session_start();
include_once '../../config.php';
include_once '../../conexion.php';

$id_instructor = $_SESSION['user_id'];

$id_usuario = $_SESSION['user_id'];

$sql_instructor = "SELECT id_instructor FROM instructor WHERE id_usuario1 = ?";
if ($stmt_instructor = $conn->prepare($sql_instructor)) {
    $stmt_instructor->bind_param("i", $id_usuario);
    $stmt_instructor->execute();
    $result_instructor = $stmt_instructor->get_result();
    
    if ($result_instructor->num_rows > 0) {
        $row_instructor = $result_instructor->fetch_assoc();
        $id_instructor = $row_instructor['id_instructor'];
    } else {
        die("No se encontró el instructor para el usuario con ID: " . htmlspecialchars($id_usuario));
    }
    
    $stmt_instructor->close();
} else {
    die("Error en la preparación de la consulta para obtener el instructor: " . $conn->error);
}
//sis
$sql = "SELECT c.id_curso, c.nom_curso, c.descripcion, c.imagen, cat.categoria 
        FROM curso c
        INNER JOIN categoria cat ON c.id_categoria1 = cat.id_categoria
        INNER JOIN instructor_curso ic ON c.id_curso = ic.id_curso1
        WHERE ic.id_instructor1 = ?";
        
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("i", $id_instructor);
            $stmt->execute();
            $result = $stmt->get_result();
        } else {
            die("Error en la preparación de la consulta: " . $conn->error);
        }

$stmt = $conn->prepare($sql);
if (!$stmt) {
    die("Error en la preparación de la consulta: " . $conn->error);
}
$stmt->bind_param("i", $id_instructor);

if (!$stmt->execute()) {
    die("Error en la consulta: " . $stmt->error);
}

$result = $stmt->get_result();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Clubes</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>recursos/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>recursos/css/styles.css">
</head>
<body>
    <div class="wrapper">
        <div class="content">
            <div class="container">
                <div class="row">
                    <aside class="col-md-3 col-lg-2 bg-dark text-light p-4 aside-admininstruct">
                        <div class="img_cat">
                            <a href="<?php echo BASE_URL; ?>index.php"><img src="<?php echo BASE_URL; ?>recursos/img/logo.png" alt="Mi Club Logo" class="img-fluid mb-2 img_catalogos"></a>
                            <img src="<?php echo BASE_URL; ?>recursos/img/letras.png" alt="nombre del proyecto" class="img-fluid mb-2 letras_proy_cat">
                        </div>
                        <nav class="nav flex-column">
                            <a href="<?php echo BASE_URL; ?>instructor/newclub/index.php" class="nav-link text-light">Clubes</a>
                            <a href="<?php echo BASE_URL; ?>instructor/listaalu/index.php" class="nav-link text-light">Alumnos</a>
                        </nav>
                    </aside>
                    <main class="col-md-9 col-lg-10 p-4">
                        <h1 class="text-center mb-4">MIS CLUBES</h1>
                        <div class="d-flex mb-3">
                            <a href="<?php echo BASE_URL; ?>instructor/newclub/create.php" class="btn btn-success d-flex align-items-center">
                                <img src="<?php echo BASE_URL; ?>recursos/img/añadir.png" alt="Añadir Curso" class="me-2" style="width: 24px; height: 24px;">
                                <span class="text-white">Añadir</span>
                            </a>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="table-dark">
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Descripción</th>
                                        <th>Imágenes</th>
                                        <th>Categoría</th>
                                        <th>Editar</th>
                                        <th>Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<tr>";
                                            echo "<td>" . htmlspecialchars($row['id_curso']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['nom_curso']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['descripcion']) . "</td>";  
                                                if (strpos($row['imagen'], 'instructor/img_cursos/') !== false) {
                                                    $img_src = BASE_URL . htmlspecialchars($row['imagen']);
                                                } else {
                                                    $img_src = BASE_URL . 'instructor/img_cursos/' . htmlspecialchars($row['imagen']);
                                                }
                                            echo "<td><img src='" . $img_src . "' alt='Imagen del Curso' class='img-fluid' style='width: 130px;'></td>";
                                            echo "<td>" . htmlspecialchars($row['categoria']) . "</td>";
                                            echo "<td><a href='update.php?id=" . urlencode($row['id_curso']) . "'><img src='" . BASE_URL . "recursos/img/editar.png' alt='Editar' class='icono-cat' title='Editar Curso'></a></td>";
                                            echo "<td><a href='delete.php?id=" . urlencode($row['id_curso']) . "' onclick=\"return confirm('¿Estás seguro de que quieres eliminar este curso?');\"><img src='" . BASE_URL . "recursos/img/borrar.png' alt='Eliminar' class='icono-cat' title='Eliminar Curso'></a></td>";
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='7'>No hay clubes registrados</td></tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </main>
                </div>
            </div>
        </div>
        <?php include_once BASE_PATH . 'includes/footer.php'; ?>
    </div>

    <?php 
    $stmt->close();
    $conn->close(); 
    ?>
</body>
</html>
