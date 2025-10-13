<?php
$tag1 = "form_masterbranding";
?>

<div class="col-lg-8">
	<div class="card card-info card-outline collapsed-card" id="card-master-branding">
		<div class="card-header" data-card-widget="collapse">
			<h5 class="card-title m-0"><b>Master Branding</b></h5>
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

			<?= widget_flash($table_name) ?>

			<table class="table table-bordered table-responsive">
				<thead>
					<tr>
						<th>Type</th>
						<th>Preview</th>
						<th>Update</th>
						<th>Save</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><b>Nama</b></td>
						<td>
							<?php echo isset($branding->nama_aplikasi) ? htmlspecialchars($branding->nama_aplikasi) : 'Simela Gen2'; ?>
						</td>
						<td>
							<?php echo form_open('admdata/save_branding_nama'); ?>
							<input type="text" name="nama_aplikasi" class="form-control" id="nama-aplikasi" placeholder="Nama Aplikasi"
								value="<?php echo isset($branding->nama_aplikasi) ? htmlspecialchars($branding->nama_aplikasi) : ''; ?>">
							
						</td>
						<td>
							<button type="submit" class="btn btn-primary">Simpan</button>
							<?php echo form_close(); ?>
						</td>
					</tr>
					<tr>
						<td><b>Subnote</b></td>
						<td>
							<?php echo isset($branding->subnote) ? htmlspecialchars($branding->subnote) : 'Sistem Informasi Monitoring dan Evaluasi Lamongan Generasi 2'; ?>
						</td>
						<td>
							<?php echo form_open('admdata/save_branding_subnote'); ?>
							<input type="text" name="subnote" class="form-control" id="subnote" placeholder="Subnote Aplikasi"
								value="<?php echo isset($branding->subnote) ? htmlspecialchars($branding->subnote) : ''; ?>">
							
						</td>
						<td>
							<button type="submit" class="btn btn-primary">Simpan</button>
							<?php echo form_close(); ?>
						</td>
					</tr>
					<tr>
						<td><b>Background</b></td>
						<td>
							<img src="<?php echo isset($branding->background) ? $branding->background : 'background.jpg'; ?>" width="500" alt="Background" class="img-thumbnail">
						</td>
						<td>
							<?php echo form_open_multipart('admdata/save_branding_background'); ?>
							<input class="form-control" type="file" name="background" id="background" accept="image/*">
							
						</td>
						<td>
							<button type="submit" class="btn btn-primary">Simpan</button>
							<?php echo form_close(); ?>
						</td>
					</tr>
					<tr>
						<td><b>Logo</b></td>
						<td>
							<img src="<?php echo isset($branding->logo) ? $branding->logo : 'background.jpg'; ?>" width="200" alt="Logo" class="img-thumbnail">
						</td>
						<td>
							<?php echo form_open_multipart('admdata/save_branding_logo'); ?>
							<input class="form-control" type="file" name="logo" id="logo" accept="image/*">
							
						</td>
						<td>
							<button type="submit" class="btn btn-primary">Simpan</button>
							<?php echo form_close(); ?>
						</td>
					</tr>
					<tr>
						<td><b>Favicon</b></td>
						<td>
							<img src="<?php echo isset($branding->favicon) ? $branding->favicon : 'background.jpg'; ?>" width="100" alt="Favicon" class="img-thumbnail">
						</td>
						<td>
							<?php echo form_open_multipart('admdata/save_branding_favicon'); ?>
							<input class="form-control" type="file" name="favicon" id="favicon" accept="image/*">
							
						</td>
						<td>
							<button type="submit" class="btn btn-primary">Simpan</button>
							<?php echo form_close(); ?>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>

<script>
	// localStorage state management for card collapse/expand
	document.addEventListener('DOMContentLoaded', function () {
		var cardElement = document.getElementById('card-master-branding');
		var collapseButton = cardElement.querySelector('[data-card-widget="collapse"]');
		var maximizeButton = cardElement.querySelector('.btn-fs');
		
		// Restore card state from localStorage
		var cardState = localStorage.getItem('card-master-branding-state');
		if (cardState === 'expanded') {
			cardElement.classList.remove('collapsed-card');
			var icon = collapseButton.querySelector('i');
			if (icon) {
				icon.classList.remove('fa-plus');
				icon.classList.add('fa-minus');
			}
		}
		
		// Restore maximize state from localStorage
		var maximizeState = localStorage.getItem('card-master-branding-maximize');
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
					localStorage.setItem('card-master-branding-state', 'collapsed');
				} else {
					localStorage.setItem('card-master-branding-state', 'expanded');
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
				localStorage.setItem('card-master-branding-maximize', 'restored');
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
				localStorage.setItem('card-master-branding-maximize', 'maximized');
			}
		});
	});
</script>
