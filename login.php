<?php
include('config.php');
include('funciones.php');
include('class/Usuario.php');

	
$user = get_post_var('user_name');
/* Sanity-check the username, don't rely on our use of prepared statements
 * alone to prevent attacks on the SQL server via malicious usernames. */
if (!preg_match('/^[a-zA-Z0-9_]{1,60}$/', $user))
	fail('Nombre de usuario invalido');

$pass = get_post_var('password');
/* Don't let them spend more of our CPU time than we were willing to.
 * Besides, bcrypt happens to use the first 72 characters only anyway. */
if (strlen($pass) > 72)
	fail('La password es demasiado larga');

$logs = new Usuario;
if($logs->val_log($user, $pass)){
	echo('true');
	
}else{
	echo('false');
}
	?>