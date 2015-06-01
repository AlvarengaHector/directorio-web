@extends('app')

@section('title', 'Editar perfil')

@section('content')

	<div class="container">
		<div class="row">
			@include('admin.users.partials.messages')
			<div class="col-md-4">
				<div class="thumbnail profile-picture-thumbnail">
					<img class="profile-picture" src="{{ $user->profile->picture_path }}" width="225">
					<span class="hidden"></span>
					<a href="#" data-toggle="modal" data-target=".change-picture">
						<span class="glyphicon glyphicon-camera" aria-hidden="true"></span> 
						<span class="active">Actualizar foto de perfil</span>
					</a>
					<div class="modal fade change-picture" tabindex="-1" role="dialog" aria-labelledby="mychangepicture" aria-hidden="true">
						<div class="modal-dialog modal-xs">
							{!! Form::model($profile, ['route' => ['send_picture', $profile], 'files' => 'true', 'method' => 'POST', 'class' => 'navbar-form']) !!}
								
								<div class="modal-content">
									<div class="modal-body">
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label for="picture">Escoga la imagen de perfil</label>
													{!! Form::file('picture', ['class' => 'form-controll']) !!}
													<p class="help-block">Example block-level help text here.</p>
												</div>
											</div>
										</div>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
										<button type="submit" class="btn btn-primary">Guardar</button>
									</div>
								</div><!-- modal-content -->

							{!! Form::close() !!}
						</div><!-- modal-dialog -->
					</div><!-- modal -->
				</div>
			</div>
			<div class="col-md-8">
				{!! Form::model($profile, ['route' => ['admin.profile.update', $profile], 'method' => 'PUT']) !!}
				<div class="jumbotron">
					<div class="container">
						<h2>{{ $user->full_name }}</h2>
						<p class="profile-bio">
							{{ $user->profile->bio }}
							<a href="#" class="edit-bio btn btn-link btn-sm" data-toggle="tooltip" data-placement="right" title="Editar biografía">
								<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
							</a>
						</p>
						<div class="form-group hidden">
							{!! Form::textarea('bio', null, ['class' => 'form-control', 'rows' => '3']) !!}
							<button type="submit" class="btn btn-default pull-right btn-xs">
								<span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span>
								Guardar cambios
							</button>
							<button type="button" class="cancel-edit-bio btn btn-default pull-right btn-xs">
								<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
								Cancelar
							</button>
						</div>
					</div>
				</div>
				{!! Form::close() !!}
			</div>
		</div>
		<div class="row">
			
			{!! Form::model($user, ['route' => ['admin.profile.update', $user], 'method' => 'PUT']) !!}

				@include('admin.usersprofile.partials.fields')
				
				<div class="col-md-12">
					<a href="{{ url('/admin/users') }}" class="btn btn-primary pull-left">
						<span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>
						Regresar
					</a>
					<button type="submit" class="btn btn-primary pull-right">
						<span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span>
						Guardar
					</button>
				</div>

			{!! Form::close() !!}
		</div>
		<p>&nbsp;</p>
	</div>

@endsection