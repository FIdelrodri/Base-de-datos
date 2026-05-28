<?php
session_start();
include("../../metodos/conexion.php");
// agarra variables del form
$nombre_producto = $_POST['Calle']; 
$precio_producto = $_POST['Altura'];
$stock_producto = $_POST['Postal'];

$sql = "INSERT INTO publicacion (id_autor, Nombre_Producto, imagen , descripcion, precio, stock) VALUES ('$id_usuario_producto','$nombre_producto','$Nombre_imagenes' , '$descripcion_producto', '$precio_producto','$stock_producto')";
if (mysqli_query($conexion, $sql)) {
    header("Location: /../usuario.php");
    echo "sdasds";
    exit();
} else {
        echo "Error: " . mysqli_error($conexion);
    exit();
}   
mysqli_close($conexion);
?>