@extends('app')

@section('title', 'Editar perfil')

@section('content')

	<div class="container">
		<div class="row">
			@include('admin.users.partials.messages')
			<div class="col-md-4">
				<div class="thumbnail profile-picture-thumbnail">
					<img class="profile-picture" src="{{ $user->profile->picture_path }}" width="225">
				</div>
			</div>
			<div class="col-md-8">
				<div class="jumbotron">
					<div class="container">
						<h2>{{ $user->full_name }}</h2>
						<p class="profile-bio">
							{{ $user->profile->bio }}
						</p>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			
			{!! Form::model($user, ['class' => 'form-horizontal'], ['route' => ['admin.profile.update', $user], 'method' => 'PUT']) !!}

				@include('usersprofile.partials.fields')
				
				<div class="col-md-12">
					<a href="#" class="btn btn-default">
						<span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>
						Regresar
					</a>
				</div>

			{!! Form::close() !!}
		</div>
		<p>&nbsp;</p>
	</div>

@endsection