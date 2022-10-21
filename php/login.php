<?php
if(!empty($_POST)){
	session_start(); 
			include 'conexion.php';
				$user = mysqli_real_escape_string($conn, $_POST['user']);
				$pass = mysqli_real_escape_string($conn, $_POST['pass']);
				if (($pass=="admin") and ($user=="admin")) {$_SESSION['admin']="admin";echo '<script>window.location="../admin.php"; </script>';}else{echo '<script>window.location="'.$_SERVER['HTTP_REFERER'].'"; </script>';}
}else{echo '<script>window.location="'.$_SERVER['HTTP_REFERER'].'"; </script>';}
?>
