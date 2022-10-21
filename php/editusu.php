<?php
	if(!empty($_POST)){
	include 'conexion.php';
  $formatos  = array('.jpg','.jpeg','.ico','.png');
	$id = mysqli_real_escape_string($conn, $_POST['id']);
	$cta = mysqli_real_escape_string($conn, $_POST['cta']);
	$name = mysqli_real_escape_string($conn, $_POST['name']);
	$vei = mysqli_real_escape_string($conn, $_POST['vei']);
	$pla = mysqli_real_escape_string($conn, $_POST['pla']);
	$ocu = mysqli_real_escape_string($conn, $_POST['ocu']);   
	if ($_FILES['archivo']['name']==null){  
  $alterar =mysqli_query($conn, "UPDATE registro SET cuenta='$cta', nombre='$name',veiculo='$vei', placas='$pla', ocupacion='$ocu' WHERE id='$id'")or die (mysqli_error($conexion));
	echo '<script>window.location="../admin.php"</script>'; 
  }else{$nombreArchivo= $_FILES['archivo']['name'];$nombreTmpArchivo= $_FILES['archivo']['tmp_name'];$ext=substr($nombreArchivo,strrpos($nombreArchivo, '.'));    
  if (in_array($ext,$formatos)){
    $ruta="imagen/".$id.$ext;
    if (move_uploaded_file($nombreTmpArchivo, "../".$ruta)){
      $query= "UPDATE registro SET scr='$ruta', cuenta='$cta', nombre='$name',veiculo='$vei', placas='$pla', ocupacion='$ocu' WHERE id='$id'";
		 $resultado= $conn ->query($query);
	echo '<script>window.location="../admin.php"</script>';
    }else{echo '<script>alert("Error");window.location="../admin.php"</script>';
  }
}else{echo '<script>alert("Este archivo no está permitido");window.location="../admin.php"</script>';}
  }
	 }else{echo '<script>window.location="../admin.php"</script>';}
  ?>
