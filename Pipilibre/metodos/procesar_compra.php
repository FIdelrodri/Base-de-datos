<?php
session_start();
// 1. Validar que el usuario esté logueado
if (!isset($_SESSION['usuario_logueado'])) {
    header("Location: ../inicio/inicio.php");
    exit();
}

include("conexion.php");
$id_producto = $_POST['id_producto_comprado'];
echo $id_producto;