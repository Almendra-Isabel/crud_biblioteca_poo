<?php
require_once('../crud_biblioteca/conexion.php');
require_once('../crud_biblioteca/clases/Libro.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Consultar el estudiante actual
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

    // Crear instancia y actualizar estudiante
    $libro = new Libro($conexion, $Titulo, $Autor, $Editorial, $Añodepublicacion , $Genero );
    $libro->actualizarLibro($id);

    header("Location: index.php"); // Redirige al índice después de editar
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Estudiante</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <h1 class="text-center p-5">Editar Estudiante</h1>
    <form method="POST" class="w-50 mx-auto">
    <div class="mb-3">
            <input type="hidden" class="form-control" name="id" value="<?php echo $libroData['id']; ?>">
        </div>
        <div class="mb-3">
            <label for="Titulo" class="form-label">Título</label>
            <input type="text" class="form-control" name="Titulo" placeholder="Titulo" value="<?php echo $libroData['Titulo']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="Autor" class="form-label">Autor</label>
            <input type="text" class="form-control" name="Autor" placeholder="Autor" value="<?php echo $libroData['Autor']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="Editorial" class="form-label">Editorial</label>
            <input type="text" class="form-control" name="Editorial" placeholder="Editorial" value="<?php echo $libroData['Editorial']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="Añodepublicacion" class="form-label">Año de publicación</label>
            <input type="text" class="form-control" name="Añodepublicacion" placeholder="Añodepublicacion" value="<?php echo $libroData['Año de publicacion']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="Genero" class="form-label">Género</label>
            <input type="text" class="form-control" name="Genero" placeholder="Genero" value="<?php echo $libroData['Genero']; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>

