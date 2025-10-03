<?php
$tag1 = "form_masterprogram";
?>

<div class="col-lg-4">
	<div class="card card-info card-outline collapsed-card" id="card-master-program">
		<div class="card-header" data-card-widget="collapse">
			<h5 class="card-title m-0"><b>Master Program</b></h5>
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
				<?php echo form_open('admdata/save_master_program'); ?>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Program</label>
					<div class="col-sm-8">
						<input type="text" name="namaprogram" class="form-control" id="namaprogram" placeholder="Masukan Nama Program"
							value="<?php echo isset($edit_master_program->namaprogram) ? htmlspecialchars($edit_master_program->namaprogram) : ''; ?>" required
							maxlength="50" />
					</div>
					<div class="col-sm-2">
						<input type="text" name="kode" class="form-control" id="kodeprogram" placeholder="Kode"
							value="<?php echo isset($edit_master_program->kode) ? htmlspecialchars($edit_master_program->kode) : ''; ?>">
						<input type="hidden" name="id" value="<?php echo isset($edit_master_program->id) ? htmlspecialchars($edit_master_program->id) : ''; ?>">
						<input type="hidden" name="tag1" value="<?= $tag1 ?>">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Urusan</label>
					<div class="col-sm-10">
						<select name="urusan_id" class="form-control">
							<option value="">Pilih salah satu urusan yang Aktif</option>
							<?php if (!empty($master_urusan)):
								foreach ($master_urusan as $urusan): ?>
									<option value="<?= $urusan->id ?>" <?= (isset($edit_master_program->urusan_id) && $edit_master_program->urusan_id == $urusan->id) ? 'selected' : '' ?>>
										<?= htmlspecialchars($urusan->namaurusan) ?>
									</option>
								<?php endforeach;
							endif; ?>
						</select>
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
			<table id="tabelprogram" class="table table-bordered table-responsive">
				<thead>
					<tr>
						<th>Kode</th>
						<th>Program</th>
						<th>Urusan</th>
						<th>Status</th>
						<th>Tindakan</th>
					</tr>
				</thead>
				<tbody>
					<?php if (!empty($master_program)):
						foreach ($master_program as $p): ?>
							<tr>
								<td><?php echo htmlspecialchars($p->kode); ?></td>
								<td><?php echo htmlspecialchars($p->namaprogram); ?></td>
								<td><?php echo htmlspecialchars($p->namaurusan); ?></td>
								<td><?php echo htmlspecialchars($p->status); ?></td>
								<td>
									<div class="btn-group">
										<button type="button" class="btn btn-default">Tindakan</button>
										<button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
											<span class="sr-only"></span>
										</button>
										<div class="dropdown-menu" role="menu">
											<a class="dropdown-item" data-toggle="modal" xdata-target="#edit-program" onclick="editModalProgram(<?= $p->id ?>)">Edit</a>
											<div class="dropdown-divider"></div>
											<a class="dropdown-item" href="<?= site_url('admdata/setStatus_program/' . $p->id) ?>"
												onclick="return confirm('Apakah Anda yakin ingin mengubah status program ini?')">Ubah Status</a>
										</div>
									</div>
								</td>
							</tr>
						<?php endforeach;
					else: ?>
						<tr>
							<td colspan="5">Tidak ada program.
							</td>
						</tr>
					<?php endif; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<script>
	function editModalProgram(id) {
		$.ajax({
			url: 'admdata/programById/' + id,
			success: function (res) {
				if (res.status === 'success') {
					$('#edit-record-common').appendTo('body').modal('show');
					$('#edit-record-common .modal-body').html($('#form-<?= $tag1 ?>').html());
					$('#edit-record-common .modal-title').html("Edit data program");

					$('#edit-record-common input[name=namaprogram]').val(res.data.namaprogram);
					$('#edit-record-common input[name=kode]').val(res.data.kode);
					$('#edit-record-common select[name=urusan_id]').val(res.data.urusan_id);
					$('#edit-record-common input[name=id]').val(res.data.id);
				}
			},
		});
	}
</script>

<script>
	// localStorage state management for card collapse/expand
	document.addEventListener('DOMContentLoaded', function () {
		var cardElement = document.getElementById('card-master-program');
		var collapseButton = cardElement.querySelector('[data-card-widget="collapse"]');
		var maximizeButton = cardElement.querySelector('.btn-fs');
		
		// Restore card state from localStorage
		var cardState = localStorage.getItem('card-master-program-state');
		if (cardState === 'expanded') {
			cardElement.classList.remove('collapsed-card');
			var icon = collapseButton.querySelector('i');
			if (icon) {
				icon.classList.remove('fa-plus');
				icon.classList.add('fa-minus');
			}
		}
		
		// Restore maximize state from localStorage
		var maximizeState = localStorage.getItem('card-master-program-maximize');
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
					localStorage.setItem('card-master-program-state', 'collapsed');
				} else {
					localStorage.setItem('card-master-program-state', 'expanded');
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
				localStorage.setItem('card-master-program-maximize', 'restored');
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
				localStorage.setItem('card-master-program-maximize', 'maximized');
			}
		});
	});
</script>
