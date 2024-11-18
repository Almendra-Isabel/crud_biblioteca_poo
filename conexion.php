<?php

$host ='localhost';
$username = 'root';
$password = '';
$database = 'bd_biblioteca';

$conexion = mysqli_connect($host, $username,$password,$database);
if (!$conexion){
    die("Error en la conexion :" . mysqli_connect_error());
}