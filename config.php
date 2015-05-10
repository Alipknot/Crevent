
<?php
$db_host = 'localhost';
$db_port = 3306;
$db_user = 'root';
$db_pass = '';
$db_name = 'crevent';

$db = new mysqli($db_host, $db_user, $db_pass, $db_name, $db_port);
if (mysqli_connect_errno())
	fail('MySQL connect', mysqli_connect_error());

	


// Base-2 logarithm of the iteration count used for password stretching
$hash_cost_log2 = 8;
// Do we require the hashes to be portable to older systems (less secure)?
$hash_portable = FALSE;


?>
