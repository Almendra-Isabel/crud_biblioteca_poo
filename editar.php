<?php
require_once('../crud_biblioteca/conexion.php');
require_once('../crud_biblioteca/clases/Libro.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

   
    $sql = "SELECT * FROM libro WHERE id = $id";
    $resultado = mysqli_query($conexion, $sql);
    $libroData = mysqli_fetch_assoc($resultado);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $Titulo = $_POST['Titulo'];
    $Autor = $_POST['Autor'];
    $Editorial = $_POST['Editorial'];
    $Añodepublicacion = $_POST['Añodepublicacion'];
    $Genero = $_POST['Genero'];

  
    $libro = new Libro($conexion, $Titulo, $Autor, $Editorial, $Añodepublicacion , $Genero );
    $libro->actualizarLibro($id);

    header("Location: index.php");
}
?>


