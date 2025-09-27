<div class="card card-info card-outline xcollapsed-card">
  <div class="card-header" data-card-widget="collapse">
    <h5 class="card-title m-0"><b>Master 2 Branding</b></h5>
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

    <table class="table table-bordered table-responsive">
      <thead>
        <tr>
          <th>Type</th>
          <th>Preview</th>
          <th>Update</th>
          <th>Save</th>
        </tr>
      </thead>
      <tbody>
        <!--  #region form nama  -->
        <?php echo form_open('admsistem/save_branding', ['name' => 'form_nama']); ?>
        <tr>
          <td><b>Nama</b></td>
          <td>
            <?php
            echo isset($master_branding) && count($master_branding) ? htmlspecialchars($master_branding[0]->nama) : '-';
            ?>
          </td>
          <td>
            <input type="hidden" name="original_nama" value="<?php echo isset($master_branding[0]->nama) ? htmlspecialchars($master_branding[0]->nama) : ''; ?>">
            <input type="hidden" name="form_name" value="form_nama">
            <input type="text" name="nama" class="form-control" id="nama-aplikasi" placeholder="Nama Aplikasi">
          </td>
          <td>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </td>
        </tr>
        <?php echo form_close(); ?>
        <!--  #endregion  -->

        <!-- #region form subnote -->
        <?php echo form_open('admsistem/save_branding', ['name' => 'form_subnote']); ?>
        <tr>
          <td><b>Subnote</b></td>
          <td>
            <?php
            echo isset($master_branding[0]->subnote) ? htmlspecialchars($master_branding[0]->subnote) : '-';
            ?>
          </td>
          <td>
            <input type="hidden" name="original_nama" value="<?php echo isset($master_branding[0]->nama) ? htmlspecialchars($master_branding[0]->nama) : ''; ?>">
            <input type="hidden" name="form_name" value="form_subnote">
            <input type="text" name="subnote" class="form-control" id="subnote" placeholder="Subnote Aplikasi">
          </td>
          <td>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </td>
        </tr>
        <?php echo form_close(); ?>

        <!--  #endregion  -->

        <!--  #region form background -->
        <?php echo form_open_multipart('admsistem/save_branding', ['name' => 'form_background']); ?>
        <tr>
          <td><b>Background</b></td>
          <td>
            <?php if (isset($master_branding[0]->background) && $master_branding[0]->background): ?>
              <img src="<?php echo base_url(htmlspecialchars($master_branding[0]->background)); ?>" width="500" alt="Backgroud" class="img-thumbnail">
            <?php else: ?>
              <img src="<?php echo base_url('assets/img/background.jpg'); ?>" width="500" alt="Backgroud" class="img-thumbnail">
            <?php endif; ?>
          </td>
          <td>
            <input type="hidden" name="original_nama" value="<?php echo isset($master_branding[0]->nama) ? htmlspecialchars($master_branding[0]->nama) : ''; ?>">
            <input type="hidden" name="form_name" value="form_background">
            <input type="hidden" name="nama" value="<?php echo isset($master_branding[0]->nama) ? htmlspecialchars($master_branding[0]->nama) : ''; ?>">
            <input class="form-control" type="file" name="background" id="background" accept="image/*">
          </td>
          <td>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </td>
        </tr>
        <?php echo form_close(); ?>

        <!--  #endregion  -->

        <!-- #region form logo -->
        <?php echo form_open_multipart('admsistem/save_branding', ['name' => 'form_logo']); ?>
        <tr>
          <td><b>Logo</b></td>
          <td>
            <?php if (isset($master_branding[0]->logo) && $master_branding[0]->logo): ?>
              <img src="<?php echo base_url(htmlspecialchars($master_branding[0]->logo)); ?>" width="200" alt="Logo" class="img-thumbnail">
            <?php else: ?>
              <img src="<?php echo base_url('assets/img/background.jpg'); ?>" width="200" alt="Logo" class="img-thumbnail">
            <?php endif; ?>
          </td>
          <td>
            <input type="hidden" name="original_nama" value="<?php echo isset($master_branding[0]->nama) ? htmlspecialchars($master_branding[0]->nama) : ''; ?>">
            <input type="hidden" name="form_name" value="form_logo">
            <input type="hidden" name="nama" value="<?php echo isset($master_branding[0]->nama) ? htmlspecialchars($master_branding[0]->nama) : ''; ?>">
            <input class="form-control" type="file" name="logo" id="logo" accept="image/*">
          </td>
          <td>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </td>
        </tr>
        <?php echo form_close(); ?>

        <!--  #endregion  -->

        <!--  #region form fav  -->
        <?php echo form_open_multipart('admsistem/save_branding', ['name' => 'form_favicon']); ?>
        <tr>
          <td><b>favicon</b></td>
          <td>
            <?php if (isset($master_branding[0]->favicon) && $master_branding[0]->favicon): ?>
              <img src="<?php echo base_url(htmlspecialchars($master_branding[0]->favicon)); ?>" width="100" alt="Favicon" class="img-thumbnail">
            <?php else: ?>
              <img src="<?php echo base_url('assets/img/background.jpg'); ?>" width="100" alt="Favicon" class="img-thumbnail">
            <?php endif; ?>
          </td>
          <td>
            <input type="hidden" name="original_nama" value="<?php echo isset($master_branding[0]->nama) ? htmlspecialchars($master_branding[0]->nama) : ''; ?>">
            <input type="hidden" name="form_name" value="form_favicon">
            <input type="hidden" name="nama" value="<?php echo isset($master_branding[0]->nama) ? htmlspecialchars($master_branding[0]->nama) : ''; ?>">
            <input class="form-control" type="file" name="favicon" id="favicon" accept="image/*">
          </td>
          <td>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </td>
        </tr>
        <?php echo form_close(); ?>

        <!--  #endregion */ -->
    </table>
  </div>
</div>