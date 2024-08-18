<?php
session_start();
include_once '../config.php';
include_once '../conexion.php';

$sql_categoria = "SELECT id_categoria FROM categoria WHERE categoria = 'Sociales'";
$result_categoria = $conn->query($sql_categoria);
$category_id = $result_categoria->fetch_assoc()['id_categoria'];

$sql_cursos = "
    SELECT curso.*
    FROM curso
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
    <div class="contenido_cursos_s">
        <div class="info_curso_a">
            <div class="imagenes_cursos">
                <img src="<?php echo BASE_URL . $curso['imagen']; ?>" alt="<?php echo htmlspecialchars($curso['nom_curso']); ?>" class="img_curs_pag">
            </div>
            <div class="texto_cursos">
                <h3><?php echo htmlspecialchars($curso['nom_curso']); ?></h3>
                <p><?php echo htmlspecialchars($curso['descripcion']); ?></p>

                <?php
                // Verificar si la sesión está iniciada y si el rol de usuario está definido
                if (isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'Integrante'): ?>
                    <form action="../php/inscripcion.php" method="POST" class="form_inscripcion">
                        <input type="hidden" name="id_curso" value="<?php echo htmlspecialchars($curso['id_curso']); ?>">
                        <input type="hidden" name="id_usuario" value="<?php echo htmlspecialchars($_SESSION['user_id']); ?>">
                        <button type="submit" class="btn_inscripcion">INSCRIBETE</button>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php endwhile; ?>
</div>

<?php
include_once BASE_PATH . 'includes/footer.php';
?>
</body>
</html>
