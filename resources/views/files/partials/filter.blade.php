{!! Form::model(Request::all(), ['route' => 'page.files.index', 'method' => 'GET', 'class' => 'navbar-form navbar-left pull-right', 'role' => 'search']) !!}
  <div class="form-group">
  	{!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre de archivo']) !!}
  	{{-- {!! Form::select('type', config('options.types'), null, ['class' => 'form-control']) !!} --}}
  </div>
  <button type="submit" class="btn btn-default">Buscar</button>
{!! Form::close() !!}