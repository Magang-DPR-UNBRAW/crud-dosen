<?php
$host = 'localhost';
$user = 'root'; // Default user MySQL
$password = ''; // Default tanpa password
$database = 'dosen'; // Nama database

$connection = new mysqli($host, $user, $password, $database);

if ($connection->connect_error) {
    die("Koneksi gagal: " . $connection->connect_error);
}
?>
