<?php
$table_name = "program";
?>

<div class="card card-info card-outline collapsed-card" id="card-master-program">
	<div class="card-header" data-card-widget="collapse">
		<h5 class="card-title m-0"><b>Master Program</b></h5>
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
				<label class="col-sm-2 col-form-label">Program</label>
				<div class="col-sm-8">
					<input type="text" name="namaprogram" class="form-control" id="namaprogram" placeholder="Masukan Nama Program"
						value="<?php echo isset($edit_master_program->namaprogram) ? htmlspecialchars($edit_master_program->namaprogram) : ''; ?>" required
						maxlength="50" />
				</div>
				<div class="col-sm-2">
					<input type="text" name="kode" class="form-control" id="kodeprogram" placeholder="Kode"
						value="<?php echo isset($edit_master_program->kode) ? htmlspecialchars($edit_master_program->kode) : ''; ?>">

				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Urusan</label>
				<div class="col-sm-10">
				<?= expandFieldAttrSelectActive("urusan___id___nama") ?>
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
		<table id="tabelprogram" class="table table-bordered table-responsive table-data-init">
			<thead>
				<tr>
					<th>Kode</th>
					<th>Program</th>
					<th>Urusan</th>
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
