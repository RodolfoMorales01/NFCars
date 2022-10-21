<?php
include "conexion.php";
$consulta="SELECT * FROM historial";
$datos = $conn->query($consulta);
?><?php if(mysqli_num_rows($datos) > 0): ?>
  <div class="table-responsive" style="width: 95%; margin-left: 2%;height: 50%;">   
            <table data-toggle="table"  data-sort-order="desc">  
    <thead>
          <th class="text-center" data-sortable="true">UID</th>
          <th class="text-center" data-sortable="true">Cuenta</th>
          <th class="text-center" data-sortable="true">Nombre</th>
          <th class="text-center" data-sortable="true">Ocupaci&oacute;n</th>
          <th class="text-center" data-sortable="true">Guardia</th>
          <th class="text-center" data-sortable="true">Motivo</th>
          <th class="text-center" data-sortable="true">Acceso</th>
          <th class="text-center" data-sortable="true">Fecha</th>
        </thead>
		<tbody>
      <?php while ($row=$datos->fetch_array()): ?>
		<?php $sql2="SELECT * FROM registro WHERE id='".$row['usuario']."'";
		$res = $conn->query($sql2);
		$row2=$res->fetch_array();?>
		<?php $sql3="SELECT * FROM personal WHERE id='".$row['guardia']."'";
		$res = $conn->query($sql3);
		$row3=$res->fetch_array();?>
            <tr>
              <td><?php echo $row2['UID']; ?></td>
              <td><?php echo $row2['cuenta']; ?></td>
              <td><?php echo $row2['nombre']; ?></td>
              <td><?php echo $row2['ocupacion']; ?></td>
              <td><?php echo $row3['nombre']; ?></td>
              <td><?php echo $row['motivo']; ?></td>
               <?php if($row['acp']==1){echo '<td>Aceptado</td>';}if($row['acp']==2){echo '<td>Denegado</td>';} ?>
              <td><?php echo $row['fecha']; ?></td>
              </tr>
      <?php endwhile;?>
      </tbody>
       </table>
  </div>
<?php else:?>
  <div class="row">
    <div class="col-md-4 col-md-offset-4">
      <p class="alert alert-danger"><i class="frown icon" ></i>No hay historial</p>
    </div>
  </div>
<?php endif;?>