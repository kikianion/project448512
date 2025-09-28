<?php $this->load->view('_appshell/1head2'); ?>


<?php
function widget_flash($tag1)
{
  $CI = &get_instance();
  $html = '';

  if ($CI->session->flashdata('success-' . $tag1)) {
    $html .= '<div class="alert alert-success">' . $CI->session->flashdata('success-' . $tag1) . '</div>';
  }
  if ($CI->session->flashdata('error-' . $tag1)) {
    $html .= '<div class="alert alert-danger">' . $CI->session->flashdata('error-' . $tag1) . '</div>';
  }

  return $html;
}

?>

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

      <!-- <?php if ($this->session->flashdata('success')): ?>
          <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
        <?php endif; ?>
        <?php if ($this->session->flashdata('error')): ?>
          <div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
        <?php endif; ?> -->

      <div class="row">
        <div class="col-lg-4  ">
          <?php $this->load->view('administrator/admsistem_masteruser'); ?>
        </div>
        <!-- /.col-md-6 -->
        <div class="col-lg-4">
          <?php $this->load->view('administrator/admsistem_masteropd'); ?>
        </div>
        <!-- /.col-md-6 -->
        <div class="col-lg-4">
          <?php $this->load->view('administrator/admsistem_mastermitra'); ?>
        </div>
        <!-- /.col-md-6 -->
      </div>
      <!-- /.row -->
      <div class="row">
        <div class="col-lg-4">
          <?php $this->load->view('administrator/admsistem_mastervisi'); ?>
        </div>
        <!-- /.col-md-6 -->
        <div class="col-lg-4">
          <?php $this->load->view('administrator/admsistem_mastermisi'); ?>
        </div>
        <!-- /.col-md-6 -->
        <div class="col-lg-4">
          <?php $this->load->view('administrator/admsistem_masterperiode'); ?>
        </div>

        <!-- /.col-md-6 -->
      </div>
      <!-- /.row -->
      <div class="row">
        <div class="col-lg-4">
          <?php $this->load->view('administrator/admsistem_mastergroupperiode'); ?>
        </div>

        <div class="col-lg-8">
          <?php $this->load->view('administrator/admsistem_masterbranding'); ?>
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
          <p>Pengumuman akan ditampilkan kepada seluruh user, dengan urutan Pengumuman paling baru ada di paling atas dan batas maksimal 5 Pengumumanyang
            ditampilkan.</p>
          <hr class="hr">
          </hr>
          <h5 class="text-bold">Judul Pengumuman 2</h5>
          <h6 class="text-monospace">Tanggal : 24 Mei 2025</h>
            <p></p>
            <p>Pengumuman akan ditampilkan kepada seluruh user, dengan urutan Pengumuman paling baru ada di paling atas dan batas maksimal 5 Pengumumanyang
              ditampilkan.</p>
            <hr class="hr">
            </hr>
            <h5 class="text-bold">Judul Pengumuman 3</h5>
            <h6 class="text-monospace">Tanggal : 23 Mei 2025</h>
              <p></p>
              <p>Pengumuman akan ditampilkan kepada seluruh user, dengan urutan Pengumuman paling baru ada di paling atas dan batas maksimal 5 Pengumumanyang
                ditampilkan.</p>
              <hr class="hr">
              </hr>
              <h5 class="text-bold">Judul Pengumuman 4</h5>
              <h6 class="text-monospace">Tanggal : 22 Mei 2025</h>
                <p></p>
                <p>Pengumuman akan ditampilkan kepada seluruh user, dengan urutan Pengumuman paling baru ada di paling atas dan batas maksimal 5 Pengumumanyang
                  ditampilkan.</p>
                <hr class="hr">
                </hr>
                <h5 class="text-bold">Judul Pengumuman 5</h5>
                <h6 class="text-monospace">Tanggal : 21 Mei 2025</h>
                  <p></p>
                  <p>Pengumuman akan ditampilkan kepada seluruh user, dengan urutan Pengumuman paling baru ada di paling atas dan batas maksimal 5
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
        <div class="form-group"><input type="password" class="form-control" id="password-baru" placeholder="Masukan password baru"></div>
        <div class="form-group"><input type="password" class="form-control" id="password-baru2" placeholder="Ulangi password baru"></div>
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
<div class="modal fade" id="ubah-statususer">
  <div class="modal-dialog modal-md modal-outline">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Perubahan Status Berhasil</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        user xxxx kini berstatus <b>"Aktif"</b> / <b>"Tidak Aktif"</b>
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
        Misi xxxxxxx kini berstatus <b>"Aktif"</b> / <b>"Tidak Aktif"</b>
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
<div class="modal fade" id="ubah-visi">
  <div class="modal-dialog modal-md modal-outline">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Perubahan Status Berhasil</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Visi Mewujudkan Kejayaan Lamongan yang Berkelanjutan kini berstatus <b>"Aktif"</b> / <b>"Tidak Aktif"</b>
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
<div class="modal fade" id="edit-visi">
  <div class="modal-dialog modal-md modal-outline">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit Visi</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Visi</label>
          <div class="col-sm-10">
            <input type="email" class="form-control" id="visi" placeholder="Visi Bupati">
          </div>
        </div>
        <hr class="hr hr-blurry">
        </hr>
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
<div class="modal fade" id="edit-misi">
  <div class="modal-dialog modal-md modal-outline">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit Misi</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Misi</label>
          <div class="col-sm-8">
            <input type="email" class="form-control" id="misi" placeholder="Masukan Misi">
          </div>
          <div class="col-sm-2">
            <input type="email" class="form-control" id="urutanpd" placeholder="urut">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Visi</label>
          <div class="col-sm-10">
            <select class="form-control">
              <option>Visi Aktif 1</option>
              <option>Visi Aktif 2</option>
              <option>Visi Aktif 3</option>
              <option>dst...</option>
            </select>
          </div>
        </div>
        <hr class="hr hr-blurry">
        </hr>
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
<div class="modal fade" id="ubah-statusOPD">
  <div class="modal-dialog modal-md modal-outline">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Perubahan Status Berhasil</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        OPD xxxx kini berstatus <b>"Aktif"</b> / <b>"Tidak Aktif"</b>
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

<div class="modal fade" id="edit-user">
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
          <label for="inputEmail3" class="col-sm-2 col-form-label">username</label>
          <div class="col-sm-10">
            <input type="email" class="form-control" id="username" placeholder="Username harus @gmail.com">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Nama</label>
          <div class="col-sm-10">
            <input type="email" class="form-control" id="namauser" placeholder="Nama User">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">OPD</label>
          <div class="col-sm-10">
            <select class="form-control">
              <option selected>Pilih salah satu OPD yang Aktif</option>
              <option>OPD Aktif 1</option>
              <option>OPD Aktif 2</option>
              <option>OPD Aktif 3</option>
              <option>dst...</option>
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Akses</label>
          <div class="col-sm-4">
            <select class="form-control">
              <option selected>Pilih hak akses</option>
              <option>Administrator</option>
              <option>Monev</option>
              <option>Operator OPD</option>
              <hr>
              </hr>
              <option>Mitra 1</option>
              <option>Mitra 2</option>
              <option>Mitra 3</option>
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

<div class="modal fade" id="edit-OPD">
  <div class="modal-dialog modal-md modal-outline">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit data OPD</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">OPD</label>
          <div class="col-sm-8">
            <input type="email" class="form-control" id="namapd" placeholder="Masukan Nama OPD">
          </div>
          <div class="col-sm-2">
            <input type="email" class="form-control" id="urutanpd" placeholder="No Urut">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Mitra</label>
          <div class="col-sm-10">
            <select class="form-control">
              <option selected>Pilih salah satu Mitra yang Aktif</option>
              <option>Mitra Aktif 1</option>
              <option>Mitra Aktif 2</option>
              <option>Mitra Aktif 3</option>
              <option>dst...</option>
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Pimpinan</label>
          <div class="col-sm-10">
            <input type="email" class="form-control" id="pimpinanmitra" placeholder="Nama Pimpinan">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">NIP/Pang</label>
          <div class="col-sm-5">
            <input type="email" class="form-control" id="nip-mitra" placeholder="NIP (196xxxxxxxxxxxx)">
          </div>
          <div class="col-sm-5">
            <input type="email" class="form-control" id="pangkat-mitra" placeholder="Pangkat (Pembina dll)">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Jabatan</label>
          <div class="col-sm-10">
            <input type="email" class="form-control" id="jabatan-mitra" placeholder="Jabatan Pimpinan (Kepala / Plt / dst)">
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



<!-- REQUIRED SCRIPTS -->

<?php $this->load->view('_appshell/8scripts'); ?>

<script>
  $(function () {
    $("#tabeluser").DataTable({
      "pageLength": 3,
      "autoWidth": true
    });
    $("#tabelopd").DataTable({
      "pageLength": 3,
      "autoWidth": true
    });
    $("#tabelmitra").DataTable({
      "pageLength": 3,
      "autoWidth": true
    });
    $("#tabelvisi").DataTable({
      "pageLength": 3,
      "autoWidth": true
    });
    $("#tabelmisi").DataTable({
      "pageLength": 3,
      "autoWidth": true
    });
    $("#tabelanggaran").DataTable({
      "pageLength": 3,
      "autoWidth": true
    });
    $("#tabelgroup").DataTable({
      "pageLength": 3,
      "autoWidth": true
    });
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
  })
</script>

<script>
  $(function () {
    let lastParent = null;
    for (card of $(".card.card-info.card-outline ")) {
      let title_ = $(card).find('.card-title').first();
      let title = title_[0]?.innerHTML.trim();
      let state = localStorage.getItem('adminsistem-' + title) === null ? "-" : localStorage.getItem('adminsistem-' + title);
      let button = $(card).find('button').eq(1).find('i').first();

      let lsKey1 = 'adminsistem-maxed-' + title;
      let maxed = localStorage.getItem(lsKey1) === null ? "0" : localStorage.getItem(lsKey1);

      if (maxed === '0' && state === 'collapsed-card') {//close card
        $(card).addClass("collapsed-card");
        button.removeClass('fa-minus').addClass('fa-plus');
      }
      else {//open card
        $(card).removeClass("collapsed-card");
        button.removeClass('fa-plus').addClass('fa-minus');
      }

      if (maxed === '1') {
        let btn = $(card).find('button.btn-fs').first();
        lastParent = $(card).parent();
        $(card).appendTo("#box1");
        $("div.content").hide();
        btn[0].innerHTML = "]&nbsp;[";
      }
      else {
        let btn = $(card).find('button.btn-fs').first();
        if (btn[0]) {
          btn[0].innerHTML = "[&nbsp;&nbsp;&nbsp;]";
        }
      }
    }

    $(".btn-fs").click(function (event) {

      let title_ = $(this).parent().siblings('.card-title').first();
      let title = title_[0]?.innerHTML.trim();

      let lsKey1 = 'adminsistem-maxed-' + title;
      if (this.innerHTML === "]&nbsp;[") {
        $(this).parents(".card").first().appendTo("#box1");
        $("div.content").show();
        this.innerHTML = "[&nbsp;&nbsp;&nbsp;]";
        $(this).parents(".card").first().appendTo(lastParent);
        localStorage.setItem(lsKey1, "0");
      }
      else {
        lastParent = $(this).parents(".card").parent();
        $(this).parents(".card").first().appendTo("#box1");
        $("div.content").hide();
        this.innerHTML = "]&nbsp;[";
        localStorage.setItem(lsKey1, "1");
        //open card when max
        if ($(this).parents(".card").first().hasClass('collapsed-card')) {
          $(this).parents("div.card-header").first().click();
        }
      }
      event.stopPropagation();
    });

    $(".card-outline button, .card-outline div.card-header").click(function () {
      let cards = $(this).parents('.card').first();
      let that = this
      setTimeout(() => {

        let title_ = $(that).parent().siblings('.card-title').first();
        if (title_.length === 0) {
          title_ = $(that).find('.card-title').first();
        }
        console.log(title_);
        let title = title_[0]?.innerHTML.trim();
        if ($(cards[0]).hasClass('collapsed-card')) {
          localStorage.setItem('adminsistem-' + title, "collapsed-card");
        }
        else {
          localStorage.setItem('adminsistem-' + title, "");
        }
      }, 500);
    });
  })
</script>

<?php $this->load->view('_appshell/9foot'); ?>