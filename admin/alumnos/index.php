<?php include_once '../../config.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista alumnos</title>
    <link rel="stylesheet"  href="<?php echo BASE_URL; ?>recursos/css/bootstrap.min.css">
</head>
<body class="prin-adminalu">
    <div class="con-prin-adminalu">
        <aside class="aside-adminalu">
            <img src="<?php echo BASE_URL; ?>recursos/img/logo.png" alt="logo" class="imagen-lateral">
            <h2>Mi Club</h2>
            <nav class="nav-adminalu">
                <ul>
                    <li><a href="#">Administradores</a></li>
                    <li><a href="./admincategorias.php">Categorías</a></li>
                    <li><a href="#">Cursos</a></li>
                    <li><a href="./admininstructores.php">Instructores</a></li>
                    <li><a href="<?php echo BASE_URL; ?>admin/alumnos/index.php">Alumnos</a></li>
                </ul>
            </nav>
        </aside>

        <main class="main-adminalu">
            <h1>ALUMNOS</h1>
            <div class="con-verde-adminalu">
                <a href="<?php echo BASE_URL; ?>admin/alumnos/create.php" class="btn-añadir-adminalu">
                    <img src="<?php echo BASE_URL; ?>recursos/img/añadir.png" alt="icono añadir">
                    <p>Añadir</p>
                </a>
            </div>
            <table class="table-adminalu">
                <thead class="thead-adminalu">
                    <tr class="tr-adminalu">
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                        <th>Correo</th>
                        <th>Telefono</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <?php 
                $consulta = "SELECT * FROM alumno";
                $ejecutar = mysqli_query($conn, $consulta);
                $i=0;
                while ($fila = mysqli_fetch_array($ejecutar)){
                    $id = $fila['id_alu'];
                    $nom = $fila["nom"];
                    $pat = $fila["pat"];
                    $mat = $fila["mat"];
                    $email = $fila["email"];
                    $tel = $fila["tel"];

                    $i++;
                
                ?>
                <tbody class="tbody-adminalu">
                    <tr class="tr-adminalu">
                        <td><?php echo $id; ?></td>
                        <td><?php echo $nom; ?></td>
                        <td><?php echo $pat; ?></td>
                        <td><?php echo $mat; ?></td>
                        <td><?php echo $email; ?></td>
                        <td><?php echo $tel; ?></td>
                        <td><a href="./update.php"><img src="<?php echo BASE_URL; ?>recursos/img/editar.png" alt="Editar" class="icono"></a></td>
                        <td><a href="#"><img src="<?php echo BASE_URL; ?>recursos/img/borrar.png" alt="Eliminar" class="icono"></a></td>
                    </tr>
                </tbody>
                <?php } ?>
            </table>
        </main>
    </div>
    <?php
include_once BASE_PATH . 'includes/footer.php';
?>
</body>
</html>
