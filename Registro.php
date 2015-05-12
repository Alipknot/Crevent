<?php
include 'header.php';
 ?>
  <div class="container">

<div class="row">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
	  <form role="form" action="regist.php" method="post">
			<h2>Por favor registrese.</h2>
			<hr class="colorgraph">

		<div class="form-group">
                        <input type="text" name="name" id="name" class="form-control input-lg" placeholder="Nombre completo" tabindex="1" required>
                        <input type="hidden" name="op" value="new">
					</div>


					<div class="form-group">
						<input type="text" name="user_name" id="user_name" class="form-control input-lg" placeholder="Nombre de usuario" tabindex="2" required>
					</div>

			<div class="form-group">
				<input type="email" name="email" id="email" class="form-control input-lg" placeholder="Correo" tabindex="3" required>
			</div>
              			<div class="form-group">
				<input type="number" name="edad" id="edad" class="form-control input-lg" placeholder="Edad" tabindex="4" required>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
						<input type="password" name="password" id="password" class="form-control input-lg" placeholder="contraseña" tabindex="5" required>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
						<input type="password" name="password_confirmation" id="password_confirmation" class="form-control input-lg" placeholder="Confirme la contraseña" tabindex="6" required>
					</div>
				</div>
			</div>
            			<div class="form-group">
				<input type="text" name="direccion" id="direccion" class="form-control input-lg" placeholder="Dirección" tabindex="7" required>
			</div>

            			<div class="form-group">
				<input type="text" name="ciudad" id="ciudad" class="form-control input-lg" placeholder="Ciudad" tabindex="8" required>
			</div>

            			<div class="form-group">
				<input type="text" name="region" id="region" class="form-control input-lg" placeholder="Región" tabindex="9" required>

		  </div>
			<div class="row">
				<div class="col-xs-4 col-sm-3 col-md-3">
					<span class="button-checkbox">
						<button type="button" class="btn" data-color="info" tabindex="10">Acepto</button>
                        <input type="checkbox" name="t_and_c" id="t_and_c" class="hidden" value="1">
					</span>
				</div>
				<div class="col-xs-8 col-sm-9 col-md-9">
					 Al presionar <strong class="label label-primary">Registrar</strong>, aceptas los <a href="#" data-toggle="modal" data-target="#t_and_c_m">Terminos y condiciones</a> de nuestro sitio, incluido nuestro suo de cookies.
				</div>
			</div>

			<hr class="colorgraph">
			<div class="row">
				<div class="col-xs-12 col-md-6"><input type="submit" value="Registrar" id="regist" class="btn btn-primary btn-block btn-lg" tabindex="10" onClick="  if(!this.form.t_and_c.checked)
{
      $('#submit-errors').show();
    return false;
}else{
 $('#submit-errors').hide();
}"></div>
				<div class="col-xs-12 col-md-6"><a href="#" class="btn btn-success btn-block btn-lg">Ingresar</a></div>
			</div>
		</form>
        <br/>
 <div class="alert alert-danger alert-dismissable" id="submit-errors">
  <button type="button" class="close" id="closeAlert" >&times;</button>
  <strong>¡Error!</strong> Debe aceptar los terminos y condiciones.
</div>
	</div>
</div>
<!-- Modal -->
<div class="modal fade" id="t_and_c_m" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title" id="myModalLabel">Terminos & Condiciones</h4>
			</div>
			<div class="modal-body">
				<p>En proceso<p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" data-dismiss="modal">Acepto</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/register.js"></script>
    <script>
	$('#submit-errors').hide();



$('#closeAlert').on('click', function () {
    $('#submit-errors').hide();
});
$('#closeAlert').on('click', function () {
    $('#submit-errors').hide();
});
</script>
  </body>
</html>
