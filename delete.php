<?php
include 'header.php';
if($comp===1){
if($per===2){
 ?>
<div class="section">
          <div class="container">
              <div class="row">
                  <div class="col-md-12">
                      <h1 class="text-center">Eliminar usuario:</h1>
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-offset-3 col-md-6">
                      <form role="form" method="POST" action="deleteuser.php">
                          <div class="form-group">
                              <div class="input-group">
                                  <input type="text" name="user_name" class="form-control" placeholder="Nombre de usuario">
                                  <span class="input-group-btn">
                                      <input type="submit" class="btn btn-success" value="Borrar">
                                  </span>
                              </div>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>
  </body>

</html>
<?php }else{
  header("location: index.php");
  die();

}
}else{
  header("location: index.php");
  die();

}?>
