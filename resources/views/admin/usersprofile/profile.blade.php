@extends('app')

@section('content')

	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<a href="#" class="thumbnail">
					<img src="{{ Auth::user()->profile->picture_path }}" alt="">
				</a>
			</div>
			<div class="col-md-8">
				<div class="jumbotron">
					<div class="container">
						<h2>Usuario: {{ Auth::user()->full_name }}</h2>
						<h4>Perfil de usuario</h4>
						<p>{{ Auth::user()->profile->bio }}</p>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<form>
				<div class="col-md-6">
					<legend>Editar información</legend>
					<div class="form-group">
						<label for="email">Correo electrónico (usuario)</label>
						<input type="text" class="form-control" id="email" name="email" value="Correo electrónico">
					</div>
					<div class="form-group">
						<label for="first_name">Primer nombre</label>
						<input type="text" class="form-control" id="first_name" name="first_name" value="Primer nombre">
					</div>
					<div class="form-group">
						<label for="last_name">Apellido</label>
						<input class="form-control" name="last_name" type="text" id="last_name" value="">
					</div>
				</div>
				<div class="col-md-6">
					<legend>Cambia tu contraseña</legend>
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
				<div class="col-md-6">
					<legend>Redes sociales</legend>
					<div class="form-group">
						<label for="facebook"><img src="/assets/images/ico-facebook.png" alt="Facebook" width="16"> Facebook</label>
						<input type="text" class="form-control" id="facebook" name="facebook">
					</div>
					<div class="form-group">
						<label for="google"><img src="/assets/images/ico-google.png" alt="Google" width="16"> Google+</label>
						<input type="text" class="form-control" id="google" name="google">
					</div>
					<div class="form-group">
						<label for="youtube"><img src="/assets/images/ico-youtube.png" alt="youtube" width="16"> Youtube+</label>
						<input type="text" class="form-control" id="youtube" name="youtube">
					</div>
					<div class="form-group">
						<label for="twitter"><img src="/assets/images/ico-twitter.png" alt="Twitter" width="16"> Twitter</label>
						<input type="text" class="form-control" id="twitter" name="twitter">
					</div>
					<div class="form-group">
						<label for="linkedin"><img src="/assets/images/ico-linkedin.png" alt="Linkedin" width="16"> Linkedin</label>
						<input type="text" class="form-control" id="linkedin" name="linkedin">
					</div>
					<div class="form-group">
						<label for="website"><img src="/assets/images/ico-website.png" alt="website" width="16"> Sitio Web</label>
						<input type="text" class="form-control" id="website" name="website">
					</div>
				
				</div>
				<div class="col-md-12">
					<button type="submit" class="btn btn-primary">Guardar</button>
				</div>
			</form>
		</div>
	</div>

@endsection