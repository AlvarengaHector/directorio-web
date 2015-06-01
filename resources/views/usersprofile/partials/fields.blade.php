<div class="row">
	<div class="col-md-6 user-fields">
		<legend><strong>Información general</strong></legend>
		<div class="form-group">
			{!! Form::label('first_name', 'Nombre completo: ', ['class' => 'col-sm-4 control-label']) !!}
		    <div class="col-sm-8">
		      <p class="form-control-static">{{ $user->full_name }}</p>
		    </div>
		</div>
		<div class="form-group">
			{!! Form::label('email', 'Correo electrónico', ['class' => 'col-sm-4 control-label']) !!}
			<div class="col-sm-8">
			  <p class="form-control-static">{{ $user->email }}</p>
			</div>
		</div>
	</div>
	<div class="col-md-6 social-fields">
		<legend><strong>Redes sociales</strong></legend>
		<div class="form-group">
			<label for="facebook" class="col-sm-4 control-label">
				<img src="/assets/images/ico-facebook.png" alt="Facebook" width="16"> Facebook:
			</label>
			<div class="col-sm-8">
			  <p class="form-control-static">
			  	<a target="_blank" href="{{ $user->profile->facebook }}">{{ $user->profile->facebook }}</a>
			  </p>
			</div>
		</div>
		<div class="form-group">
			<label for="google" class="col-sm-4 control-label">
				<img src="/assets/images/ico-google.png" alt="Google" width="16"> Google+:
			</label>
			<div class="col-sm-8">
			  <p class="form-control-static">
			  	<a target="_blank" href="{{ $user->profile->google }}">{{ $user->profile->google }}</a>
			  </p>
			</div>
		</div>
		<div class="form-group">
			<label for="youtube" class="col-sm-4 control-label">
				<img src="/assets/images/ico-youtube.png" alt="youtube" width="16"> Youtube+:
			</label>
			<div class="col-sm-8">
			  <p class="form-control-static">
			  	<a target="_blank" href="{{ $user->profile->youtube }}">{{ $user->profile->youtube }}</a>
			  </p>
			</div>
		</div>
		<div class="form-group">
			<label for="twitter" class="col-sm-4 control-label">
				<img src="/assets/images/ico-twitter.png" alt="Twitter" width="16"> Twitter:
			</label>
			<div class="col-sm-8">
			  <p class="form-control-static">
			  	<a target="_blank" href="{{ $user->profile->twitter }}">{{ $user->profile->twitter }}</a>
			  </p>
			</div>
		</div>
		<div class="form-group">
			<label for="linkedin" class="col-sm-4 control-label">
				<img src="/assets/images/ico-linkedin.png" alt="Linkedin" width="16"> Linkedin:
			</label>
			<div class="col-sm-8">
			  <p class="form-control-static">
			  	<a target="_blank" href="{{ $user->profile->linkedin }}">{{ $user->profile->linkedin }}</a>
			  </p>
			</div>
		</div>
		<div class="form-group">
			<label for="website" class="col-sm-4 control-label">
				<img src="/assets/images/ico-website.png" alt="website" width="16"> Sitio Web:
			</label>
			<div class="col-sm-8">
			  <p class="form-control-static">
			  	<a target="_blank" href="{{ $user->profile->website }}">{{ $user->profile->website }}</a>
			  </p>
			</div>
		</div>
	</div>
</div>