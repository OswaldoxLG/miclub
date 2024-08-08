<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "alumnos_miclub";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
die("Conexión fallida: " . $conn->connect_error);
}
// echo "Connected successfully";
?>