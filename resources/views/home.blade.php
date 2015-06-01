@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Página principal</div>

				<div class="panel-body">
					@if (Auth::user()->type == 'admin')
						@include('home.admin')
					@else
						@include('home.user')
					@endif
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
