<?php
include_once '../config.php'; 
include_once '../conexion.php';

session_start();
session_unset();
session_destroy();

header("Location: " . BASE_URL . "index.php");
exit();
?>
