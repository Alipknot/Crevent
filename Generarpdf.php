<?php
include("mpdf/mpdf.php");
$mpdf=new mPDF('c','A4','','' , 0 , 0 , 0 , 0 , 0 , 0);

$mpdf->SetDisplayMode('fullpage');

$mpdf->list_indent_first_level = 0;  // 1 or 0 - whether to indent the first level of a list
session_start();
$file=file_get_contents('http://localhost/Crevent/Reporte.php');
$file = utf8_encode($file);


$mpdf->WriteHTML($file);
$mpdf->Output();
?>
