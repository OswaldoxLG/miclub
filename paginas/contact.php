<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"  href="<?php echo BASE_URL; ?>recursos/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>recursos/css/styles.css">
    <title>Contacto</title>
    <?php
    include_once 'config.php';
?>
</head>
<body>
<?php
include_once BASE_PATH . 'includes/header.php';
include_once BASE_PATH . 'includes/busqueda.php';
?>
    <div class="contenedor-fc container mt-4">
    <div class="row">
        <div class="col-lg-6">
            <article class="formulario-contacto">
                <h2>Formulario de Contacto</h2>
                <form action="#" method="post">
                    <div class="fc-campo mb-3">
                        <label for="nombre">Nombre</label>
                        <input type="text" id="nombre" name="nombre" placeholder="Ingrese su nombre" class="form-control">
                    </div>
                    <div class="fc-campo mb-3">
                        <label for="apellido-paterno">Apellido paterno</label>
                        <input type="text" id="apellido-paterno" name="paterno" placeholder="Ingrese su apellido paterno" class="form-control">
                    </div>
                    <div class="fc-campo mb-3">
                        <label for="apellido-materno">Apellido materno</label>
                        <input type="text" id="apellido-materno" name="materno" placeholder="Ingrese su apellido materno" class="form-control">
                    </div>
                    <div class="fc-campo mb-3">
                        <label for="correo">Correo electrónico</label>
                        <input type="email" id="correo" name="correo" placeholder="Ingrese su correo" class="form-control">
                    </div>
                    <div class="fc-campo mb-3">
                        <label for="mensaje">Mensaje</label>
                        <textarea id="mensaje" name="mensaje" placeholder="Escriba su mensaje" class="form-control"></textarea>
                    </div>
                    <div>
                    <button type="submit" class="btn btn-danger w-100">ENVIAR</button>    
                    </div>               
                </form>
            </article>
        </div>
        <div class="col-lg-6 mt-4 mt-lg-0">
            <aside class="informacion-contacto">
                <div class="ubicacion-direccion mb-3">
                    <figure class="fc-ubicacion">
                        <img src="../recursos/img/ubicacion.png" alt="Icono de ubicación">
                    </figure>
                    <p><strong>Dirección:</strong></p>
                </div>
                <address id="calle-dir">
                    <p>Satos Degollado #108, col. El Jilguero,<br>
                    Santa María Atarasquillo, Lerma, México</p>
                </address>
                <figure class="fc-mapa mb-3">
                    <a href="https://maps.app.goo.gl/riD4WNgYvUZXjgQQA" target="_blank">
                        <img src="../recursos/img/mapa.png" alt="Mapa" class="img-fluid">
                    </a>
                </figure>
                <section class="seccion-redsocial">
                    <p><strong>Redes Sociales</strong></p>
                    <a href="#" class="footer-facebook d-inline-block me-2"><img src="../recursos/img/facebook.png" alt="Facebook"></a>
                    <a href="#" class="footer-instagram d-inline-block"><img src="../recursos/img/instagram.png" alt="Instagram"></a>
                </section>
            </aside>
        </div>
    </div>
</div>
<?php
include_once BASE_PATH . 'includes/footer.php';
?>
<script src="<?php echo BASE_URL; ?>js/bootstrap.bundle.min.js"></script>
</body>
</html>