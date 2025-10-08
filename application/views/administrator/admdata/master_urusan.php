<?php
$tag1 = "form_masterurusan";
?>

<div class="col-lg-4">
	<div class="card card-info card-outline collapsed-card" id="card-master-urusan">
		<div class="card-header" data-card-widget="collapse">
			<h5 class="card-title m-0"><b>Master Urusan</b></h5>
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
				<?php echo form_open('admdata/urusan/save'); ?>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Nama Urusan</label>
					<div class="col-sm-8">
						<input type="text" name="namaurusan" class="form-control" id="namaurusan" placeholder="Masukan Nama Urusan"
							value="<?php echo isset($edit_master_urusan->namaurusan) ? htmlspecialchars($edit_master_urusan->namaurusan) : ''; ?>" required
							maxlength="100" />
					</div>
					<div class="col-sm-2">
						<input type="text" name="kode" class="form-control" id="kodeurusan" placeholder="Kode"
							value="<?php echo isset($edit_master_urusan->kode) ? htmlspecialchars($edit_master_urusan->kode) : ''; ?>" maxlength="20">
						<input type="hidden" name="id" value="<?php echo isset($edit_master_urusan->id) ? htmlspecialchars($edit_master_urusan->id) : ''; ?>">
						<input type="hidden" name="tag1" value="<?= $tag1 ?>">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Fungsi</label>
					<div class="col-sm-10">
						<?= expandFieldAttrSelectActive("fungsi_id", $master_fungsi, "namafungsi") ?>
						<!-- <select name="fungsi_id" class="form-control">
							<option value="">Pilih salah satu fungsi yang Aktif</option>
							<?php if (!empty($master_fungsi)):
								foreach ($master_fungsi as $fungsi):
									if ($fungsi->status === 'Aktif'): ?>
										<option value="<?= $fungsi->id ?>" <?= (isset($edit_master_urusan->fungsi_id) && $edit_master_urusan->fungsi_id == $fungsi->id) ? 'selected' : '' ?>>
											<?= htmlspecialchars($fungsi->namafungsi) ?>
										</option>
									<?php endif;
								endforeach;
							endif; ?>
						</select> -->
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
			<table id="tabelurusan" class="table table-bordered table-responsive">
				<thead>
					<tr>
						<th>Kode</th>
						<th>Nama Urusan</th>
						<th>Fungsi</th>
						<th>Status</th>
						<th>Tindakan</th>
					</tr>
				</thead>
				<tbody>
					<?php if (!empty($master_urusan)):
						foreach ($master_urusan as $u): ?>
							<tr>
								<td><?= $u->kode ?></td>
								<td><?= $u->urusan ?></td>
								<td><?= getNameById($u->fungsi, $master_fungsi, "namafungsi") ?></td>
								<td><?= $u->status ?></td>
								<td>
									<div class="btn-group">
										<button type="button" class="btn btn-default">Tindakan</button>
										<button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
											<span class="sr-only"></span>
										</button>
										<div class="dropdown-menu" role="menu">
											<a class="dropdown-item" data-toggle="modal" xdata-target="#edit-urusan" onclick="editModalUrusan(<?= $u->id ?>)">Edit</a>
											<div class="dropdown-divider"></div>
											<a class="dropdown-item" href="<?= site_url('admdata/urusan/setStatus/' . $u->id) ?>"
												>Ubah Status</a>
										</div>
									</div>
								</td>
							</tr>
						<?php endforeach;
					else: ?>
						<tr>
							<td colspan="5">Tidak ada urusan.
							</td>
						</tr>
					<?php endif; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<script>
	function editModalUrusan(id) {
		$.ajax({
			url: 'admdata/urusan/byId/' + id,
			success: function (res) {
				if (res.status === 'success') {
					$('#edit-record-common').appendTo('body').modal('show');
					$('#edit-record-common .modal-body').html($('#form-<?= $tag1 ?>').html());
					$('#edit-record-common .modal-title').html("Edit data urusan");

					$('#edit-record-common input[name=namaurusan]').val(res.data.urusan);
					$('#edit-record-common input[name=kode]').val(res.data.kode);
					$('#edit-record-common select[name=fungsi_id]').val(res.data.fungsi);
					$('#edit-record-common input[name=id]').val(res.data.id);
				}
			},
		});
	}
</script>
