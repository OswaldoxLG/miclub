<?php
define('BASE_PATH', __DIR__ . '/');
define('BASE_URL', 'http://localhost/miclub/');  
?>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "alumnos_miclub";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>