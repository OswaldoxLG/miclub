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
<div class="container con_prin_perf">
    <div class="con_sec_perf">
        <div class="con_menu_perf">
        </div>
    <div class="con_ter_perf">
        <div class="con_info_perf">
        </div>
    </div>
</div>
<?php
include_once BASE_PATH . 'includes/footer.php';
?>
<script src="<?php echo BASE_URL; ?>js/bootstrap.bundle.min.js"></script>
</body>
</html>