<?php
header('Content-Type: text/plain');
require 'libraries/PasswordHash.php';
include('config.php');
$debug = false;
function fail($pub, $pvt = '')
{
	global $debug;
	$msg = $pub;
	if ($debug && $pvt !== '')
		$msg .= ": $pvt";
	exit("A ocurrido un error ($msg).\n");
}

function get_post_var($var)
{
	$val = $_POST[$var];
	if (get_magic_quotes_gpc())
		$val = stripslashes($val);
	return $val;
}
$op = $_POST['op'];
if ($op !== 'new' && $op !== 'login' && $op !== 'change')
	fail('Unknown request');
	
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
	

$hasher = new PasswordHash($hash_cost_log2, $hash_portable);
if ($op === 'new') {
$nombre = get_post_var('name');
$email =get_post_var('email');
$dir=get_post_var('direccion');
$city=get_post_var('ciudad');
$reg=get_post_var('region');
$edad = get_post_var('edad');	
$hash = $hasher->HashPassword($pass);
if (strlen($hash) < 20)
	fail('Failed to hash new password');
unset($hasher);

($stmt = $db->prepare('insert into usuario values (?,?,?,?,?,?,?,?)'))
	|| fail('MySQL prepare', $db->error);
$stmt->bind_param('ssssisss', $user, $email, $hash,$nombre,$edad, $dir, $city, $reg)
	|| fail('MySQL bind_param', $db->error);	
	if (!$stmt->execute()) {
	$save_error = $db->error;
	$stmt->close();

// Does the user already exist?
	($stmt = $db->prepare('select ID_user from usuario where ID_user=?'))
		|| fail('MySQL prepare', $db->error);
	$stmt->bind_param('s', $user)
		|| fail('MySQL bind_param', $db->error);
	$stmt->execute()
		|| fail('MySQL execute', $db->error);
	$stmt->store_result()
		|| fail('MySQL store_result', $db->error);

	if ($stmt->num_rows === 1)
		fail('This username is already taken');
	else
		fail('MySQL execute', $save_error);
}
	

$what = "User created\n";

}else{
	$hash = '*'; // In case the user is not found
	($stmt = $db->prepare('select Contra_user from usuario where ID_user=?'))
		|| fail('MySQL prepare', $db->error);
	$stmt->bind_param('s', $user)
		|| fail('MySQL bind_param', $db->error);
	$stmt->execute()
		|| fail('MySQL execute', $db->error);
	$stmt->bind_result($hash)
		|| fail('MySQL bind_result', $db->error);
	if (!$stmt->fetch() && $db->errno)
		fail('MySQL fetch', $db->error);

	if ($hasher->CheckPassword($pass, $hash)) {
		$what = 'Authentication succeeded';
	} else {
		$what = 'Authentication failed';
		$op = 'fail'; // Definitely not 'change'
	}
	if ($op === 'change') {
		$stmt->close();

		$newpass = get_post_var('newpass');
		if (strlen($newpass) > 72)
			fail('The new password is too long');
		$hash = $hasher->HashPassword($newpass);
		if (strlen($hash) < 20)
			fail('Failed to hash new password');
		unset($hasher);

		($stmt = $db->prepare('update usuario set Contra_user=? where ID_user=?'))
			|| fail('MySQL prepare', $db->error);
		$stmt->bind_param('ss', $hash, $user)
			|| fail('MySQL bind_param', $db->error);
		$stmt->execute()
			|| fail('MySQL execute', $db->error);

		$what = 'Password changed';
	}
	unset($hasher);
	
}

	
$stmt->close();
$db->close();

echo "$what\n";
?>