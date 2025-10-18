<?php
$table_name = "branding";
$real_name = real_table_name('branding');
$master_branding = $GLOBALS[$real_name];
$a = 1;

$ctrl = 'admsistem/branding/save';

function check_empty($obj, $field, $type = '')
{
	if (!isset($obj))
		return 'xxx-x';
	if (count($obj) < 1)
		return 'xxx-xx';
	if (!isset($obj[$field]))
		return 'xxx-xxx';
	if ($type == 'img') {
		$base_url = base_url(htmlspecialchars($obj[$field]));
		return <<<EOD
			<img src="$base_url" width="500" alt="Backgroud" class="img-thumbnail">
	EOD;
	}

	return htmlspecialchars($obj[$field]);
}
?>

<div class="card card-info card-outline collapsed-card" id="branding">
	<div class="card-header" data-card-widget="collapse">
		<h5 class="card-title m-0"><b>Master Branding</b></h5>
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

		<table class="table table-bordered table-responsive">
			<thead>
				<tr>
					<th>Type</th>
					<th>Preview</th>
					<th>Update</th>
					<th>Save</th>
				</tr>
			</thead>
			<tbody>
				<!--  #region form nama  -->
				<?php echo form_open($ctrl); ?>
				<tr>
					<td>
						<b>Nama</b>
					</td>
					<td>
						<?= check_empty($master_branding[0], 'nama') ?>
					</td>
					<td>
						<input type="text" name="nama" class="form-control" id="nama-aplikasi" placeholder="Nama Aplikasi">
					</td>
					<td>
						<input type="hidden" name="form_name" value="form_nama">
						<button type="submit" class="btn btn-primary">Simpan</button>
					</td>
				</tr>
				<?php echo form_close(); ?>
				<!--  #endregion  -->

				<!-- #region form subnote -->
				<?php echo form_open($ctrl); ?>
				<tr>
					<td><b>Subnote</b></td>
					<td>
						<?= check_empty($master_branding[0], 'subnote') ?>
					</td>
					<td>
						<input type="text" name="subnote" class="form-control" id="subnote" placeholder="Subnote Aplikasi">
					</td>
					<td>
						<input type="hidden" name="form_name" value="form_subnote">
						<button type="submit" class="btn btn-primary">Simpan</button>
					</td>
				</tr>
				<?php echo form_close(); ?>

				<!--  #endregion  -->

				<!--  #region form background -->
				<?php echo form_open_multipart($ctrl); ?>
				<tr>
					<td><b>Background</b></td>
					<td>
						<?= check_empty($master_branding[0], 'background','img') ?>
					</td>
					<td>
						<input class="form-control" type="file" name="background" id="background" accept="image/*">
					</td>
					<td>

						<input type="hidden" name="form_name" value="form_background">
						<button type="submit" class="btn btn-primary">Simpan</button>
					</td>
				</tr>
				<?php echo form_close(); ?>

				<!--  #endregion  -->

				<!-- #region form logo -->
				<?php echo form_open_multipart($ctrl); ?>
				<tr>
					<td><b>Logo</b></td>
					<td>
						<?= check_empty($master_branding[0], 'logo','img') ?>
					</td>
					<td>
						<input class="form-control" type="file" name="logo" id="logo" accept="image/*">
					</td>
					<td>
						<input type="hidden" name="form_name" value="form_logo">
						<button type="submit" class="btn btn-primary">Simpan</button>
					</td>
				</tr>
				<?php echo form_close(); ?>

				<!--  #endregion  -->

				<!--  #region form fav  -->
				<?php echo form_open_multipart($ctrl); ?>
				<tr>
					<td><b>favicon</b></td>
					<td>
						<?= check_empty($master_branding[0], 'favicon','img') ?>
					</td>
					<td>
						<input class="form-control" type="file" name="favicon" id="favicon" accept="image/*">
					</td>
					<td>

						<input type="hidden" name="form_name" value="form_favicon">
						<button type="submit" class="btn btn-primary">Simpan</button>
					</td>
				</tr>
				<?php echo form_close(); ?>

				<!--  #endregion */ -->
		</table>
	</div>
</div>
