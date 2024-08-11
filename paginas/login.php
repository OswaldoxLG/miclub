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
<body class="login_background">
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
            <form method="post" action="login_process.php">
                <div class="campo-regis">
                    <label for="email">Correo electrónico</label>
                    <input type="email" name="email" placeholder="Ingrese su correo">
                </div>
                <div class="campo-regis">
                        <label for="password">Contraseña</label>
                        <div class="input-group">
                            <input type="password" id="password" name="password" placeholder="Contraseña" class="form-control">
                            <button type="button" class="btn-toggle-password">
                                <img src="../recursos/img/eye.png" alt="Mostrar contraseña" id="eye-icon" class="eye-icon">
                            </button>
                        </div>
                    </div>
                <div class="btn-regis-con">
                    <button type="submit" class="btn-regis">INICIA SESIÓN</button>
                </div>           
            </form> 
            <div class="txt_login">
                <p>"Comienza una nueva aventura"</p>
            </div> 
        </div>
    </div>
    <script src="../recursos/js/passwd-eye.js"></script>
</body>
</html>