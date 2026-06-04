
<?php
session_start();
if (!isset($_SESSION['usuario_logueado'])) {
    header("Location: ../inicio/inicio.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pipilibre - Principal</title>
    <link rel="stylesheet" href="prueba.css">
</head>
<body>

    <div class="contenedor-fondo">
        <!--  ahhhh comentario de barra de arriba -->
        <header class="barra_superior">
            <!-- logo de la izquierda-->
            <img class="logowich_arriba" src="imagenes/reallogo.png" alt="Logo">
            <!-- cosobich de la derechovich-->
            <div class="cosas_derecha">
                  
                <!-- -->
                <div class="barra_derecha">
                    <a href="../principal/principal.php"><button>⬅️Volver a pagina principal⬅️</button></a>
                </div>
            </div>
        </header>
    
        <div class="conteiner_de_productos">
            <div class="container">
                    <p>NOMBRE USUARIO</p>
                    <p><h1>x_X_martin</h1></p>
                    <p>NOMBRE</p>
                    <p><h1>Martin</h1></p>
                    <p>APELLIDO</p> 
                    <p><h1>Armando Jesus</h1></p>
                    <p>DNI</p>
                    <p><h1>23.436.643</h1></p>
                    <p>MAIL</p>
                    <p><h1>ejemplo@gmail.com</h1></p>
                    <p>DIRECCIONES</p>
                    <p><h1>[Hacer un while con todas las direcciones vinculadas a esa id]</h1></p>
            </div>
        
        </div> 
    </div>

</body>
</html>