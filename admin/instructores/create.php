<?php include_once '../../config.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Agregar instructor</title>
  <link rel="stylesheet"  href="<?php echo BASE_URL; ?>recursos/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>recursos/css/styles.css">
</head>
<body class="con-body-form-admininstruct">
  <div class="con-prin-form-admininstruct">
    <div class="con-form-img-admininstruct">
      <img src="<?php echo BASE_URL; ?>recursos/img/logo.png" alt="logo">
      <h2 class="h2-form-admininstruct">My Club</h2>
    </div>
    <div class="con-form-admininstruct">
      <h1 id="h1-form-admininstruct">Agregar Instructor</h1>
      <form action="admininstructores.php" method="POST">
        <label for="nombre" class="label-form-adminindtruct">Nombre:</label>
        <input type="text" id="nombre" name="nombre" class="input-form-admininstruct" required>
        <label for="apellido-paterno" class="label-form-adminalu">Apellido paterno:</label>
        <input type="text" id="apellido-paterno" name="apellido-paterno" class="input-form-admininstruct" required>
        <label for="apellido-materno" class="label-form-adminalu">Apellido materno:</label>
        <input type="text" id="apellido-materno" name="apellido-materno" class="input-form-admininstruct" required>
        <label for="correo" class="label-form-adminalu">Correo:</label>
        <input type="text" id="correo" name="correo" class="input-form-admininstruct" required>
        <label for="telefono" class="label-form-adminalu">Teléfono:</label>
        <input type="text" id="telefono" name="telefono" class="input-form-admininstruct" required>
        <button type="submit" class="boton-agregar-admininstruct">Agregar</button>
      </form>
    </div>
  </div>
</body>
</html>
