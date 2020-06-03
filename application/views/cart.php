<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<h2><i class="icon-shopping-cart"></i> Data Belanja</h2>
<br />
<?= validation_errors('<p style="color:red">','</p>'); ?>
<?php

if ($this->session->flashdata('alert'))
{
   echo '<div class="alert alert-danger alert-message">';
   echo '<center>'.$this->session->flashdata('alert').'</center>';
   echo '</div>';
}

if ($this->session->flashdata('success'))
{
   echo '<div class="alert alert-success alert-message">';
   echo '<center>'.$this->session->flashdata('success').'</center>';
   echo '</div>';
}

?>
<div class="row">
   <table class="table table-responsive col m10 s12 offset-m1" style="overflow: auto;">
      <thead>
         <tr>
            <th width="5%" style="text-align: center" class="center">#</th>
            <th width="30%" style="text-align: center" class="center">Nama Barang</th>
            <th width="10%" style="text-align: center" >Berat Satuan</th>
            <th width="10%" style="text-align: center">Berat Total</th>
            <th width="5%" style="text-align: center" class="center">Jumlah</th>
            <th width="15%" style="text-align: center" class="center">Harga Total</th>
            <th width="15%" style="text-align: center" class="center">opsi</th>
         </tr>
      </thead>
      <tbody>
         <?php
         $i = 1;
         foreach($this->cart->contents() as $key) :
            ?>
         <tr>
            <td class="center"><?= $i++; ?></td>
            <td><a href="<?= site_url('home/detail/'.$key['link']); ?>"><?= $key['name']; ?></a></td>
            <td class="center"><?= number_format($key['weight'], 0, ',', '.').' gram'; ?></td>
            <td class="center"><?= number_format(($key['weight'] * $key['qty']), 0, ',', '.').' gram'; ?></td>
            <td class="center"><?= $key['qty']; ?></td>
            <td style="text-align:center">Rp. <?= number_format(($key['qty'] * $key['price']), 0, ',', '.'); ?>,-</td>
            <td style="text-align:center">
               <a  class="btn btn-warning"  onclick="editModal('<?php echo $key["rowid"]?>')" style="  height: 40px;"><i class="material-icons">edit</i></a>
               <a href="<?= site_url('cart/delete/'.$key['rowid']); ?>" class="btn btn-danger" style="  height: 40px;" onclick="return confirm('Yakin Ingin menghapus item ini dari keranjang anda ?')"><i class="material-icons">delete_forever</i></a>
            </td>
         </tr>

<div class="modal fade" id="modal_edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Edit</h4>
      </div>
      <div class="modal-body">
        <form action="<?= site_url('cart/update/'.$key['rowid']); ?>" method="post">
          <div class="form-group">
            <label for="recipient-name" class="control-label">Nama Produk</label>
            <input type="text" name="name" class="form-control" value="<?= $key['name']; ?>" id="name<?= $key['rowid']; ?>" readonly="readonly">
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">Jumlah</label>
            <input type="number" name="qty" class="form-control" value="<?= $key['qty']; ?>" id="qty<?= $key['rowid']; ?>" autofocus>
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Update</button>
        </form>

      </div>
    </div>
  </div>
</div>

      <?php endforeach; ?>
      <tr>
         <td colspan="5" class="center"><b>Total</b></td>
         <td colspan="1" style="text-align:right">Rp. <?= number_format($this->cart->total(), 0, ',','.'); ?>,-</td>
         <td></td>
      </tr>
      </tbody>
   </table>
</div>
<br />
<div class="right">
   <a href="<?= site_url('checkout'); ?>" class="btn btn-primary"><i class="fa fa-shopping-bag"></i> Checkout</a>
</div>
<br/>

<script>
               function editModal(id) {
                  $("#modal_edit").modal('show');
               }
   
</script>