<?php
if(!empty($_GET)){
	include 'conexion.php';
	$id = mysqli_real_escape_string($conn, $_GET['id']);
	$sqlchec="SELECT * FROM registro WHERE UID='".$id."'";$result = $conn->query($sqlchec);
	if(mysqli_num_rows($result) > 0) {	$row=mysqli_fetch_array($result);	
		$sqlchec2="SELECT * FROM historial WHERE acp=0";	$result2 = $conn->query($sqlchec2);
		if(mysqli_num_rows($result2) > 0) {}else{	
		$sql2="SELECT * FROM guardias WHERE id=(SELECT MAX(id)  FROM guardias WHERE 1) ";
		$res2 = $conn->query($sql2);
		$row2=$res2->fetch_array();
		$sql3="SELECT * FROM personal WHERE UID='".$row2['UID']."'";
		$res3 = $conn->query($sql3);
		$row3=$res3->fetch_array();		
		//$sql='INSERT INTO historial(usuario,guardia,motivo) VALUES ("'.$row2['id'].'","'.$row4['id'].'","'.$row2['ocupacion'].'")';$result = $conn->query($sql);
		$sql='INSERT INTO historial(usuario,guardia,motivo) VALUES ("'.$row['id'].'","'.$row3['id'].'","'.$row['ocupacion'].'")';$result = $conn->query($sql);}
	}else{
	$sqlchec3="SELECT * FROM personal WHERE UID='".$id."'";
	$result3 = $conn->query($sqlchec3);
	if(mysqli_num_rows($result3) > 0) {
		$sql2="SELECT * FROM guardias WHERE id=(SELECT MAX(id)  FROM guardias WHERE 1) ";
		$res2 = $conn->query($sql2);
		$row2=$res2->fetch_array();
		echo $row2['UID'];
	   if($row2['UID']==$id) {}else{
	$sql='INSERT INTO guardias(UID) VALUES ("'.$id.'")';$result = $conn->query($sql);		
		}}else{$sql='INSERT INTO registro(UID) VALUES ("'.$id.'")';	$result = $conn->query($sql);}
	}
}
?>
