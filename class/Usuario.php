<?php
require __DIR__ .'/../libraries/PasswordHash.php';
include(__DIR__ .'/../funciones.php');
class Usuario {
    private $pass;
	private $hash;
    private $user;
	private $hasher;
	private $nombre;
private $email;
private $dir;
private $city;
private $reg;
private $edad;
private $db;

 public function __construct()

  {
	  include(__DIR__ .'/../config.php');
	  $this->db = $db;
      $this->hasher = new PasswordHash(8, false);
  }



    public function create_user($user, $email, $pass,$nombre,$edad, $dir, $city, $reg) {
		$db = $this->db;
		$hash = $this->hasher->HashPassword($pass);
if (strlen($hash) < 20)
	echo('No se pudo encriptar la contraseña');
unset($hasher);
     ($stmt = $db->prepare('insert into usuario values (?,?,?,?,?,?,?,?,0)'))
	|| fail('error de base de datos', $db->error);
$stmt->bind_param('ssssisss', $user, $email, $hash,$nombre,$edad, $dir, $city, $reg)
	|| fail('error de ingreso, parametros no aceptados', $db->error);
	if (!$stmt->execute()) {
	$save_error = $db->error;
	$stmt->close();

// Does the user already exist?
	($stmt = $db->prepare('select ID_user from usuario where ID_user=?'))
		|| fail('error de base de datos', $db->error);
	$stmt->bind_param('s', $user)
		|| fail('error de ingreso, parametros no aceptados', $db->error);
	$stmt->execute()
		|| fail('error al guardar', $db->error);
	$stmt->store_result()
		|| fail('Error al recuperar resultado', $db->error);

	if ($stmt->num_rows === 1)
		fail('El nombre de usuario esta en uso');
	else
		fail('MySQL execute', $save_error);
}

echo("Usuario creado\n");
    }

    public function create_adm($user, $email, $pass,$nombre,$edad, $dir, $city, $reg, $per) {
		$db = $this->db;
		$hash = $this->hasher->HashPassword($pass);
if (strlen($hash) < 20)
	echo('Failed to hash new password');
unset($hasher);
     ($stmt = $db->prepare('insert into usuario values (?,?,?,?,?,?,?,?,?)'))
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

echo("Usuario creado\n");
    }
    public function delete($user) {
			$db = $this->db;
      ($stmt = $db->prepare('select ID_user from usuario where ID_user=?'))
		|| fail('MySQL prepare', $db->error);
	$stmt->bind_param('s', $user)
		|| fail('MySQL bind_param', $db->error);
	$stmt->execute()
		|| fail('MySQL execute', $db->error);
	$stmt->store_result()
		|| fail('MySQL store_result', $db->error);

	if ($stmt->num_rows === 1){
		$stmt->close();
	($stmt = $db->prepare('DELETE from usuario where ID_user=?'))
	|| fail('MySQL prepare', $db->error);
	$stmt->bind_param('s', $user)
		|| fail('MySQL bind_param', $db->error);
		if (!$stmt->execute()) {
			return 2;
		}else{
		return 0;
		}
	}else{
		return 1;
	}}


	public function val_log($user, $pass){
		$db = $this->db;
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

	if ($this->hasher->CheckPassword($pass, $hash)) {
		return true;
	} else {
		return false;

	}
	}

    //fields getters and setters here as needed
public function getUser($id){
  $db = $this->db;
  $sql = 'select ID_user, typ_Perfil from usuario WHERE ID_user=?';
  ($stmt = $db->prepare($sql))
  || fail('MySQL prepare', $db->error);
$stmt->bind_param('s', $id)
  || fail('MySQL bind_param', $db->error);
$stmt->execute()
  || fail('MySQL execute', $db->error);
  $devices = array();
  $stmt->bind_result($col1, $col2);
    while($stmt->fetch()) {
        $tmp = array();
        $tmp["ID"] = $col1;
        $tmp["per"] = $col2;
        array_push($devices, $tmp);
    }
    $stmt->close();
    return $devices;
}
public function getUsers(){
  $db = $this->db;
  $sql = 'select ID_user, typ_Perfil from usuario';
  ($stmt = $db->prepare($sql))
  || fail('MySQL prepare', $db->error);
$stmt->execute()
  || fail('MySQL execute', $db->error);
  $devices = array();
  $stmt->bind_result($col1, $col2);
    while($stmt->fetch()) {
        $tmp = array();
        $tmp["ID"] = $col1;
        $tmp["per"] = $col2;
        array_push($devices, $tmp);
    }
    $stmt->close();
    return $devices;
}
}
?>
