<?php
$tag1 = "form_mastermitra";
?>

<div class="card card-info card-outline collapsed-card">
	<div class="card-header" data-card-widget="collapse">
		<h5 class="card-title m-0"><b>Master Mitra</b></h5>
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
			<?php echo form_open('admsistem/mitra/save'); ?>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Mitra</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" placeholder="Masukan Nama Mitra" <?= expandFieldAttr('namamitra') ?> maxlength="50" required/>
				</div>
				<div class="col-sm-2">
					<input type="number" class="form-control" placeholder="urut" <?= expandFieldAttr('urut') ?>>
					<input type="hidden" <?= expandFieldAttr('id') ?>>
					<input type="hidden" name="tag1" value="<?= $tag1 ?>">
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
		<table id="tabelmitra" class="table table-bordered table-responsive table-data-init">
			<thead>
				<tr>
					<th>urut</th>
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
				<?php if (!empty($master_mitra)):
					foreach ($master_mitra as $m): ?>
						<tr>
							<td><?= $m->urut ?></td>
							<td><?= $m->namamitra ?></td>
							<td><?= $m->kepala ?></td>
							<td><?= $m->nipkepala ?></td>
							<td><?= $m->pangkepala ?></td>
							<td><?= $m->jabatan ?></td>
							<td><?= $m->status ?></td>
							<td>
								<div class="btn-group">
									<button type="button" class="btn btn-default">Tindakan</button>
									<button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
										<span class="sr-only"></span>
									</button>
									<div class="dropdown-menu" role="menu">
										<a class="dropdown-item" data-toggle="modal" xdata-target="#edit-mitra" onclick="editModalMitra(<?= $m->id ?>)">Edit</a>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="<?= site_url('admsistem/mitra/setStatus/' . $m->id) ?>">Ubah Status</a>
									</div>
								</div>
							</td>
						</tr>
					<?php endforeach;
				else: ?>
					<tr>
						<td colspan="8">Tidak ada mitra.
						</td>
					</tr>
				<?php endif; ?>
			</tbody>
		</table>
	</div>
</div>
<script>
	function editModalMitra(id) {
		$.ajax({
			url: 'admsistem/mitra/byId/' + id, // *** CHANGE THIS TO YOUR SERVER URL ***
			success: function (res) {
				if (res.status === 'success') {

					let e1 = "#edit-record-common"
					$(e1).appendTo('body').modal('show');
					$(e1 + ' .modal-body').html($('#form-<?= $tag1 ?>').html());
					$(e1 + ' .modal-title').html("Edit data mitra");

					let d = res.data
					$(e1 + ' input[name=namamitra]').val(d.namamitra);
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
