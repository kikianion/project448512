<?php
$table_name = "berita";
?>

<div class="card card-info card-outline collapsed-card">
	<div class="card-header" data-card-widget="collapse">
		<h5 class="card-title m-0"><b>Berita</b></h5>
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
				<label for="visi" class="col-sm-2 col-form-label">Judul</label>
				<div class="col-sm-10">
					<input class="form-control" <?= expandFieldAttr('judul') ?> placeholder="Judul">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Isi</label>
				<div class="col-sm-10">
					<?php $prev_val = 'x' ?>
					<textarea class='summernote' rows="4" <?= expandFieldAttr('isi', null, $prev_val) ?>>
						<?= $prev_val ?>
					</textarea>
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
		<table id="tabelvisi" class="table table-bordered table-responsive table-data-init">
			<thead>
				<tr>
					<th>Tanggal</th>
					<th>Judul</th>
					<th>Isi</th>
					<th>Tindakan</th>
				</tr>
			</thead>
			<tbody>
				<?= $f_expandTableCard($table_name) ?>
			</tbody>
		</table>
	</div>
</div>