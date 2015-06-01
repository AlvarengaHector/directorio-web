<table class="table table-striped table-hover">
	<thead>
		<tr>
			<th>#</th>
			<th>Nombre</th>
			<th>Email</th>
			<th>Tipo</th>
			<th>Acciones</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($users as $user)
			<tr data-id="{{ $user->id }}">
				<td>{{ $user->id }}</td>
				<td>
					<a href="{{ route('page.profile.show', $user) }}">{{ $user->full_name }}</a>
				</td>
				<td>{{ $user->email }}</td>
				{{-- <td>{{ $user->type }}</td> --}}
				<td>
					@if ($user->type == 'admin')
						Administrador
					@elseif($user->type == 'user')
						Usuario
					@endif
				</td>
				<td>
					<a href="{{ route('admin.users.edit', $user) }}">Editar</a>
					<a href="" class="btn-delete">Eliminar</a>
				</td>
			</tr>
		@endforeach
	</tbody>
</table>