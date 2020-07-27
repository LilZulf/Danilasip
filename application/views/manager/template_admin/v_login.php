<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Danilasip | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo (base_url('assets/plugins/fontawesome-free/css/all.min.css'))?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo (base_url('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css'))?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo (base_url('assets/dist/css/adminlte.min.css'))?>">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Danila</b>sip</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="" method="post">
        <?php echo $this->session->flashdata('pesanan'); ?>
        <?php 
            if(isset($error)) { echo $error; }; 
            echo $this->session->flashdata('login_first');
        ?>
        <div class="input-group mb-3">
          <input type="username" class="form-control" placeholder="Username" name="username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-address-card"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            </div>
          <!-- /.col -->
          <div class="col-12">
            <div class="btn-login">
                  <button type="submit" class="btn btn-primary btn-block">Sign In</button>             
            </div>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <!-- /.social-auth-links -->

    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?php echo (base_url('assets/plugins/jquery/jquery.min.js'))?>"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo (base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js'))?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo (base_url('assets/dist/js/adminlte.min.js'))?>"></script>

</body>
</html>
