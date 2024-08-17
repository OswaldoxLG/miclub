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
    } 
    $stmt_instructor->close();
} 
$sql = "SELECT i.id_integrante, u.nom_u, u.paterno_u, u.materno_u, u.email, t.tel 
        FROM integrante i
        INNER JOIN usuario u ON i.id_usuario1 = u.id_usuario
        LEFT JOIN telefono t ON u.id_tel1 = t.id_tel
        INNER JOIN integrante_curso ic ON i.id_integrante = ic.id_integrante1
        INNER JOIN curso c ON ic.id_curso1 = c.id_curso
        INNER JOIN instructor_curso icu ON c.id_curso = icu.id_curso1
        WHERE icu.id_instructor1 = ?";

$stmt = $conn->prepare($sql);


$stmt->bind_param('i', $id_instructor);
$stmt->execute();

$result = $stmt->get_result();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Alumnos</title>
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
                        <h1 class="text-center mb-4">LISTA DE ALUMNOS</h1>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="table-dark">
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Apellido Paterno</th>
                                        <th>Apellido Materno</th>
                                        <th>Correo</th>
                                        <th>Teléfono</th> 
                                        <th>Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<tr>";
                                            echo "<td>" . htmlspecialchars($row['id_integrante']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['nom_u']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['paterno_u']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['materno_u']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['tel'] ?: 'No disponible') . "</td>";
                                            echo "<td><a href='delete.php?id=" . urlencode($row['id_integrante']) . "' onclick=\"return confirm('¿Estás seguro de que quieres eliminar este alumno?');\"><img src='" . BASE_URL . "recursos/img/borrar.png' alt='Eliminar' class='icono-cat' title='Eliminar Alumno'></a></td>";
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='7'>No hay alumnos registrados</td></tr>";
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
    <script src="<?php echo BASE_URL; ?>js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo BASE_URL; ?>js/jquery-3.6.0.min.js"></script>
    <?php $conn->close(); ?>
</body>
</html>