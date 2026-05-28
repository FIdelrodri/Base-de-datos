
<?php
session_start();
if (!isset($_SESSION['usuario_logueado'])) {
    header("Location: ../inicio/inicio.php");
    exit();
}
include("../../../metodos/conexion.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pipilibre - Principal</title>
    <link rel="stylesheet" href="usuario.css">
</head>
<body>

    <div class="contenedor-fondo">
        <!--  ahhhh comentario de barra de arriba -->
        <header class="barra_superior">
            <!-- logo de la izquierda-->
            <img class="logowich_arriba" src="../../../imagenes/reallogo.png" alt="Logo">
            <!-- cosobich de la derechovich-->
            <div class="cosas_derecha">
                  
                <!-- -->
                <div class="barra_derecha">
                    <a href="../../principal/principal.php"><button>⬅️Volver a pagina principal⬅️</button></a>
                </div>
            </div>
        </header>
        <?php 
            $id_persona = $_SESSION['id_usuario'];
            $sql = "call salida_info_usuario($id_persona)";
            $resultado = mysqli_query($conexion, $sql);
            $_fila = mysqli_fetch_assoc($resultado);   
        ?>
        <div class="conteiner_de_productos">
    <div class="container-profile">
        
        <div class="profile-header">
            <span class="label">NOMBRE USUARIO</span>
            <h2 class="username"><?php echo !empty($_fila['Nombre_usuario']) ? $_fila['Nombre_usuario'] : '—'; ?></h2>
        </div>
        
        <hr class="divider">
        <div class="profile-grid">
            <div class="info-group">
                <span class="label">Nombre</span>
                <p class="data"><?php echo !empty($_fila['nombre']) ? $_fila['nombre'] : '—'; ?></p>
            </div>

            <div class="info-group">
                <span class="label">Apellido</span>
                <p class="data"><?php echo !empty($_fila['apelldio']) ? $_fila['apelldio'] : '—'; ?></p>
            </div>

            <div class="info-group">
                <span class="label">DNI</span>
                <p class="data"><?php echo !empty($_fila['dni']) ? $_fila['dni'] : '—'; ?></p>
            </div>

            <div class="info-group">
                <span class="label">Email</span>
                <p class="data"><?php echo !empty($_fila['correo_eletronico']) ? $_fila['correo_eletronico'] : '—'; ?></p>
            </div>
        </div>

        <hr class="divider">

        <div class="profile-addresses">
            <span class="label">DIRECCIONES VINCULADAS</span>
            
        </div>

    </div>
</div>
    </div>

</body>
</html>