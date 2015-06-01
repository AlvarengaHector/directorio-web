<div class="form-group">
	{!! Form::label('name', 'Nombre de documento') !!}
	{!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
	{!! Form::label('file', 'Subir archivo') !!}
	{!! Form::file('file', ['class' => 'form-control']) !!}
	<p class="help-block">Example block-level help text here.</p>
</div>
<div class="form-group">
	{!! Form::label('description', 'Descripción de documento') !!}
	{!! Form::textarea('description', null, ['class' => 'form-control', 'rows' => '5']) !!}
</div>