<div class="card card-info card-outline collapsed-card">
  <div class="card-header" data-card-widget="collapse">
    <h5 class="card-title m-0"><b>Master User</b></h5>
    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse">
        <i class="fas fa-plus"></i>
      </button>
    </div>
  </div>
  <div class="card-body">
    <div class="form-group row">
      <label for="inputEmail3" class="col-sm-2 col-form-label">username</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" id="username" placeholder="Username harus @gmail.com">
      </div>
    </div>
    <div class="form-group row">
      <label for="inputEmail3" class="col-sm-2 col-form-label">Nama User</label>
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
      <div class="col-sm-6">
        <input type="email" class="form-control" id="password" placeholder="Set Password Awal">
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
    <hr>
    <table id="tabeluser" class="table table-bordered table-responsive">
      <thead>
        <tr>
          <th>Username</th>
          <th>Nama User</th>
          <th>OPD Asal</th>
          <th>Akses</th>

          <th>Status</th>
          <th>Tindakan</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>username@gmail.com</td>
          <td>Nama User1</td>
          <td>OPD Asal</td>
          <td>Akses</td>

          <td>Aktif</td>
          <td>
            <div class="btn-group">
              <button type="button" class="btn btn-default">Tindakan</button>
              <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
                <span class="sr-only"></span>
              </button>
              <div class="dropdown-menu" role="menu">
                <a class="dropdown-item" data-toggle="modal" data-target="#edit-user">Edit</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" data-toggle="modal" data-target="#ubah-statususer">Ubah Status</a>
                <a class="dropdown-item" data-toggle="modal" data-target="#reset-password">Reset Password</a>
              </div>
            </div>
          </td>
        </tr>

      </tbody>
    </table>
  </div>

</div>