<?php
$table_name = "urusan";
?>

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

		<?= widget_flash($table_name) ?>

		<div id="form-<?= $table_name ?>">
			<?php echo form_open("handler/save/$table_name"); ?>
			<input type="hidden" <?= expandFieldAttr('id') ?>>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Urusan</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" placeholder="Masukan Nama Urusan" required maxlength="100" <?= expandFieldAttr('urusan') ?>/>
				</div>
				<div class="col-sm-2">
					<input type="text" class="form-control"  placeholder="Kode" maxlength="20" <?= expandFieldAttr('kode') ?>/>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Fungsi</label>
				<div class="col-sm-10">
					<?= expandFieldAttrSelectActive("fungsi___id___fungsi") ?>
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
		<table id="tabelurusan" class="table table-bordered table-responsive table-data-init">
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
				<?= $f_expandTableCard($table_name) ?>
			</tbody>
		</table>
	</div>
</div>
