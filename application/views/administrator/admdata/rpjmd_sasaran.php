<?php
$tag1 = "rpjmdsasaran";
?>

<div class="card card-info card-outline collapsed-card" id="card-sasaran-rpjmd">
		<div class="card-header" data-card-widget="collapse">
			<h5 class="card-title m-0"><b>Sasaran RPJMD</b></h5>
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
				<?php echo form_open("admdata/$tag1/save"); ?>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Tujuan RPJMD</label>
					<div class="col-sm-10">
						<?= expandFieldAttrSelectActive("tujuan_id", $rpjmdtujuan_list, "tujuan") ?>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Sasaran RPJMD</label>
					<div class="col-sm-8">
						<input type="text" name="sasaran" class="form-control" id="sasaranrpjmd" placeholder="Sasaran RPJMD"
							value="<?php echo isset($edit_sasaran_rpjmd->sasaran) ? htmlspecialchars($edit_sasaran_rpjmd->sasaran) : ''; ?>" required
							maxlength="200" />
					</div>
					<div class="col-sm-2">
						<input type="number" name="urut" class="form-control" id="urutansasaran" placeholder="urut"
							value="<?php echo isset($edit_sasaran_rpjmd->urut) ? htmlspecialchars($edit_sasaran_rpjmd->urut) : ''; ?>">
						<input type="hidden" name="id" value="<?php echo isset($edit_sasaran_rpjmd->id) ? htmlspecialchars($edit_sasaran_rpjmd->id) : ''; ?>">
						
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
			<table id="tabelsasaranrpjmd" class="table table-bordered table-responsive table-data-init">
				<thead>
					<tr>
						<th>Urut</th>
						<th>Tujuan RPJMD</th>
						<th>Sasaran RPJMD</th>
						<th>Status</th>
						<th>Tindakan</th>
					</tr>
				</thead>
				<tbody>
					<?php if (!empty($rpjmdsasaran_list)):
						foreach ($rpjmdsasaran_list as $sr): ?>
							<tr>
								<td><?= $sr->urut ?></td>
								<td><?= getNameById($sr->tujuan_id, $rpjmdtujuan_list, "tujuan") ?></td>
								<td><?= $sr->sasaran ?></td>
								<td><?= $sr->status ?></td>
								<td>
									<div class="btn-group">
										<button type="button" class="btn btn-default">Tindakan</button>
										<button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
											<span class="sr-only"></span>
										</button>
										<div class="dropdown-menu" role="menu">
											<a class="dropdown-item" data-toggle="modal" xdata-target="#edit-sasaranrpjmd"
												onclick="editModal<?= $tag1 ?>(<?= $sr->id ?>)">Edit</a>
											<div class="dropdown-divider"></div>
											<a class="dropdown-item" href="<?= site_url("admdata/$tag1/setStatus/" . $sr->id) ?>">Ubah Status</a>
										</div>
									</div>
								</td>
							</tr>
						<?php endforeach;
					else: ?>
						<tr>
							<td colspan="5">Tidak ada sasaran RPJMD.
							</td>
						</tr>
					<?php endif; ?>
				</tbody>
			</table>
		</div>
	</div>
<script>
	function editModal<?= $tag1 ?>(id) {
		$.ajax({
			url: 'admdata/<?= $tag1 ?>/byId/' + id,
			success: function (res) {
				if (res.status === 'success') {
					$('#edit-record-common').appendTo('body').modal('show');
					$('#edit-record-common .modal-body').html($('#form-<?= $tag1 ?>').html());
					$('#edit-record-common .modal-title').html("Edit data sasaran RPJMD");

					$('#edit-record-common select[name=tujuan_id]').val(res.data.tujuan_id);
					$('#edit-record-common input[name=sasaran]').val(res.data.sasaran);
					$('#edit-record-common input[name=urut]').val(res.data.urut);
					$('#edit-record-common input[name=id]').val(res.data.id);
				}
			},
		});
	}
</script>
