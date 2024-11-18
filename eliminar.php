<?php
require_once('../crud_biblioteca/conexion.php');
require_once('../crud_biblioteca/clases/Libro.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Crear instancia y eliminar estudiante
    $libro = new Libro($conexion);
    $libro->eliminarLibro($id);

    header("Location: index.php"); // Redirige al índice después de eliminar
}
?>