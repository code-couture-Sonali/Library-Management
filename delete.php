<?php
$connection = new mysqli("localhost", "root", "", "library");
$id = $_GET['id'];

$connection->query("DELETE FROM books WHERE id=$id");
header("Location: index.php");

$connection->close();
?>
