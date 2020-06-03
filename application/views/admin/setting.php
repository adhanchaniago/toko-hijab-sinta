<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="x_panel">
   <div class="x_title">
      <h2>Pengaturan Profil Toko</h2>
     <div class="clearfix"></div>
     <?= validation_errors('<p style="color:red">','</p>'); ?>
     <?php
     if ($this->session->flashdata('alert'))
     {
        echo '<div class="alert alert-danger alert-message">';
        echo $this->session->flashdata('alert');
        echo '</div>';
     }
     ?>
   </div>

   <div class="x_content">
      <br />

      <form class="form-horizontal form-label-left" action="" enctype="multipart/form-data" method="post">

         <div class="form-group">
            <label class="control-label col-md-2 col-sm-2 col-xs-12" >Nama Toko
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
               <input type="text" class="form-control col-md-7 col-xs-12" name="nama_toko" value="<?= $judul; ?>" placeholder="Nama Toko">
            </div>
         </div>

         <div class="form-group">
            <label class="control-label col-md-2 col-sm-2 col-xs-12">No. Handphone
            </label>
            <div class="col-md-4 col-sm-6">
               <input class="form-control col-md-7 col-xs-12" type="number" name="hp" value="<?= $hp; ?>" placeholder="Nomor Hp / Telp.">
            </div>
         </div>

         <div class="form-group">
            <label class="control-label col-md-2 col-sm-2 col-xs-12" >Facebook
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
               <input type="text" class="form-control col-md-7 col-xs-12" name="fb" value="<?= $fb; ?>" placeholder="Link Facebook">
            </div>
         </div>

         <div class="form-group">
            <label class="control-label col-md-2 col-sm-2 col-xs-12" >Twitter
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
               <input type="text" class="form-control col-md-7 col-xs-12" name="twitter" value="<?= $twitter; ?>" placeholder="Link Twitter">
            </div>
         </div>

         <div class="form-group">
            <label class="control-label col-md-2 col-sm-2 col-xs-12" >Google+
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
               <input type="text" class="form-control col-md-7 col-xs-12" name="gplus" value="<?= $gplus; ?>" placeholder="Link Google+">
            </div>
         </div>

         <div class="form-group">
            <label class="control-label col-md-2 col-sm-2 col-xs-12" >Email Toko
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
               <input type="text" class="form-control col-md-7 col-xs-12" name="email_toko" value="<?= $mail_toko; ?>" placeholder="Email Toko">
            </div>
         </div>

         <div class="form-group">
            <label class="control-label col-md-2 col-sm-2 col-xs-12" >Password
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
               <input type="password" class="form-control col-md-7 col-xs-12" name="pass_toko" value="<?= $pass_toko; ?>" placeholder="Password Email Toko">
            </div>
         </div>

         <div class="form-group">
            <label class="control-label col-md-2 col-sm-2 col-xs-12" >No. Rekening
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
               <input type="text" class="form-control col-md-7 col-xs-12" name="rekening" value="<?= $rekening; ?>" placeholder="No. Rekening">
            </div>
         </div>

         <div class="form-group">
            <label class="control-label col-md-2 col-sm-2 col-xs-12" >Api Key
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
               <input type="password" class="form-control col-md-7 col-xs-12" name="api_key" value="<?= $api_key; ?>" placeholder="Api Key Rajaongkir">
            </div>
         </div>

         <div class="form-group">
            <label class="control-label col-md-2 col-sm-2 col-xs-12" >ID Kota / Kabupaten
            </label>
            <div class="col-md-6 col-xs-12">
               <input type="number" class="form-control col-md-7 col-xs-12" name="asal" value="<?= $asal; ?>" placeholder="Id Kota / Kabupaten">
            </div>
         </div>

         <div class="form-group">
            <label class="control-label col-md-2 col-sm-2 col-xs-12">Alamat Toko</label>
            <div class="col-md-6 col-sm-6">
               <textarea class="form-control" rows="4" name="alamat" placeholder="Alamat Toko"><?= $alamat; ?></textarea>
            </div>
         </div>

         <div class="ln_solid"></div>

         <div class="form-group" style="margin-bottom: 60px">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
               <button type="submit" class="btn btn-success" name="submit" value="Submit">Submit</button>
              <button type="button" onclick="window.history.go(-1)" class="btn btn-primary" >Kembali</button>
            </div>
         </div>

     </form>
   </div>
</div>
