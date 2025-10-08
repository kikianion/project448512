<?php
$tag1 = "form_rpjmdperiode";
?>

<div class="col-lg-4">
	<div class="card card-info card-outline collapsed-card" id="card-periode-rpjmd">
		<div class="card-header" data-card-widget="collapse">
			<h5 class="card-title m-0"><b>Periode RPJMD</b></h5>
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
				<?php echo form_open('admdata/rpjmdperiode/save'); ?>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Nama</label>
					<div class="col-sm-10">
						<input type="text" name="namaperiode" class="form-control" xid="namaperiode" placeholder="Nama Periode RPJMD"
							value="<?php echo isset($edit_periode_rpjmd->namaperiode) ? htmlspecialchars($edit_periode_rpjmd->namaperiode) : ''; ?>" required
							maxlength="100" />
						<input type="hidden" name="id" value="<?php echo isset($edit_periode_rpjmd->id) ? htmlspecialchars($edit_periode_rpjmd->id) : ''; ?>">
						<input type="hidden" name="tag1" value="<?= $tag1 ?>">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Awal</label>
					<div class="col-sm-4">
						<input type="number" name="tahun_awal" class="form-control" id="awalperiode" placeholder="Tahun awal RPJMD"
							value="<?php echo isset($edit_periode_rpjmd->tahun_awal) ? htmlspecialchars($edit_periode_rpjmd->tahun_awal) : ''; ?>" min="2020"
							max="2050">
					</div>
					<label class="col-sm-2 col-form-label">Akhir</label>
					<div class="col-sm-4">
						<input type="number" name="tahun_akhir" class="form-control" id="akhirperiode" placeholder="Tahun akhir RPJMD"
							value="<?php echo isset($edit_periode_rpjmd->tahun_akhir) ? htmlspecialchars($edit_periode_rpjmd->tahun_akhir) : ''; ?>" min="2020"
							max="2050">
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
			<table id="tabelperioderpjmd" class="table table-bordered table-responsive">
				<thead>
					<tr>
						<th>Nama Periode</th>
						<th>Tahun Periode</th>
						<th>Status</th>
						<th>Tindakan</th>
					</tr>
				</thead>
				<tbody>
					<?php if (!empty($periode_rpjmd)):
						foreach ($periode_rpjmd as $pr): ?>
							<tr>
								<td><?= $pr->namaperiode ?></td>
								<td><?= $pr->tahun_awal . '-' . $pr->tahun_akhir ?></td>
								<td><?= $pr->status ?></td>
								<td>
									<div class="btn-group">
										<button type="button" class="btn btn-default">Tindakan</button>
										<button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
											<span class="sr-only"></span>
										</button>
										<div class="dropdown-menu" role="menu">
											<a class="dropdown-item" data-toggle="modal" xdata-target="#edit-rpjmd"
												onclick="editModalPeriodeRPJMD(<?= $pr->id ?>)">Edit</a>
											<div class="dropdown-divider"></div>
											<a class="dropdown-item" href="<?= site_url('admdata/rpjmdperiode/setStatus/' . $pr->id) ?>">Ubah Status</a>
										</div>
									</div>
								</td>
							</tr>
						<?php endforeach;
					else: ?>
						<tr>
							<td colspan="4">Tidak ada periode RPJMD.
							</td>
						</tr>
					<?php endif; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<script>
	function editModalPeriodeRPJMD(id) {
		$.ajax({
			url: 'admdata/rpjmdperiode/byId/' + id,
			success: function (res) {
				if (res.status === 'success') {
					$('#edit-record-common').appendTo('body').modal('show');
					$('#edit-record-common .modal-body').html($('#form-<?= $tag1 ?>').html());
					$('#edit-record-common .modal-title').html("Edit data periode RPJMD");

					$('#edit-record-common input[name=namaperiode]').val(res.data.namaperiode);
					$('#edit-record-common input[name=tahun_awal]').val(res.data.tahun_awal);
					$('#edit-record-common input[name=tahun_akhir]').val(res.data.tahun_akhir);
					$('#edit-record-common input[name=id]').val(res.data.id);
				}
			},
		});
	}
</script>

