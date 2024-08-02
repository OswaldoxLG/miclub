<?php
include_once '../config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MiClub.site|Inicia Sesión</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>recursos/css/styles.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>recursos/css/estilo_login.css">
</head>
<body>
<div class="login_background">
    <div class="contenedor_blanco_login">
        <div class="columna_izquierda"> 
                    <img src="<?php echo BASE_URL; ?>recursos/img/logo.png" class="logo_login">
                    <img src="<?php echo BASE_URL; ?>recursos/img/letras.png" class="letras_logo_login">
        </div>
        <div class="barra_prin_login">
            <div class="barra_negra"></div>
        </div>
        <div class="columna_derecha con_login_form">
            <div class="login_tit">
                <h1 class="titulo_login">BIENVENIDO</h1>
            </div>
            <form method="post" action="#">
                <div class="campo-regis">
                    <label for="email">Correo electrónico</label>
                    <input type="email" name="email" placeholder="Ingrese su correo">
                </div>
                <div class="campo-regis">
                    <label for="password">Contraseña</label>
                    <input type="password" name="password" placeholder="Ingrese su contraseña">
                </div>
                <div class="btn-regis-con">
                    <button type="submit" class="btn-regis">INICIAR SESIÓN</button>
                </div>           
            </form>  
            <div class="txt_login">
                <p>"Comienza una nueva aventura"</p>
            </div> 
        </div>
    </div>
</div>

</body>
</html>