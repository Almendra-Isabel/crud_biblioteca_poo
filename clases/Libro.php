<?php
require_once('/xampp/htdocs/crud_biblioteca/conexion.php');

class Libro{ 
 
    public $Titulo, $Autor, $Editorial, $Añodepublicacion,$Genero;
    public $conexion;

    public function __construct($conexion, $Titulo = null, $Autor = null, $Editorial = null, $Añodepublicacion = null, $Genero = null)
    {
        $this -> conexion = $conexion;
        $this -> Titulo = $Titulo;
        $this -> Autor = $Autor;
        $this -> Editorial = $Editorial;
        $this -> Añodepublicacion = $Añodepublicacion;
        $this-> Genero = $Genero;
    }

    public function registrarLibro()
    {
        $sql = "INSERT INTO `libro`(`Titulo`, `Autor`, `Editorial`, `Año de publicacion`, `Genero`) VALUES ('$this->Titulo','$this->Autor','$this->Editorial','$this->Añodepublicacion','$this->Genero')";
        if(mysqli_query($this->conexion , $sql)){
            echo "Libro registrado correctamente";
        }else {
            echo "Error al registrar el libro : " . mysqli_error($this->conexion);
        }
    }
    public static function mostrarLibro($conexion)
    {
        $sql = "SELECT * FROM estudiante";
        $resultado = mysqli_query($conexion, $sql);

        if (mysqli_num_rows($resultado)> 0 ) {
           while ($fila = mysqli_fetch_assoc($resultado)) {
             echo "ID :" . $fila["id"] . " - Titulo : " . $fila["Titulo"] . " - Autor : " . $fila["Autor"] . " - Editorial : " . $fila["Editorial"] . " - Año de publicacion : " . $fila["Año de publicacion"] . " - Genero : " . $fila[" Genero"] . "<br>";
           }
        } else {
            echo "0 resultados";
        }
    }
    public function actualizarLibro($id)
    {
        $sql = "UPDATE `libro` SET `Titulo`='$this->Titulo',`Autor`='$this->Autor',`Editorial`='$this->Editorial',`Año de publicacion`='$this->Añodepublicacion',`Genero`='$this->Genero' WHERE id=$id";
        if (mysqli_query($this->conexion, $sql)) {
            echo "Libro actualizado correctamente";
        } else {
            echo "Error al actualizar el Libro: " . mysqli_error($this->conexion);
        }
    }

    // Método para eliminar un estudiante
    public function eliminarLibro($id)
    {
        $sql = "DELETE FROM libro WHERE id=$id";
        if (mysqli_query($this->conexion, $sql)) {
            echo "Libro eliminado correctamente";
        } else {
            echo "Error al eliminar el Libro: " . mysqli_error($this->conexion);
        }
    }
}
?>
