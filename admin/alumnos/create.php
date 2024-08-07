<?php include_once '../../config.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Agregar alumno</title>
  <link rel="stylesheet"  href="<?php echo BASE_URL; ?>recursos/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>recursos/css/styles.css">
</head>
<body class="con-body-form-adminalu">
<?php
if (isset($_POST["insert"])) {
  $nom = $_POST["nombre"];
  $pat = $_POST["apellido-paterno"];
  $mat = $_POST["apellido-materno"];
  $email = $_POST["correo"];
  $tel = $_POST["telefono"];

  $insertar = "INSERT INTO alumno (nom, pat, mat, email, tel) VALUES ('$nom', '$pat', '$mat', '$email', '$tel')";
  $ejecutar = mysqli_query($conn, $insertar);

  if ($ejecutar) {
      echo "<h3>Insertado correctamente</h3>";
      header("Location: index.php"); // Redirige a la página de lista después de insertar
      exit(); // Asegúrate de detener la ejecución después de redirigir
  } else {
      echo "<h3>Error al insertar: " . mysqli_error($conn) . "</h3>";
  }
}
?>
  <div class="con-prin-form-adminalu">
    <div class="con-form-img-adminalu">
      <img src="<?php echo BASE_URL; ?>recursos/img/logo.png" alt="logo">
      <h2 class="h2-form-adminalu">My Club</h2>
    </div>
    <div class="con-form-adminalu">
      <h1 id="h1-form-adminalu">Agregar alumno</h1>
      <form action="create.php" method="POST">
        <label for="nombre" class="label-form-adminalu">Nombre:</label>
        <input type="text" id="nombre" name="nombre" class="input-form-alu" required>
        <label for="apellido-paterno" class="label-form-adminalu">Apellido paterno:</label>
        <input type="text" id="apellido-paterno" name="apellido-paterno" class="input-form-alu" required>
        <label for="apellido-materno" class="label-form-adminalu">Apellido materno:</label>
        <input type="text" id="apellido-materno" name="apellido-materno" class="input-form-alu" required>
        <label for="correo" class="label-form-adminalu">Correo:</label>
        <input type="text" id="correo" name="correo" class="input-form-alu" required>
        <label for="telefono" class="label-form-adminalu">Teléfono:</label>
        <input type="text" id="telefono" name="telefono" class="input-form-alu" required>
        <input type="submit"  name="insert" value="Agregar" class="boton-agregar-adminalu">
      </form>
    </div>
  </div>
</body>
</html>
