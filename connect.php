<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "university";

$sql = new mysqli($host, $user, $password, $database);

if ($sql->connect_error) {
    die("Connection failed: " . $sql->connect_error);
}
?>
