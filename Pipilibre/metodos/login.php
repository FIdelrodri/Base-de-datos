<?php
session_start(); 
include("conexion.php");

// las varaibles del foooooorm

$nombre = $_POST['Nombre'];
$pass = $_POST['pass']; 

// la consulta del papu

$consulta = "SELECT * FROM usuario WHERE Nombre_usuario='$nombre' AND contraseña='$pass'";
$resultado = mysqli_query($conexion, $consulta);

// el if deaaaaaa

if (mysqli_num_rows($resultado) > 0) {

    $fila = mysqli_fetch_assoc($resultado);
    $_SESSION['usuario_logueado'] = $nombre;
    $_SESSION['dinero'] = $fila['saldo'];
    $_SESSION['id_usuario'] = $fila['id_usuario'];
    header("Location: ../Vistas/principal/principal.php");
} else {
    $_SESSION['trigger_inicio_error'] = 'usuario o contraseña incorrecta';
    header("Location: ../vistas/inicio/inicio.php");
}
?>