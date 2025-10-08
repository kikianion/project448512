<?php
$tag1 = "form_masterperiode";
?>

<div class="card card-info card-outline collapsed-card">
    <div class="card-header" data-card-widget="collapse">
        <h5 class="card-title m-0"><b>Master Periode Anggaran</b></h5>
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
        <?= widget_flash($tag1) ?>

        <div id="form-<?= $tag1 ?>">
            <form method="post" action="<?php echo site_url('admsistem/periode/save'); ?>">
                <div class="form-group row">
                    <label for="kode" class="col-sm-2 col-form-label">Kode</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="kode" name="kode" placeholder="Masukan Kode Periode Anggaran Misal 2025-0 atau 2025-1" value="<?php echo htmlspecialchars($this->session->flashdata('old_kode') ?: ''); ?>">
                        <input type="hidden" name="tag1" value="<?= $tag1 ?>">
                        <input type="hidden" name="id">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Misal TA 2025 Murni atau TA 2025 Perubahan 1 (Maret)" value="<?php echo htmlspecialchars($this->session->flashdata('old_keterangan') ?: ''); ?>">
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
        </div>

        <hr class="hr hr-blurry">
        </hr>
        <table id="tabelperiode" class="table table-bordered table-responsive">
            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Keterangan</th>
                    <th>Status</th>
                    <th>Tindakan</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($periode_list) && is_array($periode_list)): ?>
                    <?php foreach ($periode_list as $periode): ?>
                        <tr>
                            <td class="align-middle"><?php echo htmlspecialchars($periode->kode); ?></td>
                            <td class="align-middle"><?php echo htmlspecialchars($periode->keterangan); ?></td>
                            <td class="align-middle"><?php echo htmlspecialchars($periode->status); ?></td>
                            <td class="align-middle">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default">Tindakan</button>
                                    <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                        <span class="sr-only"></span>
                                    </button>
                                    <div class="dropdown-menu" role="menu">
                                        <a class="dropdown-item" data-toggle="modal" onclick="editModalPeriode(<?= $periode->id ?>)">Edit</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="<?= site_url('admsistem/setStatus_periode/' . $periode->id) ?>" onclick="return confirm('Ubah status periode ini?')">Ubah Status</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4">Belum ada data periode.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
        <script>
        function editModalPeriode(id) {
            $.ajax({
                url: 'admsistem/periodeById/' + id,
                success: function (res) {
                    if (res.status === 'success') {
                        $('#edit-record-common').appendTo('body').modal('show');
                        $('#edit-record-common .modal-body').html($('#form-<?= $tag1 ?>').html());
                        $('#edit-record-common .modal-title').html('Edit data periode');
                        $('#edit-record-common input[name=kode]').val(res.data.kode);
                        $('#edit-record-common input[name=id]').val(res.data.id);
                        $('#edit-record-common input[name=keterangan]').val(res.data.keterangan);
                    }
                },
            });
        }
        </script>
    </div>
</div>
