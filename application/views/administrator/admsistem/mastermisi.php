<?php
$tag1 = "form_mastermisi";
?>

<div class="card card-info card-outline collapsed-card">
	<div class="card-header" data-card-widget="collapse">
		<h5 class="card-title m-0"><b>Master Misi</b></h5>
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
		<?php $tag1 = 'form_mastermisi'; ?>
		<?= widget_flash($tag1) ?>

		<div id="form-<?= $tag1 ?>">
			<form method="post" action="<?php echo site_url('admsistem/misi/save'); ?>">
				<div class="form-group row">
					<label for="misi" class="col-sm-2 col-form-label">Misi</label>
					<div class="col-sm-8">
						<textarea class="form-control" id="misi" name="misi" rows="2"
							placeholder="Masukan Misi"><?php echo htmlspecialchars($this->session->flashdata('old_misi') ?: ''); ?></textarea>
						<input type="hidden" name="tag1" value="<?= $tag1 ?>">
						<input type="hidden" name="id">
					</div>
					<div class="col-sm-2">
						<input type="number" class="form-control" id="urut" name="urut" placeholder="urut"
							value="<?php echo htmlspecialchars($this->session->flashdata('old_urut') ?: ''); ?>">
					</div>
				</div>
				<div class="form-group row">
					<label for="visi_id" class="col-sm-2 col-form-label">Visi</label>
					<div class="col-sm-10">
						<?= expandFieldAttrSelectActive("visi_id", $visi_list, "visi") ?>
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
		<table id="tabelmisi" class="table table-bordered table-responsive">
			<thead>
				<tr>
					<th>Urut</th>
					<th>Misi</th>
					<th>Visi</th>
					<th>Status</th>
					<th>Tindakan</th>
				</tr>
			</thead>
			<tbody>
				<?php if (!empty($misi_list) && is_array($misi_list)): ?>
					<?php foreach ($misi_list as $misi): ?>
						<tr>
							<td class="align-middle"><?php echo (int) $misi->urut; ?></td>
							<td class="align-middle"><?php echo htmlspecialchars($misi->misi); ?></td>

							<td class="align-middle">
								<?php
								$visi_name = '';
								if (!empty($visi_list)) {
									foreach ($visi_list as $v) {
										if ($v->id == $misi->visi_id) {
											$visi_name = $v->visi;
											break;
										}
									}
								}
								echo htmlspecialchars($visi_name);

								?>
							</td>

							<td class="align-middle"><?= $misi->status ?></td>
							<td class="align-middle">
								<div class="btn-group">
									<button type="button" class="btn btn-default">Tindakan</button>
									<button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
										<span class="sr-only"></span>
									</button>
									<div class="dropdown-menu" role="menu">
										<a class="dropdown-item" data-toggle="modal" onclick="editModalMisi(<?= $misi->id ?>)">Edit</a>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="<?= site_url('admsistem/misi/setStatus/' . $misi->id) ?>">Ubah Status</a>
									</div>
								</div>
							</td>
						</tr>
					<?php endforeach; ?>
				<?php else: ?>
					<tr>
						<td colspan="5">Belum ada data misi.</td>
					</tr>
				<?php endif; ?>
			</tbody>
		</table>
		<script>
			function editModalMisi(id) {
				$.ajax({
					url: 'admsistem/misi/byId/' + id,
					success: function (res) {
						if (res.status === 'success') {
							$('#edit-record-common').appendTo('body').modal('show');
							$('#edit-record-common .modal-body').html($('#form-<?= $tag1 ?>').html());
							$('#edit-record-common .modal-title').html('Edit data misi');
							$('#edit-record-common textarea[name=misi]').val(res.data.misi);
							$('#edit-record-common input[name=id]').val(res.data.id);
							$('#edit-record-common input[name=urut]').val(res.data.urut);
							$('#edit-record-common select[name=visi_id]').val(res.data.visiinduk);
						}
					},
				});
			}
		</script>
	</div>
</div>
