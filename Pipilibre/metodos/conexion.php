<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "lospipislibres";
$pr   = "3309";

$conexion = mysqli_connect($host, $user, $pass, $db,$pr);

if (!$conexion) {
    echo '1';
    die("Error de conexión: " . mysqli_connect_error());
}
?>