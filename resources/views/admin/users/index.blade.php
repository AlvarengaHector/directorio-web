@extends('app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Usuarios</div>

				@include('admin.users.partials.messages')

				<div class="panel-body">
					
					@include('admin.users.partials.filter')

					<p>
						<a href="{{ route('admin.users.create') }}" class="btn btn-info" role="button">
							Crear Usuario
						</a>
					</p>
					
					<p>Hay {{ $users->total() }} usuarios</p>
					
					@include('admin.users.partials.table')

					{!! $users->appends(Request::only(['name', 'type']))->render() !!}
				</div>
			</div>
		</div>
	</div>
</div>

{!! Form::open(['route' => ['admin.users.destroy', ':ELEMENT_ID'], 'method' => 'DELETE', 'id' => 'form-delete']) !!}
{!! Form::close() !!}

@endsection

