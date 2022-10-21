<?php
 session_start();$cont=1;$_SESSION['admin']="";
include "php/conexion.php";
$sqlchec="SELECT * FROM historial WHERE acp='0'";
$result = $conn->query($sqlchec);
if(mysqli_num_rows($result) > 0)
{
	$row=$result->fetch_array();
	$_SESSION['buscar']=1;
}
?>
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
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <link href="cover.css" rel="stylesheet">
    <script src="js/ie-emulation-modes-warning.js"></script>
    <script src="js/vendor/jquery.min.js"></script>
    <?php if($_SESSION['buscar']==null){echo "<script>setTimeout('document.location.reload()',1000); </script>";}?>
  </head>
  <body>
    <div class="site-wrapper">
      <div class="site-wrapper-inner">
        <div class="cover-container">
	<?php include"php/nav.php";?>
	          <div class="inner cover">
    <?php if($_SESSION['buscar']==null)
    { 
		$sql2="SELECT * FROM guardias WHERE id=(SELECT MAX(id)  FROM guardias WHERE 1) ";
		$res2 = $conn->query($sql2);
		$row2=$res2->fetch_array();
		$sql3="SELECT * FROM personal WHERE UID='".$row2['UID']."'";
		$res3 = $conn->query($sql3);
		$row3=$res3->fetch_array();
		echo '<h1 class="cover-heading">Esperando Tarjeta</h1>
            <p class="lead">Coloque la tarjeta para procesar los datos</p>
            <p class="lead">GUARDIA	</p>
            <p class="lead"> '.$row3['nombre'].' </p>
            <p class="lead">
            </p>';}else{
		$sql="SELECT * FROM registro WHERE id='".$row['usuario']."'";
		$res = $conn->query($sql);
		$row2=$res->fetch_array();
		echo '<h1 class="cover-heading">Control de Acceso</h1>';
   echo'<table class="table table-condensed">
            <tr><td rowspan="8"><img src="'.$row2['scr'].'" class="circle" width="200px" height="225px"></td></tr>
              <tr><td>Cuenta: '.$row2['cuenta'].'</td></tr>
              <tr><td>Nombre: '.$row2['nombre'].'</td></tr>
              <tr><td>Vehiculo: '.$row2['veiculo'].'</td></tr>
              <tr><td>Placa: '.$row2['placas'].'</td></tr>
              <tr><td>Ocupacion: '.$row2['ocupacion'].'</td></tr>
              <tr><td>Fecha: '.$row['fecha'].'</td></tr>
            </table>
		<div class="btn-group" role="group" aria-label="...">
		 	<button href="#" id="conf-yes" type="button" class="btn btn-success" style="height: 50px;width: 100px;">SI</button>
  			<button href="#" id="conf-no" type="button" class="btn btn-danger" style="height: 50px;width: 100px;">NO</button>
		</div>';
    }?>
  <script>
$('#conf-yes').click(function(e){
	     window.location="php/conf.php?id=<?php echo $row['id']?>&conf=1";
});
$('#conf-no').click(function(e){
        window.location="php/conf.php?id=<?php echo $row['id']?>&conf=2";
});
	function r() { location.href="php/conf.php?id=<?php echo $row['id']?>&conf=1" } 
	setTimeout ("r()", 10000);
</script>
          </div>

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
