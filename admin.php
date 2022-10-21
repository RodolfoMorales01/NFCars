<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="img/car.ico">
    <title>NFCAR</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <link href="cover.css" rel="stylesheet">
    <link href="css/bootstrap-table.min.css" rel="stylesheet"/>
    <script src="js/ie-emulation-modes-warning.js"></script>
    <script src="js/vendor/jquery.min.js"></script>
  </head>
<?php session_start();$cont=4; if($_SESSION['admin']!="admin"){echo '<script>window.location="index.php"; </script>';}?>
  <body>
    <div class="site-wrapper">
      <div class="site-wrapper-inner">
        <div class="cover-container">
	<?php include"php/nav.php";?>
            <h1 style=" margin-top:0px;"  class="cover-heading">Administrador</h1>
            <p class="lead">Gestina la aplicaci&oacute;n desde esta ventana.</p>
		<div class="btn-group" role="group" aria-label="...">
		 	 <button data-toggle="modal" href="#modales1" type="button" class="btn btn-default" >Guardia</button>
  			<button data-toggle="modal" href="#modales2" type="button" class="btn btn-default">Historial</button>
  			<button data-toggle="modal" href="#modales3" type="button" class="btn btn-default">Actualizar Usuarios</button>
		</div>
<div  class="modal fade" id="modales1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div  class="modal-dialog">
   <div style="background-color: #333;" class="modal-content">
     <div  class="modal-header">     
       <div class="col-xs-2"><button type="button"  data-toggle="modal" href="#adduser" type="button" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span></button></div>
       <div class="col-xs-9"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
       <h3 class="modal-title">Personal</h3></div></div>
     <div class="modal-body"><br>
     <?php include"php/tablaper.php"; ?>
     </div>
   </div>
 </div>
</div>
<div  class="modal fade" id="modales2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div  class="modal-dialog" style="width: 1000px;">
   <div style="background-color: #333;" class="modal-content">
      <div  class="modal-header">     
       <div class="col-xs-2"><a type="button" href="php/reporteexcel.php" type="button" class="btn btn-success"><span class="glyphicon glyphicon-download-alt"></span>&nbsp;Descargar Historial</a></div>
       <div class="col-xs-9"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
       <h3 class="modal-title">Historial</h3></div></div>
     <div class="modal-body">
     <?php include"php/tablahis.php"; ?>
     </div>
   </div>
 </div>
</div>
<div  class="modal fade" id="modales3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div  class="modal-dialog">
   <div style="background-color: #333;" class="modal-content">
     <div  class="modal-header">
       <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
       <h2 class="modal-title">Actualizar Usuarios</h2>
     </div>
     <div class="modal-body">
     <?php include"php/tablausu.php"; ?>
     </div>
   </div>
 </div>
</div>
<div  class="modal fade" id="adduser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div  class="modal-dialog" style="width: 300px;height: 300px;">
   <div style="background-color: #333;" class="modal-content">
     <div  class="modal-header">
       <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
       <h2 class="modal-title">Agregar Personal</h2>
     </div>
     <div class="modal-body">
       <form role="form" method="post" enctype="multipart/form-data" action="php/addper.php">
       <select class="selectpicker show-tick form-control" name="UID" id="UID" placeholder="UID">
       <option selected="true" disabled="disabled">Selecciona una ID</option>
<?php include "php/conexion.php";$result = $conn->query("SELECT * FROM registro WHERE cuenta=0");
    if ($result->num_rows > 0) {
        while ($row2 = $result->fetch_assoc()) {                
            echo '<option value="'.$row2['UID'].'">'.$row2['UID'].'</option>';
        }
    }?>
    		</select><br>
        <label for="Usuario" class="sr-only">Nombre:</label>
        <input type="texto" id="name" name="name" class="form-control" placeholder="Nombre" required autofocus><br>

        <button class="btn btn-lg btn-primary btn-block" type="submit">Agregar</button>
      </form>
     </div>
   </div>
 </div>
</div>
     <?php include"php/formusu.php"; ?>
     <?php include"php/formper.php"; ?>
          <div class="mastfoot">
            <div class="inner">
          <p>
Direcci&oacute;n: Km 20, Carretera Manzanillo - Cihuatl&aacute;n, Ejido El Naranjo, CP. 28868, Manzanillo, M&eacute;xico</p>
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
