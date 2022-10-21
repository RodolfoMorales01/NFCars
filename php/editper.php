<?php
if(!empty($_POST)){
	include 'conexion.php';
	$id = mysqli_real_escape_string($conn, $_POST['id']);
	$name = mysqli_real_escape_string($conn, $_POST['name']);
  $alterar =mysqli_query($conn, "UPDATE personal SET nombre='$name' WHERE id='$id'")or die (mysqli_error($conn));                                                                                                                                                                                             
	echo '<script>window.location="../admin.php"</script>';
	 }else{echo "no entre al post" ;echo '<script>window.location="../admin.php"</script>';}
?>
