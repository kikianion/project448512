<div class="card card-info card-outline xcollapsed-card">
    <div class="card-header" data-card-widget="collapse">
        <h5 class="card-title m-0"><b>Master Visi</b></h5>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-plus"></i>
            </button>
        </div>
    </div>
    <div class="card-body">
        <?php if (!empty($this->session->flashdata('success'))): ?>
            <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
        <?php endif; ?>
        <?php if (!empty($this->session->flashdata('error'))): ?>
            <div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
        <?php endif; ?>

    <form method="post" action="<?php echo site_url('admsistem/save_visi'); ?>">
        <div class="form-group row">
            <label for="visi" class="col-sm-2 col-form-label">Visi</label>
            <div class="col-sm-10">
                <textarea class="form-control" id="visi" name="visi" rows="3" placeholder="Visi Bupati"></textarea>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-2">
                <a href="<?php echo site_url('admsistem'); ?>" class="btn btn-default float-right">Cancel</a>
            </div>
            <div class="col-sm-8">
            </div>
            <div class="col-sm-2">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
        </form>

        <hr class="hr hr-blurry">
        </hr>
        <table id="tabelvisi" class="table table-bordered table-responsive">
            <thead>
                <tr>
                    <th>Visi</th>
                    <th>Status</th>
                    <th>Tindakan</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($visi_list) && is_array($visi_list)): ?>
                    <?php foreach ($visi_list as $visi): ?>
                        <tr>
                            <td class="align-middle"><?php echo htmlspecialchars($visi->visi); ?></td>
                            <td class="align-middle"><?php echo ($visi->status == 1) ? 'Aktif' : 'Tidak Aktif'; ?></td>
                            <td class="align-middle">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default">Tindakan</button>
                                    <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                        <span class="sr-only"></span>
                                    </button>
                                    <div class="dropdown-menu" role="menu">
                                        <a class="dropdown-item" data-toggle="modal" data-target="#edit-visi">Edit</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" data-toggle="modal" data-target="#ubah-visi">Ubah Status</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="3">Belum ada data visi.</td>
                    </tr>
                <?php endif; ?>
        </table>
    </div>
</div>