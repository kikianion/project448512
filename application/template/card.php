<?php
// $title = "xxx xx";

$titleId = str_replace(" ", "_", $title);
$titleId = str_replace("-", "_", $titleId);
$titleId = trim($titleId);

?>

<div class="col-lg-4">
	<div class="card card-info card-outline collapsed-card" id="card-<?= $titleId ?>">
		<div class="card-header" data-card-widget="collapse">
			<h5 class="card-title m-0"><b><?= $title ?></b></h5>
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

			<?= widget_flash($titleId) ?>

			<div id="form-<?= $titleId ?>">
				<?php echo form_open("handler/save/$titleId"); ?>
				<?php
				include_once(APPPATH . 'template/layout_card.php');

				if (isset($layout_card[$titleId])) {
					foreach ($layout_card[$titleId] as $row) {
						?>
						<div class="form-group row">
							<?php
							for ($i = 0; $i < count($row); $i += 2) {
								// echo "col-sm-" . $row[$i];
								$val1 = $row[$i];
								$pos1 = strpos($val1, ':');
								$row_width = $pos1 ? substr($val1, 0, count($val1) - $pos1) : $val1;
								$placeholder = $pos1?substr($val1, $pos1):'';
								if ($row_width != 0) {
									?>
									<label class="col-sm-<?= $row_width ?> col-form-label">xxx</label>
									<?php
								}

								$val1 = $row[$i+1];
								$pos1 = strpos($val1, ':');
								$row_width = $pos1 ? substr($val1, 0, $pos1) : $val1;

								$placeholder = $pos1?substr($val1, $pos1):'';

								?>
								<div class="col-sm-<?= $row_width ?>">
									<input type="text" name="xxx" class="form-control" _id="xxx" placeholder="<?= $placeholder ?>" required maxlength="50" />
								</div>

								<?php
								// echo "col-sm-" . $row[$i + 1];
							}
							?>
						</div>
						<?php
					}
				}

				?>
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
			<table id="tabelfungsi" class="table table-bordered table-responsive table-data-init">
				<thead>
					<tr>
						<th>xxx</th>
					</tr>
				</thead>
				<tbody>
					<?php if (!empty($master_fungsi)):
						foreach ($master_fungsi as $f): ?>
							<tr>
								<td><?= "xxx" ?></td>
							</tr>
						<?php endforeach;
					else: ?>
						<tr>
							<td colspan="5">-.
							</td>
						</tr>
					<?php endif; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<script>
	function editModalFungsi(id) {
		$.ajax({
			url: 'admdata/fungsi/byId/' + id,
			success: function (res) {
				if (res.status === 'success') {
					$('#edit-record-common').appendTo('body').modal('show');
					$('#edit-record-common .modal-body').html($('#form-<?= $tag1 ?>').html());
					$('#edit-record-common .modal-title').html("Edit data fungsi");

					$('#edit-record-common input[name=namafungsi]').val(res.data.namafungsi);
					$('#edit-record-common input[name=deskripsi]').val(res.data.deskripsi);
					$('#edit-record-common input[name=status]').val(res.data.status);
					$('#edit-record-common input[name=urut]').val(res.data.urut);
					$('#edit-record-common input[name=id]').val(res.data.id);
				}
			},
		});
	}
</script>
