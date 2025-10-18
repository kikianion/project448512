<?php
$table_name = "sasaran_perangkat_daerah";
?>

<div class="card card-info card-outline collapsed-card">
	<div class="card-header" data-card-widget="collapse">
		<h5 class="card-title m-0"><b>Sasaran Perangkat Daerah</b></h5>
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
			<input type="hidden" <?= expandFieldAttr('id') ?> />

			<div class="form-group row">
				<label for="inputEmail3" class="col-sm-2 col-form-label">Nama</label>
				<div class="col-sm-10">
					<input class="form-control" placeholder="Tuliskan Nama Sasaran" <?= expandFieldAttr('nama') ?>>
				</div>
			</div>
			<div class="form-group row">
				<label for="inputEmail3" class="col-sm-2 col-form-label">Tujuan</label>
				<div class="col-sm-10">
					<?= expandFieldAttrSelectActive("tujuan_perangkat_daerah___id___nama") ?>
				</div>
			</div>
			<div class="form-group row">
				<div class="col-sm-2">
					<button type="submit" class="btn btn-default float-right">Cancel</button>
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
		<table id="tabeluser" class="table table-bordered table-fit init">
			<thead>
				<tr>
					<th>Tujuan PD yang diinterfensi</th>
					<th>Sasaran PD</th>
					<th>Status</th>
					<th>Tindakan</th>
				</tr>
			</thead>
			<tbody>
				<?php echo $f_expandTableCard($table_name, "id,tujuan_perangkat_daerah___id___nama,nama,status") ?>
			</tbody>
		</table>
	</div>
</div>
