<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if ($rk) {
   foreach ($rk->result() as $l) {
      $r[] = $l->kategori;
   }
}
?>
<div class="form-w3layouts">
  <!-- page start-->
  <div class="row">
    <div class="col-lg-12">
    <section class="panel">
    <header class="panel-heading">
      <?= $header; ?>
    </header>
      <div class="panel-body">
       <?= validation_errors('<p style="color:red">','</p>'); ?>
       <?php
       if ($this->session->flashdata('alert'))
       {
          echo '<div class="alert alert-danger alert-message">';
          echo $this->session->flashdata('alert');
          echo '</div>';
       }
       ?>
        <div class="position-center">
        <form class="form-horizontal" role="form" action="" enctype="multipart/form-data" method="post">

          <div class="form-group">
            <label class="col-sm-4 control-label">Nama item </label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="nama" value="<?= $nama; ?>">
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-4 control-label">Gambar Utama</label>
            <div class="col-sm-8">
              <?php
               if (isset($gambar)) {
                  echo '<input type="hidden" name="old_pict" value="'.$gambar.'">';
                  echo '<img src="'.base_url('assets/upload/'.$gambar).'" width="25%">';
                  echo '<div class="clear-fix"></div><br />';
               }
               ?>
              <input type="file" class="form-control" name="foto">
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-4 control-label" >Gambar Detail
            </label>
            <?php
               if (isset($gb)) {
                  $jml = 5 - $gb->num_rows();

                  echo '<div class="col-sm-8">';

                  foreach ($gb->result() as $img) :
                     ?>

                     <div class="col-sm-8 card">
                        <div class="card-image">
                           <img src="<?= base_url('assets/upload/'.$img->img); ?>" style="width: 25%; margin-bottom: 20px;">
                        </div>
                        <div class="card-action">
                           <a href="<?= base_url('item/update_img/'.$img->img); ?>" class="btn btn-primary btn-flat"><i class="fa fa-upload"></i> Update Gambar</a>

                           <a href="<?= base_url('item/del_img/'.$img->img); ?>" class="btn btn-danger btn-flat" onclick="return confirm('Yakin ingin menghapus gambar ini ?')"><i class="fa fa-trash"></i> Hapus</a>
                        </div>
                     </div>

                  <?php endforeach; ?>

                  </div>
                  <div class="col-md-5 col-sm-6 col-xs-12 col-md-offset-2">
               <?php
               } else {
                  $jml = 5;
                  echo '<div class="col-sm-8">';
               }
               for ($i = 0; $i < $jml; $i++) {
                  echo '<input type="file" class="form-control col-md-7 col-xs-12" name="gb[]">';
                  echo '<div class="clearfix" style="margin-bottom: 10px;"></div>';
               }
               ?>
            </div>
         </div>

          <div class="form-group">
            <label class="col-sm-4 control-label">Harga </label>
            <div class="col-sm-8">
              <input type="number" class="form-control" name="harga" value="<?= $harga; ?>">
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-4 control-label">Stok </label>
            <div class="col-sm-8">
              <input type="number" class="form-control" name="stok" value="<?= $stok; ?>">
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-4 control-label">Berat </label>
            <div class="col-sm-8">
              <input type="number" class="form-control" name="berat" value="<?= $berat; ?>">
              <p class="help-block">* Berat dalam satuan Gram</p>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-4 control-label">Kategori </label>
            <div class="col-sm-8">
              <textarea class="form-control" rows="2" name="kategori" id="txt1"><?= $kategori; ?></textarea>
               <p class="help-text">* Gunakan tanda koma untuk memisahkan kategori</p>

               <?php foreach($kat->result() as $k) :?>
                  <input type="checkbox" name="kat[]" value="<?=$k->kategori;?>" onclick="addlist(this, 'txt1')" <?php if (isset($r)) { if($rk){ if(in_array($k->kategori, $r)){echo 'checked';}}} ?>> <?=$k->kategori;?>&nbsp;
               <?php endforeach; ?>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-4 control-label">Status</label>
            <div class="col-sm-6">
               <select name="status" class="form-control">
                  <option value="">Pilih Status</option>
                  <option value="1" <?php if($status == 1) { echo "selected"; }?>>Aktif</option>
                  <option value="2" <?php if($status == 2) { echo "selected"; }?>>Tidak Aktif</option>
               </select>
            </div>
         </div>

         <div class="form-group">
            <label class="col-sm-4 control-label">Deskripsi </label>
            <div class="col-sm-8">
              <textarea class="form-control" rows="2" name="desk" id="txt1"><?= $desk; ?></textarea>
            </div>
          </div>

          <div class="form-group">
            <div class="col-lg-offset-4 col-lg-8">
              <button type="submit" class="btn btn-success" name="submit" value="Submit">Submit</button>
              <button type="button" onclick="window.history.go(-1)" class="btn btn-primary" >Kembali</button>
            </div>
          </div>
        </form>
        </div>
      </div>
    </section>
    </div>
  </div>
</div>