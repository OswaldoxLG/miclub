<?php
session_start(); 
include_once 'config.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"  href="<?php echo BASE_URL; ?>recursos/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>recursos/css/styles.css">
    <title>Mi Club</title>
</head>
<body>
<?php
include_once BASE_PATH . 'includes/header.php';
include_once BASE_PATH . 'includes/busqueda.php';
include_once BASE_PATH . 'includes/slider.php';
?>
<div class="container">
  <div class="row miclub_p3">
    <div class="col-12 col-sm-4 miclub_indice_box">
      <div class="row">
        <div class="col-l-4 col-sm-1 col-md-6  miclub-main-img">
          <img src="<?php echo BASE_URL; ?>recursos/img/social.png" alt="social" class="img-fluid">
        </div>
        <div class="col-l-8 col-sm-1 col-md-6 d-flex justify-content-center align-items-center">
          <p class="text-center miclub_indice_p3">Comienza a construir relaciones significativas mientras aprendes nuevas habilidades.</p>
        </div>
      </div>
    </div>

    <div class="col-12 col-sm-4 miclub_indice_box">
      <div class="row">
        <div class="col-l-4 col-sm-1 col-md-6 miclub-main-img">
          <img src="<?php echo BASE_URL; ?>recursos/img/art.png" alt="arte" class="img-fluid">
        </div>
        <div class="col-l-8 col-sm-1 col-md-6 d-flex justify-content-center align-items-center">
          <p class="text-center miclub_indice_p3">Explora nuestras categorías y encuentra tu pasión.</p>
        </div>
      </div>
    </div>

    <div class="col-12 col-sm-4 miclub_indice_box">
      <div class="row">
        <div class="col-l-4 col-sm-1 col-md-6 miclub-main-img">
          <img src="<?php echo BASE_URL; ?>recursos/img/shake.png" alt="saludo" class="img-fluid">
        </div>
        <div class="col-l-8 col-sm-1 col-md-6 d-flex justify-content-center align-items-center">
          <p class="text-center miclub_indice_p3">Descubre una comunidad llena de oportunidades para aprender, crecer y conectar.</p>
        </div>
      </div>
    </div>
  </div>

  <div class="row mx-auto miclub_con_clic">
                        <div class="col-12 miclub_con_sec_in">
                            <div class="miclub_consec_text">
                            <h2>¿Buscas explorar nuevas aficiones, conocer gente y pasar un buen rato?</h2>
                            <a href="<?php echo BASE_URL; ?>paginas/categorias.php"><button id="miclub_btn_index">ÚNETE A UN CLUB</button></a>
                            </div>
                        </div>
                    </div>
  </div> 
</div>
<?php
include_once BASE_PATH . 'includes/footer.php';
?>
<script src="<?php echo BASE_URL; ?>js/bootstrap.bundle.min.js"></script>
</body>
</html>