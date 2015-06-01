<a href="#" data-toggle="modal" data-target=".documents-modal-file00{{ $file->id }}">
	<img src="/assets/images/placeholder_white.png" alt="" class="img-responsive" style="display:inline-block;vertical-align:middle;" width="32">
	<span style="display:inline-block;vertical-align:middle;">{{ $file->original_filename }}</span>
</a>
{{-- modal --}}
<div class="modal fade documents-modal-file00{{ $file->id }}" role="dialog" aria-labelledby="documents" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="documents">{{ $file->original_filename }}</h4>
			</div>
			<div class="modal-body">
				<div class="container-fluid">
					<div class="row inside-modal">
						<img src="/assets/images/placeholder_white.png">
						<p>{{ $file->original_filename }}</p>
						<div class="detalles">
							<p>{{ date('m/d/Y g:i', strtotime($file->created_at)) }} - {{ Format::bytes($file->size) }}</p>
						</div>
						@if ($file->mime == 'application/pdf')
							<a target="_blank" href="{{ route('pdf_viewer', $file) }}" class="btn btn-default">Abrir</a>
						@endif
						<a href="/page/storage/{{ $file->original_filename }}" class="btn btn-primary">Descargar</a>

					</div>
				</div>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->