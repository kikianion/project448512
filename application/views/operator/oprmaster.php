<?php $this->load->view('_appshell/1head2'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0"> Operator - Master Data <a style="font-size: .6em" href="#" id="relayoutPage"><i class="fa fa-sync"></i></a></h1>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<div class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-6">
					<?php $this->load->view('operator/opr/01_tujuan_perangkat_daerah'); ?>
				</div>
				<div class="col-lg-6">
					<?php $this->load->view('operator/opr/02_indikator_tujuan_perangkat_daerah'); ?>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6">
					<?php $this->load->view('operator/opr/03_sasaran_perangkat_daerah'); ?>
				</div>
				<div class="col-lg-6">
					<?php $this->load->view('operator/opr/04_indikator_sasaran_perangkat_daerah'); ?>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6">
					<?php $this->load->view('operator/opr/05_program_perangkat_daerah.php'); ?>
				</div>
				<div class="col-lg-6">
					<?php $this->load->view('operator/opr/06_indikator_program_perangkat_daerah'); ?>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6">
					<?php //$this->load->view('operator/opr/sasaran_perangkat_daerah'); ?>
				</div>
				<div class="col-lg-6">
					indikator sasaran xxxxxxxxxxxxxxxxxxxxxxxxxx
					<?php //$this->load->view('operator/opr/indikator_sasaran_perangkat_daerah'); ?>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6">
					<?php $this->load->view('operator/opr/sub_kegiatan'); ?>
				</div>
				<div class="col-lg-6">
					<?php //$this->load->view('operator/opr/indikator_sasaran_perangkat_daerah'); ?>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
	<!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->

<?php $this->load->view("_appshell/6foot"); ?>

<div class="modal fade" id="notifikasi">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Pengumuman</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<h5 class="text-bold">Judul Pengumuman 1</h5>
				<h6 class="text-monospace">Tanggal : 25 Mei 2025</h>
					<p></p>
					<p>Pengumuman akan ditampilkan kepada seluruh user, dengan urutan Pengumuman paling baru ada di paling atas dan batas maksimal 5
						Pengumumanyang
						ditampilkan.</p>
					<hr class="hr">
					</hr>
					<h5 class="text-bold">Judul Pengumuman 2</h5>
					<h6 class="text-monospace">Tanggal : 24 Mei 2025</h>
						<p></p>
						<p>Pengumuman akan ditampilkan kepada seluruh user, dengan urutan Pengumuman paling baru ada di paling atas dan batas maksimal 5
							Pengumumanyang
							ditampilkan.</p>
						<hr class="hr">
						</hr>
						<h5 class="text-bold">Judul Pengumuman 3</h5>
						<h6 class="text-monospace">Tanggal : 23 Mei 2025</h>
							<p></p>
							<p>Pengumuman akan ditampilkan kepada seluruh user, dengan urutan Pengumuman paling baru ada di paling atas dan batas maksimal 5
								Pengumumanyang
								ditampilkan.</p>
							<hr class="hr">
							</hr>
							<h5 class="text-bold">Judul Pengumuman 4</h5>
							<h6 class="text-monospace">Tanggal : 22 Mei 2025</h>
								<p></p>
								<p>Pengumuman akan ditampilkan kepada seluruh user, dengan urutan Pengumuman paling baru ada di paling atas dan batas maksimal 5
									Pengumumanyang
									ditampilkan.</p>
								<hr class="hr">
								</hr>
								<h5 class="text-bold">Judul Pengumuman 5</h5>
								<h6 class="text-monospace">Tanggal : 21 Mei 2025</h>
									<p></p>
									<p>Pengumuman akan ditampilkan kepada seluruh user, dengan urutan Pengumuman paling baru ada di paling atas dan batas
										maksimal 5
										Pengumumanyang ditampilkan.</p>
			</div>
			<div class="modal-footer pull-right">
				<button type="button" class="btn btn-info">Oke</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<div class="modal fade" id="reset-password">
	<div class="modal-dialog modal-md modal-outline">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Reset Password</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-group"><input type="password" class="form-control" id="password-baru" placeholder="Masukan password baru Anda"></div>
				<div class="form-group"><input type="password" class="form-control" id="password-baru2" placeholder="Ulangi password baru Anda"></div>
				<div class="modal-footer pull-right">
					<button type="button" class="btn btn-warning">Terapkan Password Baru</button>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
</div>
<div class="modal fade" id="ubah-password">
	<div class="modal-dialog modal-md modal-outline">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Reset Password User harus@gmail.com</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-group"><input  class="form-control" id="password-baru" placeholder="Masukan password baru"></div>
				<div class="modal-footer pull-right">
					<button type="button" class="btn btn-warning">Terapkan Password Baru</button>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
</div>

<!-- REQUIRED SCRIPTS -->
<?php $this->load->view('_appshell/8scripts'); ?>

<!-- Summernote -->
<script src="assets/AdminLTE-3.1.0/plugins/summernote/summernote-bs4.min.js"></script>
<script>
	$(function () {
		$('.summernote').summernote();
	})
</script>

<?php $this->load->view('_appshell/9foot'); ?>
