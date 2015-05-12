<?php
session_start();
$comp=0;
if(isset($_SESSION['id'])){
$comp=1;
$us = $_SESSION['id'];
$per= $_SESSION['per'];
}
if($comp===1){
  if($per===2 || $per===1){
include("mpdf/mpdf.php");
$mpdf=new mPDF('c','A4','','' , 0 , 0 , 0 , 0 , 0 , 0);

$mpdf->SetDisplayMode('fullpage');

$mpdf->list_indent_first_level = 0;  // 1 or 0 - whether to indent the first level of a list
session_start();
$file=file_get_contents('http://localhost/Crevent/Reporte.php');



$mpdf->WriteHTML($file);
$mpdf->Output();
}else{
  header("location: index.php");
  die();
}
}else{header("location: index.php");
die();}
?>
