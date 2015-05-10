<?php
include(__DIR__ .'/configuration.php');
include(__DIR__ .'/objects/class.database.php');
include(__DIR__ .'/objects/class.bempress.php');
if (!empty($_POST["cat"])||!empty($_POST["com"])) {
$cat = $_POST["cat"];
$com = $_POST["com"];
$vista = new Bempress();
$arvw = $vista->GetList(array(array("DescCat", "=", $cat), array("ComE", "=", $com)));
foreach($arvw as $vw){

  echo $vw->NamEmpresa;
}
}else{
    echo "Por favor seleccione una opción de filtrado";
}
?>
