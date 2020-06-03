<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$profile = $profil->row();
?>

<!DOCTYPE html>
<head>
  <title>Dashboard | Admin :: <?= $profile->nama_toko; ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="keywords" content="ecommerce" />
  <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

  <!-- bootstrap-css -->
  <link rel="stylesheet" href="<?= base_url(); ?>admin_assets/css/bootstrap.min.css" >
  <!-- //bootstrap-css -->

  <!-- Data Tables -->
  <link href="<?php echo base_url(); ?>admin_assets/css/dataTables.bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>admin_assets/css/responsive.bootstrap.min.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="<?= base_url(); ?>admin_assets/css/style.css" rel='stylesheet' type='text/css' />
  <link href="<?= base_url(); ?>admin_assets/css/style-responsive.css" rel="stylesheet"/>

  <!-- font CSS -->
  <link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

  <!-- font-awesome icons -->
  <link rel="stylesheet" href="<?= base_url(); ?>admin_assets/css/font.css" type="text/css"/>
  <link href="<?= base_url(); ?>admin_assets/css/font-awesome.css" rel="stylesheet"> 
  <link rel="stylesheet" href="<?= base_url(); ?>admin_assets/css/morris.css" type="text/css"/>

  <!-- //font-awesome icons -->
  <script src="<?= base_url(); ?>admin_assets/js/jquery2.0.3.min.js"></script>
  <script src="<?= base_url(); ?>admin_assets/js/raphael-min.js"></script>
  <script src="<?= base_url(); ?>admin_assets/js/morris.js"></script>
</head>

<body>
  <section id="container">
    <!--header start-->
    <header class="header fixed-top clearfix">
      <!--logo start-->
      <div class="brand">
          <a href="<?= base_url(); ?>administrator" class="logo">ADMIN</a>
          <div class="sidebar-toggle-box">
              <div class="fa fa-bars"></div>
          </div>
      </div>
      <!--logo end-->

      <div class="top-nav clearfix">
        <!--search & user info start-->
        <ul class="nav pull-right top-menu">
            <!-- user login dropdown start-->
            <li class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="<?= base_url(); ?>admin_assets/#">
                    <img alt="" src="<?= base_url(); ?>admin_assets/images/avatar3.png">
                    <span class="username">Administrator</span>
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu extended logout">
                    <li><a href="<?= site_url('administrator/edit_profil'); ?>"><i class=" fa fa-suitcase"></i> Edit Profil</a></li>
                    <li><a href="<?= site_url('administrator/update_password'); ?>"><i class="fa fa-cog"></i> Ganti Password</a></li>
                    <li><a href="<?= site_url('login/logout'); ?>"><i class="fa fa-key"></i> Keluar</a></li>
                </ul>
            </li>
            <!-- user login dropdown end -->             
        </ul>
        <!--search & user info end-->
      </div>
    </header>
    <!--header end-->

    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
          <ul class="sidebar-menu" id="nav-accordion">
            <li>
              <a class="active" href="<?= base_url(); ?>administrator">
                <i class="fa fa-dashboard"></i>
                <span>Dashboard</span>
              </a>
            </li> 

            <li class="sub-menu">
              <a href="javascript:;">
                <i class="fa fa-archive"></i>
                <span>Manajemen Master</span>
              </a>
              <ul class="sub">
                <li><a href="<?= site_url('item'); ?>">Item</a></li>
                <li><a href="<?= site_url('tag'); ?>">Kategori</a></li>
                <li><a href="<?= site_url('user'); ?>">User</a></li>
              </ul>
            </li>

            <li>
              <a href="<?= site_url('transaksi'); ?>">
                <i class="fa fa-shopping-cart"></i>
                <span>Manajemen Order </span>
              </a>
            </li> 

            <li>
              <a href="<?= site_url('transaksi/report'); ?>">
                <i class="fa fa-book"></i>
                <span>Laporan </span>
              </a>
            </li>

            <li>
              <a href="<?= site_url('setting'); ?>">
                <i class="fa fa-cogs"></i>
                <span>Pengaturan </span>
              </a>
            </li>
          </ul>
        </div>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->

    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <?php echo $content; ?>
      </section>
        
      <!-- footer -->
      <div class="footer navbar-fixed-bottom">
        <div class="wthree-copyright">
          <p>© 2018. All rights reserved | Ecommerce by <a href="<?= site_url('administrator'); ?>">Tokohijab</a></p>
        </div>
      </div>
      <!-- / footer -->
    </section>
    <!--main content end-->

  </section>

  <script src="<?= base_url(); ?>admin_assets/js/bootstrap.js"></script>
  <script src="<?= base_url(); ?>admin_assets/js/jquery.dcjqaccordion.2.7.js"></script>
  <script src="<?= base_url(); ?>admin_assets/js/scripts.js"></script>
  <script src="<?= base_url(); ?>admin_assets/js/jquery.slimscroll.js"></script>
  <script src="<?= base_url(); ?>admin_assets/js/jquery.nicescroll.js"></script>

  <!-- Data Tables -->
  <script src="<?=base_url();?>admin_assets/js/jquery.dataTables.min.js"></script>
  <script src="<?= base_url(); ?>admin_assets/js/dataTables.bootstrap.min.js"></script>
  <script src="<?= base_url(); ?>admin_assets/js/dataTables.responsive.min.js"></script>

  <!--[if lte IE 8]><script language="javascript" type="text/javascript" src="<?= base_url(); ?>admin_assets/js/flot-chart/excanvas.min.js"></script><![endif]-->
  <script src="<?= base_url(); ?>admin_assets/js/jquery.scrollTo.js"></script>

  <!-- morris JavaScript -->  
  <script>
    $(document).ready(function() {
      //BOX BUTTON SHOW AND CLOSE
       jQuery('.small-graph-box').hover(function() {
        jQuery(this).find('.box-button').fadeIn('fast');
       }, function() {
        jQuery(this).find('.box-button').fadeOut('fast');
       });
       jQuery('.small-graph-box .box-close').click(function() {
        jQuery(this).closest('.small-graph-box').fadeOut(200);
        return false;
       });
    });
  </script>

  <script type="text/javascript">
   function addlist(obj, out) {
    var grup = obj.form[obj.name];
    var len  = grup.length;
    var list = new Array();

    if (len > 1) {
       for (var i = 0; i < len; i++) {
          if (grup[i].checked) {
             list[list.length] = grup[i].value;
          }
       }
    } else {
       if (grup.checked) {
          list[list.length] = grup.value;
       }
    }
    document.getElementById(out).value = list.join(', ');
    return;
   }
   $('.alert-message').alert().delay(3000).slideUp('slow');
  </script>

  <?php if($this->uri->segment(1) != 'administrator' && $this->uri->segment(1) != 'setting') { ?>

     <script type="text/javascript">
       $(document).ready(function(){
          <?php
             switch ($this->uri->segment(1)) {
                case 'item':
                   $file = 'item';
                   break;
                case 'tag':
                   $file = 'tag';
                   break;
                case 'user':
                   $file = 'user';
                   break;
                case 'transaksi':
                   $file = 'transaksi';
                   break;
             }
          ?>

          $('#datatable').DataTable({
             "processing": true, //Feature control the processing indicator.
             "serverSide": true, //Feature control DataTables' server-side processing mode.
             "order": [], //Initial no order.

             // Load data for the table's content from an Ajax source
             "ajax": {
                "url": "<?=base_url($file.'/ajax_list')?>",
                "type": "POST"
             },

            //Set column definition initialisation properties.
            "columnDefs": [
            {
                "targets": [ 0 ], //first column / numbering column
                "orderable": false, //set not orderable
            },
            ],
        });
       });
     </script>
  <?php } ?>
</body>
</html>