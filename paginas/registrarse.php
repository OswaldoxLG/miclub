<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"  href="../recursos/css/bootstrap.min.css">
    <link rel="stylesheet"  href="../recursos/css/styles.css">
    <title>Registrarse</title>
</head>
<body>
    <div class="pag-registro">
        <main class="contenedor-principal-registrarse">
            <div class="logo-and-nom-regis">
                <img src="../recursos/img/logo.png" alt="logo" class="logo-img-pag-regis">
                <h2 id="nom-proy-regis">My Club</h2>
            </div>
            <section class="form-regis">
                <div class="titulo-regis">
                <h1>Registrate</h1> 
                </div>
                <div class="form-contenedor-regis">
                <form action="registrophp.php" method="POST">
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
                        <label for="correo">Correo electronico</label>
                        <input type="email" id="correo" name="correo" placeholder="Ingrese su correo">
                    </div>
                    <div class="campo-regis">
                        <label for="mensaje">contraseña</label>
                        <input type="contraseña" id="contraseña" name="contraseña" placeholder="Contraseña">
                    </div>
                    <div class="btn-regis">
                    <button type="submit">Registrarse</button>
                    </div>
                </form>
            </section>
        </main>
    </div>
    <script src="../recursos/js/bootstrap.bundle.min.js"></script>
</body>
</html>