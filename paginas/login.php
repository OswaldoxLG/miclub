<?php
include_once '../config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MiClub.site|Inicia Sesión</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>recursos/css/estilo_login.css">
</head>
<body class="background">
    <div class="contenedor_blanco">
        <div class="logos_login"> 
        <img src="<?php echo BASE_URL; ?>recursos/img/logo.png" class="logo">
        <img src="<?php echo BASE_URL; ?>recursos/img/letras.png" class="letras_logo_login">
        </div>   
        <div class="barra_negra"></div>
        <div>
            <form method="post" action="#" class="form_login">
                <h1 class="titulo">BIENVENIDO</h1>
                <h4 class="texto">Ingresa tu usuario</h4>
                <input>
                <h4 class="texto">Contraseña</h4>
                <input type="password">
                <br>
                <br>
                <button type="submit" class="btn_login">INGRESAR</button>
                <div class="txt_login">
                <p style="font-family: helvetica;">"Comienza una nueva aventura"</p>
                </div>              
            </form>
        </div>
    </div>
</body>
</html>