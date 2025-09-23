<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $title; ?> - Simela Gen2</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE-3.1.0/plugins/fontawesome-free/css/all.min.css'); ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE-3.1.0/dist/css/adminlte.min.css'); ?>">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?php echo base_url('dashboard'); ?>" class="nav-link">Dashboard</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?php echo base_url('admsistem'); ?>" class="nav-link">Admin Sistem</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?php echo base_url('admdata'); ?>" class="nav-link">Admin Data</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fas fa-user"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <div class="media">
              <img src="<?php echo base_url('assets/AdminLTE-3.1.0/dist/img/user1-128x128.jpg'); ?>" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title"><?php echo isset($user['full_name']) ? $user['full_name'] : 'Admin'; ?></h3>
                <p class="text-sm text-muted"><?php echo isset($user['role']) ? ucfirst($user['role']) : 'Administrator'; ?></p>
              </div>
            </div>
          </a>
          <div class="dropdown-divider"></div>
          <a href="<?php echo base_url('logout'); ?>" class="dropdown-item">
            <i class="fas fa-power-off mr-2"></i> Keluar
          </a>
        </div>
      </li>
    </ul>
  </nav>

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo base_url('admdata'); ?>" class="brand-link">
      <img src="<?php echo base_url('assets/AdminLTE-3.1.0/dist/img/AdminLTELogo.png'); ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admin Data</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url('assets/AdminLTE-3.1.0/dist/img/user1-128x128.jpg'); ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo isset($user['full_name']) ? $user['full_name'] : 'Admin'; ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="<?php echo base_url('admdata/dashboard'); ?>" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('admdata/import'); ?>" class="nav-link active">
              <i class="nav-icon fas fa-upload"></i>
              <p>Import Data</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('admdata/export'); ?>" class="nav-link">
              <i class="nav-icon fas fa-download"></i>
              <p>Export Data</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('admdata/backup'); ?>" class="nav-link">
              <i class="nav-icon fas fa-database"></i>
              <p>Backup Data</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('admdata/restore'); ?>" class="nav-link">
              <i class="nav-icon fas fa-undo"></i>
              <p>Restore Data</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('admdata/cleanup'); ?>" class="nav-link">
              <i class="nav-icon fas fa-broom"></i>
              <p>Pembersihan</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('admdata/statistics'); ?>" class="nav-link">
              <i class="nav-icon fas fa-chart-bar"></i>
              <p>Statistik</p>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </aside>

  <!-- Content Wrapper -->
  <div class="content-wrapper">
    <!-- Content Header -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?php echo $title; ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard'); ?>">Home</a></li>
              <li class="breadcrumb-item"><a href="<?php echo base_url('admdata'); ?>">Admin Data</a></li>
              <li class="breadcrumb-item active"><?php echo $title; ?></li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Flash messages -->
        <?php if ($this->session->flashdata('success')): ?>
          <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-check"></i> Berhasil!</h5>
            <?php echo $this->session->flashdata('success'); ?>
          </div>
        <?php endif; ?>

        <?php if ($this->session->flashdata('error')): ?>
          <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-ban"></i> Error!</h5>
            <?php echo $this->session->flashdata('error'); ?>
          </div>
        <?php endif; ?>

        <div class="row">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Form Import Data</h3>
              </div>
              <div class="card-body">
                <?php echo form_open_multipart('admdata/import'); ?>
                  <div class="form-group">
                    <label for="import_type">Tipe File</label>
                    <select class="form-control" id="import_type" name="import_type" required>
                      <option value="">Pilih Tipe File</option>
                      <option value="csv">CSV</option>
                      <option value="json">JSON</option>
                      <option value="excel">Excel (XLSX)</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="data_table">Tabel Tujuan</label>
                    <select class="form-control" id="data_table" name="data_table" required>
                      <option value="">Pilih Tabel</option>
                      <?php if (!empty($available_tables)): ?>
                        <?php foreach ($available_tables as $table): ?>
                          <option value="<?php echo $table; ?>"><?php echo $table; ?></option>
                        <?php endforeach; ?>
                      <?php endif; ?>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="import_file">File Data</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="import_file" name="import_file" accept=".csv,.json,.xlsx,.xls" required>
                        <label class="custom-file-label" for="import_file">Pilih file...</label>
                      </div>
                    </div>
                    <small class="form-text text-muted">
                      Format yang didukung: CSV, JSON, Excel (XLSX). Maksimal 10MB.
                    </small>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                      <i class="fas fa-upload mr-2"></i>Import Data
                    </button>
                    <a href="<?php echo base_url('admdata/dashboard'); ?>" class="btn btn-secondary">
                      <i class="fas fa-arrow-left mr-2"></i>Kembali
                    </a>
                  </div>
                <?php echo form_close(); ?>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Panduan Import</h3>
              </div>
              <div class="card-body">
                <h6><strong>Format CSV:</strong></h6>
                <ul>
                  <li>Baris pertama adalah header</li>
                  <li>Pemisah menggunakan koma (,)</li>
                  <li>Encoding UTF-8</li>
                </ul>

                <h6><strong>Format JSON:</strong></h6>
                <ul>
                  <li>Array of objects</li>
                  <li>Key harus sesuai dengan kolom tabel</li>
                </ul>

                <h6><strong>Format Excel:</strong></h6>
                <ul>
                  <li>Baris pertama adalah header</li>
                  <li>Sheet pertama yang akan diimport</li>
                </ul>

                <div class="alert alert-info">
                  <h6><i class="icon fas fa-info"></i> Catatan:</h6>
                  <small>
                    Pastikan struktur data sesuai dengan tabel yang dipilih. 
                    Kolom yang tidak ada akan diabaikan.
                  </small>
                </div>
              </div>
            </div>

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Template Download</h3>
              </div>
              <div class="card-body">
                <p>Download template untuk memudahkan import data:</p>
                <div class="btn-group-vertical btn-block">
                  <a href="#" class="btn btn-outline-primary btn-sm mb-2">
                    <i class="fas fa-file-csv mr-2"></i>Template CSV
                  </a>
                  <a href="#" class="btn btn-outline-success btn-sm mb-2">
                    <i class="fas fa-file-code mr-2"></i>Template JSON
                  </a>
                  <a href="#" class="btn btn-outline-warning btn-sm">
                    <i class="fas fa-file-excel mr-2"></i>Template Excel
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- Footer -->
  <footer class="main-footer">
    <strong>Simela Gen2 by RENDALEV BAPPELITBANGDA LAMONGAN &copy; 2025 <a href="https://adminlte.io">Interface by AdminLTE</a>.</strong>
  </footer>
</div>

<!-- jQuery -->
<script src="<?php echo base_url('assets/AdminLTE-3.1.0/plugins/jquery/jquery.min.js'); ?>"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('assets/AdminLTE-3.1.0/plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/AdminLTE-3.1.0/dist/js/adminlte.min.js'); ?>"></script>
<!-- bs-custom-file-input -->
<script src="<?php echo base_url('assets/AdminLTE-3.1.0/plugins/bs-custom-file-input/bs-custom-file-input.min.js'); ?>"></script>

<script>
$(function () {
  // Initialize custom file input
  bsCustomFileInput.init();
  
  // File type change handler
  $('#import_type').change(function() {
    var fileType = $(this).val();
    var fileInput = $('#import_file');
    var acceptAttr = '';
    
    switch(fileType) {
      case 'csv':
        acceptAttr = '.csv';
        break;
      case 'json':
        acceptAttr = '.json';
        break;
      case 'excel':
        acceptAttr = '.xlsx,.xls';
        break;
    }
    
    fileInput.attr('accept', acceptAttr);
  });
});
</script>

</body>
</html>
