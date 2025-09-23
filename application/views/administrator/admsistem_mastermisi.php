<div class="card card-info card-outline collapsed-card">
    <div class="card-header" data-card-widget="collapse">
        <h5 class="card-title m-0"><b>Master Misi</b></h5>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-plus"></i>
            </button>
        </div>
    </div>
    <div class="card-body">
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
        <table id="tabelmisi" class="table table-bordered table-responsive">
            <thead>
                <tr>
                    <th>Urut</th>
                    <th>Misi</th>
                    <th>Visi</th>
                    <th>Status</th>
                    <th>Tindakan</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Misi 1</td>
                    <td>Visi yang Dipilih</td>
                    <td>Aktif</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-default">Tindakan</button>
                            <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                <span class="sr-only"></span>
                            </button>
                            <div class="dropdown-menu" role="menu">
                                <a class="dropdown-item" data-toggle="modal" data-target="#edit-misi">Edit</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" data-toggle="modal" data-target="#ubah-status-misi">Ubah Status</a>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>