<?php
include 'header.php';
include('class/Usuario.php');
if($comp===1){
if($per===2){
  $usa = new Usuario();
  $row= $usa->getUsers();
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
                                <select class="btn btn-block btn-primary" id="sel1" name="user_name">
                                      <option value="">-------------------</option>
                                      <?php


                                      foreach($row as $r){
                                          if($r['per']===0 && $r['ID']!='yo')
                                        echo("<option value='".$r['ID']."'>".$r['ID']."</option>");
                             }?>
                                  </select>
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
