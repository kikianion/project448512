<div class="card card-info card-outline xcollapsed-card">
  <div class="card-header" data-card-widget="collapse">
    <h5 class="card-title m-0"><b>Master User</b></h5>
    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse">
        <i class="fas fa-plus"></i>
      </button> 
    </div>
  </div>
  <div class="card-body">
    <?php echo form_open('admsistem/save_master_user'); ?>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Username</label>
      <div class="col-sm-10">
        <input type="text" name="username" class="form-control" id="username" placeholder="e.g. user@example.com" value="<?php echo isset($edit_master_user->username)?htmlspecialchars($edit_master_user->username):''; ?>" required maxlength="30">
        <input type="hidden" name="original_username" value="<?php echo isset($edit_master_user->username)?htmlspecialchars($edit_master_user->username):''; ?>">
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Nama User</label>
      <div class="col-sm-10">
        <input type="text" name="nama" class="form-control" id="namauser" placeholder="Nama User" value="<?php echo isset($edit_master_user->nama)?htmlspecialchars($edit_master_user->nama):''; ?>" required maxlength="50">
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-2 col-form-label">OPD</label>
      <div class="col-sm-10">
        <input type="text" name="opd" class="form-control" value="<?php echo isset($edit_master_user->opd)?htmlspecialchars($edit_master_user->opd):''; ?>" maxlength="10" placeholder="OPD code">
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Akses (Role)</label>
      <div class="col-sm-4">
        <select name="role" class="form-control">
          <?php $roles = array('admin'=>'Administrator','monev'=>'Monev','operator'=>'Operator OPD','mitra'=>'Mitra');
                $current = isset($edit_master_user->role)?$edit_master_user->role:'';
          ?>
          <option value="">-- Pilih hak akses --</option>
          <?php foreach($roles as $k=>$v): ?>
            <option value="<?php echo $k; ?>" <?php echo $current===$k? 'selected':''; ?>><?php echo $v; ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="col-sm-6">
        <input type="password" name="password" class="form-control" id="password" placeholder="(Kosongkan jika tidak ingin mengganti)" maxlength="50">
      </div>
    </div>

    <div class="form-group row">
      <div class="col-sm-2">
        <a href="<?php echo site_url('admsistem'); ?>" class="btn btn-default">Cancel</a>
      </div>
      <div class="col-sm-8"></div>
      <div class="col-sm-2">
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </div>
    <?php echo form_close(); ?>

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
        <?php if (!empty($master_users)): foreach($master_users as $u): ?>
        <tr>
          <td><?php echo htmlspecialchars($u->username); ?></td>
          <td><?php echo htmlspecialchars($u->nama); ?></td>
          <td><?php echo htmlspecialchars($u->opd); ?></td>
          <td><?php echo htmlspecialchars($u->role); ?></td>
          <td><?php echo htmlspecialchars($u->status); ?></td>
          <td>
            <div class="btn-group">
              <a href="<?php echo site_url('admsistem/edit_master_user/'.urlencode($u->username)); ?>" class="btn btn-sm btn-default">Edit</a>
              <a href="<?php echo site_url('admsistem/delete_master_user/'.urlencode($u->username)); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Hapus pengguna ini?');">Hapus</a>
            </div>
          </td>
        </tr>
        <?php endforeach; else: ?>
        <tr><td colspan="6">Tidak ada pengguna.</td></tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>

</div>