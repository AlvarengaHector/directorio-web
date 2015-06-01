<table class="table table-striped table-hover">
	<thead>
		<tr>
			<th>Nombre</th>
			<th>Tipo</th>
			<th>Modificado</th>
			<th>Acciones</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($files as $file)
			<tr data-id="{{ $file->id }}">
				<td>
					@include('partials.files_name_document')
				</td>
				{{-- <td>{{ $file->mime }}</td> --}}
				<td>
					@include('partials.files_type_document')
				</td>
				<td>{{ date('m/d/Y g:i', strtotime($file->updated_at)) }}</td>
				<td>
					<a href="{{ route('admin.files.edit', $file) }}">Editar</a>
					<a href="" class="btn-delete">Eliminar</a>
				</td>
			</tr>
		@endforeach
	</tbody>
</table>