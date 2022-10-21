          <div class="masthead clearfix">
            <div class="inner">
              <h3 class="masthead-brand">NFCar</h3>
              <nav>
                <ul style="fon" class="nav masthead-nav">
                  <li <?php if ($cont==1){echo  'class="active"';}?>><a href="index.php">Inicio</a></li>
                  <li <?php if ($cont==2){echo  'class="active"';}?>><a href="agregar.php">Agregar</a></li>
                  <li <?php if ($cont==3){echo  'class="active"';}?>><a href="historial.php">Historial</a></li>
                  <li <?php if ($cont==4){echo  'class="active"';}?>><a data-toggle="modal" href="#admin" onclick="focus_v();" >Administrador</a></li>
                </ul>
              </nav>
            </div>
          </div>
<div  class="modal fade" id="admin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div  class="modal-dialog" style="width: 300px;height: 300px;">
   <div style="background-color: #333;" class="modal-content">
     <div  class="modal-header">
       <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
       <h2 class="modal-title">Administrador</h2>
     </div>
     <div class="modal-body">
       <form role="form" method="post" enctype="multipart/form-data" action="php/login.php">
        <label for="Usuario" class="sr-only">Usuario</label>
        <input type="texto" id="user" name="user" class="form-control" placeholder="Usuario" required>
        <label for="inputPassword" class="sr-only">Contrase&ntilde;a</label></br>
        <input type="password" id="pass" name="pass" class="form-control" placeholder="Contrase&ntilde;a" required></br>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
      </form>
     </div>
   </div>
 </div>
</div>
<script type="text/javascript" >
function focus_v(){
	setTimeout(function(){document.getElementById("user").focus();}, 600);
	} 

</script>