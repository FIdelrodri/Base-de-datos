<?php
session_start();
include("../../metodos/conexion.php");

// Agarra variables del form
$nombre = $_POST['Nombre']; 
$correo = $_POST['correo_electronico'];
$pass = $_POST['contraseña'];
$dni = !empty($_POST['DNI']) ? $_POST['DNI'] : 0; // Si está vacío, manda 0 para que el procedure lo maneje
$nombre_persona = $_POST['Nombre_persona'];
$apellido = $_POST['apellido'];

// Consulta llamando al procedimiento corregido
$Registrar_consulta = "CALL crearcuenta('$nombre', '$nombre_persona', '$apellido', '$dni', '$correo', '$pass')";

if (mysqli_query($conexion, $Registrar_consulta)) {
    $_SESSION['trigger_regirtro_exitoso'] = 'se madafakin logro el register';
    header("Location: ../inicio/inicio.php");
    exit();
} else {
    $_SESSION['trigger_regirtro_error'] = 'opaaa NO se madafakin logro el register';
    echo mysqli_error($conexion);
}

mysqli_close($conexion);
?>
