<?php
include(__DIR__ .'/configuration.php');
include(__DIR__ .'/objects/class.database.php');
include(__DIR__ .'/objects/class.bempress.php');
include(__DIR__ .'/objects/class.search.php');
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

  echo $vw->NamEmpresa;
}
$busca->param1= $cat;
$busca->param2= $com;
$store=$busca->saveNew();



}else{
  $arvw = $vista->GetList();
  foreach($arvw as $vw){

    echo $vw->NamEmpresa;
  }
}
?>
