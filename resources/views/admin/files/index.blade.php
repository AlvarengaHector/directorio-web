@extends('app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-2">
			<ul class="nav nav-pills nav-stacked">
				<li class="home-item">
					<a href="#"><span class="ico-home glyphicon glyphicon-home" aria-hidden="true"></span></a>
				</li>
				<li class="active">
					<a href="{{ url('/admin/files') }}">
						<span class="glyphicon glyphicon-file" aria-hidden="true"></span>
						Archivos
					</a>
				</li>
				<li>
					<a href="{{ url('/admin/photos') }}">
						<span class="glyphicon glyphicon-picture" aria-hidden="true"></span>
						Fotos
					</a>
				</li>
			</ul>
		</div>
		<div class="col-md-10">
			<h2>Archivos</h2>

			@include('admin.users.partials.messages')
				
			@include('admin.files.partials.filter')
			
			<p>Hay {{ $files->total() }} archivos</p>
			
			@include('admin.files.partials.table')

			{!! $files->appends(Request::only(['name']))->render() !!}
		</div>
	</div>
</div>

{{-- for ajax delete button --}}
{!! Form::open(['route' => ['admin.files.destroy', ':ELEMENT_ID'], 'method' => 'DELETE', 'id' => 'form-delete']) !!}
{!! Form::close() !!}

@endsection

