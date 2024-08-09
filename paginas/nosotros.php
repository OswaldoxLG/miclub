<?php
include_once '../config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"  href="<?php echo BASE_URL; ?>recursos/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>recursos/css/styles.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>recursos/css/estilo_nosotros.css">
    <title>Miclub.mx|Sobre nosotros</title>
    <title>Document</title>
</head>
<body>
<?php
include_once BASE_PATH . 'includes/header.php';
?>
<div class="container">
 <h1>Conoce más acerca de nosotros</h1>  
 <p class="somos_txt">"Conetics" es una empresa dedicada a brindar el servicio de creación,
 diseño, desarrollo y mantenimiento de páginas web. Estamos seriamente comprometidos
 con nuestros clientes y nuestros propios proyectos para brindar un servicio de calidad
 y de esta manera hacer que las proyectos logren tener un buen alcance en el mercado, 
 manteniéndose a la vanguardia con tecnologías actualizadas implementadas para la creación 
 de sitios web.</p>
</div>
<div clsss="container"><!-- beg edic fany-->
<h2>MISIÓN DE LA EMPRESA</h2>
<p class="mis">La principal misión que tenemos dentro la creación de la página web
 es poder brindar los usuarios y a los posibles y futuros usuarios las herramientas necesarias para que puedan hallar ese espacio 
 en el cual se sientan cómodos, encuentren toda la información de cada uno de los talleres o club
y encuentren el diseño de la pagina interactiva, atractiva y sobre todo útil. </p>
</div>

<div clsss="container">
<h2>VISIÓN DE LA EMPRESA</h2>
<p class="vis">La visión que tenemos nosotros como desarrolladoras de la pagina es que en un futuro podamos posicionarnos dentro de la lista de uno de los mejores sitios web, 
debido a nuestro trabajo, es decir que la pagina tenga las características y el numero de usuarios requeridos y necesarios para poder entrar dentro de esta lista 
gracias al nivel de eficiencia, creatividad, interactividad y seguridad y protección de los datos de nuestros usuarios
 es decir de los instructores y los aprendices, pero sobre todo brindar una gran experiencia de usuario. </p>
</div>
<!--fotos team ed fany-->
<section class="team">
        <div class="team-member">
           <!-- <img src="./" alt="Marcos Jesus Ugalde Zarza"> modificar -->
            <h2>Marcos Jesus Ugalde Zarza</h2>
            <p>Director General</p>
            <div class="social-links">
                <a href="#">Twitter</a>
                <a href="#">Instagram</a>
            </div>
        </div>
        <div class="team-member">
            <!--img src="C:\xampp\htdocs\miclub\recursos\img\oswa.jpg" alt="Oswaldo Lopez Gomez">modificar-->
            <h2>Oswaldo Lopez Gomez</h2>
            <p>Programador</p>
            <div class="social-links">
                <a href="#">Twitter</a>
                <a href="#">Instagram</a>
            </div>
        </div>
        <div class="team-member">
            <!--<img src="./any.jpg" alt="Stephany Reyes Rodriguez">modificar-->
            <h2>Stephany Reyes Rodriguez</h2>
            <p>Desarrollador Web</p>
            <div class="social-links">
                <a href="#">Twitter</a>
                <a href="#">Instagram</a>
            </div>
        </div>
       
    </section>
    <!--end edic fany-->

<div class="logo_nosotros">
<img src="<?php echo BASE_URL;?>recursos/img/conetics.png" class="conetics">
</div>
<?php
include_once BASE_PATH . 'includes/footer.php';
?>
</body>
</html>