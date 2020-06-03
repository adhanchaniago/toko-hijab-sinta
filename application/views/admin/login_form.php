<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$profil = $data->row();
?>
<!DOCTYPE html>
<head>
<title>Login Administrator</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="<?=base_url();?>admin_assets/css/bootstrap.min.css" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="<?=base_url();?>admin_assets/css/style.css" rel='stylesheet' type='text/css' />
<link href="<?=base_url();?>admin_assets/css/style-responsive.css" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="<?=base_url();?>admin_assets/css/font.css" type="text/css"/>
<link href="<?=base_url();?>admin_assets/css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<script src="<?=base_url();?>admin_assets/js/jquery2.0.3.min.js"></script>
</head>
<body>
<div class="log-w3">
<div class="w3layouts-main">
   <h2>Sign In Now @<?= $profil->nama_toko; ?></h2>

   <?php
   if($this->session->flashdata('alert')) {
      echo '<div class="alert alert-warning alert-message">';
      echo $this->session->flashdata('alert');
      echo '</div>';
   }
   ?>
      <form action="" method="post">
         <input type="text" class="ggg" name="username_admin" placeholder="USERNAME">
         <input type="password" class="ggg" name="password_admin" placeholder="PASSWORD">
         <h6><a href="<?= site_url('lost_admin'); ?>">Lupa Password?</a></h6>
            <div class="clearfix"></div>
            <input type="submit" value="Submit" name="submit">
      </form>
</div>
</div>
<script src="<?=base_url();?>admin_assets/js/bootstrap.js"></script>
<script src="<?=base_url();?>admin_assets/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="<?=base_url();?>admin_assets/js/scripts.js"></script>
<script src="<?=base_url();?>admin_assets/js/jquery.slimscroll.js"></script>
<script src="<?=base_url();?>admin_assets/js/jquery.nicescroll.js"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="<?=base_url();?>admin_assets/js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="<?=base_url();?>admin_assets/js/jquery.scrollTo.js"></script>
<script type="text/javascript">
   $('.alert-message').alert().delay(1000).slideUp('slow');
</script>
</body>
</html>
