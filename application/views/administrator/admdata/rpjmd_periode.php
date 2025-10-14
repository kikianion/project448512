<?php
$tag1 = "rpjmdperiode";

//name field,name display,type, attr;
$fields = [
	"nama",
	"namaperiode"
];
?>

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

			<?= widget_flash($table_name) ?>

			<div id="form-<?= $table_name ?>">
				<?php echo form_open("admdata/$tag1/save"); ?>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Nama</label>
					<div class="col-sm-10">
						<input type="text" name="namaperiode" class="form-control" xid="namaperiode" placeholder="Nama Periode RPJMD"
							value="<?php echo isset($edit_periode_rpjmd->namaperiode) ? htmlspecialchars($edit_periode_rpjmd->namaperiode) : ''; ?>" required
							maxlength="100" />
						<input type="hidden" name="id" value="<?php echo isset($edit_periode_rpjmd->id) ? htmlspecialchars($edit_periode_rpjmd->id) : ''; ?>">
						
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
			<table id="tabelperioderpjmd" class="table table-bordered table-responsive table-data-init">
				<thead>
					<tr>
						<th>Nama Periode</th>
						<th>Tahun Periode</th>
						<th>Status</th>
						<th>Tindakan</th>
					</tr>
				</thead>
				<tbody>
					<?php if (!empty($rpjmdperiode)):
						foreach ($rpjmdperiode as $pr): ?>
							<tr>
								<td><?= $pr->nama ?></td>
								<td><?= $pr->awal . '-' . $pr->akhir ?></td>
								<td><?= $pr->status ?></td>
								<td>
									<div class="btn-group">
										<button type="button" class="btn btn-default">Tindakan</button>
										<button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
											<span class="sr-only"></span>
										</button>
										<div class="dropdown-menu" role="menu">
											<a class="dropdown-item" data-toggle="modal" xdata-target="#edit-rpjmd"
												onclick="editModal<?= $tag1 ?>(<?= $pr->id ?>)">Edit</a>
											<div class="dropdown-divider"></div>
											<a class="dropdown-item" href="admdata/<?= $tag1 ?>/setStatus/<?= $pr->id ?> ">Ubah Status</a>
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
<script>
	function editModal<?= $tag1 ?>(id) {
		$.ajax({
			url: 'admdata/<?= $tag1 ?>/byId/' + id,
			success: function (res) {
				if (res.status === 'success') {
					let id1 = '#edit-record-common'
					$(id1).appendTo('body').modal('show');
					$(id1 + ' .modal-body').html($('#form-<?= $tag1 ?>').html());
					$(id1 + ' .modal-title').html("Edit data periode RPJMD");

					// $("form-<?=$tag1?> input").array.forEach(e => {
					// 	$(id1 + ' input[name=namaperiode]').val(res.data.namaperiode);
					// })
					$(id1 + ' input[name=namaperiode]').val(res.data.nama);
					$(id1 + ' input[name=tahun_awal]').val(res.data.awal);
					$(id1 + ' input[name=tahun_akhir]').val(res.data.akhir);
					$(id1 + ' input[name=id]').val(res.data.id);
				}
			},
		});
	}
</script>
