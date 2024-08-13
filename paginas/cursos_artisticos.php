<?php
include_once '../config.php';
include_once '../conexion.php';

// Obtener el ID de la categoría "Artísticos"
$sql_categoria = "SELECT id_categoria FROM categoria WHERE categoria = 'Artísticos'";
$result_categoria = $conn->query($sql_categoria);
$category_id = $result_categoria->fetch_assoc()['id_categoria'];

// Obtener los cursos de la categoría "Artísticos"
$sql_cursos = "
    SELECT curso.*, direccion.calle, direccion.numero, direccion.colonia, direccion.cp, telefono.tel
    FROM curso
    LEFT JOIN direccion ON curso.id_direccion1 = direccion.id_direccion
    LEFT JOIN telefono ON curso.id_tel1 = telefono.id_tel
    WHERE curso.id_categoria1 = ?";
$stmt = $conn->prepare($sql_cursos);
$stmt->bind_param("i", $category_id);
$stmt->execute();
$result_cursos = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>recursos/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>recursos/css/styles.css">
    <title>MiClub.mx | Cursos artísticos</title>
</head>
<body>
<?php
include_once BASE_PATH . 'includes/header.php';
include_once BASE_PATH . 'includes/busqueda.php';
?>

<div class="centrar_cursos">
    <?php while ($curso = $result_cursos->fetch_assoc()): ?>
    <div class="contenido_cursos_a">
        <div class="imagenes_cursos">
            <img src="<?php echo BASE_URL . $curso['imagen']; ?>" alt="<?php echo htmlspecialchars($curso['nom_curso']); ?>">
        </div>
        <div class="texto_cursos">
            <h3><?php echo htmlspecialchars($curso['nom_curso']); ?></h3>
            <p><?php echo htmlspecialchars($curso['descripcion']); ?></p>
            <p>Dirección: <?php echo htmlspecialchars($curso['calle']) . ' No. ' . htmlspecialchars($curso['numero']) . ', ' . htmlspecialchars($curso['colonia']) . ', CP ' . htmlspecialchars($curso['cp']); ?></p>
            <p>Teléfono: <?php echo htmlspecialchars($curso['tel']); ?></p>
            <button class="boton_cursos"><a href="#" class="accion_cursos">INSCRIBIRSE</a></button>
        </div>
    </div>
    <?php endwhile; ?>
</div>

<?php
include_once BASE_PATH . 'includes/footer.php';
?>
</body>
</html>
