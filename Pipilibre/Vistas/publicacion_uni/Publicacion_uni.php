<?php
session_start();
if (!isset($_SESSION['usuario_logueado'])) {
    header("Location: ../inicio/inicio.php");
    exit();
}
include("../../metodos/conexion.php");

if (!isset($_GET['id'])) {
    header("Location: ../principal/principal.php");
    exit();
}

$id_producto = $_GET['id'];

$sql = "CALL obtener_publicacion_por_id('$id_producto')";
$resultado = mysqli_query($conexion, $sql);

if (mysqli_num_rows($resultado) == 0) {
    header("Location: ../principal/principal.php");
    exit();
}

$fila = mysqli_fetch_assoc($resultado);

mysqli_next_result($conexion); 
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pipilibre - <?php echo $fila['Nombre_Producto']; ?></title>
    <link rel="stylesheet" href="Publicacion_uni.css">
</head>
<body>

    <div class="contenedor-fondo">
        <header class="barra_superior">
            <img class="logowich_arriba" src="../../imagenes/reallogo.png" alt="Logo">
            
            <div class="cosas_derecha">
                <div class="conteiner_usuario_arriba">
                    <img class="imagen_usuario_inside" src="../../imagenes/logousuario.png" alt="Usuario">
                    <?php echo $_SESSION['usuario_logueado']; ?>
                </div>     
                <div class="barra_derecha">
                    <a href="../principal/principal.php"><button>⬅️Volver a pagina principal⬅️</button></a>
                </div>
            </div>
        </header>

        <main class="bloque_detalle_producto">
            
            <div class="columna_izquierda">
                <div class="caja_imagen">
                    <img src="../productos/<?php echo $fila['imagen']; ?>" alt="Imagen del producto">
                </div>
                
                <div class="botones_accion">
                    <form action="../../metodos/procesar_compra.php" method="POST">
                        <input type="hidden" name="id_producto_comprado" value="<?php echo $fila['id_publicacion']; ?>">
                        
                        <?php
                        $id_usuario_actual = $_SESSION['id_usuario'];
                        
                        $sql_dir = "CALL obtener_direcciones_por_usuario('$id_usuario_actual')";
                        $resultado_direcciones = mysqli_query($conexion, $sql_dir);
                        ?>

                        <select name="id_direccion_envio" required>
                            <option value="" disabled selected>Seleccioná dirección de envío</option>
                            <?php while($dir = mysqli_fetch_assoc($resultado_direcciones)): ?>
                                <option value="<?php echo $dir['id_direccion']; ?>">
                                    <?php echo $dir['calle'] . " " . $dir['altura'] . " (CP: " . $dir['codigo_postal'] . ")"; ?>
                                </option>
                            <?php endwhile; ?>
                        </select>

                        <?php 
                        mysqli_next_result($conexion); 
                        ?>

                        <button type="submit" class="btn-comprar">COMPRAR</button>
                    </form>

                    <form action="../../metodos/agregar_carrito.php" method="POST">
                        <input type="hidden" name="id_producto_carrito" value="<?php echo $fila['id_publicacion']; ?>">
                        <button type="submit" class="btn-carrito">CARRITO</button>
                    </form>
                </div>
            </div>

            <div class="columna_derecha">
                <h1 class="titulo_producto"><?php echo $fila['Nombre_Producto']; ?></h1>
                <hr class="separador">
                <p class="descripcion_producto"><?php echo $fila['descripcion']; ?></p>
                <hr class="separador">
                <h2 class="precio_producto">Precio: $<?php echo $fila['precio']; ?></h2>
                <p class="stock_producto">STOCK: <?php echo $fila['stock']; ?></p>
            </div>

        </main>

        <div class="seccion_reseñas">
            
            <div class="contenedor_formulario_reseña">
                <h3>Dejar una opinión del producto</h3>
                <form action="../../metodos/agregar_reseña.php" method="POST">
                    <input type="hidden" name="id_publicacion_reseña" value="<?php echo $id_producto; ?>">
                    <textarea name="comentario_reseña" placeholder="Escribí acá qué te pareció el producto..." required></textarea>
                    <button type="submit">Publicar Reseña</button>
                </form>
            </div>

            <div class="lista_reseñas_publicadas">
                <h3>Opiniones de otros compradores</h3>
                <?php
                $sql_reseñas = "CALL obtener_reseñas_publicacion('$id_producto')";
                $resultado_reseñas = mysqli_query($conexion, $sql_reseñas);

                if ($resultado_reseñas && mysqli_num_rows($resultado_reseñas) > 0) {
                    while ($res = mysqli_fetch_assoc($resultado_reseñas)):
                ?>
                <div class="tarjeta_reseña">
                    <div class="cabecera_reseña">
                        <span class="usuario_reseña">👤 Comprador Anónimo</span>
                        <span class="fecha_reseña"><?php echo date('d-m-Y H:i', strtotime($res['fecha'])); ?></span>
                    </div>
                    <p class="comentario_texto"><?php echo $res['reseña']; ?></p>
                </div>
                <?php
                    endwhile;
                    mysqli_next_result($conexion);
                } else {
                ?>
                <div class="sin_reseñas">
                    <p>Este producto todavía no tiene reseñas. ¡Sé el primero!</p>
                </div>
                <?php
                }
                ?>
            </div>

        </div>

    </div>

</body>
</html>
<?php mysqli_close($conexion); ?>