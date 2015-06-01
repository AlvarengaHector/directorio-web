{{-- debo llamar todos los mime de documentos --}}
@if (
		$file->mime == 'text/plain' ||
		$file->mime == 'application/vnd.openxmlformats-officedocument.wordprocessingml.document' ||
		$file->mime == 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' ||
		$file->mime == 'application/pdf' ||
		$file->mime == 'application/vnd.openxmlformats-officedocument.presentationml.presentation' ||
		$file->mime == 'application/vnd.openxmlformats-officedocument.presentationml.presentation' ||
		$file->mime == 'application/octet-stream'
	)

	@include('partials.modal_is_document')

{{-- debo llamar todos los mime de imágenes --}}
@elseif (
		$file->mime == 'image/png' ||
		$file->mime == 'image/jpeg'
	)

	@include('partials.modal_is_image')

@else
	{{ $file->original_filename }}
@endif