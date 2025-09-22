<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Simela Gen2 - Login Page</title>

  <!-- Google Font: Source Sans Pro -->
  <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"> -->
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE-3.1.0/plugins/fontawesome-free/css/all.min.css'); ?>">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE-3.1.0/plugins/icheck-bootstrap/icheck-bootstrap.min.css'); ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE-3.1.0/dist/css/adminlte.min.css'); ?>">

</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card bg-gradient-light">
    <div class="card-header text-center">
      <a class="h1"><b>Simela</b>-gen2</a>
      <p class="login-box-msg">Silahkan Login untuk masuk aplikasi</p>
    </div>
    <div class="card-body">
      <?php if (isset($error)): ?>
        <div class="alert alert-danger">
          <?php echo $error; ?>
        </div>
      <?php endif; ?>

      <?php echo form_open('login/authenticate', array('method' => 'post')); ?>
        <div class="input-group mb-3">
          <?php
          $a=set_value('email');
          $b=1;
          ?>
          <input type="email" name="email" class="form-control" placeholder="Email" value="<?=set_value('email')==''?'a@a.com':set_value('email')?>" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <?php echo form_error('email', '<div class="text-danger small">', '</div>'); ?>
        
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password" required value="1">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <?php echo form_error('password', '<div class="text-danger small">', '</div>'); ?>
        
        <div class="g-recaptcha" data-sitekey="6Lf4A2koAAAAAOx3AqMppnHtQ9AnRlCpY3rvOqFJ"></div>
        <p>
        <div class="row">
          <div class="col-6">
          </div>
          <!-- /.col -->
          <div class="col-6">
            <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-key float-right"></i>  Masuk</button>
          </div>
          <!-- /.col -->
        </div>
      <?php echo form_close(); ?>
      
      <hr class="hr"></hr>
      <div class="social-auth-links text-center mt-2 mb-3">
        <button type="button" class="btn btn-outline-primary btn-block" onclick="googleLogin()"><i class="fab fa-google"></i> Masuk dengan akun Google (optional)</button>
      </div>
      <!-- /.social-auth-links -->

    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?php echo base_url('assets/AdminLTE-3.1.0/plugins/jquery/jquery.min.js'); ?>"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('assets/AdminLTE-3.1.0/plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/AdminLTE-3.1.0/dist/js/adminlte.min.js'); ?>"></script>

<!-- <script src="https://www.google.com/recaptcha/api.js" async defer></script> -->

<script>
function googleLogin() {
    // Placeholder for Google OAuth integration
    alert('Google login functionality will be implemented here');
}
</script>
</body>
</html>
