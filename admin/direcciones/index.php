<?php
session_start();
include_once '../../config.php';
include_once '../../conexion.php';

$sql = "SELECT d.id_direccion, d.calle, d.numero, d.colonia, d.cp
    FROM direccion d";

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
    <title>Lista de Direcciones</title>
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
                            <a href="/miclub/admin/administradores/index.php" class="nav-link text-light">Administradores</a>
                            <a href="/miclub/admin/categorias/index.php" class="nav-link text-light">Categorías</a>
                            <a href="/miclub/admin/clubes/index.php" class="nav-link text-light">Cursos</a>
                            <a href="/miclub/admin/instructores/index.php" class="nav-link text-light">Instructores</a>
                            <a href="/miclub/admin/alumnos/index.php" class="nav-link text-light">Alumnos</a>
                            <a href="/miclub/admin/roles/index.php" class="nav-link text-light">Roles</a>
                            <a href="/miclub/admin/direcciones/index.php" class="nav-link text-light">Direcciones</a>
                        </nav>
                    </aside>
                    <main class="col-md-9 col-lg-10 p-4">
                        <h1 class="text-center mb-4">DIRECCIONES</h1>
                        <div class="d-flex mb-3">
                            <a href="<?php echo BASE_URL; ?>admin/direcciones/create.php" class="btn btn-success d-flex align-items-center">
                                <img src="<?php echo BASE_URL; ?>recursos/img/añadir.png" alt="Añadir Dirección" class="me-2" style="width: 24px; height: 24px;">
                                <span class="text-white">Añadir</span>
                            </a>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="table-dark">
                                    <tr>
                                        <th>ID</th>
                                        <th>Calle</th>
                                        <th>Número</th>
                                        <th>Colonia</th>
                                        <th>CP</th>
                                        <th>Editar</th>
                                        <th>Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<tr>";
                                            echo "<td>" . htmlspecialchars($row['id_direccion']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['calle']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['numero']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['colonia']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['cp']) . "</td>";
                                            echo "<td><a href='update.php?id=" . urlencode($row['id_direccion']) . "'><img src='" . BASE_URL . "recursos/img/editar.png' alt='Editar' class='icono-cat' title='Editar Dirección'></a></td>";
                                            echo "<td><a href='delete.php?id=" . urlencode($row['id_direccion']) . "' onclick=\"return confirm('¿Estás seguro de que quieres eliminar esta dirección?');\"><img src='" . BASE_URL . "recursos/img/borrar.png' alt='Eliminar' class='icono-cat' title='Eliminar Dirección'></a></td>";
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='7'>No hay direcciones registradas</td></tr>";
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
