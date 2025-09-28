          <div class="card card-info card-outline collapsed-card">
            <div class="card-header" data-card-widget="collapse">
              <h5 class="card-title m-0"><b>Master Periode Anggaran</b></h5>
              <div class="card-tools">
                      <button type="button" class="btn btn-tool btn-fs" xdata-card-widget="collapse" >
        [&nbsp;&nbsp;]
      </button>

                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-plus"></i>
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
              <hr class="hr hr-blurry">
              </hr>
              <table id="tabelanggaran" class="table table-bordered table-responsive">
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
