      <!-- // Grid market-->
      <div class="market-updates">
         <div class="col-md-4 market-update-gd">
            <div class="market-update-block clr-block-2">
               <div class="col-md-4 market-update-right">
                  <i class="fa fa-shopping-cart"> </i>
               </div>
                <div class="col-md-8 market-update-left">
                <h4>Jumlah Item</h4>
               <h3><?=$item;?></h3>
              </div>
              <div class="clearfix"> </div>
            </div>
         </div>
         <div class="col-md-4 market-update-gd">
            <div class="market-update-block clr-block-1">
               <div class="col-md-4 market-update-right">
                  <i class="fa fa-users" ></i>
               </div>
               <div class="col-md-8 market-update-left">
               <h4>Jumlah User</h4>
                  <h3><?=$user;?></h3>
               </div>
              <div class="clearfix"> </div>
            </div>
         </div>
         <div class="col-md-4 market-update-gd">
            <div class="market-update-block clr-block-3">
               <div class="col-md-4 market-update-right">
                  <i class="fa fa-usd" aria-hidden="true"></i>
               </div>
               <div class="col-md-8 market-update-left">
                  <h4>Jumlah Order</h4>
                  <h3><?=$trans;?></h3>
               </div>
              <div class="clearfix"> </div>
            </div>
         </div>
         <div class="clearfix"> </div>
      </div>   
      <!-- //market-->
      
      <!-- //transaksi terakhir -->
      <div class="agileits-w3layouts-stats">
         <div class="col-md-12 stats-info stats-last widget-shadow">
            <div class="stats-last-agile">
               <table class="table stats-table ">
                  <thead>
                     <tr>
                        <th>No</th>
                        <th>ID Order</th>
                        <th>Nama</th>
                        <th>Kota</th>
                        <th>Tanggal Pesan</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                     $i = 1;
                     foreach($last->result() as $key) :
                     ?>
                        <tr>
                           <td><?=$i++;?></td>
                           <td><?=$key->id_order;?></td>
                           <td><?=$key->nama_pemesan;?></td>
                           <td><?=$key->kota;?></td>
                           <td><?=date('d M Y', strtotime($key->tgl_pesan));?></td>
                        </tr>
                     <?php endforeach; ?>
                  </tbody>
               </table>
            </div>
         </div>
         <div class="clearfix"> </div>
      </div>