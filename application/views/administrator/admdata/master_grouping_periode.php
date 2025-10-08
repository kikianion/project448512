<?php
$tag1 = "form_mastergroupingperiode";
?>

<div class="col-lg-4">
	<div class="card card-info card-outline collapsed-card" id="card-master-grouping-periode">
		<div class="card-header" data-card-widget="collapse">
			<h5 class="card-title m-0"><b>Master Grouping Periode</b></h5>
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
				<?php echo form_open('admdata/save_master_grouping_periode'); ?>
				<div class="form-group row">
					<label class="col-sm-3 col-form-label">Group</label>
					<div class="col-sm-9">
						<input type="text" name="namagroup" class="form-control" id="namagroup" placeholder="Nama grouping"
							value="<?php echo isset($edit_master_grouping->namagroup) ? htmlspecialchars($edit_master_grouping->namagroup) : ''; ?>" required
							maxlength="50" />
						<input type="hidden" name="id" value="<?php echo isset($edit_master_grouping->id) ? htmlspecialchars($edit_master_grouping->id) : ''; ?>">
						<input type="hidden" name="tag1" value="<?= $tag1 ?>">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-3 col-form-label">Jumlah Bulan</label>
					<div class="col-sm-9">
						<input type="number" name="jumlah_bulan" class="form-control" id="jumlah_bulan" placeholder="Jumlah Cakupan Bulan"
							value="<?php echo isset($edit_master_grouping->jumlah_bulan) ? htmlspecialchars($edit_master_grouping->jumlah_bulan) : ''; ?>" required
							min="1" max="12" />
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
			<table id="tabelgroupingperiode" class="table table-bordered table-responsive">
				<thead>
					<tr>
						<th>Grouping</th>
						<th>Jumlah Bulan</th>
						<th>Status</th>
						<th>Tindakan</th>
					</tr>
				</thead>
				<tbody>
					<?php if (!empty($master_grouping_periode)):
						foreach ($master_grouping_periode as $gp): ?>
							<tr>
								<td><?= $gp->namagroup ?></td>
								<td><?= $gp->jumlah_bulan ?></td>
								<td><?= $gp->status ?></td>
								<td>
									<div class="btn-group">
										<button type="button" class="btn btn-default">Tindakan</button>
										<button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
											<span class="sr-only"></span>
										</button>
										<div class="dropdown-menu" role="menu">
											<a class="dropdown-item" data-toggle="modal" xdata-target="#edit-group" onclick="editModalGroupingPeriode(<?= $gp->id ?>)">Edit</a>
											<div class="dropdown-divider"></div>
											<a class="dropdown-item" href="<?= site_url('admdata/setStatus_grouping_periode/' . $gp->id) ?>"
												onclick="return confirm('Apakah Anda yakin ingin mengubah status grouping periode ini?')">Ubah Status</a>
										</div>
									</div>
								</td>
							</tr>
						<?php endforeach;
					else: ?>
						<tr>
							<td colspan="4">Tidak ada grouping periode.
							</td>
						</tr>
					<?php endif; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<script>
	function editModalGroupingPeriode(id) {
		$.ajax({
			url: 'admdata/groupingPeriodeById/' + id,
			success: function (res) {
				if (res.status === 'success') {
					$('#edit-record-common').appendTo('body').modal('show');
					$('#edit-record-common .modal-body').html($('#form-<?= $tag1 ?>').html());
					$('#edit-record-common .modal-title').html("Edit data grouping periode");

					$('#edit-record-common input[name=namagroup]').val(res.data.namagroup);
					$('#edit-record-common input[name=jumlah_bulan]').val(res.data.jumlah_bulan);
					$('#edit-record-common input[name=id]').val(res.data.id);
				}
			},
		});
	}
</script>

<script>
	// localStorage state management for card collapse/expand
	document.addEventListener('DOMContentLoaded', function () {
		var cardElement = document.getElementById('card-master-grouping-periode');
		var collapseButton = cardElement.querySelector('[data-card-widget="collapse"]');
		var maximizeButton = cardElement.querySelector('.btn-fs');
		
		// Restore card state from localStorage
		var cardState = localStorage.getItem('card-master-grouping-periode-state');
		if (cardState === 'expanded') {
			cardElement.classList.remove('collapsed-card');
			var icon = collapseButton.querySelector('i');
			if (icon) {
				icon.classList.remove('fa-plus');
				icon.classList.add('fa-minus');
			}
		}
		
		// Restore maximize state from localStorage
		var maximizeState = localStorage.getItem('card-master-grouping-periode-maximize');
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
					localStorage.setItem('card-master-grouping-periode-state', 'collapsed');
				} else {
					localStorage.setItem('card-master-grouping-periode-state', 'expanded');
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
				localStorage.setItem('card-master-grouping-periode-maximize', 'restored');
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
				localStorage.setItem('card-master-grouping-periode-maximize', 'maximized');
			}
		});
	});
</script>
