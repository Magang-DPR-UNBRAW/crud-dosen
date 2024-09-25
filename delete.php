<?php
include 'config.php';

$id = $_GET['id'];

$sql = "DELETE FROM data_dosen WHERE id_dosen=$id";

if ($connection->query($sql) === TRUE) {
    header('Location: index.php');
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $connection->error;
}
?>
