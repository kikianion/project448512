<?php
$table_name = "user";
?>

<div class="card card-info card-outline collapsed-card">
	<div class="card-header" data-card-widget="collapse">
		<h5 class="card-title m-0"><b>Master User</b></h5>
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

		<div id="form-<?= $table_name ?>">
			<?php echo form_open('handler/save/' . $table_name); ?>
			<input type="hidden" <?= expandFieldAttr('id') ?>>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Username</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" placeholder="e.g. user@example.com" <?= expandFieldAttr('username') ?> required maxlength="30" />
				</div>
				<div class="col-sm-2">

				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama User</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" placeholder="Nama User" <?= expandFieldAttr('nama') ?> required maxlength="50">
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">OPD</label>
				<div class="col-sm-10">
					<?= expandFieldAttrSelectActive("opd___id___nama") ?>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Akses (Role)</label>
				<div class="col-sm-4">
					<select name="role" class="form-control">
						<?php
						$roles = array('admin' => 'Administrator', 'monev' => 'Monev', 'operator' => 'Operator OPD', 'mitra' => 'Mitra');
						$current = isset($edit_master_user->role) ? $edit_master_user->role : '';
						?>
						<option value="">-- Pilih hak akses --</option>
						<?php foreach ($roles as $k => $v): ?>
							<option value="<?php echo $k; ?>" <?php echo $current === $k ? 'selected' : ''; ?>><?php echo $v; ?></option>
						<?php endforeach; ?>
					</select>
				</div>
				<div class="col-sm-6">
					<input type="password" name="password" class="form-control" id="password" placeholder="Set Password Awal" maxlength="50">
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
		<table id="tabeluser" class="table table-bordered table-responsive table-data-init">
			<thead>
				<tr>
					<th>Username</th>
					<th>Nama User</th>
					<th>OPD Asal</th>
					<th>Akses</th>
					<th>Status</th>
					<th>Tindakan</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$table_real = real_table_name('user');
				$master_users = $GLOBALS[$table_real];
				?>
				<?php if (!empty($master_users)):
					foreach ($master_users as $u): ?>
						<tr>
							<td><?= $u['username'] ?></td>
							<td><?= $u['nama'] ?></td>
							<td>
								<?php
								echo $f_tabel_fk_display('opd___id___nama',$u['opd___id___nama']);
								?>
							</td>
							<td><?= $u['role'] ?></td>
							<td><?= $u['status'] ?></td>
							<td>
								<div class="btn-group">
									<button type="button" class="btn btn-default">Tindakan</button>
									<button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
										<span class="sr-only"></span>
									</button>
									<div class="dropdown-menu" role="menu">
										<a class="dropdown-item" data-toggle="modal" xdata-target="#edit-user" onclick="editModal('user',<?= $u['id'] ?>)">Edit</a>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="<?= site_url('handler/set_status/user/' . $u['id']) ?>">Ubah Status</a>
										<a class="dropdown-item" onclick="resetPassUser(<?= $u['id'] ?>)">Reset Password
										</a>
									</div>
								</div>
							</td>
						</tr>
					<?php endforeach;
				else: ?>
					<tr>
						<td colspan="6">Tidak ada pengguna.
						</td>
					</tr>
				<?php endif; ?>
			</tbody>
		</table>
	</div>
</div>
<script>
	function resetPassUser(id) {
		// Open modal from admsistem.php and wire submit
		var $modal = $('#reset-password');
		$modal.appendTo('body').modal('show');

		// Clear previous values and errors
		$modal.find('input[name=password-baru]').val('');
		$modal.find('input[name=password-baru2]').val('');
		$modal.find('input[name=id]').val(id);
		// $modal.find('input[name=tag1]').val('<?= "" ?>');
		$modal.find('#reset-pass').attr('action', "admsistem/user/resetpassword");
	}

</script>
