<?php
$servername = "localhost";
$username = "roxine";
$password = "roxine";
$dbname = "movies_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
