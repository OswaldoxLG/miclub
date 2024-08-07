<link rel="stylesheet"  href="<?php echo BASE_URL; ?>recursos/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo BASE_URL; ?>recursos/css/styles.css">

  <nav class="navbar navbar-expand-md bg-black navbar-dark header_all">
    <div class="container-fluid mx-2">
      <div class="d-flex align-items-center">
        <a href="/miclub/index.php"><img src="/miclub/recursos/img/logo.png" alt="Logo del proyecto" class="header_logo me-2"></a>
        <img src="/miclub/recursos/img/letras.png" alt="nombre"  class="letras_logo me-auto">
      </div>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse mx-2" id="navbarNavDropdown">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#"></a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="./paginas/nosotros.php">Nosotros</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Categorías
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Artístico</a></li>
              <li><a class="dropdown-item" href="#">Deportivo</a></li>
              <li><a class="dropdown-item" href="#">Cultural</a></li>
              <li><a class="dropdown-item" href="#">Social</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="./paginas/login.php">Iniciar sesión</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="./paginas/registrarse.php">Registrarse</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <script src="<?php echo BASE_URL; ?>js/bootstrap.bundle.min.js"></script>

