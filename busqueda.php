<?php
include(__DIR__ .'/configuration.php');
include(__DIR__ .'/objects/class.database.php');
include(__DIR__ .'/objects/class.bempress.php');
if (!empty($_POST["cat"])) {
$cat = $_POST["cat"];
$vista = new Bempress();
$arvw = $vista->GetList(array(array("DescCat", "=", $cat)));
foreach($arvw as $vw){

  echo $vw->NamEmpresa;
}
}else{
    echo "Por favor seleccione categoria";
}
?>
