<?php
$tag1 = "form_mastergroupperiode";
?>

<div class="card card-info card-outline collapsed-card">
    <div class="card-header" data-card-widget="collapse">
        <h5 class="card-title m-0"><b>Master Grouping Periode</b></h5>
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
            <form method="post" action="<?php echo site_url('admsistem/groupperiode/save'); ?>">
                <div class="form-group row">
                    <label for="group" class="col-sm-3 col-form-label">Group</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="group" name="group" placeholder="Nama grouping" value="<?php echo htmlspecialchars($this->session->flashdata('old_group') ?: ''); ?>">
                        <input type="hidden" name="tag1" value="<?= $tag1 ?>">
                        <input type="hidden" name="id">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jumlah_bulan" class="col-sm-3 col-form-label">Jumlah Bulan</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" id="jumlah_bulan" name="jumlah_bulan" placeholder="Jumlah Cakupan Bulan" value="<?php echo htmlspecialchars($this->session->flashdata('old_jumlah_bulan') ?: ''); ?>">
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
        <table id="tabelgroup" class="table table-bordered table-responsive table-data-init">
            <thead>
                <tr>
                    <th>Grouping</th>
                    <th>Jumlah Bulan</th>
                    <th>Status</th>
                    <th>Tindakan</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($grouping_periode_list) && is_array($grouping_periode_list)): ?>
                    <?php foreach ($grouping_periode_list as $grouping): ?>
                        <tr>
                            <td class="align-middle"><?php echo htmlspecialchars($grouping->nama); ?></td>
                            <td class="align-middle"><?php echo (int)$grouping->jmlbulan; ?></td>
                            <td class="align-middle"><?php echo htmlspecialchars($grouping->status); ?></td>
                            <td class="align-middle">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default">Tindakan</button>
                                    <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                        <span class="sr-only"></span>
                                    </button>
                                    <div class="dropdown-menu" role="menu">
                                        <a class="dropdown-item" data-toggle="modal" onclick="editModalGrouping(<?= $grouping->id ?>)">Edit</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="<?= site_url('admsistem/groupperiode/setStatus/' . $grouping->id) ?>" >Ubah Status</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4">Belum ada data grouping periode.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
        <script>
        function editModalGrouping(id) {
            $.ajax({
                url: 'admsistem/groupperiode/byId/' + id,
                success: function (res) {
                    if (res.status === 'success') {
                        $('#edit-record-common').appendTo('body').modal('show');
                        $('#edit-record-common .modal-body').html($('#form-<?= $tag1 ?>').html());
                        $('#edit-record-common .modal-title').html('Edit data grouping periode');
                        $('#edit-record-common input[name=group]').val(res.data.nama);
                        $('#edit-record-common input[name=id]').val(res.data.id);
                        $('#edit-record-common input[name=jumlah_bulan]').val(res.data.jmlbulan);
                    }
                },
            });
        }
        </script>
    </div>
</div>
