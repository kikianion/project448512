<?php
$table_name = "indikator_perangkat_daerah";
$tipe = "Sasaran";

?>

<div class="card card-info card-outline collapsed-card">
	<div class="card-header" data-card-widget="collapse">
		<h5 class="card-title m-0"><b>Indikator Sasaran Perangkat Daerah</b></h5>
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
				<label for="inputEmail3" class="col-sm-2 col-form-label">Indikator</label>
				<div class="col-sm-10">
					<input class="form-control" placeholder="Tuliskan Nama Indikator" <?= expandFieldAttr('indikator') ?>>
				</div>
			</div>
			<div class="form-group row">
				<label for="inputEmail3" class="col-sm-2 col-form-label">Sasaran</label>
				<div class="col-sm-10">
					<?= expandFieldAttrSelectActive("kode", 'sasaran_perangkat_daerah', 'nama') ?>
				</div>
			</div>
			<div class="form-group row">
				<label for="inputEmail3" class="col-sm-2 col-form-label">Satuan</label>
				<div class="col-sm-4">
					<input class="form-control" id="satuan" placeholder="Satuan Indikator">
				</div>
				<label for="inputEmail3" class="col-sm-2 col-form-label">Awal</label>
				<div class="col-sm-4">
					<input class="form-control" id="satuan" placeholder="Kondisi Awal Periode">
				</div>
			</div>
			<div class="form-group row">
				<label for="inputEmail3" class="col-sm-2 col-form-label">Formulasi</label>
				<?php $prev_val = 'x' ?>
				<textarea class='summernote' rows="4" <?= expandFieldAttr('formulasi', null, $prev_val) ?>>
						<?= $prev_val ?>
				</textarea>
			</div>
			<div class="form-group row">
				<label for="inputEmail3" class="col-sm-2 col-form-label">Target</label>
				<div class="col-sm-2">
					<input class="form-control" id="urutanpd" placeholder="Tahun-1">
				</div>
				<div class="col-sm-2">
					<input class="form-control" id="urutanpd" placeholder="Tahun-2">
				</div>
				<div class="col-sm-2">
					<input class="form-control" id="urutanpd" placeholder="Tahun-3">
				</div>
				<div class="col-sm-2">
					<input class="form-control" id="urutanpd" placeholder="Tahun-4">
				</div>
				<div class="col-sm-2">
					<input class="form-control" id="urutanpd" placeholder="Tahun-5">
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
		<table id="tabelopd" class="table table-bordered table-responsive">
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
				<?= $f_expandTableCard($table_name."::tipe=".$tipe, 'id,kode::sasaran_perangkat_daerah::nama,indikator,satuan,kondisiawal,formulasi,status', ['width_class_edit_dlg' => 'modal-lg']) ?>
			</tbody>
		</table>
	</div>
</div>
