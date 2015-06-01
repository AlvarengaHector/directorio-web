{!! Form::open(['route' => ['admin.files.destroy', $file], 'method' => 'DELETE']) !!}

	<button type="submit" onclick="return confirm('Seguro que desea eliminar?')" class="btn btn-danger">Eliminar documento</button>

{!! Form::close() !!}