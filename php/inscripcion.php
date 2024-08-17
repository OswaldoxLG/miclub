<?php
session_start();
include_once '../config.php';
include_once '../conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verificar si los datos necesarios están presentes
    if (isset($_POST['id_usuario']) && isset($_POST['id_curso'])) {
        $id_usuario = intval($_POST['id_usuario']);
        $id_curso = intval($_POST['id_curso']);

        // Obtener el id_integrante correspondiente al id_usuario
        $sql_get_integrante = "SELECT id_integrante FROM integrante WHERE id_usuario1 = ?";
        $stmt_get_integrante = $conn->prepare($sql_get_integrante);

        if (!$stmt_get_integrante) {
            die('Error en la preparación de la consulta: ' . $conn->error);
        }

        $stmt_get_integrante->bind_param("i", $id_usuario);
        $stmt_get_integrante->execute();
        $result_integrante = $stmt_get_integrante->get_result();

        if ($result_integrante->num_rows > 0) {
            $id_integrante = $result_integrante->fetch_assoc()['id_integrante'];

            // Verificar si ya está inscrito en el curso
            $sql_check_inscripcion = "SELECT * FROM integrante_curso WHERE id_integrante1 = ? AND id_curso1 = ?";
            $stmt_check_inscripcion = $conn->prepare($sql_check_inscripcion);

            if (!$stmt_check_inscripcion) {
                die('Error en la preparación de la consulta: ' . $conn->error);
            }

            $stmt_check_inscripcion->bind_param("ii", $id_integrante, $id_curso);
            $stmt_check_inscripcion->execute();
            $result_check = $stmt_check_inscripcion->get_result();

            if ($result_check->num_rows > 0) {
                // Usuario ya está inscrito en el curso
                echo "Ya estás inscrito en este curso.";
            } else {
                // Insertar el registro en la tabla integrante_curso
                $sql_inscribe = "INSERT INTO integrante_curso (id_integrante1, id_curso1, fecha_inscripcion) VALUES (?, ?, NOW())";
                $stmt_inscribe = $conn->prepare($sql_inscribe);

                if (!$stmt_inscribe) {
                    die('Error en la preparación de la consulta: ' . $conn->error);
                }

                $stmt_inscribe->bind_param("ii", $id_integrante, $id_curso);

                if ($stmt_inscribe->execute()) {
                    header("Location: " . BASE_URL . "paginas/perfil.php");
                    exit();
                } else {
                    echo "Error al inscribirte en el curso: " . $stmt_inscribe->error;
                }

                $stmt_inscribe->close();
            }

            $stmt_check_inscripcion->close();
        } else {
            echo "Error: No se encontró un integrante para este usuario.";
        }

        $stmt_get_integrante->close();
    } else {
        echo "Error: Datos de inscripción incompletos.";
    }
} else {
    echo "Error: Método de solicitud no permitido.";
}
?>

