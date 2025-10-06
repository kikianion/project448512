<?php
$tag1 = 'form_masteruser';
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

		<?= widget_flash($tag1) ?>

		<div id="form-<?= $tag1 ?>">
			<?php echo form_open('admsistem/user/save'); ?>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Username</label>
				<div class="col-sm-8">
					<input type="text" name="username" class="form-control" id="username" placeholder="e.g. user@example.com"
						value="<?= $this->session->flashdata('username') ?>" required maxlength="30" />
				</div>
				<div class="col-sm-2">
					<input type="hidden" name="id" value="<?= $this->session->flashdata('id') ?>">
					<input type="hidden" name="tag1" value="<?= $tag1 ?>">
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama User</label>
				<div class="col-sm-10">
					<input type="text" name="nama" class="form-control" id="namauser" placeholder="Nama User" value="<?= $this->session->flashdata('nama') ?>"
						required maxlength="50">
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">OPD</label>
				<div class="col-sm-10">
					<select name="opd" class="form-control">
						<option value="">Pilih salah satu OPD yang Aktif</option>
						<?php if (!empty($master_opd)):
							$current_opd = isset($edit_master_user->opd) ? $edit_master_user->opd : '';
							foreach ($master_opd as $opd): ?>
								<option value="<?php echo htmlspecialchars($opd->id); ?>" <?php echo $current_opd == $opd->id ? 'selected' : ''; ?>>
									<?php echo htmlspecialchars($opd->namaopd); ?>
								</option>
							<?php endforeach;
						endif; ?>
					</select>
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
		<table id="tabeluser" class="table table-bordered table-responsive">
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
				<?php if (!empty($master_users)):
					foreach ($master_users as $u): ?>
						<tr>
							<td><?= $u->username ?></td>
							<td><?= $u->nama ?></td>
							<td>
								<?php
								$opd_name = '';
								if (!empty($master_opd)) {
									foreach ($master_opd as $opd) {
										if ($opd->id == $u->opd) {
											$opd_name = $opd->namaopd;
											break;
										}
									}
								}
								echo htmlspecialchars($opd_name ?: $u->opd);
								?>
							</td>
							<td><?= $u->role ?></td>
							<td><?= $u->status ?></td>
							<td>
								<div class="btn-group">
									<button type="button" class="btn btn-default">Tindakan</button>
									<button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
										<span class="sr-only"></span>
									</button>
									<div class="dropdown-menu" role="menu">
										<a class="dropdown-item" data-toggle="modal" xdata-target="#edit-user" onclick="editModalUser(<?= $u->id ?>)">Edit</a>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="<?= site_url('admsistem/user/setStatus/' . $u->id) ?>">Ubah Status</a>
										<a class="dropdown-item" onclick="resetPassUser(<?= $u->id ?>)">Reset Password
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
		$modal.find('input[name=tag1]').val('<?= $tag1 ?>');
		$modal.find('#reset-pass').attr('action', "admsistem/reset_password");
	}

	function editModalUser(id) {
		$.ajax({
			url: 'admsistem/userById/' + id, // *** CHANGE THIS TO YOUR SERVER URL ***
			success: function (res) {
				if (res.status === 'success') {
					$('#edit-record-common').appendTo('body').modal('show');
					$('#edit-record-common .modal-body').html($('#form-<?= $tag1 ?>').html());
					$('#edit-record-common .modal-body').find("input[name=password]").first().remove();
					$('#edit-record-common .modal-title').html("Edit data user");

					$('#edit-record-common input[name=username]').val(res.data.username);
					$('#edit-record-common input[name=nama]').val(res.data.nama);
					$('#edit-record-common select[name=opd]').val(res.data.opd);
					$('#edit-record-common select[name=role]').val(res.data.role);
					$('#edit-record-common input[name=status]').val(res.data.status);
					$('#edit-record-common input[name=id]').val(res.data.id);
					$('#edit-record-common input[name=original_username]').val(res.data.username);
				}
			},
		});
	}
</script>
