<?php
session_start();
// 1. Validar que el usuario esté logueado
if (!isset($_SESSION['usuario_logueado'])) {
    header("Location: ../inicio/inicio.php");
    exit();
}

include("conexion.php");
$id_producto_eliminar = $_POST['id_producto_a_eliminar'];
$sql = "CALL sup_publicacion_especifica('$id_producto_eliminar')";

if (mysqli_query($conexion,$sql)){
    header ("Location: ../Vistas/administracion/administracion.php");

}
else{
    $_errores['error_sup_pd_singular'] = 'error';
    header ("Location: ../Vistas/administracion/administracion.php");
}
