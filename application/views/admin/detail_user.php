<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
      <!-- //tasks -->
      <div class="agileits-w3layouts-stats">

         <div class="col-md-12 stats-info stats-last widget-shadow">
            <div class="panel-heading">
              Detail User
            </div>
            <?php
            $user = $data->row();
            ?>
            <div class="stats-last-agile">
               <table class="table stats-table ">
               <tr>
                  <td width="150px;">Nama Lengkap</td>
                  <td>: <?= $user->nama_user; ?></td>
               </tr>
               <tr>
                  <td width="150px;">Username</td>
                  <td>: <?= $user->username; ?></td>
               </tr>
               <tr>
                  <td width="150px;">Alamat</td>
                  <td>: <?= $user->alamat; ?></td>
               </tr>
               <tr>
                  <td width="150px;">E-mail</td>
                  <td>: <?= $user->email; ?></td>
               </tr>
               <tr>
                  <td width="150px;">No. Handphone</td>
                  <td>: <?= $user->telp; ?></td>
               </tr>
               </table>
               <br>
               <a href="#" class="btn btn-default" onclick="window.history.go(-1)">Kembali</a>
            </div>
         </div>
         <div class="clearfix"> </div>
      </div>