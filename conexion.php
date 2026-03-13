<?php

$host = $_ENV['MYSQLHOST'];
$user = $_ENV['MYSQLUSER'];
$password = $_ENV['MYSQLPASSWORD'];
$database = $_ENV['MYSQLDATABASE'];
$port = $_ENV['MYSQLPORT'];

$conn = new mysqli($host, $user, $password, $database, $port);

if ($conn->connect_error) {
    die("Error de conexion: " . $conn->connect_error);
}

?>
