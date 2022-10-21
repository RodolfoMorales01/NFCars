<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="img/car.ico">
    <title>NFCAR</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/footable.bootstrap.css" rel="stylesheet">
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <link href="cover.css" rel="stylesheet">
    <link href="css/bootstrap-table.min.css" rel="stylesheet"/>

    <script src="js/ie-emulation-modes-warning.js"></script>
    <script src="js/vendor/jquery.min.js"></script>
    <script src="js/footable.js"></script>
<?php session_start();$cont=3;$_SESSION['admin']="";?>

  <body>
    <div class="site-wrapper">
      <div class="site-wrapper-inner">
        <div class="cover-container">
	<?php include"php/nav.php";?>
	</div>
	<center><h1>Historial de Ingreso</h1></center><hr width="900px"/><br>
  <?php
include "php/conexion.php";
$consulta="SELECT * FROM historial";
$datos = $conn->query($consulta);
?>
<?php if(mysqli_num_rows($datos) > 0): ?>
  <div class="table-responsive" style="width: 80%; margin-left: 10%;height: 50%;">   
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
        <div class="cover-container">
  <div class="row">
    <div class="col-md-4 col-md-offset-4">
      <p class="alert alert-danger"><i class="frown icon" ></i>No hay historial</p>
    </div>
  </div>
  </div>
<?php endif;?>
	<br><br>
        <div class="cover-container">

          <div class="mastfoot">
            <div class="inner">
				<p>Direcci&oacute;n: Km 20, Carretera Manzanillo - Cihuatl&aacute;n, Ejido El Naranjo, CP. 28868, Manzanillo, M&eacute;xico</p>
				<p> © Derechos Reservados 2013-2017 Universidad de Colima</p>
            </div>
          </div>

        </div>

      </div>

    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
     <script src="js/bootstrap-table.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
