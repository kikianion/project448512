<?php
$tag1 = "form_masteropd";
?>

<div class="card card-info card-outline collapsed-card">
	<div class="card-header" data-card-widget="collapse">
		<h5 class="card-title m-0"><b>Master OPD</b></h5>
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
			<?php echo form_open('admsistem/save_master_opd'); ?>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">OPD</label>
				<div class="col-sm-8">
					<input type="text" name="namaopd" class="form-control" id="namaopd" placeholder="Masukan Nama OPD" value="<?php echo isset($edit_master_opd->namaopd) ? htmlspecialchars($edit_master_opd->namaopd) : ''; ?>" required maxlength="50" />
				</div>
				<div class="col-sm-2">
					<input type="number" name="urut" class="form-control" id="urutanopd" placeholder="urut" value="<?php echo isset($edit_master_opd->urut) ? htmlspecialchars($edit_master_opd->urut) : ''; ?>">
					<input type="hidden" name="id" value="<?php echo isset($edit_master_opd->id) ? htmlspecialchars($edit_master_opd->id) : ''; ?>">
					<input type="hidden" name="tag1" value="<?= $tag1 ?>">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Mitra</label>
				<div class="col-sm-10">
					<select name="mitra_id" class="form-control" required>
						<option value="">Pilih salah satu Mitra yang Aktif</option>
						<?php if (!empty($master_mitra)):
							foreach ($master_mitra as $m): ?>
								<option value="<?php echo $m->id; ?>" <?php echo (isset($edit_master_opd->mitra_id) && $edit_master_opd->mitra_id == $m->id) ? 'selected' : ''; ?>>
									<?php echo htmlspecialchars($m->namamitra); ?>
								</option>
							<?php endforeach;
						endif; ?>
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Pimpinan</label>
				<div class="col-sm-10">
					<input type="text" name="kepala" class="form-control" id="pimpinanopd" placeholder="Nama Pimpinan" value="<?php echo isset($edit_master_opd->kepala) ? htmlspecialchars($edit_master_opd->kepala) : ''; ?>" maxlength="50">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">NIP/Pang</label>
				<div class="col-sm-5">
					<input type="text" name="nipkepala" class="form-control" id="nip-opd" placeholder="NIP (196xxxxxxxxxxxx)" value="<?php echo isset($edit_master_opd->nipkepala) ? htmlspecialchars($edit_master_opd->nipkepala) : ''; ?>" maxlength="50">
				</div>
				<div class="col-sm-5">
					<input type="text" name="pangkepala" class="form-control" id="pangkat-opd" placeholder="Pangkat (Pembina dll)" value="<?php echo isset($edit_master_opd->pangkepala) ? htmlspecialchars($edit_master_opd->pangkepala) : ''; ?>" maxlength="50">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jabatan</label>
				<div class="col-sm-10">
					<input type="text" name="jabatan" class="form-control" id="jabatan-opd" placeholder="Jabatan Pimpinan (Kepala / Plt / dst)" value="<?php echo isset($edit_master_opd->jabatan) ? htmlspecialchars($edit_master_opd->jabatan) : ''; ?>" maxlength="50">
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
		<table id="tabelopd" class="table table-bordered table-responsive">
			<thead>
				<tr>
					<th>Urut</th>
					<th>Nama OPD</th>
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
				<?php if (!empty($master_opd)):
					foreach ($master_opd as $o): ?>
						<tr>
							<td><?php echo htmlspecialchars($o->urut); ?></td>
							<td><?php echo htmlspecialchars($o->namaopd); ?></td>
							<td><?php
							// Find mitra name by ID
							$mitra_name = '';
							if (!empty($master_mitra)) {
								foreach ($master_mitra as $m) {
									if ($m->id == $o->mitra) {
										$mitra_name = $m->namamitra;
										break;
									}
								}
							}
							echo htmlspecialchars($mitra_name);
							?></td>
							<td><?php echo htmlspecialchars($o->kepala); ?></td>
							<td><?php echo htmlspecialchars($o->nipkepala); ?></td>
							<td><?php echo htmlspecialchars($o->pangkepala); ?></td>
							<td><?php echo htmlspecialchars($o->jabatan); ?></td>
							<td><?php echo htmlspecialchars($o->status); ?></td>
							<td>
								<div class="btn-group">
									<button type="button" class="btn btn-default">Tindakan</button>
									<button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
										<span class="sr-only"></span>
									</button>
									<div class="dropdown-menu" role="menu">
										<a class="dropdown-item" data-toggle="modal" xdata-target="#edit-mitra" onclick="editModalOPD(<?= $o->id ?>)">Edit</a>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="<?= site_url('admsistem/setStatus_opd/' . $o->id) ?>" onclick="return confirm('Apakah Anda yakin ingin mengubah status OPD ini?')">
											Ubah Status</a>
									</div>
								</div>
							</td>
						</tr>
					<?php endforeach;
				else: ?>
					<tr>
						<td colspan="9">Tidak ada OPD.</td>
					</tr>
				<?php endif; ?>
			</tbody>
		</table>
	</div>
</div>
<script>
	function editModalOPD(id) {

		$.ajax({
			url: 'admsistem/opdById/' + id, // *** CHANGE THIS TO YOUR SERVER URL ***
			success: function (res) {
				if (res.status === 'success') {
					$('#edit-record-common').appendTo('body').modal('show');
					$('#edit-record-common .modal-body').html($('#form-<?= $tag1 ?>').html());
					$('#edit-record-common .modal-title').html("Edit data OPD");

					$('#edit-record-common input[name=namaopd]').val(res.data.namaopd);
					$('#edit-record-common select[name=mitra_id]').val(res.data.mitra);
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

<script>
	document.addEventListener('DOMContentLoaded', function () {
		var f1 = document.querySelectorAll('#form-form_masteropd input');
		// console.log(f1);
		// if (f1.length > 0) {
		//   f1[0].value = "sandi";
		//   f1[1].value = 11;
		//   // f1[2].value = "01112121212";
		//   f1[4].value = "PLT1";
		//   f1[5].value = "dsfewfewf";
		//   f1[6].value = "dddgfdsf";
		//   f1[7].value = "45gt54";
		// }
	});
</script>
