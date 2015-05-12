<?php
include('config.php');
include('funciones.php');
include('class/Usuario.php');

	$result;
	$error;
$user = get_post_var('user_name');
/* Sanity-check the username, don't rely on our use of prepared statements
 * alone to prevent attacks on the SQL server via malicious usernames. */
if (!preg_match('/^[a-zA-Z0-9_]{1,60}$/', $user))
	$error='Nombre de usuario invalido';
	$result = false;

$pass = get_post_var('password');
/* Don't let them spend more of our CPU time than we were willing to.
 * Besides, bcrypt happens to use the first 72 characters only anyway. */
if (strlen($pass) > 72)
$error='La password es demasiado larga';
$result = false;
$logs = new Usuario;
if($logs->val_log($user, $pass)){
	$result = true;

}else{
	$result = false;
}

if($result){
$reg=$logs->getUser($user);

	session_start();
	$_SESSION['id'] = $reg[0]["ID"];
	$_SESSION['per'] = $reg[0]["per"];
	header("Location: index.php");
die();


}else{
	$_POST['error'] = $error;
	echo $error;
}
	?>
