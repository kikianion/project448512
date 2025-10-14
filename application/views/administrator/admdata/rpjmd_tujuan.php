<?php
$tag1 = "rpjmdtujuan";
?>

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
			<?php

			$a = 1;
			?>
			<?= widget_flash($table_name) ?>

			<div id="form-<?= $table_name ?>">
				<?php echo form_open("admdata/$tag1/save"); ?>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Misi</label>
					<div class="col-sm-10">
						<?= expandFieldAttrSelectActive("misi_id", $misi_list, "misi") ?>
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
			<table id="tabeltujuanrpjmd" class="table table-bordered table-responsive table-data-init">
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
					<?php if (!empty($rpjmdtujuan_list)):
						foreach ($rpjmdtujuan_list as $tr): ?>
							<tr>
								<td><?= $tr->urut ?></td>
								<td><?= getNameById($tr->misi_id, $misi_list, "misi") ?></td>
								<td><?= $tr->tujuan ?></td>
								<td><?= $tr->status ?></td>
								<td>
									<div class="btn-group">
										<button type="button" class="btn btn-default">Tindakan</button>
										<button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
											<span class="sr-only"></span>
										</button>
										<div class="dropdown-menu" role="menu">
											<a class="dropdown-item" data-toggle="modal" xdata-target="#edit-tujuanrpjmd"
												onclick="editModal<?= $tag1 ?>(<?= $tr->id ?>)">Edit</a>
											<div class="dropdown-divider"></div>
											<a class="dropdown-item" href="admdata/<?= $tag1 ?>/setStatus/<?= $tr->id ?>">Ubah Status</a>
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
<script>
	function editModal<?= $tag1 ?>(id) {
		$.ajax({
			url: 'admdata/<?= $tag1 ?>/byId/' + id,
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
