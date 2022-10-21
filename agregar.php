<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="img/car.ico">
    <title>NFCAR</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <link href="cover.css" rel="stylesheet">
    <script src="js/ie-emulation-modes-warning.js"></script>
    <script src="js/vendor/jquery.min.js"></script>
  </head>
<?php session_start();$cont=2;$_SESSION['admin']="";?>
  <body>
    <div class="site-wrapper">
      <div class="site-wrapper-inner">
        <div class="cover-container" >
	<?php include"php/nav.php";?>
				<center><h1>Datos</h1></center><hr  width="500px"/><br>
          <div class="inner cover" style="margin-left:100px; width: 500px;">
       <form role="form" method="post" enctype="multipart/form-data" action="php/agreusu.php">
        <input type="hidden" id="id" name="id" class="form-control" value="<?php echo $row['id']; ?>" required>
        <label for="Usuario" class="sr-only">Cuenta:</label>
        <input type="texto" id="cta" name="cta" class="form-control" placeholder="Identificador" value="<?php echo $row['cuenta']; ?>" required><br>
        <label for="Usuario" class="sr-only">Nombre:</label>
        <input type="texto" id="name" name="name" class="form-control" placeholder="Nombre" value="<?php echo $row['nombre']; ?>"  required><br>
        <label for="Usuario" class="sr-only">Vehiculo:</label>
        <input type="texto" id="vei" name="vei" class="form-control" placeholder="Veh&iacute;culo" value="<?php echo $row['veiculo']; ?>"  ><br>
        <label for="Usuario" class="sr-only">Placa:</label>
        <input type="texto" id="pla" name="pla" class="form-control" placeholder="Placa" value="<?php echo $row['placas']; ?>" ><br>
           <label for="Usuario" class="sr-only">Motivo:</label>
        <input type="texto" id="mot" name="mot" class="form-control" placeholder="Motivo" value="<?php echo $row['motivo']; ?>" ><br>
             <div class="input-group">
 			<input type="radio" name="ocu" value="Estudiante" required >Estudiante
 			<input type="radio" name="ocu" value="Maestro" required>Maestro
 			<input type="radio" name="ocu" value="Visitante" required>Visitante
         </div><br>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Guardar</button>
      </form>
          </div>
<br><br><br>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
