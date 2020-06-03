<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
   <div class="col-12 " >
      <?php
      //tampilkan pesan gagal
      if ($this->session->flashdata('alert'))
      {
         echo '<div class="alert alert-danger alert-message" style="font-weight:800; color:white; -webkit-box-shadow: 0 4px 5px 0 rgba(0, 0, 0, 0.14), 0 1px 10px 0 rgba(0, 0, 0, 0.12), 0 2px 4px -1px rgba(0, 0, 0, 0.3);
          box-shadow: 0 4px 5px 0 rgba(0, 0, 0, 0.14), 0 1px 10px 0 rgba(0, 0, 0, 0.12), 0 2px 4px -1px rgba(0, 0, 0, 0.3);">';
         echo '<center>'.$this->session->flashdata('alert').'</center>';
         echo '</div>';
      }
      //tampilkan pesan success
      if ($this->session->flashdata('success'))
      {
         echo '<div class="alert alert-success alert-message"> style="font-weight:800; color:white; -webkit-box-shadow: 0 4px 5px 0 rgba(0, 0, 0, 0.14), 0 1px 10px 0 rgba(0, 0, 0, 0.12), 0 2px 4px -1px rgba(0, 0, 0, 0.3);
          box-shadow: 0 4px 5px 0 rgba(0, 0, 0, 0.14), 0 1px 10px 0 rgba(0, 0, 0, 0.12), 0 2px 4px -1px rgba(0, 0, 0, 0.3);"';
         echo '<center>'.$this->session->flashdata('success').'</center>';
         echo '</div>';
      }
      ?>
   </div>

<div class="row">
   <div class="col s12 l12 m12" >
      <h4>Item Favorite Anda</h4>
      <hr />
      <?php
      if ($data->num_rows() < 1)
      {
         echo '<h5>Anda Belum menambahkan item ke daftar favorite anda</h5>';
         echo '<br /><br /><br /><br />';
         echo '<center>';
         echo '<a href="'.site_url('home').'" class="myLink"><i class="fa fa-home"></i> Back to Home</a>';
         echo '</center>';
      }
      ?>
      <div class="row">
         <?php
         //masukkan id_item ke variabel array favorite
         if (isset($fav) && $fav->num_rows() > 0) {

            foreach ($fav->result() as $f) :

               $favorite[] = $f->id_item;

            endforeach;

         }
         ?>
         <?php foreach($data->result() as $key) : ?>

            <div class="container">
    <div class="row">
         <div class="col-sm-6 col-md-4">
            <div class="thumbnail" style="-webkit-box-shadow: 0 4px 5px 0 rgba(0, 0, 0, 0.14), 0 1px 10px 0 rgba(0, 0, 0, 0.12), 0 2px 4px -1px rgba(0, 0, 0, 0.3);
          box-shadow: 0 4px 5px 0 rgba(0, 0, 0, 0.14), 0 1px 10px 0 rgba(0, 0, 0, 0.12), 0 2px 4px -1px rgba(0, 0, 0, 0.3);" >
               <a href="<?= site_url('home/detail/'.$key->link); ?>">
               <h4 class="text-center"><span class="label label-info"><?= $key->nama_item; ?></span></h4>
               <img src="<?= base_url('assets/upload/'.$key->gambar); ?>" class="responsive-img">
               </a>               
               <div class="caption">
                  <div class="row">
                     <div class="col-md-12 col-xs-12 price">
                        <h3 style="font-size: 20px; text-align: center; padding:10px; background: #757575; color: white;">
                        <label>Rp. <?= number_format($key->harga, 0, ',', '.'); ?>,-</label></h3>
                     </div>
                  </div>
                     
                        <div class="left">
                           <?php
                           if ($this->cart->contents())
                           {
                              foreach ($this->cart->contents() as $cart) {
                                 $stok = ($cart['id'] == $key->id_item) ? ($key->stok - $cart['qty']) : $key->stok;
                              }
                           } else {
                              $stok = $key->stok;
                           }

                           if ($stok >= 10)
                           {
                              echo 'Stok : <span class="badge green white-text">'.$stok.'</span>';
                           } elseif ($stok < 10 && $stok > 0) {
                              echo 'Stok : <span class="badge orange white-text">'.$stok.'</span>';
                           } else {
                              echo 'Stok : <span class="badge red white-text">Habis</span>';
                           }
                           ?>
                        </div>
                        <div class="row" style="margin-top: 20px;">
                           <div class="col-sm-4 col-xs-4 col-lg-4 col-md-4 ">
                              <a href="<?= site_url('cart/add/'.$key->link); ?>?qty=1&submit=Submit" class="btn btn-success" style=" width: 100%; display: block; color: white; margin: 0px auto; margin-bottom: 10px; border-radius: 0px !important; "><i class="material-icons">add_shopping_cart</i></a>
                           </div>
                           <div class="col-sm-4 col-xs-4 col-lg-4 col-md-4" style="margin-bottom: 10px;">
                              <a href="<?= site_url('home/detail/'.$key->link); ?>" class="btn btn-default" data-position="bottom" data-delay="50" data-tooltip="Lihat Detail"  style="background: #00b0ff; width: 100%; display: block; color: white; margin: 0px auto; margin-bottom: 10px; border-radius: 0px !important; ">
                                 <i class="material-icons">info</i>
                              </a>
                           </div>
                      
                        <?php
                        if (isset($fav) && $fav->num_rows() > 0) {
                           if (in_array($key->id_item, $favorite))
                           {
                              $tooltip = 'Hapus dari Favorite';
                              $icon    = '<i class="material-icons">delete_forever</i>';
                           } else {
                              $tooltip = 'Tambah ke Favorite';
                              $icon    = '<i class="material-icons">favorite</i>';
                           }
                        } else {
                           $tooltip = 'Tambah ke Favorite';
                           $icon    = '<i class="material-icons">favorite</i>';
                        }
                        ?>
                        <div class="col-sm-4 col-xs-4 col-lg-4 col-md-4">
                           <a href="<?= site_url('home/favorite/'.$key->link); ?>" class="btn btn-danger" style=" color: white; width: 100%; display: block; margin: 0px auto; border-radius: 0px !important; " data-position="bottom" data-delay="50" data-tooltip="<?= $tooltip; ?>">
                              <?= $icon; ?>
                           </a>
                         </div>
                      </div>



               </div>
            </div>
            
        </div> 





         <?php endforeach; ?>
      </div>
   </div>
</div>
