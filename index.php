<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"  href="http://localhost/miclub_site/miclub/recursos/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://localhost/miclub_site/miclub/recursos/css/styles.css">
    <title>Mi Club</title>
</head>
<body>
<?php include './includes/header.php'?>
<?php include './includes/busqueda.php'?>
    <div id="carouselExampleIndicators" class="carousel slide mg mt-3">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img src="./recursos/img/slider1.jpg" class="d-block w-100" alt="slider1">
            </div>
                <div class="carousel-item">
                <img src="./recursos/img/slider2.jpg" class="d-block w-100" alt="slider2">
                </div>
                    <div class="carousel-item">
                    <img src="./recursos/img/slider3.jpg" class="d-block w-100" alt="slider3">
                    </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previo</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Siguiente</span>
        </button>
    </div>

    <?php include './includes/footer.php'?>
    <script src="http://localhost/miclub_site/miclub/recursos/js/bootstrap.bundle.min.js"></script>
</body>
</html>