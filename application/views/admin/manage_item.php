<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Daftar Item
    </div>
    <div class="row w3-res-tb">
   <div class="text-right">
   <a href="<?php echo base_url('item/add_item'); ?>" class="btn btn-primary"> Tambah Item
    </a>
</div>
<br>
    <div class="table-responsive">
      <table class="table table-striped" id="datatable">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Status</th>
            <th>Stok</th>
            <th>Opsi</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
    </div>   
  </div>
</div>