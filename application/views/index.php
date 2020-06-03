<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$prof = $profil->row();

?>
<!DOCTYPE HTML>
<html>
   <head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title><?= $prof->nama_toko; ?></title>
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="description" content="" />
   <meta name="keywords" content="" />
   <meta name="author" content="" />

  <!-- Facebook and Twitter integration -->
   <meta property="og:title" content=""/>
   <meta property="og:image" content=""/>
   <meta property="og:url" content=""/>
   <meta property="og:site_name" content=""/>
   <meta property="og:description" content=""/>
   <meta name="twitter:title" content="" />
   <meta name="twitter:image" content="" />
   <meta name="twitter:url" content="" />
   <meta name="twitter:card" content="" />

   <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
   <!-- Animate.css -->
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/2/css/animate.css">
   <!-- Icomoon Icon Fonts-->
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/2/css/icomoon.css">
   <!-- Bootstrap  -->
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/2/css/bootstrap.css">

   <!-- Magnific Popup -->
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/2/css/magnific-popup.css">

   <!-- Flexslider  -->
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/2/css/flexslider.css">

   <!-- Owl Carousel -->
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/2/css/owl.carousel.min.css">
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/2/css/owl.theme.default.min.css">
   
   <!-- Date Picker -->
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/2/css/bootstrap-datepicker.css">
   <!-- Flaticons  -->
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/2/fonts/flaticon/font/flaticon.css">

   <!-- Theme style  -->
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/2/css/style.css">

   <!-- Modernizr JS -->
   <script src="<?php echo base_url(); ?>assets/2/js/modernizr-2.6.2.min.js"></script>
   <!-- FOR IE9 below -->
   <!--[if lt IE 9]>
   <script src="<?php echo base_url(); ?>assets/2/js/respond.min.js"></script>
   <![endif]-->
   </head>
   <body>
      
   <div class="colorlib-loader"></div>

   <div id="page">
      <nav class="colorlib-nav" role="navigation">
         <div class="top-menu">
            <div class="container">
               <div class="row" id="sin">
                  <div class="col-xs-3">
                     <div id="colorlib-logo"><a href="<?=site_url('home');?>"><?= $prof->nama_toko; ?>*</a></div>
                  </div>

                  <div class="col-xs-3">
                     <form action="<?= site_url('home/search'); ?>" method="post" class="input-group">
                           <input type="search" class="form-control search" name="search" placeholder="Search">
                        </form>
                  </div>
                  

                  <div class="col-xs-6 text-right menu-1">
                     <ul>      
                        <li class="active"><a href="<?=site_url('home');?>">Home</a></li>
                        <li class="has-dropdown">
                           <a href="#" data-activates="kat1">Kategori</a>
                           <ul class="dropdown" id="kat1">
                             <?php foreach ($kategori->result() as $kat): ?>
                                <li>
                                   <a href="<?=site_url('home/kategori/'.$kat->url);?>"> <?=$kat->kategori;?></a>
                                </li>
                             <?php endforeach; ?>
                           </ul>
                           <?php if ($this->session->userdata('user_login')) { ?>
                        </li>

                        <li class="has-dropdown active">
                          <a href="" data-activates="drop2"><?= ucwords($this->session->userdata('name')); ?></a>
                          <ul class="dropdown" id="drop2">
                            <li><a href="<?= site_url('home/profil'); ?>"><i class="fa fa-user"></i> Edit Profil</a></li>
                             <li><a href="<?= site_url('home/password'); ?>"><i class="fa fa-key"></i> Ganti Password</a></li>
                             <li><a href="<?= site_url('home/transaksi'); ?>"><i class="fa fa-exchange"></i> Riwayat Order</a></li>
                             <li><a href="<?= site_url('home/list_fav'); ?>"><i class="fa fa-heart"></i> Favorit</a></li>
                             <li><a href="<?= site_url('home/logout'); ?>"><i class="fa fa-sign-out"></i> Keluar</a></li>
                          </ul>
                              <?php } else { ?>

                             
                               <li class="has-dropdown">
                                 <a href="#" data-activates="drop3"><i class="fa fa-sign-in"></i> Sign in</a>
                                <ul class="dropdown" id="drop3">
                                 <li><a href="<?= site_url('login'); ?>"><i class="fa fa-sign-in"></i> Sign in Admin</a></li>
                                 <li><a href="<?= site_url('home/login'); ?>"><i class="fa fa-sign-in"></i> Sign in User</a></li>
                                </ul>
                               </li>


                               <li><a href="<?= site_url('home/registrasi'); ?>"><i class="fa fa-edit"></i> Register</a></li>
                              <?php } ?>       
                              <li>
                                 <a href="<?= site_url('cart'); ?>">
                                    <i class="icon-shopping-cart"></i>
                                    <?php
                                    if ($this->cart->total() > 0) {
                                       echo 'Rp. '.number_format($this->cart->total(), 0, ',', '.');
                                    } else {
                                       echo 'Cart';
                                    }
                                    ?>
                                 </a>
                        </li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </nav>

      <aside id="colorlib-hero"  class="breadcrumbs">
         <div class="flexslider" >
            <ul class="slides">
               <li style="background-image: url(<?php echo base_url(); ?>assets/upload/index.jpg);">
               </li>
            </ul>
         </div>
      </aside>

      <div class="colorlib-shop">
         <div class="container">
            <?php echo $content; ?>   
         </div>
      </div>

      <footer id="colorlib-footer" role="contentinfo">
         <div class="container">
            <div class="row row-pb-md">
               <div class="col-md-4 colorlib-widget">
                  <h4>Tentang Kami</h4>
                  <p>Tokohijab.com adalah Islamic fashion e-commerce pertama di dunia yang didirikan pada tahun 2018. Dengan konsep online mall, Tokohijab.com menyediakan berbagai macam produk terbaik karya designer fashion muslimah Indonesia. Produk yang kami sediakan ditujukan khusus untuk wanita Muslim, dari mulai pakaian, kerudung, aksesoris dan banyak lagi yang lainnya.</p>
               </div>
               <div class="col-md-4 colorlib-widget">
                  <h4>Informasi</h4>
                  <p>
                     <ul class="colorlib-footer-links">
                        <li><a href="<?= site_url('home/upload_bukti'); ?>">Upload Bukti Pembayaran</a></li>
                     </ul>
                  </p><hr>
                  
                  <p><h5>Tetap Terhubung dengan kami</h5>
                     <ul class="colorlib-social-icons">
                        <li><a href="<?= $prof->twitter; ?>"><i class="icon-twitter"></i></a></li>
                        <li><a href="<?= $prof->facebook; ?>"><i class="icon-facebook"></i></a></li>
                        <li><a href="<?= $prof->gplus; ?>"><i class="icon-google-plus"></i></a></li>
                     </ul>
                  </p>
               </div>

               <div class="col-md-4">
                  <h4>Kontak Kami</h4>
                  <ul class="colorlib-footer-links">
                     <li><?= $prof->alamat_toko; ?></li><hr>
                     <li><i class="icon-phone"> <?= $prof->phone; ?></i></li>
                    
                  </ul>
               </div>
            </div>
         </div>
         <div class="copy">
            <div class="row">
               <div class="col-md-12 text-center">
                  <p>
                     <span class="block"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | E-commerce <i class="fa fa-heart-o" aria-hidden="true"></i> in <a href="" target="_blank">Tokohijab</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></span> 
                  </p>
               </div>
            </div>
         </div>
      </footer>
   </div>

   <div class="gototop js-top">
      <a href="#" class="js-gotop"><i class="icon-arrow-up2"></i></a>
   </div>
   
   <!-- jQuery -->
   <script src="<?php echo base_url(); ?>assets/2/js/jquery.min.js"></script>
   <!-- jQuery Easing -->
   <script src="<?php echo base_url(); ?>assets/2/js/jquery.easing.1.3.js"></script>
   <!-- Bootstrap -->
   <script src="<?php echo base_url(); ?>assets/2/js/bootstrap.min.js"></script>
   <!-- Waypoints -->
   <script src="<?php echo base_url(); ?>assets/2/js/jquery.waypoints.min.js"></script>
   <!-- Flexslider -->
   <script src="<?php echo base_url(); ?>assets/2/js/jquery.flexslider-min.js"></script>
   <!-- Owl carousel -->
   <script src="<?php echo base_url(); ?>assets/2/js/owl.carousel.min.js"></script>
   <!-- Magnific Popup -->
   <script src="<?php echo base_url(); ?>assets/2/js/jquery.magnific-popup.min.js"></script>
   <script src="<?php echo base_url(); ?>assets/2/js/magnific-popup-options.js"></script>
   <!-- Date Picker -->
   <script src="<?php echo base_url(); ?>assets/2/js/bootstrap-datepicker.js"></script>
   <!-- Stellar Parallax -->
   <script src="<?php echo base_url(); ?>assets/2/js/jquery.stellar.min.js"></script>
   <!-- Main -->
   <script src="<?php echo base_url(); ?>assets/2/js/main.js"></script>

   <!-- custom -->
      <?php if($this->uri->segment(1) == 'checkout' || $this->uri->segment(1) == 'Checkout') { ?>

         <script type="text/javascript">

            $(document).ready(function() {


               function convertToRupiah(angka)
               {

                  var rupiah = '';
                  var angkarev = angka.toString().split('').reverse().join('');

                  for(var i = 0; i < angkarev.length; i++)
                    if(i%3 == 0) rupiah += angkarev.substr(i,3)+'.';

                  return rupiah.split('',rupiah.length-1).reverse().join('');

               }


               $('#prov').change(function() {
                  var prov = $('#prov').val();

                  $.ajax({
                     url: "<?=base_url();?>checkout/city",
                     method: "POST",
                     data: { prov : prov },
                     success: function(obj) {
                        $('#kota').html(obj);
                     }
                  });
               });

               $('#kota').change(function() {
                  var dest = $('#kota').val();
                  var kurir = $('#kurir').val()

                  $.ajax({
                     url: "<?=base_url();?>checkout/getcost",
                     method: "POST",
                     data: { dest : dest, kurir : kurir },
                     success: function(obj) {
                        $('#layanan').html(obj);
                     }
                  });
               });

               $('#kurir').change(function() {
                  var dest = $('#kota').val();
                  var kurir = $('#kurir').val()

                  $.ajax({
                     url: "<?=base_url();?>checkout/getcost",
                     method: "POST",
                     data: { dest : dest, kurir : kurir },
                     success: function(obj) {
                        $('#layanan').html(obj);
                     }
                  });
               });

               $('#layanan').change(function() {
                  var layanan = $('#layanan').val();

                  $.ajax({
                     url: "<?=base_url();?>checkout/cost",
                     method: "POST",
                     data: { layanan : layanan },
                     success: function(obj) {
                        var hasil = obj.split(",");

                        $('#ongkir').val(convertToRupiah(hasil[0]));
                        $('#total').val(convertToRupiah(hasil[1]));
                     }
                  });
               });
            });
         </script>

      <?php } ?>

      <script type="text/javascript">
         $(".button-collapse").sideNav();
         $(".modal").modal();
         $('.carousel').carousel();

         $(document).ready(function() {
            $(".uang").mask("00,000.000.000", {reverse:true});

            $(window).scroll(function(){
               if ($(this).scrollTop() > 100) {
                  $('.back-top').fadeIn();
                } else {
                  $('.back-top').fadeOut();
               }
            });
            $('.back-top').click(function(){
               $("html, body").animate({ scrollTop: 0 }, 600);
              return false;
            });
         });
         $('.alert-message').alert().delay(3000).slideUp('slow');
      </script>
   </body>
</html>