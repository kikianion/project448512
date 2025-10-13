<?php
$table_name = "grup_periode";
?>

<div class="card card-info card-outline collapsed-card">
	<div class="card-header" data-card-widget="collapse">
		<h5 class="card-title m-0"><b>Master Grouping Periode</b></h5>
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
			<?php echo form_open("handler/save/$table_name"); ?>
			<input type="hidden" <?= expandFieldAttr('id') ?>>

			<div class="form-group row">
				<label for="group" class="col-sm-3 col-form-label">Group</label>
				<div class="col-sm-9">
					<input type="text" class="form-control" placeholder="Nama grouping" <?= expandFieldAttr('nama') ?>>
				</div>
			</div>
			<div class="form-group row">
				<label for="jumlah_bulan" class="col-sm-3 col-form-label">Jumlah Bulan</label>
				<div class="col-sm-9">
					<input type="number" class="form-control" placeholder="Jumlah Cakupan Bulan" <?= expandFieldAttr('jmlbulan') ?>>
				</div>
			</div>
			<div class="form-group row">
				<div class="col-sm-2">
					<a href="<?php echo site_url('admsistem'); ?>" class="btn btn-default float-right">Cancel</a>
				</div>
				<div class="col-sm-8">
				</div>
				<div class="col-sm-2">
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>
			</div>
			<?php echo form_close(); ?>
		</div>

		<hr class="hr hr-blurry">
		</hr>
		<table id="tabelgroup" class="table table-bordered table-responsive table-data-init">
			<thead>
				<tr>
					<th>Grouping</th>
					<th>Jumlah Bulan</th>
					<th>Status</th>
					<th>Tindakan</th>
				</tr>
			</thead>
			<tbody>
				<?= $f_expandTableCard($table_name) ?>
			</tbody>
		</table>
	</div>
</div>
