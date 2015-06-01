@extends('app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-2">
			<ul class="nav nav-pills nav-stacked">
				<li class="home-item">
					<a href="#"><span class="ico-home glyphicon glyphicon-home" aria-hidden="true"></span></a>
				</li>
				<li>
					<a href="{{ url('/page/files') }}">
						<span class="glyphicon glyphicon-file" aria-hidden="true"></span>
						Archivos
					</a>
				</li>
				<li class="active">
					<a href="{{ url('/page/photos') }}">
						<span class="glyphicon glyphicon-picture" aria-hidden="true"></span>
						Fotos
					</a>
				</li>
			</ul>
		</div>
		<div class="col-md-10">
			<h1>Fotos</h1>

			<hr>

			@include('partials.messages')


				<div class="row gallery-photos">
					@foreach ($files as $file)

						@if (count($files) > 1)
							<div class="col-xs-6 col-md-3">
							    <a href="#" class="thumbnail">
							      <img src="/page/storage/{{ $file->original_filename }}" style="width: 100%;">
							    </a>
					  		</div>
					  	@else
					  		<p>No se encontraron imágenes.</p>
						@endif
						
					@endforeach
				</div>


				{!! $files->appends(Request::only(['name']))->render() !!}
		</div>
	</div>
</div>

@endsection

