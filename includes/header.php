<?php
session_start();
?>
<link rel="stylesheet"  href="<?php echo BASE_URL; ?>recursos/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo BASE_URL; ?>recursos/css/styles.css">

<nav class="navbar navbar-expand-md bg-black navbar-dark header_all">
    <div class="container-fluid mx-2">
        <div class="d-flex align-items-center">
        <a href="/miclub/index.php"><img src="/miclub/recursos/img/logo.png" alt="Logo del proyecto" class="header_logo me-2"></a>
        <a href="/miclub/index.php"><img src="/miclub/recursos/img/letras.png" alt="nombre"  class="letras_logo me-auto"></a>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse mx-2" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto">
                <!-- Otros elementos del menú -->
                <li class="nav-item dropdown">
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Perfil
                        </a>
                        <ul class="dropdown-menu">
                            <?php if ($_SESSION['user_role'] == 'Administrador'): ?>
                                <li><a class="dropdown-item" href="/miclub/admin/dashboard.php">Área Admin</a></li>
                            <?php elseif ($_SESSION['user_role'] == 'Instructor'): ?>
                                <li><a class="dropdown-item" href="/miclub/instructor/profile.php">Mi perfil</a></li>
                            <?php elseif ($_SESSION['user_role'] == 'Alumno'): ?>
                                <li><a class="dropdown-item" href="/miclub/integrante/profile.php">Mi perfil</a></li>
                            <?php endif; ?>
                            <li><a class="dropdown-item" href="/miclub/paginas/logout.php">Cerrar Sesión</a></li>
                        </ul>
                    <?php else: ?>
                        <a class="nav-link text-white" href="/miclub/paginas/login.php">Iniciar sesión</a>
                    <?php endif; ?>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="/miclub/paginas/registrarse.php">Registrarse</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

