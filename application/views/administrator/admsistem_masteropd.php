<div class="card card-info card-outline collapsed-card">
  <div class="card-header" data-card-widget="collapse">
    <h5 class="card-title m-0"><b>Master OPD</b></h5>
    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse">
        <i class="fas fa-plus"></i>
      </button>
    </div>
  </div>
  <div class="card-body">
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
    <hr class="hr hr-blurry">
    </hr>
    <table id="tabelopd" class="table table-bordered table-responsive">
      <thead>
        <tr>
          <th>Urut</th>
          <th>Nama OPD</th>
          <th>Mitra</th>
          <th>Pimpinan</th>
          <th>NIP</th>
          <th>Pangkat</th>
          <th>Jabatan</th>
          <th>Status</th>
          <th>Tindakan</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>01</td>
          <td>Badan Pengelola Keuangan dan Aset Daerah</td>
          <td>Mitra 1</td>
          <td>Nama Kepala OPD</td>
          <td>196809211998081001</td>
          <td>Pembina Utama Akhir</td>
          <td>Kepala</td>
          <td>Aktif</td>
          <td>
            <div class="btn-group">
              <button type="button" class="btn btn-default">Tindakan</button>
              <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
                <span class="sr-only"></span>
              </button>
              <div class="dropdown-menu" role="menu">
                <a class="dropdown-item" data-toggle="modal" data-target="#edit-OPD">Edit</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" data-toggle="modal" data-target="#ubah-statusOPD">Ubah Status</a>
              </div>
            </div>
          </td>
        </tr>

    </table>
  </div>
</div>