<?php
include "conexion.php";
$consulta="SELECT * FROM registro";
$datos = $conn->query($consulta);
?>
<?php if(mysqli_num_rows($datos)>0): ?>	
<?php while ($row=$datos->fetch_array()): ?>
  <script>
$('#delusu<?php echo $row["id"]; ?>').click(function(e){
	     window.location="php/delusu.php?id=<?php echo $row['id'];?>";
});
</script>
<?php if ($row['ocupacion']=="Estudiante"){ $check1="checked";$check2="";} ?>
<?php if ($row['ocupacion']=="Maestro"){ $check1="";$check2="checked";} ?>
<div  class="modal fade" id="modusu<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div  class="modal-dialog" style="width: 300px;height: 300px;">
   <div style="background-color: #333;" class="modal-content">
     <div  class="modal-header">
       <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
       <h2 class="modal-title">Editar</h2>
     </div>
     <div class="modal-body">
       <form role="form" method="post" enctype="multipart/form-data" action="php/editusu.php">
        <input type="hidden" id="id" name="id" class="form-control" value="<?php echo $row['id']; ?>" required>
        <label for="Usuario" class="sr-only">Cuenta:</label>
        <input type="texto" id="cta" name="cta" class="form-control" placeholder="Cuenta" value="<?php echo $row['cuenta']; ?>" required><br>
        <label for="Usuario" class="sr-only">Nombre:</label>
        <input type="texto" id="name" name="name" class="form-control" placeholder="Nombre" value="<?php echo $row['nombre']; ?>"  required><br>
        <label for="Usuario" class="sr-only">Vehiculo:</label>
        <input type="texto" id="vei" name="vei" class="form-control" placeholder="Vehiculo" value="<?php echo $row['veiculo']; ?>"  ><br>
        <label for="Usuario" class="sr-only">Placas:</label>
        <input type="texto" id="pla" name="pla" class="form-control" placeholder="Placa" value="<?php echo $row['placas']; ?>" ><br>
         <?php echo'<div class="input-group">
 			<input type="radio" name="ocu" value="Estudiante" '.$check1.' >Estudiante
 			<input type="radio" name="ocu" value="Maestro" '.$check2.'>Maestro
         </div><br><label for="exampleFormControlFile1">Eleige la imagen</label>'; ?>
   	 <input type="file" class="form-control-file" id="archivo" name="archivo">       <br>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Guardar</button>
      </form>
     </div>
   </div>
 </div>
</div>
<?php endwhile;?>
<?php else:?>
<?php endif;?>