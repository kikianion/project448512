<?php
$tag1 = "form_tujuanrpjmd";
?>

<div class="col-lg-4">
	<div class="card card-info card-outline collapsed-card" id="card-tujuan-rpjmd">
		<div class="card-header" data-card-widget="collapse">
			<h5 class="card-title m-0"><b>Tujuan RPJMD</b></h5>
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
				<?php echo form_open('admdata/save_tujuan_rpjmd'); ?>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Misi</label>
					<div class="col-sm-10">
						<select name="misi_id" class="form-control">
							<option value="">Pilih salah satu Misi Aktif</option>
							<?php if (!empty($master_misi)):
								foreach ($master_misi as $misi): ?>
									<option value="<?= $misi->id ?>" <?= (isset($edit_tujuan_rpjmd->misi_id) && $edit_tujuan_rpjmd->misi_id == $misi->id) ? 'selected' : '' ?>>
										<?= htmlspecialchars($misi->namamisi) ?>
									</option>
								<?php endforeach;
							endif; ?>
						</select>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Tujuan</label>
					<div class="col-sm-8">
						<input type="text" name="tujuan" class="form-control" id="tujuanrpjmd" placeholder="Tujuan RPJMD"
							value="<?php echo isset($edit_tujuan_rpjmd->tujuan) ? htmlspecialchars($edit_tujuan_rpjmd->tujuan) : ''; ?>" required
							maxlength="200" />
					</div>
					<div class="col-sm-2">
						<input type="number" name="urut" class="form-control" id="urutantujuan" placeholder="urut"
							value="<?php echo isset($edit_tujuan_rpjmd->urut) ? htmlspecialchars($edit_tujuan_rpjmd->urut) : ''; ?>">
						<input type="hidden" name="id" value="<?php echo isset($edit_tujuan_rpjmd->id) ? htmlspecialchars($edit_tujuan_rpjmd->id) : ''; ?>">
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
			<table id="tabeltujuanrpjmd" class="table table-bordered table-responsive">
				<thead>
					<tr>
						<th>Urut</th>
						<th>Misi</th>
						<th>Tujuan</th>
						<th>Status</th>
						<th>Tindakan</th>
					</tr>
				</thead>
				<tbody>
					<?php if (!empty($tujuan_rpjmd)):
						foreach ($tujuan_rpjmd as $tr): ?>
							<tr>
								<td><?= $tr->urut ?></td>
								<td><?= $tr->namamisi ?></td>
								<td><?= $tr->tujuan ?></td>
								<td><?= $tr->status ?></td>
								<td>
									<div class="btn-group">
										<button type="button" class="btn btn-default">Tindakan</button>
										<button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
											<span class="sr-only"></span>
										</button>
										<div class="dropdown-menu" role="menu">
											<a class="dropdown-item" data-toggle="modal" xdata-target="#edit-tujuanrpjmd" onclick="editModalTujuanRPJMD(<?= $tr->id ?>)">Edit</a>
											<div class="dropdown-divider"></div>
											<a class="dropdown-item" href="<?= site_url('admdata/setStatus_tujuan_rpjmd/' . $tr->id) ?>"
												onclick="return confirm('Apakah Anda yakin ingin mengubah status tujuan RPJMD ini?')">Ubah Status</a>
										</div>
									</div>
								</td>
							</tr>
						<?php endforeach;
					else: ?>
						<tr>
							<td colspan="5">Tidak ada tujuan RPJMD.
							</td>
						</tr>
					<?php endif; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<script>
	function editModalTujuanRPJMD(id) {
		$.ajax({
			url: 'admdata/tujuanRPJMDById/' + id,
			success: function (res) {
				if (res.status === 'success') {
					$('#edit-record-common').appendTo('body').modal('show');
					$('#edit-record-common .modal-body').html($('#form-<?= $tag1 ?>').html());
					$('#edit-record-common .modal-title').html("Edit data tujuan RPJMD");

					$('#edit-record-common select[name=misi_id]').val(res.data.misi_id);
					$('#edit-record-common input[name=tujuan]').val(res.data.tujuan);
					$('#edit-record-common input[name=urut]').val(res.data.urut);
					$('#edit-record-common input[name=id]').val(res.data.id);
				}
			},
		});
	}
</script>

<script>
	// localStorage state management for card collapse/expand
	document.addEventListener('DOMContentLoaded', function () {
		var cardElement = document.getElementById('card-tujuan-rpjmd');
		var collapseButton = cardElement.querySelector('[data-card-widget="collapse"]');
		var maximizeButton = cardElement.querySelector('.btn-fs');
		
		// Restore card state from localStorage
		var cardState = localStorage.getItem('card-tujuan-rpjmd-state');
		if (cardState === 'expanded') {
			cardElement.classList.remove('collapsed-card');
			var icon = collapseButton.querySelector('i');
			if (icon) {
				icon.classList.remove('fa-plus');
				icon.classList.add('fa-minus');
			}
		}
		
		// Restore maximize state from localStorage
		var maximizeState = localStorage.getItem('card-tujuan-rpjmd-maximize');
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
					localStorage.setItem('card-tujuan-rpjmd-state', 'collapsed');
				} else {
					localStorage.setItem('card-tujuan-rpjmd-state', 'expanded');
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
				localStorage.setItem('card-tujuan-rpjmd-maximize', 'restored');
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
				localStorage.setItem('card-tujuan-rpjmd-maximize', 'maximized');
			}
		});
	});
</script>
