<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet"  href="../recursos/css/styles.css">
    <title>Contacto</title>
</head>
<body>
    <?php include '../includes/header.php'?>
    <?php include '../includes/busqueda.php'?>
    <div class="contenedor-fc">
        <article class="formulario-contacto">
            <h2>Formulario de Contacto</h2>
            <form action="#" method="post">
                <div class="fc-campo">
                    <label for="nombre">Nombre</label>
                    <input type="text" id="nombre" name="nombre" placeholder="Ingrese su nombre">
                </div>
                <div class="fc-campo">
                    <label for="apellido-paterno">Apellido paterno</label>
                    <input type="text" id="apellido-paterno" name="paterno" placeholder="Ingrese su apellido paterno">
                </div>
                <div class="fc-campo">
                    <label for="apellido-materno">Apellido materno</label>
                    <input type="text" id="apellido-materno" name="materno" placeholder="Ingrese su apellido materno">
                </div>
                <div class="fc-campo">
                    <label for="correo">Correo electronico</label>
                    <input type="email" id="correo" name="correo" placeholder="Ingrese su correo">
                </div>
                <div class="fc-campo">
                    <label for="mensaje">Mensaje</label>
                    <textarea id="mensaje" name="mensaje" placeholder="Escriba su mensaje"></textarea>
                </div>
                <button type="submit" class="fc-btn">ENVIAR</button>
            </form>
        </article>
        <aside class="informacion-contacto">
            <figure class="fc-ubicacion">
                <img src="../recursos/img/ubicacion.png" alt="Icono de ubicación">
            </figure>
            <address>
                <p><strong>Dirección:</strong></p>
                <p>C. Benito Juárez 4-29, Villa Cuauhtemoc,<br>
                52080 Villa Cuauhtémoc, Méx.</p>
            </address>
            <figure class="fc-mapa">
                <img src="" alt="Mapa">
            </figure>
            <section class="seccion-redsocial">
                <p><strong>Redes Sociales</strong></p>
                <a href="#" class="footer-facebook"><img src="../recursos/img/facebook.png"  alt="Facebook"></a>
                <a href="#" class="footer-instagram"><img src="../recursos/img/instagram.png" alt="Instagram"></a>
            </section>
        </aside>
</div>
    <?php include '../includes/footer.php'?>
    <script src="../recursos/js/bootstrap.bundle.min.js"></script>
</body>
</html>