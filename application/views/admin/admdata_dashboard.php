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
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="assets/AdminLTE-3.1.0/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/AdminLTE-3.1.0/dist/css/adminlte.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="assets/AdminLTE-3.1.0/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="assets/AdminLTE-3.1.0/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="assets/AdminLTE-3.1.0/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="assets/AdminLTE-3.1.0/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="assets/AdminLTE-3.1.0/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

  <link rel="stylesheet" href="assets/AdminLTE-3.1.0/plugins/summernote/summernote-bs4.min.css">

</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container-fluid">
      <a href="./" class="navbar-brand">
        <img src="assets/AdminLTE-3.1.0/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light"><b>Simela-Gen2</b></span>
      </a>

      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="./" class="nav-link">Home</a>
          </li>
          <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Operator</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              <li><a href="oprmaster.html" class="dropdown-item">Master </a></li>
              <li><a href="oprinputdata.html" class="dropdown-item">Input Data</a></li>
              <!-- End Level two -->
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Mitra</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              <li><a href="mitravermaster.html" class="dropdown-item">Verifikasi Master </a></li>
              <li><a href="mitraverdata.html" class="dropdown-item">Verifikasi Data</a></li>
              <!-- End Level two -->
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Monev</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              <li><a href="monevevaldata.html" class="dropdown-item">Evaluasi Data</a></li>
              <li><a href="monevlaporan.html" class="dropdown-item">Laporan</a></li>
              <!-- End Level two -->
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Administrator</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              <li><a href="admsistem.html" class="dropdown-item">Administrasi Sistem</a></li>
              <li><a href="admdata.html" class="dropdown-item">Administrasi Data</a></li>
              <li><a href="lock.html" class="dropdown-item">Session Lock</a></li>
              <li><a href="login.html" class="dropdown-item">Login Page</a></li>
              <!-- End Level two -->
            </ul>
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

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"> Administrasi Sistem</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-4">
            <div class="card card-info card-outline collapsed-card">
              <div class="card-header" data-card-widget="collapse">
                <h5 class="card-title m-0"><b>Master Fungsi</b></h5>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Fungsi</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="fungsi" placeholder="Tuliskan Nama Fungsi">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-2">
                    <button type="submit" class="btn btn-default float-right">Cancel</button>
                  </div>
                  <div class="col-sm-8">
                  </div>
                  <div class="col-sm-2">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                  </div>
                </div>

                <hr class="hr hr-blurry"></hr>
                <table id="tabeluser" class="table table-bordered">
                  <thead>
                  <tr>
                    <th>Nama Fungsi</th>
                    <th>Status</th>
                    <th>Tindakan</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td class="align-middle">Fungsi Kesehatan</td>
                    <td class="align-middle">Aktif</td>
                    <td class="align-middle">
                      <div class="btn-group">
                      <button type="button" class="btn btn-default">Tindakan</button>
                      <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
                        <span class="sr-only"></span>
                      </button>
                      <div class="dropdown-menu" role="menu">
                        <a class="dropdown-item" data-toggle="modal" data-target="#edit-fungsi">Edit</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" data-toggle="modal" data-target="#ubah-statusfungsi">Ubah Status</a>
                      </div>
                    </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="align-middle">Fungsi Pendidikan</td>
                    <td class="align-middle">Tidak Aktif</td>
                    <td class="align-middle">
                      <div class="btn-group">
                      <button type="button" class="btn btn-default">Tindakan</button>
                      <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
                        <span class="sr-only"></span>
                      </button>
                      <div class="dropdown-menu" role="menu">
                        <a class="dropdown-item" data-toggle="modal" data-target="#edit-fungsi">Edit</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" data-toggle="modal" data-target="#ubah-statusfungsi">Ubah Status</a>
                      </div>
                    </div>
                    </td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
          <!-- /.col-md-6 -->
          <div class="col-lg-4">
            <div class="card card-info card-outline collapsed-card">
              <div class="card-header" data-card-widget="collapse">
                <h5 class="card-title m-0"><b>Master Urusan</b></h5>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Urusan</label>
                  <div class="col-sm-8">
                    <input type="email" class="form-control" id="namapd" placeholder="Masukan Nama Urusan">
                  </div>
                  <div class="col-sm-2">
                    <input type="email" class="form-control" id="urutanpd" placeholder="Kode">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Fungsi</label>
                  <div class="col-sm-10">
                    <select class="form-control">
                      <option selected>Pilih salah satu fungsi yang Aktif</option>
                      <option>fungsi Aktif 1</option>
                      <option>fungsi Aktif 2</option>
                      <option>fungsi Aktif 3</option>
                      <option>dst...</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-2">
                    <button type="submit" class="btn btn-default float-right">Cancel</button>
                  </div>
                  <div class="col-sm-8">
                  </div>
                  <div class="col-sm-2">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                  </div>
                </div>
                <hr class="hr hr-blurry"></hr>
                <table id="tabelopd" class="table table-bordered">
                  <thead>
                  <tr>
                    <th>Kode</th>
                    <th>Urusan</th>
                    <th>Fungsi</th>
                    <th>Status</th>
                    <th>Tindakan</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td>01</td>
                    <td>Urusan Kewilayahan</td>
                    <td>Fungsi 1</td>
                    <td>Aktif</td>
                    <td>
                      <div class="btn-group">
                      <button type="button" class="btn btn-default">Tindakan</button>
                      <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
                        <span class="sr-only"></span>
                      </button>
                      <div class="dropdown-menu" role="menu">
                        <a class="dropdown-item" data-toggle="modal" data-target="#edit-urusan">Edit</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" data-toggle="modal" data-target="#ubah-status-urusan">Ubah Status</a>
                      </div>
                    </div>
                    </td>
                  </tr>

                </table>
              </div>
            </div>
          </div>
          <!-- /.col-md-6 -->
          <div class="col-lg-4">
            <div class="card card-info card-outline collapsed-card">
              <div class="card-header" data-card-widget="collapse">
                <h5 class="card-title m-0"><b>Master Program</b></h5>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Program</label>
                  <div class="col-sm-8">
                    <input type="email" class="form-control" id="namapd" placeholder="Masukan Nama Program">
                  </div>
                  <div class="col-sm-2">
                    <input type="email" class="form-control" id="urutanpd" placeholder="Kode">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Urusan</label>
                  <div class="col-sm-10">
                    <select class="form-control">
                      <option selected>Pilih salah satu urusan yang Aktif</option>
                      <option>urusan Aktif 1</option>
                      <option>urusan Aktif 2</option>
                      <option>urusan Aktif 3</option>
                      <option>dst...</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-2">
                    <button type="submit" class="btn btn-default float-right">Cancel</button>
                  </div>
                  <div class="col-sm-8">
                  </div>
                  <div class="col-sm-2">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                  </div>
                </div>
                <hr class="hr hr-blurry"></hr>
                <table id="tabelmitra" class="table table-bordered">
                  <thead>
                  <tr>
                    <th>Kode</th>
                    <th>Program</th>
                    <th>Urusan</th>
                    <th>Status</th>
                    <th>Tindakan</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td>01</td>
                    <td>Program Kesejahteraan</td>
                    <td>Urusan 1</td>
                    <td>Aktif</td>
                    <td>
                      <div class="btn-group">
                      <button type="button" class="btn btn-default">Tindakan</button>
                      <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
                        <span class="sr-only"></span>
                      </button>
                      <div class="dropdown-menu" role="menu">
                        <a class="dropdown-item" data-toggle="modal" data-target="#edit-urusan">Edit</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" data-toggle="modal" data-target="#ubah-status-urusan">Ubah Status</a>
                      </div>
                    </div>
                    </td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
        <div class="row">
          <div class="col-lg-4">
            <div class="card card-info card-outline collapsed-card">
              <div class="card-header" data-card-widget="collapse">
                <h5 class="card-title m-0"><b>Periode RPJMD</b></h5>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Nama</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="namaperiode" placeholder="Nama Peiode RPJMD">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Awal</label>
                  <div class="col-sm-4">
                    <input type="email" class="form-control" id="awalperiode" placeholder="Tahun awal RPJMD">
                  </div>
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Akhir</label>
                  <div class="col-sm-4">
                    <input type="email" class="form-control" id="awalperiode" placeholder="Tahun akhir RPJMD">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-2">
                    <button type="submit" class="btn btn-default float-right">Cancel</button>
                  </div>
                  <div class="col-sm-8">
                  </div>
                  <div class="col-sm-2">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                  </div>
                </div>

                <hr class="hr hr-blurry"></hr>
                <table id="tabelvisi" class="table table-bordered">
                  <thead>
                  <tr>
                    <th>Nama Periode</th>
                    <th>Tahun Periode</th>
                    <th>Status</th>
                    <th>Tindakan</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td class="align-middle"><b>Dasa Swapna Lamongan Berkelanjutan</b></td>
                    <td class="align-middle">2025-2029</td>
                    <td class="align-middle">Aktif</td>
                    <td class="align-middle">
                      <div class="btn-group">
                      <button type="button" class="btn btn-default">Tindakan</button>
                      <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
                        <span class="sr-only"></span>
                      </button>
                      <div class="dropdown-menu" role="menu">
                        <a class="dropdown-item" data-toggle="modal" data-target="#edit-RPJMD">Edit</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" data-toggle="modal" data-target="#ubah-RPJMD">Ubah Status</a>
                      </div>
                    </div>
                    </td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
          <!-- /.col-md-6 -->
          <div class="col-lg-4">
            <div class="card card-info card-outline collapsed-card">
              <div class="card-header" data-card-widget="collapse">
                <h5 class="card-title m-0"><b>Tujuan RPJMD</b></h5>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Misi</label>
                  <div class="col-sm-10">
                    <select class="form-control">
                      <option selected>Pilih salah satu Misi Aktif</option>
                      <option>Misi Aktif 1</option>
                      <option>Misi Aktif 2</option>
                      <option>Misi Aktif 3</option>
                      <option>dst...</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Tujuan</label>
                  <div class="col-sm-8">
                    <input type="email" class="form-control" id="TujuanRPJMD" placeholder="Tujuan RPJMD">
                  </div>
                  <div class="col-sm-2">
                    <input type="email" class="form-control" id="urutanpd" placeholder="urut">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-2">
                    <button type="submit" class="btn btn-default float-right">Cancel</button>
                  </div>
                  <div class="col-sm-8">
                  </div>
                  <div class="col-sm-2">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                  </div>
                </div>
                <hr class="hr hr-blurry"></hr>
                <table id="tabelmisi" class="table table-bordered">
                  <thead>
                  <tr>
                    <th>Urut</th>
                    <th>Misi</th>
                    <th>Tujuan</th>
                    <th>Status</th>
                    <th>Tindakan</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td>1</td>
                    <td>Misi 1</td>
                    <td>Tujuan yang dimaksud sebagaimana di atas</td>
                    <td>Aktif</td>
                    <td>
                      <div class="btn-group">
                      <button type="button" class="btn btn-default">Tindakan</button>
                      <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
                        <span class="sr-only"></span>
                      </button>
                      <div class="dropdown-menu" role="menu">
                        <a class="dropdown-item" data-toggle="modal" data-target="#edit-tujuanrpjmd">Edit</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" data-toggle="modal" data-target="#ubah-status-misi">Ubah Status</a>
                      </div>
                    </div>
                    </td>
                  </tr>

                </table>
              </div>
            </div>
          </div>
          <!-- /.col-md-6 -->
          <div class="col-lg-4">
            <div class="card card-info card-outline collapsed-card">
              <div class="card-header" data-card-widget="collapse">
                <h5 class="card-title m-0"><b>Sasaran RPJMD</b></h5>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Tujuan RPJMD</label>
                  <div class="col-sm-10">
                    <select class="form-control">
                      <option selected>Pilih salah satu Tujuan RPJMD Aktif</option>
                      <option>Tujuan RPJMD Aktif 1</option>
                      <option>Tujuan RPJMD Aktif 2</option>
                      <option>Tujuan RPJMD Aktif 3</option>
                      <option>dst...</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Sasaran RPJMD</label>
                  <div class="col-sm-8">
                    <input type="email" class="form-control" id="TujuanRPJMD" placeholder="Sasaran RPJMD">
                  </div>
                  <div class="col-sm-2">
                    <input type="email" class="form-control" id="urutanpd" placeholder="urut">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-2">
                    <button type="submit" class="btn btn-default float-right">Cancel</button>
                  </div>
                  <div class="col-sm-8">
                  </div>
                  <div class="col-sm-2">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                  </div>
                </div>
                <hr class="hr hr-blurry"></hr>
                <table id="tabelmisi" class="table table-bordered">
                  <thead>
                  <tr>
                    <th>Urut</th>
                    <th>Tujuan RPJMD</th>
                    <th>Sasaran RPJMD</th>
                    <th>Status</th>
                    <th>Tindakan</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td>1</td>
                    <td>Misi 1</td>
                    <td>Tujuan yang dimaksud sebagaimana di atas</td>
                    <td>Aktif</td>
                    <td>
                      <div class="btn-group">
                      <button type="button" class="btn btn-default">Tindakan</button>
                      <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
                        <span class="sr-only"></span>
                      </button>
                      <div class="dropdown-menu" role="menu">
                        <a class="dropdown-item" data-toggle="modal" data-target="#edit-tujuanrpjmd">Edit</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" data-toggle="modal" data-target="#ubah-status-misi">Ubah Status</a>
                      </div>
                    </div>
                    </td>
                  </tr>

                </table>
              </div>
            </div>
          </div>

          <!-- /.col-md-6 -->
        </div>
        <div class="row">
          <div class="col-lg-4">
            <div class="card card-info card-outline collapsed-card">
              <div class="card-header" data-card-widget="collapse">
                <h5 class="card-title m-0"><b>Indikator Tujuan RPJMD</b></h5>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Indikator</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="fungsi" placeholder="Tuliskan Nama Indikator">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">TujuanRPJMD</label>
                  <div class="col-sm-10">
                    <select class="form-control">
                      <option selected>Pilih salah satu TujuanRPJMD yang Aktif</option>
                      <option>Tujuan Aktif 1</option>
                      <option>Tujuan Aktif 2</option>
                      <option>Tujuan Aktif 3</option>
                      <option>dst...</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Satuan</label>
                  <div class="col-sm-4">
                    <input type="email" class="form-control" id="satuan" placeholder="Satuan Indikator">
                  </div>
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Awal</label>
                  <div class="col-sm-4">
                    <input type="email" class="form-control" id="satuan" placeholder="Kondisi Awal Periode">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Formulasi</label>
                  <div class="col-sm-10">
                    <textarea id="summernote" rows="4"></textarea>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Target</label>
                    <div class="col-sm-2">
                      <input type="email" class="form-control" id="urutanpd" placeholder="Tahun-1">
                    </div>
                    <div class="col-sm-2">
                      <input type="email" class="form-control" id="urutanpd" placeholder="Tahun-2">
                    </div>
                    <div class="col-sm-2">
                      <input type="email" class="form-control" id="urutanpd" placeholder="Tahun-3">
                    </div>
                    <div class="col-sm-2">
                      <input type="email" class="form-control" id="urutanpd" placeholder="Tahun-4">
                    </div>
                    <div class="col-sm-2">
                      <input type="email" class="form-control" id="urutanpd" placeholder="Tahun-5">
                    </div>

                </div>
                <div class="form-group row">
                  <div class="col-sm-2">
                    <button type="submit" class="btn btn-default float-right">Cancel</button>
                  </div>
                  <div class="col-sm-8">
                  </div>
                  <div class="col-sm-2">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                  </div>
                </div>
                <hr class="hr hr-blurry"></hr>
                <table id="tabelopd" class="table table-bordered table-responsive">
                  <thead>
                  <tr>
                    <th>Sasaran</th>
                    <th>Indikator</th>
                    <th>Satuan</th>
                    <th>Kondisi Awal</th>
                    <th>Formulasi</th>
                    <th>Status</th>
                    <th>Tindakan</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td>Sasaran Perangkat Daerah 1</td>
                    <td>Indikator Tujuan Perangkat Daerah 1</td>
                    <td>Satuan (Misal Indeks)</td>
                    <td>78,15</td>
                    <td>Kolom ini bisa memuat deskripsi Formulasiyang digunakan untuk menghitung nilai Indikator, bisa berupa rumus atau equation yang dituliskan dengan simbol.</td>
                    <td>Aktif</td>
                    <td>
                      <div class="btn-group">
                      <button type="button" class="btn btn-default">Tindakan</button>
                      <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
                        <span class="sr-only"></span>
                      </button>
                      <div class="dropdown-menu" role="menu">
                        <a class="dropdown-item" data-toggle="modal" data-target="#edit-indikatortujuan">Edit</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" data-toggle="modal" data-target="#ubah-status-urusan">Ubah Status</a>
                      </div>
                    </div>
                    </td>
                  </tr>

                </table>
              </div>
            </div>
          </div>
          <!-- /.col-md-6 -->
          <div class="col-lg-4">
            <div class="card card-info card-outline collapsed-card">
              <div class="card-header" data-card-widget="collapse">
                <h5 class="card-title m-0"><b>Indikator Sasaran RPJMD</b></h5>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Indikator</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="fungsi" placeholder="Tuliskan Nama Indikator">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Sasaran</label>
                  <div class="col-sm-10">
                    <select class="form-control">
                      <option selected>Pilih salah satu Sasaran RPJMD yang Aktif</option>
                      <option>Sasaran Aktif 1</option>
                      <option>Sasaran Aktif 2</option>
                      <option>Sasaran Aktif 3</option>
                      <option>dst...</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Satuan</label>
                  <div class="col-sm-4">
                    <input type="email" class="form-control" id="satuan" placeholder="Satuan Indikator">
                  </div>
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Awal</label>
                  <div class="col-sm-4">
                    <input type="email" class="form-control" id="satuan" placeholder="Kondisi Awal Periode">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Formulasi</label>
                  <div class="col-sm-10">
                    <textarea id="summernote2" rows="4"></textarea>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Target</label>
                    <div class="col-sm-2">
                      <input type="email" class="form-control" id="urutanpd" placeholder="Tahun-1">
                    </div>
                    <div class="col-sm-2">
                      <input type="email" class="form-control" id="urutanpd" placeholder="Tahun-2">
                    </div>
                    <div class="col-sm-2">
                      <input type="email" class="form-control" id="urutanpd" placeholder="Tahun-3">
                    </div>
                    <div class="col-sm-2">
                      <input type="email" class="form-control" id="urutanpd" placeholder="Tahun-4">
                    </div>
                    <div class="col-sm-2">
                      <input type="email" class="form-control" id="urutanpd" placeholder="Tahun-5">
                    </div>

                </div>
                <div class="form-group row">
                  <div class="col-sm-2">
                    <button type="submit" class="btn btn-default float-right">Cancel</button>
                  </div>
                  <div class="col-sm-8">
                  </div>
                  <div class="col-sm-2">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                  </div>
                </div>
                <hr class="hr hr-blurry"></hr>
                <table id="tabelopd" class="table table-bordered table-responsive">
                  <thead>
                  <tr>
                    <th>Tujuan</th>
                    <th>Indikator</th>
                    <th>Satuan</th>
                    <th>Kondisi Awal</th>
                    <th>Formulasi</th>
                    <th>Status</th>
                    <th>Tindakan</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td>Tujuan Perangkat Daerah 1</td>
                    <td>Indikator Tujuan Perangkat Daerah 1</td>
                    <td>Satuan (Misal Indeks)</td>
                    <td>78,15</td>
                    <td>Kolom ini bisa memuat deskripsi Formulasiyang digunakan untuk menghitung nilai Indikator, bisa berupa rumus atau equation yang dituliskan dengan simbol.</td>
                    <td>Aktif</td>
                    <td>
                      <div class="btn-group">
                      <button type="button" class="btn btn-default">Tindakan</button>
                      <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
                        <span class="sr-only"></span>
                      </button>
                      <div class="dropdown-menu" role="menu">
                        <a class="dropdown-item" data-toggle="modal" data-target="#edit-indikatortujuan">Edit</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" data-toggle="modal" data-target="#ubah-status-urusan">Ubah Status</a>
                      </div>
                    </div>
                    </td>
                  </tr>

                </table>
              </div>
            </div>
          </div>
          <!-- /.col-md-6 -->
          <div class="col-lg-4">
            <div class="card card-info card-outline collapsed-card">
              <div class="card-header" data-card-widget="collapse">
                <h5 class="card-title m-0"><b>Master Periode Anggaran</b></h5>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Kode</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="kodeperiode" placeholder="Masukan Kode Periode Anggaran Misal 2025-0 atau 2025-1">
                  </div>

                </div>
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Keterangan</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="keterangan" placeholder="Misal TA 2025 Murni atau TA 2025 Perubahan 1 (Maret)">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-2">
                    <button type="submit" class="btn btn-default float-right">Cancel</button>
                  </div>
                  <div class="col-sm-8">
                  </div>
                  <div class="col-sm-2">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                  </div>
                </div>
                <hr class="hr hr-blurry"></hr>
                <table id="tabelanggaran" class="table table-bordered">
                  <thead>
                  <tr>
                    <th>Kode</th>
                    <th>Keterangan</th>
                    <th>Status</th>
                    <th>Tindakan</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td>2025-0</td>
                    <td>Periode Anggaran 2025 Murni</td>
                    <td>Nonaktif</td>
                    <td>
                      <div class="btn-group">
                      <button type="button" class="btn btn-default">Tindakan</button>
                      <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
                        <span class="sr-only"></span>
                      </button>
                      <div class="dropdown-menu" role="menu">
                        <a class="dropdown-item" data-toggle="modal" data-target="#edit-periodeanggaran">Edit</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" data-toggle="modal" data-target="#ubah-status-periodeanggaran">Ubah Status</a>
                      </div>
                    </div>
                    </td>
                  </tr>
                  <tr>
                    <td>2025-1</td>
                    <td>Periode Anggaran 2025 Perubahan 1 (Maret)</td>
                    <td>Aktif</td>
                    <td>
                      <div class="btn-group">
                      <button type="button" class="btn btn-default">Tindakan</button>
                      <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
                        <span class="sr-only"></span>
                      </button>
                      <div class="dropdown-menu" role="menu">
                        <a class="dropdown-item" data-toggle="modal" data-target="#edit-periodeanggaran">Edit</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" data-toggle="modal" data-target="#ubah-status-periodeanggaran">Ubah Status</a>
                      </div>
                    </div>
                    </td>
                  </tr>
                </table>
              </div>
            </div>
          </div>

          <!-- /.col-md-6 -->
        </div>

        <!-- /.row -->
        <div class="row">
          <div class="col-lg-4">
            <div class="card card-info card-outline collapsed-card">
              <div class="card-header" data-card-widget="collapse">
                <h5 class="card-title m-0"><b>Master Grouping Periode</b></h5>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-3 col-form-label">Group</label>
                  <div class="col-sm-9">
                    <input type="email" class="form-control" id="group" placeholder="Nama grouping">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-3 col-form-label">Jumlah Bulan</label>
                  <div class="col-sm-9">
                    <input type="email" class="form-control" id="group" placeholder="Jumlah Cakupan Bulan">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-2">
                    <button type="submit" class="btn btn-default float-right">Cancel</button>
                  </div>
                  <div class="col-sm-8">
                  </div>
                  <div class="col-sm-2">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                  </div>
                </div>

                <hr class="hr hr-blurry"></hr>
                <table id="tabelgroup" class="table table-bordered">
                  <thead>
                  <tr>
                    <th>Grouping</th>
                    <th>Jumlah Bulan</th>
                    <th>Status</th>
                    <th>Tindakan</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td class="align-middle">Triwulan</td>
                    <td class="align-middle">3</td>
                    <td class="align-middle">Aktif</td>
                    <td class="align-middle">
                      <div class="btn-group">
                      <button type="button" class="btn btn-default">Tindakan</button>
                      <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
                        <span class="sr-only"></span>
                      </button>
                      <div class="dropdown-menu" role="menu">
                        <a class="dropdown-item" data-toggle="modal" data-target="#edit-group">Edit</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" data-toggle="modal" data-target="#ubah-group">Ubah Status</a>
                      </div>
                    </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="align-middle">Kuartal</td>
                    <td class="align-middle">4</td>
                    <td class="align-middle">Aktif</td>
                    <td class="align-middle">
                      <div class="btn-group">
                      <button type="button" class="btn btn-default">Tindakan</button>
                      <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
                        <span class="sr-only"></span>
                      </button>
                      <div class="dropdown-menu" role="menu">
                        <a class="dropdown-item" data-toggle="modal" data-target="#edit-group">Edit</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" data-toggle="modal" data-target="#ubah-group">Ubah Status</a>
                      </div>
                    </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="align-middle">Semester</td>
                    <td class="align-middle">6</td>
                    <td class="align-middle">Aktif</td>
                    <td class="align-middle">
                      <div class="btn-group">
                      <button type="button" class="btn btn-default">Tindakan</button>
                      <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
                        <span class="sr-only"></span>
                      </button>
                      <div class="dropdown-menu" role="menu">
                        <a class="dropdown-item" data-toggle="modal" data-target="#edit-group">Edit</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" data-toggle="modal" data-target="#ubah-group">Ubah Status</a>
                      </div>
                    </div>
                    </td>
                  </tr>
                </table>
              </div>
            </div>
          </div>

          <div class="col-lg-8">
            <div class="card card-info card-outline collapsed-card">
              <div class="card-header" data-card-widget="collapse">
                <h5 class="card-title m-0"><b>Master Branding</b></h5>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                  <tr>
                    <th>Type</th>
                    <th>Preview</th>
                    <th>Update</th>
                    <th>Save</th>
                  </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><b>Nama</b></td>
                      <td>
                        Simela Gen2
                      </td>
                      <td>
                        <input type="email" class="form-control" id="nama-aplikasi" placeholder="Nama Aplikasi">
                      </td>
                      <td>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                      </td>
                    </tr>
                    <tr>
                      <td><b>Subnote</b></td>
                      <td>
                        Sistem Informasi Monitoring dan Evaluasi Lamongan Generasi 2
                      </td>
                      <td>
                        <input type="email" class="form-control" id="sunote" placeholder="Subnote Aplikasi">
                      </td>
                      <td>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                      </td>
                    </tr>
                    <tr>
                      <td><b>Background</b></td>
                      <td>
                        <img src="background.jpg" width="500" alt="Backgroud" class="img-thumbnail"></img>
                      </td>
                      <td>
                        <input class="form-control" type="file" id="formFile">
                      </td>
                      <td>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                      </td>
                    </tr>
                    <tr>
                      <td><b>Logo</b></td>
                      <td>
                        <img src="background.jpg" width="200" alt="Backgroud" class="img-thumbnail"></img>
                      </td>
                      <td>
                        <input class="form-control" type="file" id="formFile">
                      </td>
                      <td>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                      </td>
                    </tr>
                    <tr>
                      <td><b>favicon</b></td>
                      <td>
                        <img src="background.jpg" width="100" alt="Backgroud" class="img-thumbnail"></img>
                      </td>
                      <td>
                        <input class="form-control" type="file" id="formFile">
                      </td>
                      <td>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                      </td>
                    </tr>
                </table>
              </div>
            </div>
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

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">

    </div>
    <!-- Default to the left -->
    <strong>Simela Gen2 by RENDALEV BAPPELITBANGDA LAMONGAN &copy; 2025 <a href="https://adminlte.io">Interface by AdminLTE</a>.</strong>
  </footer>
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
        <h5 class ="text-bold">Judul Pengumuman 1</h5>
        <h6 class ="text-monospace">Tanggal : 25 Mei 2025</h>
        <p></p>
        <p>Pengumuman akan ditampilkan kepada seluruh user, dengan urutan Pengumuman paling baru ada di paling atas dan batas maksimal 5 Pengumumanyang ditampilkan.</p>
        <hr class="hr"></hr>
        <h5 class ="text-bold">Judul Pengumuman 2</h5>
        <h6 class ="text-monospace">Tanggal : 24 Mei 2025</h>
        <p></p>
        <p>Pengumuman akan ditampilkan kepada seluruh user, dengan urutan Pengumuman paling baru ada di paling atas dan batas maksimal 5 Pengumumanyang ditampilkan.</p>
        <hr class="hr"></hr>
        <h5 class ="text-bold">Judul Pengumuman 3</h5>
        <h6 class ="text-monospace">Tanggal : 23 Mei 2025</h>
        <p></p>
        <p>Pengumuman akan ditampilkan kepada seluruh user, dengan urutan Pengumuman paling baru ada di paling atas dan batas maksimal 5 Pengumumanyang ditampilkan.</p>
        <hr class="hr"></hr>
        <h5 class ="text-bold">Judul Pengumuman 4</h5>
        <h6 class ="text-monospace">Tanggal : 22 Mei 2025</h>
        <p></p>
        <p>Pengumuman akan ditampilkan kepada seluruh user, dengan urutan Pengumuman paling baru ada di paling atas dan batas maksimal 5 Pengumumanyang ditampilkan.</p>
        <hr class="hr"></hr>
        <h5 class ="text-bold">Judul Pengumuman 5</h5>
        <h6 class ="text-monospace">Tanggal : 21 Mei 2025</h>
        <p></p>
        <p>Pengumuman akan ditampilkan kepada seluruh user, dengan urutan Pengumuman paling baru ada di paling atas dan batas maksimal 5 Pengumumanyang ditampilkan.</p>
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
        <div class="form-group"><input type="email" class="form-control" id="password-baru" placeholder="Masukan password baru"></div>
      <div class="modal-footer pull-right">
          <button type="button" class="btn btn-warning">Terapkan Password Baru</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
</div>
<div class="modal fade" id="ubah-statusfungsi">
  <div class="modal-dialog modal-md modal-outline">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Perubahan Status Berhasil</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        fungsi xxxx kini berstatus <b>"Aktif"</b> / <b>"Tidak Aktif"</b>
        <p>
      <div class="modal-footer pull-right">
          <button type="button" class="btn btn-info">Oke</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
</div>
<div class="modal fade" id="ubah-status-misi">
  <div class="modal-dialog modal-md modal-outline">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Perubahan Status Berhasil</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Tujuan xxxxxxx kini berstatus <b>"Aktif"</b> / <b>"Tidak Aktif"</b>
        <p>
      <div class="modal-footer pull-right">
          <button type="button" class="btn btn-info">Oke</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
</div>
<div class="modal fade" id="ubah-RPJMD">
  <div class="modal-dialog modal-md modal-outline">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Perubahan Status Berhasil</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        RPJMD xxxxxxxxxx kini berstatus <b>"Aktif"</b> / <b>"Tidak Aktif"</b>
        <p>
      <div class="modal-footer pull-right">
          <button type="button" class="btn btn-info">Oke</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
</div>
<div class="modal fade" id="edit-RPJMD">
  <div class="modal-dialog modal-md modal-outline">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit RPJMD</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Nama</label>
          <div class="col-sm-10">
            <input type="email" class="form-control" id="namaperiode" placeholder="Nama Peiode RPJMD">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Awal</label>
          <div class="col-sm-4">
            <input type="email" class="form-control" id="awalperiode" placeholder="Tahun awal RPJMD">
          </div>
          <label for="inputEmail3" class="col-sm-2 col-form-label">Akhir</label>
          <div class="col-sm-4">
            <input type="email" class="form-control" id="awalperiode" placeholder="Tahun akhir RPJMD">
          </div>
        </div>
          <hr class="hr hr-blurry"></hr>
        <div class="form-group row">
          <div class="col-sm-2">
            <button type="submit" class="btn btn-default float-right">Cancel</button>
          </div>
          <div class="col-sm-8">
          </div>
          <div class="col-sm-2">
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
</div>
<div class="modal fade" id="edit-tujuanrpjmd">
  <div class="modal-dialog modal-md modal-outline">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit Tujuan RPJMD</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Misi</label>
          <div class="col-sm-10">
            <select class="form-control">
              <option selected>Pilih salah satu Misi Aktif</option>
              <option>Misi Aktif 1</option>
              <option>Misi Aktif 2</option>
              <option>Misi Aktif 3</option>
              <option>dst...</option>
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Tujuan</label>
          <div class="col-sm-8">
            <input type="email" class="form-control" id="TujuanRPJMD" placeholder="Tujuan RPJMD">
          </div>
          <div class="col-sm-2">
            <input type="email" class="form-control" id="urutanpd" placeholder="urut">
          </div>
        </div>
          <hr class="hr hr-blurry"></hr>
        <div class="form-group row">
          <div class="col-sm-2">
            <button type="submit" class="btn btn-default float-right">Cancel</button>
          </div>
          <div class="col-sm-8">
          </div>
          <div class="col-sm-2">
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
</div>
<div class="modal fade" id="ubah-status-urusan">
  <div class="modal-dialog modal-md modal-outline">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Perubahan Status Berhasil</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Urusan xxxx kini berstatus <b>"Aktif"</b> / <b>"Tidak Aktif"</b>
        <p>
      <div class="modal-footer pull-right">
          <button type="button" class="btn btn-info">Oke</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
</div>
<div class="modal fade" id="ubah-status-mitra">
  <div class="modal-dialog modal-md modal-outline">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Perubahan Status Berhasil</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Mitra Bidang xxxxxx kini berstatus <b>"Aktif"</b> / <b>"Tidak Aktif"</b>
        <p>
      <div class="modal-footer pull-right">
          <button type="button" class="btn btn-info">Oke</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
</div>

<div class="modal fade" id="edit-fungsi">
  <div class="modal-dialog modal-md modal-outline">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit data fungsi</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Fungsi</label>
          <div class="col-sm-10">
            <input type="email" class="form-control" id="username" placeholder="Masukan Nama Fungsi">
          </div>
        </div>

      <div class="modal-footer pull-right">
          <button type="button" class="btn btn-primary">Simpan Pembaharuan</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
</div>

<div class="modal fade" id="edit-urusan">
  <div class="modal-dialog modal-md modal-outline">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit data Urusan</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Urusan</label>
          <div class="col-sm-8">
            <input type="email" class="form-control" id="namapd" placeholder="Masukan Nama nama urusan">
          </div>
          <div class="col-sm-2">
            <input type="email" class="form-control" id="urutanpd" placeholder="kode">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Fungsi</label>
          <div class="col-sm-10">
            <select class="form-control">
              <option selected>Pilih salah satu fungsi yang Aktif</option>
              <option>fungsi Aktif 1</option>
              <option>fungsi Aktif 2</option>
              <option>fungsi Aktif 3</option>
              <option>dst...</option>
            </select>
          </div>
        </div>
      <div class="modal-footer pull-right">
          <button type="button" class="btn btn-primary">Simpan Pembaharuan</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
</div>

<div class="modal fade" id="edit-mitra">
  <div class="modal-dialog modal-md modal-outline">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit data Mitra</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Mitra</label>
          <div class="col-sm-8">
            <input type="email" class="form-control" id="namapd" placeholder="Masukan Nama Perangkat Daerah">
          </div>
          <div class="col-sm-2">
            <input type="email" class="form-control" id="urutanpd" placeholder="urut">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Pimpinan</label>
          <div class="col-sm-10">
            <input type="email" class="form-control" id="pimpinan" placeholder="Nama Pimpinan">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">NIP/Pang</label>
          <div class="col-sm-5">
            <input type="email" class="form-control" id="nip-pimpinan" placeholder="NIP (196xxxxxxxxxxxx)">
          </div>
          <div class="col-sm-5">
            <input type="email" class="form-control" id="pangkat-pimpinan" placeholder="Pangkat (Pembina dll)">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Jabatan</label>
          <div class="col-sm-10">
            <input type="email" class="form-control" id="jabatan-pimpinan" placeholder="Jabatan Pimpinan (Kepala / Plt / dst)">
          </div>
        </div>
      <div class="modal-footer pull-right">
          <button type="button" class="btn btn-primary">Simpan Pembaharuan</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="assets/AdminLTE-3.1.0/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="assets/AdminLTE-3.1.0/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/AdminLTE-3.1.0/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="assets/AdminLTE-3.1.0/dist/js/demo.js"></script>
<!-- DataTables  & Plugins -->
<script src="assets/AdminLTE-3.1.0/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="assets/AdminLTE-3.1.0/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="assets/AdminLTE-3.1.0/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="assets/AdminLTE-3.1.0/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="assets/AdminLTE-3.1.0/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="assets/AdminLTE-3.1.0/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="assets/AdminLTE-3.1.0/plugins/jszip/jszip.min.js"></script>
<script src="assets/AdminLTE-3.1.0/plugins/pdfmake/pdfmake.min.js"></script>
<script src="assets/AdminLTE-3.1.0/plugins/pdfmake/vfs_fonts.js"></script>
<script src="assets/AdminLTE-3.1.0/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="assets/AdminLTE-3.1.0/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="assets/AdminLTE-3.1.0/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="assets/AdminLTE-3.1.0/plugins/select2/js/select2.full.min.js"></script>
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
    $("#tabeluser").DataTable({
      "responsive": true, "lengthChange": true, "autoWidth": true, "pageLength": 3 });
    $("#tabelopd").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false, "pageLength": 3 });
    $("#tabelmitra").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false, "pageLength": 3 });
    $("#tabelvisi").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false, "pageLength": 3 });
    $("#tabelmisi").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false, "pageLength": 3 });
    $("#tabelanggaran").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false, "pageLength": 3 });
    $("#tabelgroup").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false, "pageLength": 3 });
  });
</script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });

    //Date and time picker
    $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })

    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    })

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })

  })
  // BS-Stepper Init
  document.addEventListener('DOMContentLoaded', function () {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
  })

  // DropzoneJS Demo Code Start
  Dropzone.autoDiscover = false

  // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
  var previewNode = document.querySelector("#template")
  previewNode.id = ""
  var previewTemplate = previewNode.parentNode.innerHTML
  previewNode.parentNode.removeChild(previewNode)

  var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
    url: "/target-url", // Set the url
    thumbnailWidth: 80,
    thumbnailHeight: 80,
    parallelUploads: 20,
    previewTemplate: previewTemplate,
    autoQueue: false, // Make sure the files aren't queued until manually added
    previewsContainer: "#previews", // Define the container to display the previews
    clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
  })

  myDropzone.on("addedfile", function(file) {
    // Hookup the start button
    file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file) }
  })

  // Update the total progress bar
  myDropzone.on("totaluploadprogress", function(progress) {
    document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
  })

  myDropzone.on("sending", function(file) {
    // Show the total progress bar when upload starts
    document.querySelector("#total-progress").style.opacity = "1"
    // And disable the start button
    file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
  })

  // Hide the total progress bar when nothing's uploading anymore
  myDropzone.on("queuecomplete", function(progress) {
    document.querySelector("#total-progress").style.opacity = "0"
  })

  // Setup the buttons for all transfers
  // The "add files" button doesn't need to be setup because the config
  // `clickable` has already been specified.
  document.querySelector("#actions .start").onclick = function() {
    myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
  }
  document.querySelector("#actions .cancel").onclick = function() {
    myDropzone.removeAllFiles(true)
  }
  // DropzoneJS Demo Code End
</script>

</body>
</html>
