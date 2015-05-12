<?php
session_start();
$comp=0;
if(isset($_SESSION['id'])){
$comp=1;
$us = $_SESSION['id'];
$per= $_SESSION['per'];
}
if($per===2){
include('config.php');
include('funciones.php');
include('class/Usuario.php');


$regs = new Usuario;
$regs->create_user('Admin2', 'Admin2@crevent.cl', '12345678','Oscar','20', 'null', 'talcahuano', 'BioBIo', 2);
}
?>
