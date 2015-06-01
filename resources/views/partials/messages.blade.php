@if ($errors->any())
	<div class="alert alert-danger" role="alert">
		<p>{{ trans('validation.error_message') }}</p>
		
		<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
@endif

{{-- mensajes de session --}}
@if (Session::has('message'))
	<p class="alert alert-success">
		{{ Session::get('message') }}
	</p>
@endif