<?php
include(__DIR__ .'/configuration.php');
include(__DIR__ .'/objects/class.database.php');
include(__DIR__ .'/objects/class.bempress.php');
include(__DIR__ .'/objects/class.search.php');
include 'header.php';
if($comp===1){
$vista = new Bempress();
$busca = new Search();
if (!empty($_POST["cat"]) || !empty($_POST["com"])) {

$cat = $_POST["cat"];
$com = $_POST["com"];
$array = array();
if(!empty($_POST["cat"])){
$array[] = array("DescCat", "=", $cat);
}
if(!empty($_POST["com"])){
$array[] = array("ComE", "=", $com);
}
$arvw = $vista->GetList($array);
foreach($arvw as $vw){
?>    <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="btn-link panel panel-primary text-left">
                            <div class="panel-heading">
                                <h2 class="panel-title"><?php echo $vw->NamEmpresa;?></h2>
                            </div>
                            <div class="panel-body">
                                <p><?php echo $vw->DescE;?></p>
                            </div>
                            <div class="panel-footer">
                                <div class="row">
                                    <div class="col-sm-6 text-center">
                                        <p><?php echo $vw->TelE;?></p>
                                    </div>
                                    <div class="col-sm-6 text-center">
                                        <p><?php echo $vw->ComE;?></p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
  <?php

}
$busca->param1= $cat;
$busca->param2= $com;
$store=$busca->saveNew();



}else{
  $arvw = $vista->GetList();
  foreach($arvw as $vw){

    ?>
    <div class="section">
               <div class="container">
                   <div class="row">
                       <div class="col-md-12">
                           <div class="btn-link panel panel-primary text-left">
                               <div class="panel-heading">
                                   <h2 class="panel-title"><?php echo $vw->NamEmpresa;?></h2>
                               </div>
                               <div class="panel-body">
                                   <p><?php echo $vw->DescE;?></p>
                               </div>
                               <div class="panel-footer">
                                   <div class="row">
                                       <div class="col-sm-6 text-center">
                                           <p><?php echo $vw->TelE;?></p>
                                       </div>
                                       <div class="col-sm-6 text-center">
                                           <p><?php echo $vw->ComE;?></p>
                                       </div>

                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
    <?php
  }
}
?>
</body>

</html>
<?php }else{header("location: index.php");
die();} ?>
