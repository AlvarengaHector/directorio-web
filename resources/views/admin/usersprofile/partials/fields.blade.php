<div class="row">
	<div class="col-md-6 user-fields">
		<legend><strong>Editar información</strong></legend>
		<div class="form-group">
			{!! Form::label('email', 'Correo electrónico') !!}
			{!! Form::text('email', null, ['class' => 'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('first_name', 'Primer nombre') !!}
			{!! Form::text('first_name', null, ['class' => 'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('last_name', 'Apellido') !!}
			{!! Form::text('last_name', null, ['class' => 'form-control']) !!}
		</div>
	</div>
	<div class="col-md-6 password-fields">
		<legend><strong>Cambia tu contraseña (no yet!)</strong></legend>
		<div class="form-group">
			<label for="old_password">Escriba la contraseña anterior</label>
			<input type="password" class="form-control" id="old_password" name="old_password">
		</div>
		<div class="form-group">
			<label for="new_password">Escriba la contraseña nueva</label>
			<input type="password" class="form-control" id="new_password" name="new_password">
		</div>
		<div class="form-group">
			<label for="confirm_new_password">Confirme la contraseña nueva</label>
			<input type="password" class="form-control" id="confirm_new_password" name="confirm_new_password">
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-6 social-fields">
		<legend><strong>Redes sociales</strong></legend>
		<div class="form-group">
			<label for="facebook"><img src="/assets/images/ico-facebook.png" alt="Facebook" width="16"> Facebook</label>
			{!! Form::text('facebook', null, ['class' => 'form-control']) !!}
		</div>
		<div class="form-group">
			<label for="google"><img src="/assets/images/ico-google.png" alt="Google" width="16"> Google+</label>
			{!! Form::text('google', null, ['class' => 'form-control']) !!}
		</div>
		<div class="form-group">
			<label for="youtube"><img src="/assets/images/ico-youtube.png" alt="youtube" width="16"> Youtube+</label>
			{!! Form::text('youtube', null, ['class' => 'form-control']) !!}
	
		</div>
		<div class="form-group">
			<label for="twitter"><img src="/assets/images/ico-twitter.png" alt="Twitter" width="16"> Twitter</label>
			{!! Form::text('twitter', null, ['class' => 'form-control']) !!}
		</div>
		<div class="form-group">
			<label for="linkedin"><img src="/assets/images/ico-linkedin.png" alt="Linkedin" width="16"> Linkedin</label>
			{!! Form::text('linkedin', null, ['class' => 'form-control']) !!}
		</div>
		<div class="form-group">
			<label for="website"><img src="/assets/images/ico-website.png" alt="website" width="16"> Sitio Web</label>
			{!! Form::text('website', null, ['class' => 'form-control']) !!}
		</div>
		<div class="form-group social-add-more">
			{{-- generated buttons --}}
		</div>
	</div>
</div>