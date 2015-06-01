{!! Form::open(['route' => 'send', 'method' => 'post']) !!}
	<div class="form-group">
		{!! Form::hidden('email', Auth::user()->email) !!}
		{!! Form::hidden('user', Auth::user()->full_name) !!}
		{!! Form::hidden('filename', $file->original_filename) !!}
		{!! Form::hidden('created_at', $file->created_at) !!}
	</div>
	<div class="form-group">
		{!! Form::label('subject', 'Asunto') !!}
		{!! Form::text('subject', null, ['class' => 'form-control' ]) !!}
	</div>
	<div class="form-group">
		{!! Form::label('body', 'Mensaje') !!}
		{!! Form::textarea('body', null, ['class' => 'form-control' ]) !!}
	</div>
	<div class="form-group">
		{!! Form::submit('Enviar', ['class' => 'btn btn-primary ' ] ) !!}
	</div>
{!! Form::close() !!}