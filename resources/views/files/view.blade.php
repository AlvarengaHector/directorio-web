@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-primary">
				<div class="panel-heading">Detalle de Documento: {{ $file->name }}</div>
				<div class="panel-body">

					{!! Form::model($file, ['class' => 'form-horizontal'], ['route' => ['admin.files.update', $file], 'method' => 'PUT']) !!}

							<div class="col-md-9">
								@include('files.partials.fields')
							</div>
							<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">

								@if (Storage::exists($file->original_filename) && $file->mime == 'image/png' || $file->mime == 'image/jpeg')

										<a href="#" class="thumbnail" data-toggle="modal" data-target="#myModal">
											<img src="/page/storage/{{ $file->original_filename }}" data-toggle="tooltip" data-placement="top" title="Vista previa">
										</a>

										<!-- Modal -->
										<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
										  <div class="modal-dialog">
										    <div class="modal-content">
										      <div class="modal-body">
										        <img src="/page/storage/{{ $file->original_filename }}" style="width: 100%;">
										      </div>
										    </div>
										  </div>
										</div>

								@endif
							</div>

					{!! Form::close() !!}

				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">Realizar consulta de este documento</div>
				<div class="panel-body">
					@include('partials.messages')

					@include('ask.partials.fields')
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
