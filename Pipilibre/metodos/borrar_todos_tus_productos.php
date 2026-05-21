<?php
session_start();
$sql = "CALL eliminar_todos_tus_productos('$nombre')";

if (mysqli_query($conexion, $sql)) {

    $_SESSION['eliminaron_productos_correctamente_exitoso'] = 'saa';
    header("../Vistas\administracion\administracion.php");
    exit();
} else {
    $_SESSION['eliminaron_productos_correctamente_fallido'] = '67';
    echo 'ola';
}
mysqli_close($conexion);
?>