<?php
include('config.php');
include('funciones.php');
include('class/Usuario.php');


include 'header.php';
$user = get_post_var('user_name');
/* Sanity-check the username, don't rely on our use of prepared statements
 * alone to prevent attacks on the SQL server via malicious usernames. */
if (!preg_match('/^[a-zA-Z0-9_]{1,60}$/', $user)){


echo '
<div class="section">
					<div class="container">
							<div class="row">
									<div class="col-md-12">
										<div class="alert alert-dismissable alert-info">
													<strong>';
	fail('Nombre de usuario invalido');

	echo '</strong></div>
</div>
</div>
</div>
</div>


</body>

</html>
';
}

$pass = get_post_var('password');
/* Don't let them spend more of our CPU time than we were willing to.
 * Besides, bcrypt happens to use the first 72 characters only anyway. */
if (strlen($pass) > 72){


echo '
<div class="section">
					<div class="container">
							<div class="row">
									<div class="col-md-12">
										<div class="alert alert-dismissable alert-info">
													<strong>';
	fail('La password es demasiado larga');
	echo '</strong></div>
</div>
</div>
</div>
</div>


</body>

</html>
';
}
$nombre = get_post_var('name');
$email =get_post_var('email');
$dir=get_post_var('direccion');
$city=get_post_var('ciudad');
$reg=get_post_var('region');
$edad = get_post_var('edad');

$regs = new Usuario;


echo '
<div class="section">
					<div class="container">
							<div class="row">
									<div class="col-md-12">
										<div class="alert alert-dismissable alert-info">
													<strong>'; echo($regs->create_user($user, $email, $pass,$nombre,$edad, $dir, $city, $reg, 0));echo '</strong></div>
									</div>
							</div>
					</div>
			</div>


	</body>

</html>
'; ?>
