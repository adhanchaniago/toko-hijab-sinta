<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$profil = $data->row();

?>
<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="description" content="ecommerce">
  <meta name="author" content="sinta herena">
  <meta name="keyword" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>

  <!-- start: Css -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/1/css/bootstrap.min.css">

  <!-- plugins -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/1/css/plugins/font-awesome.min.css"/>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/1/css/plugins/simple-line-icons.css"/>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/1/css/plugins/animate.min.css"/>
  <link href="<?php echo base_url(); ?>assets/1/css/style.css" rel="stylesheet">
  <!-- end: Css -->

  <link rel="shortcut icon" href="<?php echo base_url(); ?>admin_assets/images/logo.png">

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
</head>

    <body id="mimin" class="form-signin-wrapper" style="background: #EEEEEE !important;" >
      <div class="container">

        <form class="form-signin" action="" method="post">
          <div class="panel periodic-login" style="background: orange !important; color: black; -webkit-box-shadow: 0 4px 5px 0 rgba(0, 0, 0, 0.14), 0 1px 10px 0 rgba(0, 0, 0, 0.12), 0 2px 4px -1px rgba(0, 0, 0, 0.3); box-shadow: 0 4px 5px 0 rgba(0, 0, 0, 0.14), 0 1px 10px 0 rgba(0, 0, 0, 0.12), 0 2px 4px -1px rgba(0, 0, 0, 0.3);">
              <span class="atomic-number">28</span>
              <div class="panel-body text-center">
                  <h1 class="atomic-symbol">Th</h1>
                  <p class="atomic-mass">Lupa password</p>
                  <p class="element-name"><?= $profil->nama_toko; ?></p>

                  <?php
                    if($this->session->flashdata('success')) {
                       echo '<div class="alert alert-success alert-message">';
                       echo $this->session->flashdata('success');
                       echo '</div>';
                    }
                    if($this->session->flashdata('alert')) {
                       echo '<div class="alert alert-warning alert-message">';
                       echo $this->session->flashdata('alert');
                       echo '</div>';
                    }
                    ?>

                  <i class="icons icon-arrow-down"></i>
                  <div class="form-group form-animate-text" style="margin-top:40px !important;">
                    <input type="email" name="email" class="form-text" required>
                    <span class="bar"></span>
                    <label>Email</label>
                    <p class="text-center">Kami akan mengirimkan alamat link melalui email anda untuk mengganti password.</p>
                  </div>

                  <button type="submit" name="submit" value="Submit" class="btn blue">Reset Password</button>
              </div>
                <div class="text-center" style="padding:5px;"><a href="<?= site_url('home/login'); ?>" style="color: black !important;">Masuk ke akun anda</a>
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
      <!-- custom -->
      <script src="<?php echo base_url(); ?>assets/1/js/main.js"></script>
      <script type="text/javascript">
       $(document).ready(function(){
         
       });
     </script>
     <!-- end: Javascript -->
   </body>
   </html>