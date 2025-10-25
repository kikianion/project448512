<?php $this->load->view('_appshell/1head2'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<?php $this->load->view('_appshell/page_head', ["page_title" => "Administrasi Data",]); ?>


	<!-- Main content -->
	<div class="content">
		<div class="container-fluid">
			<!-- First Row: Master Fungsi, Master Urusan, Master Program -->
			<div class="row">
				<div class="col-lg-4">
					<?php $this->load->view('administrator/admdata/master_fungsi'); ?>
				</div>
				<div class="col-lg-4">
					<?php $this->load->view('administrator/admdata/master_urusan'); ?>
				</div>
				<div class="col-lg-4">
					<?php $this->load->view('administrator/admdata/master_program'); ?>
				</div>
			</div>
			<!-- /.row -->
			<!-- Second Row: Periode RPJMD, Tujuan RPJMD, Sasaran RPJMD -->
			<div class="row">
				<div class="col-lg-4">
					<?php $this->load->view('administrator/admdata/rpjmd_periode'); ?>
				</div>
				<div class="col-lg-4">
					<?php $this->load->view('administrator/admdata/rpjmd_tujuan'); ?>
				</div>
				<div class="col-lg-4">
					<?php $this->load->view('administrator/admdata/rpjmd_sasaran'); ?>
				</div>
			</div>
			<!-- Third Row: Indikator Tujuan RPJMD, Indikator Sasaran RPJMD, Master Periode Anggaran -->
			<div class="row">
				<div class="col-lg-4">
					<?php $this->load->view('administrator/admdata/rpjmd_indikator_tujuan'); ?>
				</div>
				<div class="col-lg-4">
					<?php $this->load->view('administrator/admdata/rpjmd_indikator_sasaran'); ?>
				</div>
				<div class="col-lg-4">
					<?php //$this->load->view('administrator/admdata/master_periode_anggaran'); ?>
				</div>
			</div>

			<!-- Fourth Row: Master Grouping Periode and Master Branding -->
			<div class="row">
				<div class="col-lg-4">
					<?php //$this->load->view('administrator/admdata/master_grouping_periode'); ?>
				</div>
				<div class="col-lg-8">
					<?php //$this->load->view('administrator/admdata/master_branding'); ?>
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
				<div class="form-group"><input type="password" class="form-control" xid="password-baru" placeholder="Masukan password baru Anda"></div>
				<div class="form-group"><input type="password" class="form-control" xid="password-baru2" placeholder="Ulangi password baru Anda"></div>
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
				<div class="form-group"><input class="form-control" xid="password-baru" placeholder="Masukan password baru"></div>
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


<?php $this->load->view('_appshell/9foot'); ?>