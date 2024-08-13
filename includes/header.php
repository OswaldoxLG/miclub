<?php session_start();
//echo 'Sesión Iniciada'; 
//var_dump($_SESSION);
?>
<link rel="stylesheet"  href="<?php echo BASE_URL; ?>recursos/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo BASE_URL; ?>recursos/css/styles.css">

<nav class="navbar navbar-expand-md bg-black navbar-dark header_all">
    <div class="container mx-3">
        <div class="d-flex align-items-center">
        <a href="/miclub/index.php"><img src="/miclub/recursos/img/logo.png" alt="Logo del proyecto" class="header_logo me-2"></a>
        <a href="/miclub/index.php"><img src="/miclub/recursos/img/letras.png" alt="nombre"  class="letras_logo me-auto"></a>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse mx-2" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link text-white" href="/miclub/paginas/nosotros.php">Nosotros</a>
                </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Categorías</a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="/miclub/paginas/cursos_artisticos.php">Artístico</a></li>
                <li><a class="dropdown-item" href="/miclub/paginas/cursos_deportes.php">Deportivo</a></li>
                <li><a class="dropdown-item" href="/miclub/paginas/cursos_culturales.php">Cultural</a></li>
                <li><a class="dropdown-item" href="/miclub/paginas/cursos_sociales.php">Social</a></li>
            </ul>
            </li>
                <li class="nav-item dropdown">
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Perfil
                        </a>
                        <ul class="dropdown-menu">
                            <?php if ($_SESSION['user_role'] == 'Administrador'): ?>
                                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>admin/panel.php">Panel</a></li>
                            <?php elseif ($_SESSION['user_role'] == 'Instructor'): ?>
                                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>paginas/perfil.php">Mi perfil</a></li>
                            <?php elseif ($_SESSION['user_role'] == 'Alumno'): ?>
                                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>paginas/perfil.php">Mi perfil</a></li>
                            <?php endif; ?>
                            <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>php/logout.php">Cerrar Sesión</a></li>
                        </ul>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="/miclub/paginas/login.php">Iniciar sesión</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="/miclub/paginas/registrarse.php">Registrarse</a>
                        </li>
                    <?php endif; ?>
                </li>
            </ul>
        </div>
    </div>
</nav>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

