<?php
$table_name = "sasaran_RPJMD";
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
			<?php echo form_open("handler/save/$table_name"); ?>
			<input type="hidden" <?= expandFieldAttr('id') ?>>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tujuan RPJMD</label>
				<div class="col-sm-10">
					<?= expandFieldAttrSelectActive("tujuan___id___nama") ?>
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
				<?= $f_expandTableCard($table_name) ?>
			</tbody>
		</table>
	</div>
</div>
