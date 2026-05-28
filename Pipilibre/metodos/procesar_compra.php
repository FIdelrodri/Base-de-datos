<?php
session_start();

if (!isset($_SESSION['usuario_logueado'])) {
    header("Location: ../inicio/inicio.php");
    exit();
}

include("conexion.php");

$id_producto = mysqli_real_escape_string($conexion, $_POST['id_producto_comprado']);

$sql_publicacion = "SELECT * FROM publicacion WHERE id_publicacion = '$id_producto'";
$c_info_pd = mysqli_query($conexion, $sql_publicacion);

if ($c_info_pd && mysqli_num_rows($c_info_pd) > 0) {
    $fila_publicacion = mysqli_fetch_assoc($c_info_pd);

    $com_pd_saldo = $fila_publicacion['precio'];
    $com_id_vendedor = $fila_publicacion['id_autor'];
    $com_id_comprador = $_SESSION['id_usuario'];

    $sql_procedimiento = "CALL sp_procesar_pago('$com_id_comprador', '$com_id_vendedor', '$com_pd_saldo', '$id_producto')";    
    
    if (mysqli_query($conexion, $sql_procedimiento)) {
        header("Location: ../Vistas/principal/principal.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conexion);
    }

} else {
    echo 'error_producto';
}
?>