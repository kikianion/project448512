<?php
$tag1 = "form_indikatortujuanrpjmd";
?>

<div class="col-lg-4">
	<div class="card card-info card-outline collapsed-card" id="card-indikator-tujuan-rpjmd">
		<div class="card-header" data-card-widget="collapse">
			<h5 class="card-title m-0"><b>Indikator Tujuan RPJMD</b></h5>
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
				<?php echo form_open('admdata/save_indikator_tujuan_rpjmd'); ?>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Indikator</label>
					<div class="col-sm-10">
						<input type="text" name="indikator" class="form-control" xid="indikator" placeholder="Tuliskan Nama Indikator"
							value="<?php echo isset($edit_indikator_tujuan->indikator) ? htmlspecialchars($edit_indikator_tujuan->indikator) : ''; ?>" required
							maxlength="200" />
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Tujuan RPJMD</label>
					<div class="col-sm-10">
						<select name="tujuan_id" class="form-control">
							<option value="">Pilih salah satu Tujuan RPJMD yang Aktif</option>
							<?php if (!empty($tujuan_rpjmd)):
								foreach ($tujuan_rpjmd as $tujuan): ?>
									<option value="<?= $tujuan->id ?>" <?= (isset($edit_indikator_tujuan->tujuan_id) && $edit_indikator_tujuan->tujuan_id == $tujuan->id) ? 'selected' : '' ?>>
										<?= htmlspecialchars($tujuan->tujuan) ?>
									</option>
								<?php endforeach;
							endif; ?>
						</select>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Satuan</label>
					<div class="col-sm-4">
						<input type="text" name="satuan" class="form-control" xid="satuan" placeholder="Satuan Indikator"
							value="<?php echo isset($edit_indikator_tujuan->satuan) ? htmlspecialchars($edit_indikator_tujuan->satuan) : ''; ?>" maxlength="50">
					</div>
					<label class="col-sm-2 col-form-label">Awal</label>
					<div class="col-sm-4">
						<input type="number" name="kondisi_awal" class="form-control" xid="kondisi_awal" placeholder="Kondisi Awal Periode"
							value="<?php echo isset($edit_indikator_tujuan->kondisi_awal) ? htmlspecialchars($edit_indikator_tujuan->kondisi_awal) : ''; ?>" step="0.01">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Formulasi</label>
					<div class="col-sm-10">
						<textarea name="formulasi" class="form-control" rows="3" placeholder="Formulasi perhitungan indikator"><?php echo isset($edit_indikator_tujuan->formulasi) ? htmlspecialchars($edit_indikator_tujuan->formulasi) : ''; ?></textarea>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Target</label>
					<div class="col-sm-2">
						<input type="number" name="target_1" class="form-control" placeholder="Tahun-1" step="0.01"
							value="<?php echo isset($edit_indikator_tujuan->target_1) ? htmlspecialchars($edit_indikator_tujuan->target_1) : ''; ?>">
					</div>
					<div class="col-sm-2">
						<input type="number" name="target_2" class="form-control" placeholder="Tahun-2" step="0.01"
							value="<?php echo isset($edit_indikator_tujuan->target_2) ? htmlspecialchars($edit_indikator_tujuan->target_2) : ''; ?>">
					</div>
					<div class="col-sm-2">
						<input type="number" name="target_3" class="form-control" placeholder="Tahun-3" step="0.01"
							value="<?php echo isset($edit_indikator_tujuan->target_3) ? htmlspecialchars($edit_indikator_tujuan->target_3) : ''; ?>">
					</div>
					<div class="col-sm-2">
						<input type="number" name="target_4" class="form-control" placeholder="Tahun-4" step="0.01"
							value="<?php echo isset($edit_indikator_tujuan->target_4) ? htmlspecialchars($edit_indikator_tujuan->target_4) : ''; ?>">
					</div>
					<div class="col-sm-2">
						<input type="number" name="target_5" class="form-control" placeholder="Tahun-5" step="0.01"
							value="<?php echo isset($edit_indikator_tujuan->target_5) ? htmlspecialchars($edit_indikator_tujuan->target_5) : ''; ?>">
						<input type="hidden" name="id" value="<?php echo isset($edit_indikator_tujuan->id) ? htmlspecialchars($edit_indikator_tujuan->id) : ''; ?>">
						<input type="hidden" name="tag1" value="<?= $tag1 ?>">
					</div>
				</div>
				<div class="form-group row">
					<div class="col-sm-2">
						<a href="<?php echo site_url('admdata'); ?>" class="btn btn-default">Cancel</a>
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
			<table id="tabelindikatortujuan" class="table table-bordered table-responsive">
				<thead>
					<tr>
						<th>Tujuan</th>
						<th>Indikator</th>
						<th>Satuan</th>
						<th>Kondisi Awal</th>
						<th>Formulasi</th>
						<th>Status</th>
						<th>Tindakan</th>
					</tr>
				</thead>
				<tbody>
					<?php if (!empty($indikator_tujuan_rpjmd)):
						foreach ($indikator_tujuan_rpjmd as $it): ?>
							<tr>
								<td><?php echo htmlspecialchars($it->tujuan); ?></td>
								<td><?php echo htmlspecialchars($it->indikator); ?></td>
								<td><?php echo htmlspecialchars($it->satuan); ?></td>
								<td><?php echo htmlspecialchars($it->kondisi_awal); ?></td>
								<td><?php echo htmlspecialchars(substr($it->formulasi, 0, 50)) . (strlen($it->formulasi) > 50 ? '...' : ''); ?></td>
								<td><?php echo htmlspecialchars($it->status); ?></td>
								<td>
									<div class="btn-group">
										<button type="button" class="btn btn-default">Tindakan</button>
										<button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
											<span class="sr-only"></span>
										</button>
										<div class="dropdown-menu" role="menu">
											<a class="dropdown-item" data-toggle="modal" xdata-target="#edit-indikatortujuan" onclick="editModalIndikatorTujuan(<?= $it->id ?>)">Edit</a>
											<div class="dropdown-divider"></div>
											<a class="dropdown-item" href="<?= site_url('admdata/setStatus_indikator_tujuan/' . $it->id) ?>"
												onclick="return confirm('Apakah Anda yakin ingin mengubah status indikator tujuan ini?')">Ubah Status</a>
										</div>
									</div>
								</td>
							</tr>
						<?php endforeach;
					else: ?>
						<tr>
							<td colspan="7">Tidak ada indikator tujuan RPJMD.
							</td>
						</tr>
					<?php endif; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<script>
	function editModalIndikatorTujuan(id) {
		$.ajax({
			url: 'admdata/indikatorTujuanById/' + id,
			success: function (res) {
				if (res.status === 'success') {
					$('#edit-record-common').appendTo('body').modal('show');
					$('#edit-record-common .modal-body').html($('#form-<?= $tag1 ?>').html());
					$('#edit-record-common .modal-title').html("Edit data indikator tujuan RPJMD");

					$('#edit-record-common input[name=indikator]').val(res.data.indikator);
					$('#edit-record-common select[name=tujuan_id]').val(res.data.tujuan_id);
					$('#edit-record-common input[name=satuan]').val(res.data.satuan);
					$('#edit-record-common input[name=kondisi_awal]').val(res.data.kondisi_awal);
					$('#edit-record-common textarea[name=formulasi]').val(res.data.formulasi);
					$('#edit-record-common input[name=target_1]').val(res.data.target_1);
					$('#edit-record-common input[name=target_2]').val(res.data.target_2);
					$('#edit-record-common input[name=target_3]').val(res.data.target_3);
					$('#edit-record-common input[name=target_4]').val(res.data.target_4);
					$('#edit-record-common input[name=target_5]').val(res.data.target_5);
					$('#edit-record-common input[name=id]').val(res.data.id);
				}
			},
		});
	}
</script>

<script>
	// localStorage state management for card collapse/expand
	document.addEventListener('DOMContentLoaded', function () {
		var cardElement = document.getElementById('card-indikator-tujuan-rpjmd');
		var collapseButton = cardElement.querySelector('[data-card-widget="collapse"]');
		var maximizeButton = cardElement.querySelector('.btn-fs');
		
		// Restore card state from localStorage
		var cardState = localStorage.getItem('card-indikator-tujuan-rpjmd-state');
		if (cardState === 'expanded') {
			cardElement.classList.remove('collapsed-card');
			var icon = collapseButton.querySelector('i');
			if (icon) {
				icon.classList.remove('fa-plus');
				icon.classList.add('fa-minus');
			}
		}
		
		// Restore maximize state from localStorage
		var maximizeState = localStorage.getItem('card-indikator-tujuan-rpjmd-maximize');
		if (maximizeState === 'maximized') {
			cardElement.classList.add('maximized-card');
			maximizeButton.innerHTML = '[__]';
			// Apply maximized styles
			cardElement.style.position = 'fixed';
			cardElement.style.top = '0';
			cardElement.style.left = '0';
			cardElement.style.width = '100vw';
			cardElement.style.height = '100vh';
			cardElement.style.zIndex = '9999';
			cardElement.style.margin = '0';
		}
		
		// Handle collapse/expand state saving
		collapseButton.addEventListener('click', function() {
			setTimeout(function() {
				if (cardElement.classList.contains('collapsed-card')) {
					localStorage.setItem('card-indikator-tujuan-rpjmd-state', 'collapsed');
				} else {
					localStorage.setItem('card-indikator-tujuan-rpjmd-state', 'expanded');
				}
			}, 300); // Wait for animation to complete
		});
		
		// Handle maximize/restore functionality
		maximizeButton.addEventListener('click', function() {
			if (cardElement.classList.contains('maximized-card')) {
				// Restore
				cardElement.classList.remove('maximized-card');
				maximizeButton.innerHTML = '[&nbsp;&nbsp;]';
				cardElement.style.position = '';
				cardElement.style.top = '';
				cardElement.style.left = '';
				cardElement.style.width = '';
				cardElement.style.height = '';
				cardElement.style.zIndex = '';
				cardElement.style.margin = '';
				localStorage.setItem('card-indikator-tujuan-rpjmd-maximize', 'restored');
			} else {
				// Maximize
				cardElement.classList.add('maximized-card');
				maximizeButton.innerHTML = '[__]';
				cardElement.style.position = 'fixed';
				cardElement.style.top = '0';
				cardElement.style.left = '0';
				cardElement.style.width = '100vw';
				cardElement.style.height = '100vh';
				cardElement.style.zIndex = '9999';
				cardElement.style.margin = '0';
				localStorage.setItem('card-indikator-tujuan-rpjmd-maximize', 'maximized');
			}
		});
	});
</script>
