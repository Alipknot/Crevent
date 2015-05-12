<?php
include('config.php');
include('funciones.php');
include('class/Usuario.php');

include 'header.php';
if($comp===1){
if($per===2){


$user = get_post_var('user_name');
/* Sanity-check the username, don't rely on our use of prepared statements
 * alone to prevent attacks on the SQL server via malicious usernames. */
if (!preg_match('/^[a-zA-Z0-9_]{1,60}$/', $user))
	fail('Nombre de usuario invalido');
$dele = new Usuario;
$res = $dele->delete($user);

if($res!=0){
	if($res===1){
		?>
					<div class="section">
							<div class="container">
									<div class="row">
											<div class="col-md-12">
													<div class="alert alert-danger alert-dismissable">
															<strong>Error!</strong>El usuario no existe</div>
											</div>
									</div>
							</div>
					</div><?php
	}else{?>
				<div class="section">
						<div class="container">
								<div class="row">
										<div class="col-md-12">
												<div class="alert alert-danger alert-dismissable">
														<strong>Error!</strong>No se pudo eliminar el usuario.</div>
										</div>
								</div>
						</div>
				</div>	<?php }
}else{
 ?>
<div class="section">
					<div class="container">
							<div class="row">
									<div class="col-md-12">
											<div class="alert alert-dismissable alert-success">
													<strong>Correcto!</strong>El usuario ha sido eliminado exitosamente.</div>
									</div>
							</div>
					</div>
			</div>
<?php
}
?>

	</body>

</html>
<?php

}else{
  header("location: index.php");
  die();

}
}else{
  header("location: index.php");
  die();

}

 ?>
