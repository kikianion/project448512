<?php
$tag1 = "form_masterfungsi";
?>

<div class="col-lg-4">
	<div class="card card-info card-outline collapsed-card" id="card-master-fungsi">
		<div class="card-header" data-card-widget="collapse">
			<h5 class="card-title m-0"><b>Master Fungsi</b></h5>
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
				<?php echo form_open('admdata/fungsi/save'); ?>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Nama Fungsi</label>
					<div class="col-sm-8">
						<input type="text" name="namafungsi" class="form-control" id="namafungsi" placeholder="Masukan Nama Fungsi"
							value="<?php echo isset($edit_master_fungsi->namafungsi) ? htmlspecialchars($edit_master_fungsi->namafungsi) : ''; ?>" required
							maxlength="50" />
					</div>
					<div class="col-sm-2">
						<input type="number" name="urut" class="form-control" id="urutanfungsi" placeholder="urut"
							value="<?php echo isset($edit_master_fungsi->urut) ? htmlspecialchars($edit_master_fungsi->urut) : ''; ?>">
						<input type="hidden" name="id" value="<?php echo isset($edit_master_fungsi->id) ? htmlspecialchars($edit_master_fungsi->id) : ''; ?>">
						
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
			<table id="tabelfungsi" class="table table-bordered table-responsive table-data-init">
				<thead>
					<tr>
						<th>Urut</th>
						<th>Nama Fungsi</th>
						<th>Status</th>
						<th>Tindakan</th>
					</tr>
				</thead>
				<tbody>
					<?php if (!empty($master_fungsi)):
						foreach ($master_fungsi as $f): ?>
							<tr>
								<td><?= $f->urut ?></td>
								<td><?= $f->namafungsi ?></td>
								<td><?= $f->status ?></td>
								<td>
									<div class="btn-group">
										<button type="button" class="btn btn-default">Tindakan</button>
										<button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
											<span class="sr-only"></span>
										</button>
										<div class="dropdown-menu" role="menu">
											<a class="dropdown-item" data-toggle="modal" xdata-target="#edit-fungsi" onclick="editModalFungsi(<?= $f->id ?>)">Edit</a>
											<div class="dropdown-divider"></div>
											<a class="dropdown-item" href="<?= site_url('admdata/fungsi/setStatus/' . $f->id) ?>">Ubah Status</a>
										</div>
									</div>
								</td>
							</tr>
						<?php endforeach;
					else: ?>
						<tr>
							<td colspan="5">Tidak ada fungsi.
							</td>
						</tr>
					<?php endif; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<script>
	function editModalFungsi(id) {
		$.ajax({
			url: 'admdata/fungsi/byId/' + id,
			success: function (res) {
				if (res.status === 'success') {
					$('#edit-record-common').appendTo('body').modal('show');
					$('#edit-record-common .modal-body').html($('#form-<?= $tag1 ?>').html());
					$('#edit-record-common .modal-title').html("Edit data fungsi");

					$('#edit-record-common input[name=namafungsi]').val(res.data.namafungsi);
					$('#edit-record-common input[name=deskripsi]').val(res.data.deskripsi);
					$('#edit-record-common input[name=status]').val(res.data.status);
					$('#edit-record-common input[name=urut]').val(res.data.urut);
					$('#edit-record-common input[name=id]').val(res.data.id);
				}
			},
		});
	}
</script>
