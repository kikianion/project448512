<?php
$table_name = "periode_anggaran";
?>

<div class="card card-info card-outline collapsed-card">
	<div class="card-header" data-card-widget="collapse">
		<h5 class="card-title m-0"><b>Master Periode Anggaran</b></h5>
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
				<label for="kode" class="col-sm-2 col-form-label">Kode</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="kode" name="kode" placeholder="Masukan Kode Periode Anggaran Misal 2025-0 atau 2025-1"
						value="<?php echo htmlspecialchars($this->session->flashdata('old_kode') ?: ''); ?>">

				</div>
			</div>
			<div class="form-group row">
				<label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Misal TA 2025 Murni atau TA 2025 Perubahan 1 (Maret)"
						value="<?php echo htmlspecialchars($this->session->flashdata('old_keterangan') ?: ''); ?>">
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
		<table id="tabelperiode" class="table table-bordered table-responsive table-data-init">
			<thead>
				<tr>
					<th>Kode</th>
					<th>Keterangan</th>
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
