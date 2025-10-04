<?php
$tag1 = "form_mastermitra";
?>

<div class="card card-info card-outline collapsed-card">
	<div class="card-header" data-card-widget="collapse">
		<h5 class="card-title m-0"><b>Master Mitra</b></h5>
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
			<?php echo form_open('admsistem/mitra/save'); ?>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Mitra</label>
				<div class="col-sm-8">
					<input type="text" name="namamitra" class="form-control" id="namamitra" placeholder="Masukan Nama Mitra"
						value="<?php echo isset($edit_master_mitra->namamitra) ? htmlspecialchars($edit_master_mitra->namamitra) : ''; ?>" required
						maxlength="50" />
				</div>
				<div class="col-sm-2">
					<input type="number" name="urut" class="form-control" id="urutanmitra" placeholder="urut"
						value="<?php echo isset($edit_master_mitra->urut) ? htmlspecialchars($edit_master_mitra->urut) : ''; ?>">
					<input type="hidden" name="id" value="<?php echo isset($edit_master_mitra->id) ? htmlspecialchars($edit_master_mitra->id) : ''; ?>">
					<input type="hidden" name="tag1" value="<?= $tag1 ?>">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Pimpinan</label>
				<div class="col-sm-10">
					<input type="text" name="kepala" class="form-control" id="pimpinanmitra" placeholder="Nama Pimpinan"
						value="<?php echo isset($edit_master_mitra->kepala) ? htmlspecialchars($edit_master_mitra->kepala) : ''; ?>" maxlength="50">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">NIP/Pang</label>
				<div class="col-sm-5">
					<input type="text" name="nipkepala" class="form-control" id="nip-mitra" placeholder="NIP (196xxxxxxxxxxxx)"
						value="<?php echo isset($edit_master_mitra->nipkepala) ? htmlspecialchars($edit_master_mitra->nipkepala) : ''; ?>" maxlength="50">
				</div>
				<div class="col-sm-5">
					<input type="text" name="pangkepala" class="form-control" id="pangkat-mitra" placeholder="Pangkat (Pembina dll)"
						value="<?php echo isset($edit_master_mitra->pangkepala) ? htmlspecialchars($edit_master_mitra->pangkepala) : ''; ?>" maxlength="50">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jabatan</label>
				<div class="col-sm-10">
					<input type="text" name="jabatan" class="form-control" id="jabatan-mitra" placeholder="Jabatan Pimpinan (Kepala / Plt / dst)"
						value="<?php echo isset($edit_master_mitra->jabatan) ? htmlspecialchars($edit_master_mitra->jabatan) : ''; ?>" maxlength="50">
				</div>
			</div>
			<div class="form-group row">
				<div class="col-sm-2">
					<a href="<?php echo site_url('admsistem'); ?>" class="btn btn-default">Cancel</a>
				</div>
				<div class="col-sm-8"></div>
				<div class="col-sm-2 xtext-right">
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>
			</div>
			<?php echo form_close(); ?>
		</div>
		<hr class="hr hr-blurry">
		</hr>
		<table id="tabelmitra" class="table table-bordered table-responsive">
			<thead>
				<tr>
					<th>urut</th>
					<th>Mitra</th>
					<th>Pimpinan</th>
					<th>NIP</th>
					<th>Pangkat</th>
					<th>Jabatan</th>
					<th>Status</th>
					<th>Tindakan</th>
				</tr>
			</thead>
			<tbody>
				<?php if (!empty($master_mitra)):
					foreach ($master_mitra as $m): ?>
						<tr>
							<td><?php echo htmlspecialchars($m->urut); ?></td>
							<td><?php echo htmlspecialchars($m->namamitra); ?></td>
							<td><?php echo htmlspecialchars($m->kepala); ?></td>
							<td><?php echo htmlspecialchars($m->nipkepala); ?></td>
							<td><?php echo htmlspecialchars($m->pangkepala); ?></td>
							<td><?php echo htmlspecialchars($m->jabatan); ?></td>
							<td><?php echo htmlspecialchars($m->status); ?></td>
							<td>
								<div class="btn-group">
									<button type="button" class="btn btn-default">Tindakan</button>
									<button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
										<span class="sr-only"></span>
									</button>
									<div class="dropdown-menu" role="menu">
										<a class="dropdown-item" data-toggle="modal" xdata-target="#edit-mitra" onclick="editModalMitra(<?= $m->id ?>)">Edit</a>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="<?= site_url('admsistem/mitra/setStatus/' . $m->id) ?>"
											onclick="return confirm('Apakah Anda yakin ingin mengubah status mitra ini?')">Ubah Status</a>
									</div>
								</div>
							</td>
						</tr>
					<?php endforeach;
				else: ?>
					<tr>
						<td colspan="8">Tidak ada mitra.
						</td>
					</tr>
				<?php endif; ?>
			</tbody>
		</table>
	</div>
</div>
<script>
	function editModalMitra(id) {
		$.ajax({
			url: 'admsistem/mitra/mitraById/' + id, // *** CHANGE THIS TO YOUR SERVER URL ***
			success: function (res) {
				if (res.status === 'success') {
					$('#edit-record-common').appendTo('body').modal('show');
					$('#edit-record-common .modal-body').html($('#form-<?= $tag1 ?>').html());
					$('#edit-record-common .modal-title').html("Edit data mitra");

					$('#edit-record-common input[name=namamitra]').val(res.data.namamitra);
					$('#edit-record-common input[name=kepala]').val(res.data.kepala);
					$('#edit-record-common input[name=nipkepala]').val(res.data.nipkepala);
					$('#edit-record-common input[name=pangkepala]').val(res.data.pangkepala);
					$('#edit-record-common input[name=jabatan]').val(res.data.jabatan);
					$('#edit-record-common input[name=status]').val(res.data.status);
					$('#edit-record-common input[name=urut]').val(res.data.urut);
					$('#edit-record-common input[name=id]').val(res.data.id);
				}
			},
		});
	}
</script>
