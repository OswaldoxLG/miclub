<?php
include_once '../../config.php';
include_once '../../conexion.php';

$sql = "SELECT i.id_instructor, u.nom_u, u.paterno_u, u.materno_u, u.email, t.tel 
        FROM instructor i
        INNER JOIN usuario u ON i.id_usuario1 = u.id_usuario
        INNER JOIN telefono t ON u.id_tel1 = t.id_tel";

$result = $conn->query($sql);

if (!$result) {
    die("Error en la consulta: " . $conn->error);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Instructores</title>
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
                            <img src="<?php echo BASE_URL; ?>recursos/img/logo.png" alt="Mi Club Logo" class="img-fluid mb-2 img_catalogos">
                            <img src="<?php echo BASE_URL; ?>recursos/img/letras.png" alt="nombre del proyecto" class="img-fluid mb-2 letras_proy_cat">
                        </div>
                        <nav class="nav flex-column">
                            <a href="/miclub/admin/administradores/index.php" class="nav-link text-light">Administradores</a>
                            <a href="/miclub/admin/categorias/index.php" class="nav-link text-light">Categorías</a>
                            <a href="/miclub/admin/clubes/index.php" class="nav-link text-light">Cursos</a>
                            <a href="/miclub/admin/instructores/index.php" class="nav-link text-light">Instructores</a>
                            <a href="/miclub/admin/alumnos/index.php" class="nav-link text-light">Alumnos</a>
                        </nav>
                    </aside>
                    <main class="col-md-9 col-lg-10 p-4">
                        <h1 class="text-center mb-4">INSTRUCTOR</h1>
                        <div class="d-flex mb-3">
                            <a href="<?php echo BASE_URL; ?>admin/instructores/create.php" class="btn btn-success d-flex align-items-center">
                                <img src="<?php echo BASE_URL; ?>recursos/img/añadir.png" alt="Añadir Instructor" class="me-2" style="width: 24px; height: 24px;">
                                <span class="text-white">Añadir</span>
                            </a>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="table-dark">
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Apellido paterno</th>
                                        <th>Apellido materno</th>
                                        <th>Correo</th>
                                        <th>Teléfono</th> 
                                        <th>Editar</th>
                                        <th>Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<tr>";
                                            echo "<td>" . htmlspecialchars($row['id_instructor']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['nom_u']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['paterno_u']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['materno_u']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['tel']) . "</td>";
                                            echo "<td><a href='update.php?id=" . urlencode($row['id_instructor']) . "'><img src='" . BASE_URL . "recursos/img/editar.png' alt='Editar' class='icono-cat' title='Editar Instructor'></a></td>";
                                            echo "<td><a href='delete.php?id=" . urlencode($row['id_instructor']) . "' onclick=\"return confirm('¿Estás seguro de que quieres eliminar este instructor?');\"><img src='" . BASE_URL . "recursos/img/borrar.png' alt='Eliminar' class='icono-cat' title='Eliminar Instructor'></a></td>";
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='8'>No hay instructores registrados</td></tr>";
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
