<?php $this->load->view('_appshell/1head2'); ?>

<?php
function gen_card($id)
{
	$file_path = APPPATH . 'template/card.php';
	if (!file_exists($file_path)) {
		echo json_encode(['error' => 'File not found']);
		return;
	}
	ob_start();
	$title = $id;
	include($file_path);
	$content = ob_get_contents();
	ob_end_clean(); // Discard the buffer and stop buffering
	return $content;
}
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0"> Mitra - Verifikasi Master Data</h1>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<div class="content">
		<div class="container-fluid">
			<div class="row">

				<?= gen_card('mitra') ?>

				<!-- /.col-md-6 -->
			</div>
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content -->
</div>


<?php $this->load->view('_appshell/6foot'); ?>

<?php $this->load->view('_appshell/8scripts'); ?>

<?php $this->load->view('_appshell/9foot'); ?>
