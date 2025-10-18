<?php
$table_name = "indikator_RPJMD";
$tipe = "Sasaran";
?>

<div class="card card-info card-outline collapsed-card" id="card-indikator-sasaran-rpjmd">
	<div class="card-header" data-card-widget="collapse">
		<h5 class="card-title m-0"><b>Indikator Sasaran RPJMD</b></h5>
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

		<?= widget_flash($table_name, $tipe) ?>

		<div id="form-<?= $table_name ?>">
			<?php echo form_open("handler/save/$table_name"); ?>
			<input type="hidden" <?= expandFieldAttr('id') ?>>
			<input type="hidden" <?= expandFieldAttr('tipe', $tipe) ?>>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Indikator</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" placeholder="Tuliskan Nama Indikator" <?= expandFieldAttr('indikator') ?> required maxlength="200" />
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Sasaran</label>
				<div class="col-sm-10">
					<?= expandFieldAttrSelectActive("kode", 'sasaran_RPJMD', 'sasaran') ?>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Satuan</label>
				<div class="col-sm-4">
					<input type="text" name="satuan" class="form-control" placeholder="Satuan Indikator"
						value="<?php echo isset($edit_indikator_sasaran->satuan) ? htmlspecialchars($edit_indikator_sasaran->satuan) : ''; ?>" maxlength="50">
				</div>
				<label class="col-sm-2 col-form-label">Awal</label>
				<div class="col-sm-4">
					<input type="number" name="kondisi_awal" class="form-control" placeholder="Kondisi Awal Periode"
						value="<?php echo isset($edit_indikator_sasaran->kondisi_awal) ? htmlspecialchars($edit_indikator_sasaran->kondisi_awal) : ''; ?>"
						step="0.01">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Formulasi</label>
				<div class="col-sm-10">
					<textarea name="formulasi" class="form-control" rows="3"
						placeholder="Formulasi perhitungan indikator"><?php echo isset($edit_indikator_sasaran->formulasi) ? htmlspecialchars($edit_indikator_sasaran->formulasi) : ''; ?></textarea>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Target</label>
				<div class="col-sm-2">
					<input type="number" name="target_1" class="form-control" placeholder="Tahun-1" step="0.01"
						value="<?php echo isset($edit_indikator_sasaran->target_1) ? htmlspecialchars($edit_indikator_sasaran->target_1) : ''; ?>">
				</div>
				<div class="col-sm-2">
					<input type="number" name="target_2" class="form-control" placeholder="Tahun-2" step="0.01"
						value="<?php echo isset($edit_indikator_sasaran->target_2) ? htmlspecialchars($edit_indikator_sasaran->target_2) : ''; ?>">
				</div>
				<div class="col-sm-2">
					<input type="number" name="target_3" class="form-control" placeholder="Tahun-3" step="0.01"
						value="<?php echo isset($edit_indikator_sasaran->target_3) ? htmlspecialchars($edit_indikator_sasaran->target_3) : ''; ?>">
				</div>
				<div class="col-sm-2">
					<input type="number" name="target_4" class="form-control" placeholder="Tahun-4" step="0.01"
						value="<?php echo isset($edit_indikator_sasaran->target_4) ? htmlspecialchars($edit_indikator_sasaran->target_4) : ''; ?>">
				</div>
				<div class="col-sm-2">
					<input type="number" name="target_5" class="form-control" placeholder="Tahun-5" step="0.01"
						value="<?php echo isset($edit_indikator_sasaran->target_5) ? htmlspecialchars($edit_indikator_sasaran->target_5) : ''; ?>">
					<input type="hidden" name="id"
						value="<?php echo isset($edit_indikator_sasaran->id) ? htmlspecialchars($edit_indikator_sasaran->id) : ''; ?>">

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
		<table id="tabelindikatorsasaran" class="table table-bordered table-responsive table-data-init">
			<thead>
				<tr>
					<th>Sasaran</th>
					<th>Indikator</th>
					<th>Satuan</th>
					<th>Kondisi Awal</th>
					<th>Formulasi</th>
					<th>Status</th>
					<th>Tindakan</th>
				</tr>
			</thead>
			<tbody>
				<?= $f_expandTableCard($table_name . "::tipe=" . $tipe, 'id,kode::sasaran_RPJMD::sasaran,indikator,satuan,kondisiawal,formulasi,status', ['width_class_edit_dlg' => 'modal-lg']) ?>
			</tbody>
		</table>
	</div>
</div>
