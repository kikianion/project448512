<?php $this->load->view('_appshell/1head2'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0"> Administrasi Data <a style="font-size: .6em" href="#" id="relayoutPage"><i class="fa fa-sync"></i></a></h1>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

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
				<div class="form-group"><input type="email" class="form-control" xid="password-baru" placeholder="Masukan password baru"></div>
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
<script src="assets/AdminLTE-3.1.0/plugins/summernote/summernote-bs4.min.js"></script>
<script>
	$(function () {
		// Summernote
		$('#summernote').summernote();
		$('#summernote2').summernote();
	})
</script>

<script>
	$(function () {
		//Initialize Select2 Elements
		// $('.select2').select2()

		//Initialize Select2 Elements
		// $('.select2bs4').select2({
		// 	theme: 'bootstrap4'
		// })

		//Datemask dd/mm/yyyy
		// $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
		//Datemask2 mm/dd/yyyy
		// $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
		//Money Euro
		// $('[data-mask]').inputmask()

		//Date picker
		// $('#reservationdate').datetimepicker({
		// 	format: 'L'
		// });

		//Date and time picker
		// $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });

		//Date range picker
		// $('#reservation').daterangepicker()
		//Date range picker with time picker
		// $('#reservationtime').daterangepicker({
		// 	timePicker: true,
		// 	timePickerIncrement: 30,
		// 	locale: {
		// 		format: 'MM/DD/YYYY hh:mm A'
		// 	}
		// })
		//Date range as a button
		// $('#daterange-btn').daterangepicker(
		// 	{
		// 		ranges: {
		// 			'Today': [moment(), moment()],
		// 			'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
		// 			'Last 7 Days': [moment().subtract(6, 'days'), moment()],
		// 			'Last 30 Days': [moment().subtract(29, 'days'), moment()],
		// 			'This Month': [moment().startOf('month'), moment().endOf('month')],
		// 			'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
		// 		},
		// 		startDate: moment().subtract(29, 'days'),
		// 		endDate: moment()
		// 	},
		// 	function (start, end) {
		// 		$('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
		// 	}
		// )

		//Timepicker
		// $('#timepicker').datetimepicker({
		// 	format: 'LT'
		// })

		//Bootstrap Duallistbox
		// $('.duallistbox').bootstrapDualListbox()

		//Colorpicker
		// $('.my-colorpicker1').colorpicker()
		// //color picker with addon
		// $('.my-colorpicker2').colorpicker()

		$('.my-colorpicker2').on('colorpickerChange', function (event) {
			$('.my-colorpicker2 .fa-square').css('color', event.color.toString());
		})

		$("input[data-bootstrap-switch]").each(function () {
			$(this).bootstrapSwitch('state', $(this).prop('checked'));
		})

	})
	// BS-Stepper Init
	document.addEventListener('DOMContentLoaded', function () {
		// window.stepper = new Stepper(document.querySelector('.bs-stepper'))
	})

	// DropzoneJS Demo Code Start
	// Dropzone.autoDiscover = false

	// Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
	var previewNode = document.querySelector("#template")
	// previewNode.id = ""
	// var previewTemplate = previewNode.parentNode.innerHTML
	// previewNode.parentNode.removeChild(previewNode)

	// var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
	// 	url: "/target-url", // Set the url
	// 	thumbnailWidth: 80,
	// 	thumbnailHeight: 80,
	// 	parallelUploads: 20,
	// 	previewTemplate: previewTemplate,
	// 	autoQueue: false, // Make sure the files aren't queued until manually added
	// 	previewsContainer: "#previews", // Define the container to display the previews
	// 	clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
	// })

	// myDropzone.on("addedfile", function (file) {
	// 	// Hookup the start button
	// 	file.previewElement.querySelector(".start").onclick = function () { myDropzone.enqueueFile(file) }
	// })

	// // Update the total progress bar
	// myDropzone.on("totaluploadprogress", function (progress) {
	// 	document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
	// })

	// myDropzone.on("sending", function (file) {
	// 	// Show the total progress bar when upload starts
	// 	document.querySelector("#total-progress").style.opacity = "1"
	// 	// And disable the start button
	// 	file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
	// })

	// // Hide the total progress bar when nothing's uploading anymore
	// myDropzone.on("queuecomplete", function (progress) {
	// 	document.querySelector("#total-progress").style.opacity = "0"
	// })

	// Setup the buttons for all transfers
	// The "add files" button doesn't need to be setup because the config
	// `clickable` has already been specified.
	// document.querySelector("#actions .start").onclick = function () {
	// 	myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
	// }
	// document.querySelector("#actions .cancel").onclick = function () {
	// 	myDropzone.removeAllFiles(true)
	// }
	// DropzoneJS Demo Code End

</script>

<script>
	$(function () {
		$(".table-data-init").DataTable({
			"pageLength": 3,
			"autoWidth": true
		});
	});
</script>


<?php $this->load->view('_appshell/9foot'); ?>
