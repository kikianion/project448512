<?php
$table_name = "mitra";
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

		<?= widget_flash($table_name) ?>

		<div id="form-<?= $table_name ?>">
			<?php echo form_open('handler/save/' . $table_name); ?>
			<input type="hidden" <?= expandFieldAttr('id') ?>>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Mitra</label>

				<div class="col-sm-8">
					<input type="text" class="form-control" placeholder="Masukan Nama Mitra" <?= expandFieldAttr('nama') ?> maxlength="50" required />
				</div>

				<div class="col-sm-2">
					<input type="number" class="form-control" placeholder="urut" <?= expandFieldAttr('urut') ?>>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Pimpinan</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" placeholder="Nama Pimpinan" <?= expandFieldAttr('pimpinan') ?> maxlength="50">
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
		<table class="table table-bordered table-responsive table-data-init">
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
				<?php
				// $table_id = real_table_name($table_name);
				$f_expandTableCard($table_name);
				?>
			</tbody>
		</table>
	</div>
</div>
