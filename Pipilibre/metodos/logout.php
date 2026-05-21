<?php

session_start(); // inicisiamos la madafakin sesion
session_destroy(); // y la detonamos booooom

session_start(); // y la volevemos a iniciar para poner el triggeeerrrrr
// y crearmos el triger para el el triger de cerrar sesion en le otro menuowich
$_SESSION ['trigger_logout'] = 'pesnequelahabia olvidado turun tun';
header("Location: ../Vistas/inicio/inicio.php");
?>