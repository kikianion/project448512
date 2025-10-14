<?php
$table_name = "tujuan_RPJMD";
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
		<?= widget_flash($table_name) ?>

		<div id="form-<?= $table_name ?>">
			<?php echo form_open("handler/save/$table_name"); ?>
			<input type="hidden" <?= expandFieldAttr('id') ?>>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Misi</label>
				<div class="col-sm-10">
					<?= expandFieldAttrSelectActive("misi___id___misi") ?>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tujuan</label>
				<div class="col-sm-8">
					<input type="text" name="tujuan" class="form-control" id="tujuanrpjmd" placeholder="Tujuan RPJMD"
						value="<?php echo isset($edit_tujuan_rpjmd->tujuan) ? htmlspecialchars($edit_tujuan_rpjmd->tujuan) : ''; ?>" required maxlength="200" />
				</div>
				<div class="col-sm-2">
					<input type="number" name="urut" class="form-control" id="urutantujuan" placeholder="urut"
						value="<?php echo isset($edit_tujuan_rpjmd->urut) ? htmlspecialchars($edit_tujuan_rpjmd->urut) : ''; ?>">

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
				<?= $f_expandTableCard($table_name) ?>
			</tbody>
		</table>
	</div>
</div>
