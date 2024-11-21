<?php
require_once('../crud_biblioteca/conexion.php');
require_once('../crud_biblioteca/clases/Libro.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $Titulo = $_POST['Titulo'];
    $Autor = $_POST['Autor'];
    $Editorial = $_POST['Editorial'];
    $anio_publicacion = $_POST['anio_publicacion'];
    $Genero = $_POST['Genero'];

    $libro = new Libro($conexion, $Titulo, $Autor,  $Editorial, $anio_publicacion, $Genero);
    $libro->registrarLibro();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Registrar Libro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <h1 class="text-center p-5">Registrar Libro</h1>
    <form method="POST" class="w-50 mx-auto">
        <div class="mb-3">
            <label for="Titulo" class="form-label">Título</label>
            <input type="text" class="form-control" name="Titulo" placeholder="Titulo" required>
        </div>
        <div class="mb-3">
            <label for="Autor" class="form-label">Autor</label>
            <input type="text" class="form-control" name="Autor" placeholder="Autor" required>
        </div>
        <div class="mb-3">
            <label for="Editorial" class="form-label">Editorial</label>
            <input type="text" class="form-control" name="Editorial" placeholder="Editorial" required>
        </div>
        <div class="mb-3">
            <label for="anio_publicacion" class="form-label">Año de publicación</label>
            <input type="text" class="form-control" name="anio_publicacion" placeholder="anio_publicacion" required>
        </div>
        <div class="mb-3">
            <label for="Genero" class="form-label">Género</label>
            <input type="text" class="form-control" name="Genero" placeholder="Genero" required>
        </div>
        <div>
            <button type="submit" class="btn btn-primary">Registrar</button>
            <a href="index.php" class="btn btn-secondary">Lista de Libros</a>
        </div>
    </form>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</html>