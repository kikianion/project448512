<div class="card card-info card-outline collapsed-card">
    <div class="card-header" data-card-widget="collapse">
      <h5 class="card-title m-0"><b>Tujuan Perangkat Daerah</b></h5>
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
          <input type="email" class="form-control" id="fungsi" placeholder="Tuliskan Nama Tujuan">
        </div>
      </div>
      <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Sasaran RPJMD</label>
        <div class="col-sm-10">
          <select class="form-control">
            <option selected>Pilih salah satu Sasaran RPJMD yang Aktif</option>
            <option>Sasaran RPJMD Aktif 1</option>
            <option>Sasaran RPJMD Aktif 2</option>
            <option>Sasaran RPJMD Aktif 3</option>
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
      <table id="tabeluser1" class="table table-bordered table-fit">
        <thead>
        <tr>
          <th>Sasaran RPJMD yang diinterfensi</th>
          <th>Tujuan PD</th>
          <th>Status</th>
          <th>Tindakan</th>
        </tr>
        </thead>
        <tbody>
        <tr>
          <td class="align-middle">Sasaran RPJMD Misal xxxxxxx</td>
          <td class="align-middle">Tujuan Perangkat Daerah xxxxxxxxxxxxxxx1</td>
          <td class="align-middle">Aktif</td>
          <td class="align-middle">
            <div class="btn-group">
            <button type="button" class="btn btn-default">Tindakan</button>
            <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
              <span class="sr-only"></span>
            </button>
            <div class="dropdown-menu" role="menu">
              <a class="dropdown-item" data-toggle="modal" data-target="#edit-tujuanpd">Edit</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" data-toggle="modal" data-target="#ubah-statusfungsi">Ubah Status</a>
            </div>
          </div>
          </td>
        </tr>
        <tr>
          <td class="align-middle">Sasaran RPJMD Misal xxxxxxx</td>
          <td class="align-middle">Tujuan Perangkat Daerah xxxxxxxxxxxxxxx2</td>
          <td class="align-middle">Tidak Aktif</td>
          <td class="align-middle">
            <div class="btn-group">
            <button type="button" class="btn btn-default">Tindakan</button>
            <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
              <span class="sr-only"></span>
            </button>
            <div class="dropdown-menu" role="menu">
              <a class="dropdown-item" data-toggle="modal" data-target="#edit-tujuanpd">Edit</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" data-toggle="modal" data-target="#ubah-statusfungsi">Ubah Status</a>
            </div>
          </div>
          </td>
        </tr>
      </table>
    </div>
  </div>
