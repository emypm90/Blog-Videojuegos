<?php  

//Conexion
$server = 'localhost';
$usuario = 'root';
$password = '';
$database = 'blog_master';

$db = mysqli_connect($server, $usuario, $password, $database);

mysqli_query($db, "SET NAMES 'utf8'");

//Iniciar la sesion

if(!isset($_SESSION)){
	session_start();
}


?>