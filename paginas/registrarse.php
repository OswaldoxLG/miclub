<?php
include_once '../config.php';
include_once '../conexion.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"  href="<?php echo BASE_URL; ?>recursos/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>recursos/css/styles.css">
    <title>Registrarse</title>
</head>
<body class="background_registro">
        <main class="contenedor-principal-registrarse">
            <div class="logo-and-nom-regis">
                <img src="../recursos/img/logo.png" alt="logo" class="logo-img-pag-regis">
                <img src="<?php echo BASE_URL; ?>recursos/img/letras.png" class="lts_regis">
            </div>
            <section class="form-regis">
                <div class="titulo-regis">
                <h1>REGISTRATE</h1> 
                </div>
                <div class="form-contenedor-regis">
                <form action="<?php echo BASE_URL; ?>php/registro.php" method="POST">
                    <div class="campo-regis">
                        <label for="nombre">Nombre</label>
                        <input type="text" id="nombre" name="nombre" placeholder="Ingrese su nombre">
                    </div>
                    <div class="campo-regis">
                        <label for="apellido-pat">Apellido paterno</label>
                        <input type="text" id="apellido-pat" name="apellido-pat" placeholder="Apellido paterno">
                    </div>
                    <div class="campo-regis">
                        <label for="apellido-mat">Apellido materno</label>
                        <input type="text" id="apellido-mat" name="apellido-mat" placeholder="Apellido materno">
                    </div>
                    <div class="campo-regis">
                    <label for="rol">Elige un rol:</label>
                            <select id="rol" name="rol" class="rol-regis">
                                <option value="Integrante">Alumno</option>
                                <option value="Instructor">Intructor</option>
                                <option value="Administrador">Administrador</option>
                            </select>
                    </div>
                    <div class="campo-regis">
                        <label for="correo">Correo electronico</label>
                        <input type="email" id="email" name="email" placeholder="Ingrese su correo">
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
                    <button type="submit" class="btn-regis">REGISTRARSE</button>
                    </div>
                </form>
            </section>
        </main>
        <script src="../recursos/js/passwd-eye.js"></script>
</body>
</html>