<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<h4><i class="fa fa-exchange"></i> Detail Transaksi</h4>
<hr />
<br />
<?php
//var_dump($get->row());
$data = $get->row();
?>
<div class="row">
   <div class="col-md-2">
      <b>Id Pesanan</b>
   </div>
   <div class="col-md-4">
      <b>: <?php echo $data->id_order; ?></b>
   </div>
</div>
<div class="row">
   <div class="col-md-2">
      <b>Tujuan</b>
   </div>
   <div class="col-md-4">
      <b>: <?= $data->tujuan; ?>, <?= $data->kota; ?></b>
   </div>
</div>
<div class="row">
   <div class="col-md-2">
      <b>Kurir / Layanan</b>
   </div>
   <div class="col-md-4">
      <b>: <?= $data->kurir; ?> / <?= $data->service; ?></b>
   </div>
</div>
<div class="row">
   <div class="col-md-2">
      <b>Status</b>
   </div>
   <div class="col-md-4">
      <b>: <?= ucfirst($data->status_proses); ?></b>
   </div>
</div>
<div class="row col-md-8">
   <table class="table table-responsive ">
      <thead>
         <tr>
            <th width="5%" class="center">#</th>
            <th width="20%" class="center">Nama Item</th>
            <th width="15%" class="center">Jumlah Pesan</th>
            <th width="15%" class="right">Biaya</th>
         </tr>
      </thead>
      <tbody>
         <?php
         $i = 1;
         $total_biaya = 0;
         foreach ($get->result() as $key) :
            $total_biaya += $key->biaya;
         ?>

            <tr>
               <td class="center"><?= $i++; ?></td>
               <td class="center"><?= $key->nama_item; ?></td>
               <td class="center"><?= $key->qty; ?></td>
               <td style="text-align:right">Rp. <?= number_format($key->biaya, 0, ',', '.'); ?>,-</td>
            </tr>

         <?php endforeach; ?>
         <tr>
            <td colspan="3" class="center">Ongkos Kirim</td>
            <td style="text-align:right">Rp. <?php echo number_format($data->total - $total_biaya,0,',','.'); ?>,-</td>
         </tr>
         <tr>
            <td colspan="3" class="center">Total Biaya</td>
            <td style="text-align:right">Rp. <?php echo number_format($data->total,0,',','.'); ?>,-</td>
         </tr>
      </tbody>
   </table>
</div>

<div class="row">
   <div class="col-md-2">
      <button type="button" class="btn btn-primary" onclick="window.history.go(-1)">Kembali</button>
   </div>
</div>