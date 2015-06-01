@if (
	$file->mime == 'text/plain' ||
	$file->mime == 'application/vnd.openxmlformats-officedocument.wordprocessingml.document' ||
	$file->mime == 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' ||
	$file->mime == 'application/pdf' ||
	$file->mime == 'application/vnd.openxmlformats-officedocument.presentationml.presentation' ||
	$file->mime == 'application/vnd.openxmlformats-officedocument.presentationml.presentation'
)

documento

@elseif (
		$file->mime == 'image/png' ||
		$file->mime == 'image/jpeg'
	)

imagen

@elseif (
		$file->mime == 'application/octet-stream'
	)

archivo comprimido

@endif