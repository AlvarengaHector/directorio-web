{{-- Actualmente deshabilitad --}}

@extends('app')
@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading"><h3 class="panel-title">Forumulario de Consulta</h3></div>
				<div class="panel-body">

					<p>Formulario para realizar una consulta de un documento.</p>

					@include('partials.messages')

					@include('ask.partials.fields')


				</div>
			</div>
		</div>
		<div class="col-md-4 pull-right">
			<div class="panel panel-primary">
				<div class="panel-heading"><h3 class="panel-title">Escoger Documento</h3></div>
				<div class="panel-body" style="max-height: 250px">
					@foreach ($files as $file)
						<div class="checkbox">
						  <label>
						    <input type="checkbox" value="">
						    {{ $file->original_filename }}
						  </label>
						</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>

@endsection