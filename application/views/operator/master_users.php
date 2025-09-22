<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $title; ?> - Simela Gen2</title>

	<link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE-3.1.0/plugins/fontawesome-free/css/all.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE-3.1.0/dist/css/adminlte.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE-3.1.0/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE-3.1.0/plugins/datatables-responsive/css/responsive.bootstrap4.min.css'); ?>">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

	<nav class="main-header navbar navbar-expand navbar-white navbar-light">
		<ul class="navbar-nav">
			<li class="nav-item">
				<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
			</li>
			<li class="nav-item d-none d-sm-inline-block">
				<a href="<?php echo base_url('dashboard'); ?>" class="nav-link">Dashboard</a>
			</li>
			<li class="nav-item d-none d-sm-inline-block">
				<a href="<?php echo base_url('oprmaster'); ?>" class="nav-link active">Master Operator</a>
			</li>
		</ul>
		<ul class="navbar-nav ml-auto">
			<li class="nav-item dropdown">
				<a class="nav-link" data-toggle="dropdown" href="#"><i class="fas fa-user"></i></a>
				<div class="dropdown-menu dropdown-menu-right">
					<a class="dropdown-item" href="#"><?php echo isset($user['full_name']) ? $user['full_name'] : 'User'; ?></a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="<?php echo base_url('logout'); ?>"><i class="fas fa-power-off mr-2"></i> Keluar</a>
				</div>
			</li>
		</ul>
	</nav>

	<div class="content-wrapper">
		<div class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1 class="m-0"><?php echo $title; ?></h1>
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="<?php echo base_url('dashboard'); ?>">Home</a></li>
							<li class="breadcrumb-item active"><?php echo $title; ?></li>
						</ol>
					</div>
				</div>
			</div>
		</div>

		<section class="content">
			<div class="container-fluid">
				<div class="card">
					<div class="card-header d-flex justify-content-between align-items-center">
						<h3 class="card-title">Daftar Operator</h3>
						<a href="#" class="btn btn-primary btn-sm" disabled>
							<i class="fas fa-user-plus mr-1"></i>Tambah Operator
						</a>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table id="opsTable" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>ID</th>
										<th>Nama</th>
										<th>Email</th>
										<th>Telepon</th>
										<th>Status</th>
										<th>Dibuat</th>
									</tr>
								</thead>
								<tbody>
									<?php if (!empty($users)): ?>
										<?php foreach ($users as $op): ?>
										<tr>
											<td><?php echo $op->id; ?></td>
											<td><?php echo isset($op->full_name) ? $op->full_name : ($op->name ?? ''); ?></td>
											<td><?php echo $op->email; ?></td>
											<td><?php echo isset($op->phone) ? $op->phone : '-'; ?></td>
											<td>
												<span class="badge badge-<?php echo (isset($op->status) ? ($op->status === 'active' ? 'success' : 'secondary') : ($op->is_active ? 'success' : 'secondary')); ?>">
													<?php echo isset($op->status) ? ucfirst($op->status) : (($op->is_active ?? 0) ? 'Active' : 'Inactive'); ?>
												</span>
											</td>
											<td><?php echo isset($op->created_at) ? date('d/m/Y H:i', strtotime($op->created_at)) : '-'; ?></td>
										</tr>
										<?php endforeach; ?>
									<?php else: ?>
									<tr>
										<td colspan="6" class="text-center">Tidak ada operator</td>
									</tr>
									<?php endif; ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>

	<footer class="main-footer">
		<strong>Simela Gen2 by RENDALEV BAPPELITBANGDA LAMONGAN &copy; 2025 <a href="https://adminlte.io">Interface by AdminLTE</a>.</strong>
	</footer>
</div>

<script src="<?php echo base_url('assets/AdminLTE-3.1.0/plugins/jquery/jquery.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/AdminLTE-3.1.0/plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/AdminLTE-3.1.0/dist/js/adminlte.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/AdminLTE-3.1.0/plugins/datatables/jquery.dataTables.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/AdminLTE-3.1.0/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/AdminLTE-3.1.0/plugins/datatables-responsive/js/dataTables.responsive.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/AdminLTE-3.1.0/plugins/datatables-responsive/js/responsive.bootstrap4.min.js'); ?>"></script>
<script>
$(function(){
	$('#opsTable').DataTable({
		responsive:true,
		lengthChange:false,
		autoWidth:false,
		pageLength:25,
		language:{ url: "//cdn.datatables.net/plug-ins/1.10.24/i18n/Indonesian.json" }
	});
});
</script>
</body>
</html>


