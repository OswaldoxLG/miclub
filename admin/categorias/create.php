<?php include_once '../../config.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar categoría</title>
    <link rel="stylesheet"  href="<?php echo BASE_URL; ?>recursos/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>recursos/css/style.css">
</head>
<body class="con-body-form-admincat">
    <div class="con-prin-form-admincat">
        <div class="con-form-img-admincat">
            <img src="<?php echo BASE_URL; ?>recursos/img/logo.png" alt="logo">
            <h2 class="h2-form-admincat">My Club</h2>
        </div>
        <div class="con-form-admincat">
            <h1 id="h1-form-admincat">Agregar categoría</h1>
            <form action="./admincategorias.php" method="POST">
                <label for="nombreCategoria" class="label-form-admincat">Nombre de la categoría:</label>
                <input type="text" id="categoria" name="categoria" class="input-form-cat" required>
                <button type="submit" class="boton-agregar-admincat">Agregar</button>
            </form>
        </div>
    </div>
</body>
</html>
