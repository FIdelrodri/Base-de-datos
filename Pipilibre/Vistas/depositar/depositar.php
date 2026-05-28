<?php
session_start();
// conexion
include("../../metodos/conexion.php");
// agarra variables del form
$Saldo_a_ingresar = $_POST['Saldo_a_ingresar'];
$metodo_recarga = $_POST['metodo_pago']; 
$id_usuario_producto = $_SESSION['id_usuario'];

$sql = "call recarga($id_usuario_producto,'$metodo_recarga','$Saldo_a_ingresar')";
if (mysqli_query($conexion, $sql)) {
    header("Location: vista_depostiar.php");
    echo "sdasds";
    exit();
} else {
        echo "Error: " . mysqli_error($conexion);
    exit();
}   
// no se que cierra pero cierra algo
mysqli_close($conexion);
?>