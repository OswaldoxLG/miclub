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
    <title>Categorías</title>
</head>
<body>
<?php
include_once BASE_PATH . 'includes/header.php';
include_once BASE_PATH . 'includes/busqueda.php';
?>
    <section class="contenedor-categorias">
        <article class="articulo artistico">
          <img src="../recursos/img/amarillo.png" alt="Artístico" class="imagen artistico">
          <div class="texto">
            <h2>ARTÍSTICO</h2>
            <p>Explora tu creatividad a través de diversas disciplinas como la pintura, la música, el teatro y muchas más.</p>
            <a href="/miclub/paginas/cursos_artisticos.php" class="boton">Ver más</a> </div>
        </article>
      
        <article class="articulo deportivo">
          <img src="../recursos/img/verde.png" alt="Deportivo" class="imagen deportivo">
          <div class="texto">
            <h2>DEPORTIVO</h2>
            <p>Mejora tu condición física, y fomenta el espíritu deportivo mientras te diviertes y haces nuevos amigos.</p>
            <a href="/miclub/paginas/cursos_deportes.php" class="boton">Ver más</a> </div>
        </article>
      
        <article class="articulo social">
          <img src="../recursos/img/rojo.png" alt="Social" class="imagen social">
          <div class="texto">
            <h2>SOCIAL</h2>
            <p>Crea lazos duraderos, fomenta la convivencia y contribuye a un ambiente social positivo y enriquecedor.</p>
            <a href="/miclub/paginas/cursos_sociales.php" class="boton">Ver más</a> </div>
        </article>
      
        <article class="articulo cultural">
          <img src="../recursos/img/azul.png" alt="Cultural" class="imagen cultural">
          <div class="texto">
            <h2>CULTURAL</h2>
            <p>Explora la historia, la música, las tradiciones y las expresiones artísticas de tu entorno y de todo el mundo.</p>
            <a href="/miclub/paginas/cursos_culturales.php" class="boton">Ver más</a> </div>
        </article>
      </section>
      <?php
include_once BASE_PATH . 'includes/footer.php';
?>
<script src="<?php echo BASE_URL; ?>js/bootstrap.bundle.min.js"></script>
</body>
</html>