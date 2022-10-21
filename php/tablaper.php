<?php
include "conexion.php";
$consulta="SELECT * FROM personal";
$datos = $conn->query($consulta);
?>
<?php if(mysqli_num_rows($datos)>0): ?>
  <div class="table-responsive">   
   <table class="table table-condensed">  
    <thead>
          <th style="text-align:center;">UID</th>
          <th style="text-align:center;">Nombre</th>
          <th colspan="2" style="text-align:center;"  >Opciones</th>
      </thead>
		<tbody>
      <?php while ($row=$datos->fetch_array()): ?>
            <tr>
              <td><?php echo $row['UID']; ?></td>
              <td><?php echo $row['nombre']; ?></td>
              <td style=" text-align:center;"><a data-toggle="modal" href="#modper<?php echo $row['id']; ?>" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-edit"></span></a></td>
				  <td style=" text-align:center;"><a href="#" id="delper<?php echo  $row['id']; ?>"  class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-trash"></span></a></td>                   
             </tr>
      <?php endwhile;?>
      </tbody>
       </table>
  </div>
<?php else:?>
  <div class="row">
    <div class="col-md-4 col-md-offset-4">
      <p class="alert alert-danger"><i class="frown icon" ></i>No hay Personal</p>
    </div>
  </div>
<?php endif;?>