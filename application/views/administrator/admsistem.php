<?php $this->load->view('_appshell/1head2'); ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0"> Administrasi Sistem <a style="font-size: .6em" href="#" id="relayoutPage"><i class="fa fa-sync"></i></a></h1>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<div class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-4  ">
					<?php $this->load->view('administrator/admsistem/master_user'); ?>
				</div>
				<!-- /.col-md-6 -->
				<div class="col-lg-4">
					<?php $this->load->view('administrator/admsistem/master_opd'); ?>
				</div>
				<!-- /.col-md-6 -->
				<div class="col-lg-4">
					<?php $this->load->view('administrator/admsistem/master_mitra'); ?>
				</div>
				<!-- /.col-md-6 -->
			</div>
			<!-- /.row -->
			<div class="row">
				<div class="col-lg-4">
					<?php $this->load->view('administrator/admsistem/master_visi'); ?>
				</div>
				<!-- /.col-md-6 -->
				<div class="col-lg-4">
					<?php $this->load->view('administrator/admsistem/master_misi'); ?>
				</div>
				<!-- /.col-md-6 -->
				<div class="col-lg-4">
					<?php $this->load->view('administrator/admsistem/master_periodeanggaran'); ?>
				</div>

				<!-- /.col-md-6 -->
			</div>
			<!-- /.row -->
			<div class="row">
				<div class="col-lg-4">
					<?php $this->load->view('administrator/admsistem/master_groupperiode'); ?>
				</div>

				<div class="col-lg-8">
					<?php $this->load->view('administrator/admsistem/master_branding'); ?>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content -->
	<div id="box1"></div>
</div>
<!-- /.content-wrapper -->


<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
	<!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->

<!-- Main Footer -->

<?php $this->load->view("_appshell/6foot"); ?>
</div>
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
				<form id="reset-pass" method="post" action="#">
					<div class="form-group">
						<input type="hidden" name="id">
						<input type="hidden" name="tag1">
						<input type="password" class="form-control" name="password-baru" placeholder="Masukan password baru">
					</div>
					<div class="form-group">
						<input type="password" class="form-control" name="password-baru2" placeholder="Ulangi password baru">
					</div>
					<div class="modal-footer pull-right">
						<button type="submit" class="btn btn-warning">Terapkan Password Baru</button>
					</div>
				</form>
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


<?php $this->load->view('_appshell/8scripts'); ?>

<script>
	$(function () {
		$(".table-data-init").DataTable({
			"pageLength": 3,
			"autoWidth": true
		});
	});
</script>
<script>
	$(function () {
		//Initialize Select2 Elements
		// $('.select2').select2()

		//Initialize Select2 Elements
		// $('.select2bs4').select2({
		// 	theme: 'bootstrap4'
		// })
	})
</script>

<?php $this->load->view('_appshell/9foot'); ?>
