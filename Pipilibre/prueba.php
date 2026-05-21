<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['imagen'])) {
    
    $nombreArchivo = basename($_FILES['imagen']['name']);
    $rutaDestino = __DIR__ . '/' . $nombreArchivo;

    // Validación básica: solo permitir imágenes
    $tipoArchivo = strtolower(pathinfo($rutaDestino, PATHINFO_EXTENSION));
    $formatosPermitidos = ['jpg', 'jpeg', 'png', 'gif'];

    if (in_array($tipoArchivo, $formatosPermitidos)) {
        if (move_uploaded_file($_FILES['imagen']['tmp_name'], $rutaDestino)) {
            echo "Imagen guardada exitosamente como: " . $nombreArchivo;
        } else {
            echo "Error al mover el archivo.";
        }
    } else {
        echo "Formato no permitido. Solo se aceptan JPG, JPEG, PNG y GIF.";
    }
}
?>