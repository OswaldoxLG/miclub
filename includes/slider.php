<link rel="stylesheet"  href="<?php echo BASE_URL; ?>recursos/css/bootstrap.min.css">

<div id="carouselExampleIndicators" class="carousel slide mx-auto" style="max-width: 880px; height: 370px; margin-bottom:30px;">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner" style="height: 100%;">
      <div class="carousel-item active">
        <img src="./recursos/img/slider1.jpg" class="d-block w-100" style="max-height: 370px; object-fit: cover;" alt="slider 1">
        <div class="carousel-caption d-md-block top-0 mt-5" style="max-height: 350px;">
          <p class="fs-4 fs-md-3 fs-sm-2">Bienvenido a</p>
          <h1 class="display-4 display-md-1 fw-bolder text-capitalize">Mi Club</h1>
        </div>
      </div>
      <div class="carousel-item">
        <img src="./recursos/img/slider2.jpg" class="d-block w-100" style="max-height: 370px; object-fit: cover;" alt="slider 2">
      </div>
      <div class="carousel-item">
        <img src="./recursos/img/slider3.jpg" class="d-block w-100" style="max-height: 370px; object-fit: cover;" alt="slider 3">
      </div>
    </div>
    <button class="carousel-control-prev d-none d-sm-block" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Anterior</span>
    </button>
    <button class="carousel-control-next d-none d-sm-block" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Siguiente</span>
    </button>
  </div>

  <script src="<?php echo BASE_URL; ?>js/bootstrap.bundle.min.js"></script>