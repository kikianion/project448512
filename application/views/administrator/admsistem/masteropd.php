<?php
$tag1 = "form_masteropd";
?>

<div class="card card-info card-outline collapsed-card">
	<div class="card-header" data-card-widget="collapse">
		<h5 class="card-title m-0"><b>Master OPD</b></h5>
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
			<?php echo form_open('admsistem/opd/save'); ?>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">OPD</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" placeholder="Masukan Nama OPD" <?= expandFieldAttr('namaopd') ?> required maxlength="50" />
				</div>
				<div class="col-sm-2">
					<input type="number" class="form-control" placeholder="urut" <?= expandFieldAttr('urut') ?>>
					<input type="hidden" <?= expandFieldAttr('id') ?>>
					<input type="hidden" name="tag1" value="<?= $tag1 ?>">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Mitra</label>
				<div class="col-sm-10">
					<?= expandFieldAttrSelectActive("mitra_id", $master_mitra, "namamitra") ?>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Pimpinan</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" placeholder="Nama Pimpinan" <?= expandFieldAttr('kepala') ?> maxlength="50">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">NIP/Pang</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" placeholder="NIP (196xxxxxxxxxxxx)" <?= expandFieldAttr('nipkepala') ?> maxlength="50">
				</div>
				<div class="col-sm-5">
					<input type="text" class="form-control" placeholder="Pangkat (Pembina dll)" <?= expandFieldAttr('pangkepala') ?> maxlength="50">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jabatan</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" placeholder="Jabatan Pimpinan (Kepala / Plt / dst)" <?= expandFieldAttr('jabatan') ?> maxlength="50">
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
		<table id="tabelopd" class="table table-bordered table-responsive table-data-init">
			<thead>
				<tr>
					<th>Urut</th>
					<th>Nama OPD</th>
					<th>Mitra</th>
					<th>Pimpinan</th>
					<th>NIP</th>
					<th>Pangkat</th>
					<th>Jabatan</th>
					<th>Status</th>
					<th>Tindakan</th>
				</tr>
			</thead>
			<tbody>
				<?php if (!empty($master_opd)):
					foreach ($master_opd as $o): ?>
						<tr>
							<td><?= $o->urut ?></td>
							<td><?= $o->namaopd ?></td>
							<td><?= getNameById($o->mitra, $master_mitra, "namamitra") ?></td>
							<td><?= $o->kepala ?></td>
							<td><?= $o->nipkepala ?></td>
							<td><?= $o->pangkepala ?></td>
							<td><?= $o->jabatan ?></td>
							<td><?= $o->status ?></td>
							<td>
								<div class="btn-group">
									<button type="button" class="btn btn-default">Tindakan</button>
									<button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
										<span class="sr-only"></span>
									</button>
									<div class="dropdown-menu" role="menu">
										<a class="dropdown-item" data-toggle="modal" xdata-target="#edit-mitra" onclick="editModalOPD(<?= $o->id ?>)">Edit</a>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="<?= site_url('admsistem/opd/setStatus/' . $o->id) ?>"> Ubah Status</a>
									</div>
								</div>
							</td>
						</tr>
					<?php endforeach;
				else: ?>
					<tr>
						<td colspan="9">Tidak ada OPD.</td>
					</tr>
				<?php endif; ?>
			</tbody>
		</table>
	</div>
</div>
<script>
	function editModalOPD(id) {

		$.ajax({
			url: 'admsistem/opd/byId/' + id, // *** CHANGE THIS TO YOUR SERVER URL ***
			success: function (res) {
				if (res.status === 'success') {
					let e1 = "#edit-record-common"

					$(e1).appendTo('body').modal('show');
					$(e1 + ' .modal-body').html($('#form-<?= $tag1 ?>').html());
					$(e1 + ' .modal-title').html("Edit data OPD");

					let d = res.data
					$(e1 + ' input[name=namaopd]').val(d.namaopd);
					$(e1 + ' select[name=mitra_id]').val(d.mitra);
					$(e1 + ' input[name=kepala]').val(d.kepala);
					$(e1 + ' input[name=nipkepala]').val(d.nipkepala);
					$(e1 + ' input[name=pangkepala]').val(d.pangkepala);
					$(e1 + ' input[name=jabatan]').val(d.jabatan);
					$(e1 + ' input[name=status]').val(d.status);
					$(e1 + ' input[name=urut]').val(d.urut);
					$(e1 + ' input[name=id]').val(d.id);

				}
			},
		});
	}
</script>
