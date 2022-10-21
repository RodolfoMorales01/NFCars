<?php
if(!empty($_GET)){
 session_start();$_SESSION['buscar']=null;
	include 'conexion.php';
	$id = mysqli_real_escape_string($conn, $_GET['id']);
	$conf = mysqli_real_escape_string($conn, $_GET['conf']);
	$alterar =mysqli_query($conn, "UPDATE historial SET acp='$conf' WHERE id='$id'")or die (mysqli_error($conexion));
	echo '<script>window.location="../index.php"</script>';
	}else {echo "no entro al if";}
?>