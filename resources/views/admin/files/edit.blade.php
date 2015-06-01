@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Editar Documento: {{ $file->name }}</div>
				<div class="panel-body">

					@include('admin.users.partials.messages')
					
					{!! Form::model($file, ['route' => ['admin.files.update', $file], 'method' => 'PUT']) !!}

							@include('admin.files.partials.fields')
						
							<button type="submit" class="btn btn-primary">Actualizar documento</button>

					{!! Form::close() !!}

				</div>
			</div>
			
			@include('admin.files.partials.delete')
		</div>
	</div>
</div>
@endsection
