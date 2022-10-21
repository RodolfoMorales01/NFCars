<?php
$host = 'localhost'; $user = 'root';       
$password = 'tesis'; $db = 'tesis'; 
$conn = mysqli_connect($host,$user,$password,$db);
if(!$conn) {
	die("Conexión con la base de datos fallida: " . mysqli_connect_error());
}
?>
