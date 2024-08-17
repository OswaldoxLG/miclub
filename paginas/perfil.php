<?php
session_start();
include_once '../config.php';
include_once '../conexion.php';

$id_usuario = $_SESSION['user_id'];
$usuario_rol = $_SESSION['user_role'];
$result_cursos = false;

if ($usuario_rol === "Instructor") {
    // Consulta para obtener el ID del instructor
    $sql_instructor = "SELECT id_instructor FROM instructor WHERE id_usuario1 = ?";
    $stmt_instructor = $conn->prepare($sql_instructor);
    $stmt_instructor->bind_param("i", $id_usuario);
    $stmt_instructor->execute();
    $result_instructor = $stmt_instructor->get_result();
    $instructor = $result_instructor->fetch_assoc();

    if ($instructor) {
        $id_instructor = $instructor['id_instructor'];

        // Consulta para obtener los cursos del instructor
        $sql_cursos = "
            SELECT curso.*
            FROM curso
            JOIN instructor_curso ON curso.id_curso = instructor_curso.id_curso1
            WHERE instructor_curso.id_instructor1 = ?";
        $stmt_cursos = $conn->prepare($sql_cursos);
        $stmt_cursos->bind_param("i", $id_instructor);
        $stmt_cursos->execute();
        $result_cursos = $stmt_cursos->get_result();
    } else {
        $result_cursos = [];
    }
} elseif ($usuario_rol === "Integrante") {
    // Consulta para obtener el ID del integrante
    $sql_integrante = "SELECT id_integrante FROM integrante WHERE id_usuario1 = ?";
    $stmt_integrante = $conn->prepare($sql_integrante);
    $stmt_integrante->bind_param("i", $id_usuario);
    $stmt_integrante->execute();
    $result_integrante = $stmt_integrante->get_result();
    $integrante = $result_integrante->fetch_assoc();

    if ($integrante) {
        $id_integrante = $integrante['id_integrante'];

        // Consulta para obtener los cursos en los que el integrante está inscrito
        $sql_cursos_integrante = "
            SELECT curso.*
            FROM curso
            JOIN integrante_curso ON curso.id_curso = integrante_curso.id_curso1
            WHERE integrante_curso.id_integrante1 = ?";
        $stmt_cursos_integrante = $conn->prepare($sql_cursos_integrante);
        $stmt_cursos_integrante->bind_param("i", $id_integrante);
        $stmt_cursos_integrante->execute();
        $result_cursos = $stmt_cursos_integrante->get_result();
    } else {
        $result_cursos = [];
    }
} else {
    $result_cursos = [];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>recursos/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>recursos/css/styles.css">
    <title>Perfil</title>
</head>
<body>
<?php
include_once BASE_PATH . 'includes/header.php';
include_once BASE_PATH . 'includes/busqueda.php';
?>
<div class="container con_prin_perf">
    <div class="con_barra_perf">
        <div class="con_menu_perf">
            <div class="con_img_perf">
                <img src="<?php echo BASE_URL; ?>recursos/img/avatar.png" alt="imagen de perfil" class="img_perf">
            </div>
            <div class="salu_perf">
                <strong>Hola <?php echo htmlspecialchars($_SESSION['user_name']); ?></strong>
            </div>
            <?php if ($_SESSION['user_role'] === "Instructor") { ?>
            <div class="con_crear_curso">
                <div class="con_btn_crear">
                    <a href="<?php echo BASE_URL; ?>instructor/newclub/index.php" class="in_btn_crear">CREAR CLUB</a>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
    <div class="centrar_cursos">
        <div class="con_txt_info">
            <h1 class="txt_perf">MIS CURSOS</h1>
        </div>
        <?php if ($result_cursos && $result_cursos->num_rows > 0): ?>
            <?php while ($curso = $result_cursos->fetch_assoc()): ?>
            <div class="contenido_cursos_p">
                <div class="info_curso_a">
                    <div class="imagenes_cursos">
                        <img src="<?php echo BASE_URL . htmlspecialchars($curso['imagen']); ?>" alt="<?php echo htmlspecialchars($curso['nom_curso']); ?>" class="img_curs_pag">
                    </div>
                    <div class="texto_cursos">
                        <h3><?php echo htmlspecialchars($curso['nom_curso']); ?></h3>
                        <p><?php echo htmlspecialchars($curso['descripcion']); ?></p>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p>No tienes ningún curso.</p>
        <?php endif; ?>
    </div>
</div>
<?php
$conn->close();
include_once BASE_PATH . 'includes/footer.php';
?>
<script src="<?php echo BASE_URL; ?>js/bootstrap.bundle.min.js"></script>
</body>
</html>
