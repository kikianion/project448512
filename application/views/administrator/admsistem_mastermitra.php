          <div class="card card-info card-outline collapsed-card">
            <div class="card-header" data-card-widget="collapse">
              <h5 class="card-title m-0"><b>Master Mitra</b></h5>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-plus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Mitra</label>
                <div class="col-sm-8">
                  <input type="email" class="form-control" id="namamitra" placeholder="Masukan Nama Mitra">
                </div>
                <div class="col-sm-2">
                  <input type="email" class="form-control" id="urutanmitra" placeholder="urut">
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
              <table id="tabelmitra" class="table table-bordered table-responsive">
                <thead>
                  <tr>
                    <th>urut</th>
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
                    <td>1</td>
                    <td>Bidang Ekonomi</td>
                    <td>Prof. Dr. Mukidi S.Sos., M.M., M.Si.</td>
                    <td>194508171970091001</td>
                    <td>Pembina Paling Utama</td>
                    <td>Kepala Bidang</td>
                    <td>Aktif</td>
                    <td>
                      <div class="btn-group">
                        <button type="button" class="btn btn-default">Tindakan</button>
                        <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
                          <span class="sr-only"></span>
                        </button>
                        <div class="dropdown-menu" role="menu">
                          <a class="dropdown-item" data-toggle="modal" data-target="#edit-mitra">Edit</a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" data-toggle="modal" data-target="#ubah-status-mitra">Ubah Status</a>
                        </div>
                      </div>
                    </td>
                  </tr>
              </table>
            </div>
          </div>
