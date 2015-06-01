@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Subir archivos</div>
				<div class="panel-body">

					@include('admin.users.partials.messages')

					{!! Form::open(['route' => 'admin.files.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

						@include('admin.files.partials.fields')
						
						<button type="submit" class="btn btn-primary">Agregar archivo y guardar</button>
						{{-- <button type="submit" class="btn btn-default">Guardar</button> --}}
						<a href="{{ route('admin.files.index') }}" class="btn btn-default pull-right">Cancelar</a>

					{!! Form::close() !!}
					
					
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
