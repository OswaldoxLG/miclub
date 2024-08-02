<?php include_once '../../config.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista categorías</title>
    <link rel="stylesheet"  href="<?php echo BASE_URL; ?>recursos/css/bootstrap.min.css">
</head>
<body class="prin-admincat">
    <div class="con-prin-admincat">
        <aside class="aside-admincat">
            <img src="<?php echo BASE_URL; ?>recursos/img/logo.png" alt="logo" class="imagen-lateral">
            <h2>Mi Club</h2>
            <nav class="nav-admincat">
                <ul>
                    <li><a href="#">Administradores</a></li>
                    <li><a href="./admincategorias.php">Categorías</a></li>
                    <li><a href="#">Cursos</a></li>
                    <li><a href="./admininstructores.php">Instructores</a></li>
                    <li><a href="./adminalu.php">Alumnos</a></li>
                </ul>
            </nav>
        </aside>
        <main class="main-admincat">
            <h1>Categorías</h1>
            <div class="con-verde-admincat">
                <a href="./altacategoria.php" class="btn-añadir-admincat">
                <img src="<?php echo BASE_URL; ?>recursos/img/añadir.png" alt="icono añadir">
                    <p>Añadir</p>
                </a>
            </div>
            <table class="table-admincat">
                <thead class="thead-admincat">
                    <tr class="tr-admincat">
                        <th>ID</th>
                        <th>Categoría</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody class="tbody-admincat">
                    <tr class="tr-admincat">
                        <td>1</td>
                        <td>Artístico</td>
                        <td><a href="#"><img src="<?php echo BASE_URL; ?>recursos/img/editar.png" alt="Editar" class="icono"></a></td>
                        <td><a href="#"><img src="<?php echo BASE_URL; ?>recursos/img/borrar.png" alt="Eliminar" class="icono"></a></td>
                    </tr>
                </tbody>
            </table>
        </main>
    </div>
    <?php
include_once BASE_PATH . 'includes/footer.php';
?>
</body>
</html>
