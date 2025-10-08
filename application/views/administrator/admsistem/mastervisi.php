<?php
$tag1 = "form_mastervisi";
?>

<div class="card card-info card-outline collapsed-card">
	<div class="card-header" data-card-widget="collapse">
		<h5 class="card-title m-0"><b>Master Visi</b></h5>
		<div class="card-tools">
			<button type="button" class="btn btn-tool btn-fs" xdata-card-widget="collapse">
				[&nbsp;&nbsp;]
			</button>

			<button type="button" class="btn btn-tool" data-card-widget="collapse">
				<i class="fas fa-plus"></i>
			</button>
		</div>
	</div>
	<div class="card-body">
		<?= widget_flash($tag1) ?>

		<div id="form-<?= $tag1 ?>">

			<form method="post" action="<?php echo site_url('admsistem/visi/save'); ?>">
				<div class="form-group row">
					<label for="visi" class="col-sm-2 col-form-label">Visi</label>
					<div class="col-sm-10">
						<textarea class="form-control" id="visi" name="visi" rows="3"
							placeholder="Visi Bupati"><?php echo htmlspecialchars($this->session->flashdata('old_visi') ?: ''); ?></textarea>
						<input type="hidden" name="tag1" value="<?= $tag1 ?>">
						<input type="hidden" name="id">
					</div>
				</div>
				<div class="form-group row">
					<div class="col-sm-2">
						<a href="<?php echo site_url('admsistem'); ?>" class="btn btn-default float-right">Cancel</a>
					</div>
					<div class="col-sm-8">
					</div>
					<div class="col-sm-2">
						<button type="submit" class="btn btn-primary">Simpan</button>
					</div>
				</div>
			</form>
		</div>

		<hr class="hr hr-blurry">
		</hr>
		<table id="tabelvisi" class="table table-bordered table-responsive table-data-init">
			<thead>
				<tr>
					<th>Visi</th>
					<th>Status</th>
					<th>Tindakan</th>
				</tr>
			</thead>
			<tbody>
				<?php if (!empty($visi_list) && is_array($visi_list)): ?>
					<?php foreach ($visi_list as $visi): ?>
						<tr>
							<td class="align-middle"><?= htmlspecialchars($visi->visi) ?></td>
							<td class="align-middle"><?= $visi->status ?></td>
							<td class="align-middle">
								<div class="btn-group">
									<button type="button" class="btn btn-default">Tindakan</button>
									<button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
										<span class="sr-only"></span>
									</button>
									<div class="dropdown-menu" role="menu">
										<a class="dropdown-item" data-toggle="modal" onclick="editModalVisi(<?= $visi->id ?>)">Edit</a>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="<?= site_url('admsistem/visi/setStatus/' . $visi->id) ?>">Ubah Status</a>
									</div>
								</div>
							</td>
						</tr>
					<?php endforeach; ?>
				<?php else: ?>
					<tr>
						<td colspan="3">Belum ada data visi.</td>
					</tr>
				<?php endif; ?>
		</table>
	</div>
</div>

<script>
	function editModalVisi(id) {
		$.ajax({
			url: 'admsistem/visi/byId/' + id,
			success: function (res) {
				if (res.status === 'success') {
					$('#edit-record-common').appendTo('body').modal('show');
					$('#edit-record-common .modal-body').html($('#form-<?= $tag1 ?>').html());
					$('#edit-record-common .modal-title').html('Edit data visi');
					$('#edit-record-common textarea[name=visi]').val(res.data.visi);
					$('#edit-record-common input[name=id]').val(res.data.id);
				}
			},
		});
	}
</script>
