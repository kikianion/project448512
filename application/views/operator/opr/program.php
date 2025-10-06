<div class="card card-info card-outline collapsed-card">
    <div class="card-header" data-card-widget="collapse">
      <h5 class="card-title m-0"><b>Program</b></h5>
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
          <input type="email" class="form-control" id="fungsi" placeholder="Tuliskan Nama Sasaran">
        </div>
      </div>
      <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Urusan</label>
        <div class="col-sm-10">
          <select class="form-control">
            <option selected>Pilih salah satu Urusan yang Aktif</option>
            <option>Urusan Aktif 1</option>
            <option>Urusan Aktif 2</option>
            <option>Urusan Aktif 3</option>
            <option>dst...</option>
          </select>
        </div>
      </div>
      <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Sasaran PD</label>
        <div class="col-sm-10">
          <select class="form-control">
            <option selected>Pilih salah satu Sasaran PD yang Aktif</option>
            <option>Sasaran PD Aktif 1</option>
            <option>Sasaran PD Aktif 2</option>
            <option>Sasaran PD Aktif 3</option>
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
      <table id="tabeluser" class="table table-bordered table-fit">
        <thead>
        <tr>
          <th>Tujuan PD yang diinterfensi</th>
          <th>Sasaran PD</th>
          <th>Status</th>
          <th>Tindakan</th>
        </tr>
        </thead>
        <tbody>
        <tr>
          <td class="align-middle">Tujuan PD Misal Tujuan xxxxxxx</td>
          <td class="align-middle">Sasaran Perangkat Daerah xxxxxxxxxxxxxxx1</td>
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
          <td class="align-middle">Misi Bupati Misal xxxxxxx</td>
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
