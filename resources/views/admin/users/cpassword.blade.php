@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Cambiar Contraseña</div>
				<div class="panel-body">
					
					@include('admin.users.partials.messages')
					
					{!! Form::open(['route' => 'admin.users.cpassword', 'method' => 'POST']) !!}

							<div class="form-group">
								{!! Form::label('password', 'Clave actual') !!}
								{!! Form::text('password', ['class' => 'form-control']) !!}
							</div>
							<div class="form-group">
								{!! Form::label('password', 'Contraseña') !!}
								{!! Form::password('password', ['class' => 'form-control']) !!}
							</div>
							<div class="form-group">
								{!! Form::label('password', 'Confirmar contraseña') !!}
								{!! Form::text('password', ['class' => 'form-control']) !!}
							</div>
						
							<button type="submit" class="btn btn-primary">Cambiar contraseña</button>

					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
