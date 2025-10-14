<?php
$table_name = "periode_RPJMD";
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
			<?php echo form_open("handler/save/$table_name"); ?>
			<input type="hidden" <?= expandFieldAttr('id') ?>>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama</label>
				<div class="col-sm-10">
					<input type="text" name="namaperiode" class="form-control" xid="namaperiode" placeholder="Nama Periode RPJMD"
						value="<?php echo isset($edit_periode_rpjmd->namaperiode) ? htmlspecialchars($edit_periode_rpjmd->namaperiode) : ''; ?>" required
						maxlength="100" />

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
				<?= $f_expandTableCard($table_name) ?>
			</tbody>
		</table>
	</div>
</div>
