
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
    <link rel="stylesheet" href="principal.css">
</head>
<body>

    <div class="contenedor-fondo">
        <!--  ahhhh comentario de barra de arriba -->
        <header class="barra_superior">
            <!-- logo de la izquierda-->
            <img class="logowich_arriba" src="../../imagenes/reallogo.png" alt="Logo">
            <!-- cosobich de la derechovich-->
            <div class="cosas_derecha">
                <a href="../administracion/administracion.php">
                <img class="carrito_compras" src="../../imagenes/administracion_logo.png"  alt="Logo">
                </a>
                <div class="crear_producto">
                    <a href="../productos/vista_productos.php"><button>📦Crear Producto📦</button></a>
                </div>
               <div class="conteiner_usuario_arriba">
                 <!-- los madafakin select de dinero y el nombre del usuairo -->

                <img class="imagen_usuario_inside" src="../../imagenes/logousuario.png" alt="Logo">
                     <?php
                        echo "$_SESSION[usuario_logueado]";
                     ?>
                </div>     
                    
                <div class="dinero">
                        <?php
                            
                            echo "$ ". $_SESSION['dinero'] ?? "Sin saldo";
                        ?>
                    </div>
                <!-- -->
                <div class="barra_derecha">
                    <a href="../../metodos/logout.php"><button>Cerrar sesión</button></a>
                </div>
            </div>
        </header>
        <div class="conteiner_de_productos">
            <?php
              include("../../metodos/conexion.php");
                  $resultado = mysqli_query($conexion, "SELECT * FROM publicacion");

              while ($fila = mysqli_fetch_assoc($resultado)) {
            ?>
            <div class="container">
                        <h2 class="col-nombre"><?php echo $fila['Nombre_Producto']; ?></h2>
                        <img class="imagen_pruducto_en_conteneiner" src="../productos/<?php echo $fila['imagen'] ?>" alt="[imagen del producto]" >
                        <p class="col-descripcion"><?php echo $fila['descripcion']; ?></p>
                        <p class="col-precio">Precio: $<?php echo $fila['precio']; ?></p>
                        <p class="col-stock">Stock: <?php echo $fila['stock']; ?></p>
                        <div class="boton_comprar_producto">
                    <form action="../../metodos/procesar_compra.php" method="POST">
                        <input type="hidden" name="id_producto_comprado" value="<?php echo $fila['id_publicacion']; ?>">
                        <button type="submit">Comprar Producto</button>
                    </form>  
                </div>
            </div>

            <?php
             }
             mysqli_close($conexion);
            ?>
        </div>
    </div>

</body>
</html>