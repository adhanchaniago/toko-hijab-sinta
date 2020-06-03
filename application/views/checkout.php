         
         <form method="post" class="colorlib-form">   
            <div class="row">
               <div class="col-md-7">
                   <?= validation_errors('<p style="color:red">', '</p>'); ?>
                     <h1>Checkout</h1>
                     <div class="row">

                        <div class="col-md-12">
                           <div class="form-group">
                              <label>Provinsi</label>
                              <div class="form-field">
                                 <i class="icon icon-arrow-down3"></i>
                                 <select id="prov" name="prov" class="form-control">
                                    <option value="#" disabled selected>Pilih Provinsi</option>
                                    <?php $this->load->view('prov'); ?>
                                 </select>
                              </div>
                           </div>
                        </div>

                        <div class="col-md-12">
                           <div class="form-group">
                              <label for="country">Kota / Kabupaten</label>
                              <div class="form-field">
                                 <i class="icon icon-arrow-down3"></i>
                                 <select name="kota" id="kota" class="form-control">
                                    <option value="#" disabled selected>Pilih Kota / Kabupaten</option>     
                                 </select>
                              </div>
                           </div>
                        </div>

                        
                        <div class="col-md-12">
                           <div class="form-group">
                              <label>Alamat</label>
                              <textarea id="alamat" class="form-control" name="alamat" placeholder="Alamat"></textarea>
                              <p class="help-block"> *Harap Alamat Di isi dengan Benar</p>
                           </div>
                        </div>

                        <div class="form-group">
                           <div class="col-md-6">
                              <label>Kode pos</label>
                              <input type="number" id="kd_pos" class="form-control" placeholder="kode pos" name="kd_pos" value="" maxlength="5">
                           </div>

                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="country">Kurir</label>
                                 <div class="form-field">
                                    <i class="icon icon-arrow-down3"></i>
                                    <select name="kurir" id="kurir" class="form-control">
                                       <option disabled selected>Kurir</option>
                                       <option value="pos">POS</option>
                                       <option value="jne">JNE</option>     
                                    </select>
                                 </div>
                              </div>
                           </div>
                        </div>

                        <div class="col-md-12">
                           <div class="form-group">
                              <label>Layanan</label>
                              <div class="form-field">
                                 <i class="icon icon-arrow-down3"></i>
                                 <select name="layanan" id="layanan" class="form-control">
                                    <option value="#" disabled selected>Pilih layanan</option>
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-12">
                           <div class="form-group ">
                              <label for="companyname">Ongkos Kirim</label>
                              <input type="text" name="ongkir" value="0" id="ongkir" class="form-control" placeholder="Ongkir" readonly="">
                           </div>
                        </div>

                        <div class="col-md-12">
                           <div class="form-group">
                              <label for="companyname">Total</label>
                              <input type="number" name="total" value="<?= $this->cart->total(); ?>" id="total" class="form-control" placeholder="Total" readonly>
                           </div>
                        </div>
                        
                    </div>
               </div>
               <div class="col-md-5">
                  <div class="cart-detail">
                     <h2>Data Pembelian</h2>
                     <ul>
                        <li>
                           <?php $amount = $this->cart->total(); ?>
                           <span>Subtotal</span> <span>Rp. <?= number_format(($amount), 0, ',', '.'); ?>,-</span>
                           <ul>
                              <?php $i = 1; foreach($this->cart->contents() as $key) : ?>
                              <li><span><a href="<?= site_url('home/detail/'.$key['link']); ?>"><?= $key['name']; ?></a></span> <span>Rp. <?= number_format(($key['qty'] * $key['price']), 0, ',', '.'); ?>,-</span></li>
                              <?php endforeach; ?>
                           </ul>
                        </li>

                        <li><span>Ongkos Kirim</span> <span id="ongkir2">Rp. 0,-</span></li>
                        
                        <li><span>Total</span> <span id="total2">Rp. 0,-</span></li>
                     </ul>
                  </div>
                  <div class="row">
                     <div class="col-md-12">
                        <button type="button" onclick="window.history.go(-1)" class="btn btn-warning">Kembali</button>
                        <button type="submit" name="submit" value="Submit" class="btn btn-primary">Submit</button>
                     </div>
                  </div>
               </div>
            </div>
         </form>


   <!-- jQuery -->
   <script src="<?php echo base_url(); ?>assets/2/js/jquery.min.js"></script>

<script type="text/javascript">

   $(document).ready(function() {
      setInterval(function() {
         $('#ongkir2').html(convertToRupiah($('#ongkir').val()));
         $('#total2').html(convertToRupiah($('#total').val()));
      }, 1000)
   });


function convertToRupiah(angka) {
   var rupiah = '';     
   var angkarev = angka.toString().split('').reverse().join('');
   for(var i = 0; i < angkarev.length; i++) if(i%3 == 0) rupiah += angkarev.substr(i,3)+'.';
   return 'Rp. ' + angka + ',-';
   //return 'Rp. '+rupiah.split('',rupiah.length-1).reverse().join('') + ',-';
}

</script>