          <div class="card card-info card-outline collapsed-card">
            <div class="card-header" data-card-widget="collapse">
              <h5 class="card-title m-0"><b>Master Grouping Periode</b></h5>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-plus"></i>
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

              <hr class="hr hr-blurry">
              </hr>
              <table id="tabelgroup" class="table table-bordered table-responsive">
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
