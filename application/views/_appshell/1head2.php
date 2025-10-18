<?php

function widget_flash($table_name, $tipe = '')
{
	$CI = &get_instance();
	$html = '';

	$d1 = $CI->session->flashdata();
	// log2(serialize($d1));
	$tipe = $tipe == '' ? '' : "---$tipe";
	if ($CI->session->flashdata('success---' . $table_name . $tipe)) {
		$html .= '<div class="alert alert-success">' . $CI->session->flashdata('success---' . $table_name . $tipe) . '</div>';
	}
	if ($CI->session->flashdata('error---' . $table_name . $tipe)) {
		$html .= '<div class="alert alert-danger">' . $CI->session->flashdata('error---' . $table_name . $tipe) . '</div>';
	}
	if ($CI->session->flashdata('dlgsuccess---' . $table_name . $tipe)) {
		$msg = $CI->session->flashdata('dlgsuccess---' . $table_name . $tipe);
		$html .= <<<EEE
		<script>
			document.addEventListener('DOMContentLoaded', function () {
				let dlg1='#ubah-status-common-res'
				$(dlg1).appendTo('body').modal('show')
				$(dlg1 + ' .modal-body #msg1').html(`$msg`);
				
			})
		</script>
EEE;
	}

	return $html;
}

?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Simela Gen2</title>

	<!-- Google Font: Source Sans Pro -->
	<!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"> -->
	<!-- Font Awesome Icons -->
	<link rel="stylesheet" href="assets/AdminLTE-3.1.0/plugins/fontawesome-free/css/all.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="assets/AdminLTE-3.1.0/dist/css/adminlte.min.css">
	<!-- DataTables -->
	<link rel="stylesheet" href="assets/AdminLTE-3.1.0/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="assets/AdminLTE-3.1.0/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
	<link rel="stylesheet" href="assets/AdminLTE-3.1.0/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
	<!-- Select2 -->
	<!-- <link rel="stylesheet" href="assets/AdminLTE-3.1.0/plugins/select2/css/select2.min.css"> -->
	<!-- <link rel="stylesheet" href="assets/AdminLTE-3.1.0/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css"> -->
	<!-- DataTables cdn-->
	<!-- <link rel="stylesheet" href="cdn.datatables.net/2.3.2/css/dataTables.dataTables.min.css"> -->
	<link rel="stylesheet" href="../../AdminLTE-3.1.0/plugins/summernote/summernote-bs4.min.css">


</head>
<!-- <body class="hold-transition layout-top-nav layout-navbar-fixed"> -->

<body class="hold-transition layout-top-nav layout-navbar-fixed dark-mode">
	<div class="wrapper">

		<!-- Navbar -->
		<!-- <nav class="main-header navbar navbar-expand-md navbar-light navbar-white"> -->
		<nav class="main-header navbar navbar-expand-md navbar-dark bg-dark">
			<div class="container-fluid">
				<a href="./" class="navbar-brand">
					<img src="assets/AdminLTE-3.1.0/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
						style="opacity: .8">
					<span class="brand-text font-weight-light"><b>Simela-Gen2</b></span>
				</a>

				<button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse"
					aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse order-3" id="navbarCollapse">
					<!-- Left navbar links -->
					<ul class="navbar-nav">
						<li class="nav-item">
							<a href="dashboard" class="nav-link">Home</a>
						</li>
						<li class="nav-item dropdown">
							<a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
								class="nav-link dropdown-toggle">Operator</a>
							<ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
								<li><a href="oprmaster" class="dropdown-item">Master </a></li>
								<li><a href="oprinputdata" class="dropdown-item">Input Data</a></li>
								<!-- End Level two -->
							</ul>
						</li>
						<li class="nav-item dropdown">
							<a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
								class="nav-link dropdown-toggle">Mitra</a>
							<ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
								<li><a href="mitravermaster" class="dropdown-item">Verifikasi Master </a></li>
								<li><a href="mitraverdata" class="dropdown-item">Verifikasi Data</a></li>
								<!-- End Level two -->
							</ul>
						</li>
						<li class="nav-item dropdown">
							<a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
								class="nav-link dropdown-toggle">Monev</a>
							<ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
								<li><a href="monevevaldata" class="dropdown-item">Evaluasi Data</a></li>
								<li><a href="monevlaporan" class="dropdown-item">Laporan</a></li>
								<!-- End Level two -->
							</ul>
						</li>
						<li class="nav-item dropdown">
							<a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
								class="nav-link dropdown-toggle">Administrator</a>
							<ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
								<li><a href="admsistem" class="dropdown-item">Administrasi Sistem</a></li>
								<li><a href="admdata" class="dropdown-item">Administrasi Data</a></li>
								<li><a href="lock" class="dropdown-item">Session Lock</a></li>
								<li><a href="login" class="dropdown-item">Login Page</a></li>
								<!-- End Level two -->
							</ul>
						</li>
						<li class="nav-item">
							<div class="form-check mt-2">
								<input class="form-check-input" type="checkbox" id="auto_reload" value="auto reload" onclick="saveAutoReload()">
								<label class="form-check-label" for="auto_reload">
									auto reload
								</label>
								<label class="form-check-label text-info" id="status1">
									-
								</label>
							</div>
							<script>
								//save this checkbox state to localStorage
								function saveAutoReload() {
									const cb = document.getElementById("auto_reload");
									if (cb) {
										localStorage.setItem("auto_reload", cb.checked ? "1" : "0");
									}
								}

								document.addEventListener("DOMContentLoaded", function () {
									const cb = document.getElementById("auto_reload");
									if (cb) {
										cb.checked = localStorage.getItem("auto_reload") === "1";
									}
								});
							</script>
						</li>

					</ul>

				</div>

				<!-- Right navbar links -->
				<ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
					<!-- Messages Dropdown Menu -->
					<li class="nav-item dropdown">
						<a class="nav-link" data-toggle="dropdown" href="#">
							<i class="fas fa-user"></i>
						</a>
						<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
							<a href="#" class="dropdown-item">
								<!-- Message Start -->
								<div class="media">
									<img src="assets/AdminLTE-3.1.0/dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
									<div class="media-body">
										<h3 class="dropdown-item-title">
											Operator<p>Dinas XXXXXXX
										</h3>
									</div>
								</div>
								<div>
									<a class="btn btn-app bg-info" data-toggle="modal" data-target="#notifikasi"><i class="fas fa-bell"></i> Notifikasi</a>
									<a class="btn btn-app bg-warning" data-toggle="modal" data-target="#reset-password"><i class="fas fa-key"></i> Sandi</a>
									<a class="btn btn-app bg-danger" href="login.html"><i class="fas fa-power-off"></i> Keluar</a>
								</div>
								<!-- Message End -->
							</a>
						</div>
					</li>
					<li class="nav-item">
					</li>
				</ul>
			</div>
		</nav>
		<!-- /.navbar -->
