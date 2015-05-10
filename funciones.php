<?php

$debug = true;
if (!function_exists('fail')) {
function fail($pub, $pvt = ''){
	global $debug;
	$msg = $pub;
	if ($debug && $pvt !== '')
		$msg .= ": $pvt";
	exit("A ocurrido un error ($msg).\n");
}
}
if (!function_exists('get_post_var')) {
function get_post_var($var)
{
	$val = $_POST[$var];
	if (get_magic_quotes_gpc())
		$val = stripslashes($val);
	return $val;
}
}
?>