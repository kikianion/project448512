<?php
$tag1 = "form_masterbranding";
?>
<div class="card card-info card-outline collapsed-card" id="branding">
  <div class="card-header" data-card-widget="collapse">
    <h5 class="card-title m-0"><b>Master Branding</b></h5>
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
        <?php echo form_open('admsistem/branding/save'); ?>
        <tr>
          <td>
            <b>Nama</b>
          </td>
          <td>
            <?php
            echo isset($master_branding) && count($master_branding) ? htmlspecialchars($master_branding[0]->nama) : '-';
            ?>
          </td>
          <td>
            <input type="text" name="nama" class="form-control" id="nama-aplikasi" placeholder="Nama Aplikasi">
          </td>
          <td>
            <input type="hidden" name="tag1" value="<?= $tag1 ?>">
            <input type="hidden" name="form_name" value="form_nama">
            <button type="submit" class="btn btn-primary">Simpan</button>
          </td>
        </tr>
        <?php echo form_close(); ?>
        <!--  #endregion  -->

        <!-- #region form subnote -->
        <?php echo form_open('admsistem/branding/save'); ?>
        <tr>
          <td><b>Subnote</b></td>
          <td>
            <?php
            echo isset($master_branding[0]->subnote) ? htmlspecialchars($master_branding[0]->subnote) : '-';
            ?>
          </td>
          <td>
            <input type="text" name="subnote" class="form-control" id="subnote" placeholder="Subnote Aplikasi">
          </td>
          <td>
            <input type="hidden" name="tag1" value="<?= $tag1 ?>">
            <input type="hidden" name="form_name" value="form_subnote">
            <button type="submit" class="btn btn-primary">Simpan</button>
          </td>
        </tr>
        <?php echo form_close(); ?>

        <!--  #endregion  -->

        <!--  #region form background -->
        <?php echo form_open_multipart('admsistem/branding/save'); ?>
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
            <input class="form-control" type="file" name="background" id="background" accept="image/*">
          </td>
          <td>
            <input type="hidden" name="tag1" value="<?= $tag1 ?>">
            <input type="hidden" name="form_name" value="form_background">
            <button type="submit" class="btn btn-primary">Simpan</button>
          </td>
        </tr>
        <?php echo form_close(); ?>

        <!--  #endregion  -->

        <!-- #region form logo -->
        <?php echo form_open_multipart('admsistem/branding/save'); ?>
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
            <input class="form-control" type="file" name="logo" id="logo" accept="image/*">
          </td>
          <td>
            <input type="hidden" name="form_name" value="form_logo">
            <input type="hidden" name="tag1" value="<?= $tag1 ?>">
            <button type="submit" class="btn btn-primary">Simpan</button>
          </td>
        </tr>
        <?php echo form_close(); ?>

        <!--  #endregion  -->

        <!--  #region form fav  -->
        <?php echo form_open_multipart('admsistem/branding/save'); ?>
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
            <input class="form-control" type="file" name="favicon" id="favicon" accept="image/*">
          </td>
          <td>
            <input type="hidden" name="tag1" value="<?= $tag1 ?>">
            <input type="hidden" name="form_name" value="form_favicon">
            <button type="submit" class="btn btn-primary">Simpan</button>
          </td>
        </tr>
        <?php echo form_close(); ?>

        <!--  #endregion */ -->
    </table>
  </div>
</div>
