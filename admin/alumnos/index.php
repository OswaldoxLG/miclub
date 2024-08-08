<?php include_once '../../config.php'; 
include_once '../../conexion.php';?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Instructores</title>
    <link rel="stylesheet"  href="<?php echo BASE_URL; ?>recursos/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>recursos/css/styles.css">
</head>
<body>
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
                            <a href="admin.php" class="nav-link text-light">Administradores</a>
                            <a href="admincategorias.php" class="nav-link text-light">Categorías</a>
                            <a href="admincursos.php" class="nav-link text-light">Cursos</a>
                            <a href="admininstructores.php" class="nav-link text-light">Instructores</a>
                            <a href="adminalu.php" class="nav-link text-light">Alumnos</a>
                        </nav>
                    </aside>
                    <main class="col-md-9 col-lg-10 p-4">
                        <h1 class="text-center mb-4">ALUMNOS</h1>
                        <div class="d-flex mb-3">
                            <a href="altainstructores.php" class="btn btn-success d-flex align-items-center">
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
                                        <th>Telefono</th> 
                                        <th>Editar</th>
                                        <th>Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Jesus</td>
                                        <td>Fernandez</td>
                                        <td>Gomez</td>
                                        <td>al22234039@gmail.com</td>
                                        <td>7224568975</td>
                                        <td><a href="update.php"><img src="<?php echo BASE_URL; ?>recursos/img/editar.png" alt="Editar" class="icono-cat" title="Editar Instructor"></a></td>
                                        <td><a href="#"><img src="<?php echo BASE_URL; ?>recursos/img/borrar.png" alt="Eliminar" class="icono-cat" title="Eliminar Instructor"></a></td>
                                    </tr>
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
</body>
</html>
