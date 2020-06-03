<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$profil = $data->row();
?>
<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="description" content="Miminium Admin Template v.1">
  <meta name="author" content="Isna Nur Azis">
  <meta name="keyword" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login | <?= $profil->nama_toko; ?></title>

  <!-- start: Css -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/1/css/bootstrap.min.css">

  <!-- plugins -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/1/css/plugins/font-awesome.min.css"/>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/1/css/plugins/simple-line-icons.css"/>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/1/css/plugins/animate.min.css"/>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/1/css/plugins/icheck/skins/flat/aero.css"/>
  <link href="<?php echo base_url(); ?>assets/1/css/style.css" rel="stylesheet">
  <!-- end: Css -->

  <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/logomi.png">
  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
    </head>

    <body id="mimin" class="dashboard form-signin-wrapper" style="background: #EEEEEE !important;">

      <div class="container">

        <form class="form-signin" action="" method="post">
          <div class="panel periodic-login" style="background: #FFAA00; !important; color: black; -webkit-box-shadow: 0 4px 5px 0 rgba(0, 0, 0, 0.14), 0 1px 10px 0 rgba(0, 0, 0, 0.12), 0 2px 4px -1px rgba(0, 0, 0, 0.3);
          box-shadow: 0 4px 5px 0 rgba(0, 0, 0, 0.14), 0 1px 10px 0 rgba(0, 0, 0, 0.12), 0 2px 4px -1px rgba(0, 0, 0, 0.3);">
              <span class="atomic-number">28</span>
              <div class="panel-body text-center">
                  <h1 class="atomic-symbol">Th</h1>
                  <p class="atomic-mass">Login</p>
                  <p class="element-name"><?= $profil->nama_toko; ?></p>

                  <i class="icons icon-arrow-down"></i>
                  <div class="form-group form-animate-text" style="margin-top:40px !important;">
                    <input type="text" class="form-text" name="username" style="color: black !important;" id="username" required>
                    <span class="bar"></span>
                    <label>Username / Email</label>
                  </div>
                  <div class="form-group form-animate-text" style="margin-top:40px !important;">
                    <input type="password" style="color: black !important;" id="pass" class="form-text" name="password" required>
                    <span class="bar"></span>
                    <label>Password</label>
                  </div>
                   <div class="text-right" style="padding:5px;">
                    <a href="<?= site_url('lost_user'); ?>" style="color: black !important;">Lupa Password? </a>
                </div>
                  
                 <button type="submit" name="submit" value="Submit" class="btn blue">Sign in..</button>
              </div>
                <div class="text-center" style="padding:5px;">
                	<label>Belum punya akun? </label>
                    <a href="<?= site_url('home/registrasi'); ?>" style="color: black !important;">Register sekarang</a>
                </div>
          </div>
          	<center>
               <p style="color: black !important;"><a href="<?= site_url('home'); ?>" style="color: black !important;"><i class="fa fa-home" style="font-size:30px; color: black;" ></i> Back to Home</a></p>
            </center>
        </form>

      </div>

      <!-- end: Content -->
      <!-- start: Javascript -->
      <script src="<?php echo base_url(); ?>assets/1/js/jquery.min.js"></script>
      <script src="<?php echo base_url(); ?>assets/1/js/jquery.ui.min.js"></script>
      <script src="<?php echo base_url(); ?>assets/1/js/bootstrap.min.js"></script>

      <script src="<?php echo base_url(); ?>assets/1/js/plugins/moment.min.js"></script>
      <script src="<?php echo base_url(); ?>assets/1/js/plugins/icheck.min.js"></script>

      <!-- custom -->
      <script src="<?php echo base_url(); ?>assets/1/js/main.js"></script>
      <script type="text/javascript">
       $(document).ready(function(){
         $('input').iCheck({
          checkboxClass: 'icheckbox_flat-aero',
          radioClass: 'iradio_flat-aero'
        });
       });
     </script>
     <!-- end: Javascript -->
   </body>
   </html>