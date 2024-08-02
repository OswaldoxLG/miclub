<?php include_once '../../config.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Instructores</title>
    <link rel="stylesheet"  href="<?php echo BASE_URL; ?>recursos/css/bootstrap.min.css">
</head>
<body class="prin-admininstruct">
    <div class="con-prin-admininstruct">
        <aside class="aside-admininstruct">
            <img src="<?php echo BASE_URL; ?>recursos/img/logo.png" alt="logo" class="imagen-lateral">
            <h2>Mi Club</h2>
            <nav class="nav-admininstruct">
                <ul>
                    <li><a href="#">Administradores</a></li>
                    <li><a href="admincategorias.php">Categorías</a></li>
                    <li><a href="#">Cursos</a></li>
                    <li><a href="./adminstructores.php">Instructores</a></li>
                    <li><a href="./adminalu.php">Alumnos</a></li>
                </ul>
            </nav>
        </aside>
        <main class="main-admininstruct">
            <h1>Instructores</h1>
            <div class="con-verde-admininstruct">
                <a href="altainstructores.php" class="btn-añadir-admininstruct">
                <img src="<?php echo BASE_URL; ?>recursos/img/añadir.png" alt="icono añadir">
                    <p>Añadir</p>
                </a>
            </div>
            <table class="table-admininstruct">
                <thead class="thead-admininstruct">
                    <tr class="tr-admininstruct">
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Apellido paterno</th>
                        <th>Apellido materno</th>
                        <th>Correo</th>
                        <th>Telefono</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody class="tbody-admininstruct">
                    <tr class="tr-admininstruct">
                        <td>1</td>
                        <td>Jesus</td>
                        <td>Fernandez</td>
                        <td>Gomez</td>
                        <td>al22234039@gmail.com</td>
                        <td>7224568975</td>
                        <td><a href="./update.php"><img src="<?php echo BASE_URL; ?>recursos/img/editar.png" alt="Editar" class="icono"></a></td>
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
