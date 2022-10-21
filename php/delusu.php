<?php
if(!empty($_GET)){
	include 'conexion.php';
	$id = mysqli_real_escape_string($conn, $_GET['id']);       
  $alterar =mysqli_query($conn, "DELETE FROM registro WHERE id='$id'")or die (mysqli_error($conexion));    
  $alterar =mysqli_query($conn, "DELETE FROM historial WHERE usuario='$id'")or die (mysqli_error($conexion));                                                                                                                                                                          
	echo '<script>window.location="../admin.php"</script>';
	 }else{echo "no entre al post" ;echo '<script>window.location="../admin.php"</script>';}
?>
