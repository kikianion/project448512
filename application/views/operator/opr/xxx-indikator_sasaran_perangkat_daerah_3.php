<div class="card card-info card-outline collapsed-card">
    <div class="card-header" data-card-widget="collapse">
      <h5 class="card-title m-0"><b>Indikator Sasaran Perangkat Daerah</b></h5>
		<div class="card-tools">
			<button type="button" class="btn btn-tool btn-fs" xdata-card-widget="collapse">
				[&nbsp;&nbsp;]
			</button>
			<button type="button" class="btn btn-tool" data-card-widget="collapse">
				<i class="fas fa-plus"></i>
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
            <option selected>Pilih salah satu Sasaran PD yang Aktif</option>
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
          <td>Indikator Sasaran Perangkat Daerah 1</td>
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
