<script>
	// $('.btn-danger').click(function() {
	// 	var data = document.getElementById(this).getAttribute('aria-data');
	// 	alert(data);
	// 	$('#modelId').modal('show');
	// });

	function batal(id) {
		$('#modelId').modal('show');
		$('#vid').val(id);
	}
</script>

<!-- Modal -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Penolakan Pembayaran</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?= base_url('admin/batal'); ?>" method="post">
					<input type="hidden" name="vid" id="vid">
					<div class="form-group">
					  <label for="alasan">Alasan Penolakan</label>
					  <input type="text" class="form-control" name="alasan" id="alasan" aria-describedby="helpId" placeholder="Alasan Penolakan">
					</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Save</button></form>
			</div>
		</div>
	</div>
</div>
