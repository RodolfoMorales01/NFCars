<?php
if(!empty($_POST)){
	include 'conexion.php';
	$UID= mysqli_real_escape_string($conn, $_POST['UID']);
	$name = mysqli_real_escape_string($conn, $_POST['name']);
	$sql='INSERT INTO personal(UID,nombre) VALUES ("'.$UID.'","'.$name.'")';
	$result = $conn->query($sql);		
  $alterar =mysqli_query($conn, "DELETE FROM registro WHERE UID='$UID'")or die (mysqli_error($conn));    
	echo '<script>window.location="../admin.php"; </script>';
	}
?>
