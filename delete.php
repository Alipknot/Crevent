<?php
include('config.php');
include('funciones.php');
include('class/Usuario.php');

	
$user = get_post_var('user_name');
/* Sanity-check the username, don't rely on our use of prepared statements
 * alone to prevent attacks on the SQL server via malicious usernames. */
if (!preg_match('/^[a-zA-Z0-9_]{1,60}$/', $user))
	fail('Nombre de usuario invalido');
$dele = new Usuario;
$res = $dele->delete($user);

if($res!=0){
	if($res===1){
		echo ('El usuario no existe');
	}else{echo('no se pudo eliminar al usuario');};
}else{
	echo ('usuario eliminado correctamente');
}

?>