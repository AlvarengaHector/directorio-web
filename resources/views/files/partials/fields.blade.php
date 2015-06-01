<div class="form-group">
	{!! Form::label('name', 'Nombre de documento: ', ['class' => 'col-sm-4 control-label']) !!}
    <div class="col-sm-8">
      <p class="form-control-static">{{ $file->name }}</p>
    </div>
</div>
<div class="form-group">
	{!! Form::label('file', 'Archivo: ', ['class' => 'col-sm-4 control-label']) !!}
	<div class="col-sm-8">
      <p class="form-control-static">{{ $file->original_filename }}</p>

      @if (Storage::exists($file->original_filename))
      	<em><a href="/page/storage/{{ $file->original_filename }}">Descargar</a></em>
      @else
      	<div class="alert alert-warning" role="alert">
      		El archivo ha sido eliminado de nuestro sistema. Por lo tanto no se puede descargar.
      	</div>
      @endif

    </div>
</div>
<div class="form-group">
	{!! Form::label('description', 'Descripción de documento: ', ['class' => 'col-sm-4 control-label']) !!}
	<div class="col-sm-8">
      <p class="form-control-static">{{ $file->description }}</p>
    </div>
</div>
<div class="form-group">
	{!! Form::label('size', 'Tamaño: ', ['class' => 'col-sm-4 control-label']) !!}
	<div class="col-sm-8">
      <p class="form-control-static">{{ Format::bytes($file->size) }}</p>
    </div>
</div>
<div class="form-group">
	{!! Form::label('date', 'Fecha de Creación: ', ['class' => 'col-sm-4 control-label']) !!}
	<div class="col-sm-8">
      <p class="form-control-static">{{ date('F d, Y', strtotime($file->created_at)) }}</p>
    </div>
</div>