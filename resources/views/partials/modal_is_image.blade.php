<a href="#" data-toggle="modal" data-target=".gallery-modal-file00{{ $file->id }}">
	<img src="/page/storage/{{ $file->original_filename }}" class="img-responsive" style="display:inline-block;vertical-align:middle;" width="32">
	<span style="display:inline-block;vertical-align:middle;">{{ $file->original_filename }}</span>
</a>
{{-- modal --}}
<div class="modal fade modal-fullscreen gallery-modal-file00{{ $file->id }}" role="dialog" aria-labelledby="gallery" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">&nbsp;</h4>
			</div>
			<div class="modal-body">
				<div class="container-fluid">
					<div class="row inside-modal">
						<img class="img-responsive" src="/page/storage/{{ $file->original_filename }}">
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<p class="pull-left">{{ $file->original_filename }}</p>
				<ul class="nav">
					<li>
	        			<a href="/page/storage/{{ $file->original_filename }}" class="pull-right">
	        				<span class="glyphicon glyphicon-save" aria-hidden="true"></span> 
	        				Descargar
	        			</a>
					</li>
					<li>
			        	<a href="#" class="pull-right">
			        		<span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span> 
			        		Ver imagen real
			        	</a>
					</li>
				</ul>
	        </div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->