
<?php
include_once  'header.php';

include(__DIR__ .'/objects/class.categoria.php');
include(__DIR__ .'/configuration.php');
include(__DIR__ .'/objects/class.database.php');
include(__DIR__ .'/objects/class.bempress.php');
include(__DIR__ .'/objects/class.comuna.php');
if($comp===1){
$Categoria = new Categoria();
$catls= $Categoria->GetList();
$comuna = new Comuna();

$com=$comuna->GetList();




?>
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Buscar</h1>
            </div>
        </div>
    </div>
</div>
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-dismissable alert-info">
                    <button contenteditable="false" type="button" class="close" data-dismiss="alert"
                    aria-hidden="true">x</button>
                    <strong>Importante!</strong>, puedes dejar vacios los campos que no quieras usar
                    al buscar, usa los campos necesarios para obtener el resultado que desees.</div>
            </div>
        </div>
    </div>
</div>
<div class="section">
    <div class="container">
        <div class="row text-justify">
            <form method="POST" action="busqueda.php">
                <div class="col-md-2">
                    <div class="alert alert-dismissable alert-info">
                        <strong>Categoria:</strong>
                    </div>
                </div>
                <div class="col-md-3">
                    <select class="btn btn-lg btn-primary" id="sel1" name="cat">
                        <option value="" selected>--</option>

              <?php


              foreach($catls as $ct){

                echo("<option value='".$ct->DescCat."'>".$ct->DescCat."</option>");
     }?>
   </select>
</div>
<div class="col-md-2">
   <div class="alert alert-dismissable alert-info">
       <strong>Comuna:</strong>
   </div>
</div>
<div class="col-md-2">
   <select class="btn btn-lg btn-primary" name="com"id="sel2">
     <option value="" selected>--</option>


                        <?php


                        foreach($com as $x){


                          echo("<option value='".$x['NamComuna']."'>".$x['NamComuna']."</option>");
               }?>
             </select>
          </div>
          <div class="col-md-3 text-center">
             <button type="submit" class="btn btn-block btn-lg btn-primary">Buscar
                 <i class="fa fa-search fa-fw"></i>
             </button>
          </div>
          </form>
          </div>
          </div>
          </div>
          <div class="section">
          <div class="container">
          <div class="row">
          <div class="col-md-12">
          <hr>
          </div>
          </div>
          </div>
          </div>
          </body>

          </html>
<?php }else{header("location: index.php");
die();} ?>
