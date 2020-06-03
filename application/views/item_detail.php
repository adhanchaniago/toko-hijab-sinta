            <h3><i class="fa fa-search-plus"></i> Detail Item</h3>
            <br />
            <?php
            $key = $data->row();
            ?>
            <div class="row row-pb-lg">
               <div class="col-md-10 col-md-offset-1">
                  <div class="product-detail-wrap">
                     <div class="row">
                        <div class="col-md-5">
                           <div class="product-entry">
                              <div id="myimg" class="product-img" style="background-image: url(<?= base_url('assets/upload/'.$key->gambar); ?>);">
                              </div>
                              <div class="thumb-nail">
                                 <a class="thumb-img" style="background-image: url(<?= base_url('assets/upload/'.$key->gambar); ?>);" onclick="document.getElementById('myimg').style='background-image: url(<?= base_url('assets/upload/'.$key->gambar); ?>);'">
                                 </a>
                                 <?php foreach ($img->result() as $img): ?>
                                    <a class="thumb-img" style="background-image: url(<?= base_url('assets/upload/'.$img->img); ?>);" onclick="document.getElementById('myimg').style='background-image: url(<?= base_url('assets/upload/'.$img->img); ?>);'">
                                       
                                    </a>
                                 <?php endforeach; ?>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-7">
                           <div class="desc">
                              <h3><?= ucfirst($key->nama_item); ?></h3>
                              <span>
                                 <i class="fa fa-tags"></i>
                                 <?php
                                 $val = '';
                                 foreach ($kat->result() as $value) {
                                    $val .= ', <a href="'.site_url('home/kategori/'.$value->url).'">'.$value->kategori.'</a>';
                                 }

                                 echo trim($val, ', ');
                                 ?>
                              </span>
                              <br />
                              <p class="price">
                                 <span><?= 'IDR. '.number_format($key->harga, 0, ',', '.').',-'; ?></span>
                              </p>
                              <p><?= ucfirst(nl2br($key->deskripsi)); ?></p>
                              <span class="sub">Berat</span>
                              <p><?= number_format($key->berat, 0, ',', '.').' gr'; ?></p>

                              <span>Favorit</span>
                              <p><a href="<?= site_url('home/favorite/'.$key->link); ?>" class="btn btn-primary"><i class="icon-heart"></i></a></p>
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
                              <div class="row row-pb-sm">
                              <form action="<?= site_url('cart/add/'.$key->link); ?>" method="post" class="detail-item">
                                 <div class="col-md-4">
                                    <div class="input-group">
                                       <span class="input-group-btn">
                                          <button type="button" onClick="kurangi_quantity()" class="quantity-left-minus btn"  data-type="minus" data-field="">
                                          <i class="icon-minus2"></i>
                                          </button>
                                       </span>
                                       <input type="number" id="qty" name="qty" class="form-control input-number" value="1" min="1" max="<?php echo $stok; ?>">
                                       <span class="input-group-btn">
                                          <button type="button" onClick="tambah_quantity()" class="quantity-right-plus btn" data-type="plus" data-field="">
                                            <i class="icon-plus2"></i>
                                        </button>
                                       </span>
                                    </div>
                                 </div>
                              </form>
                              </div>
                              <input type="hidden" name="submit" value="Submit" />
                              <p><a class="btn btn-primary btn-addtocart" <?php if($key->stok < 1) { echo 'disabled'; } ?> onClick="doSubmit();"><i class="icon-shopping-cart"></i> Beli Sekarang</a></p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>

<script>

   function kurangi_quantity() {
      if($('#qty').val() != 0) {
         $('#qty').val(parseInt($('#qty').val())-1);
      }
   }


   function tambah_quantity() {
      $('#qty').val(parseInt($('#qty').val())+1); 
   }

   function doSubmit() {
      location="<?= site_url('cart/add/'.$key->link); ?>?qty="+$('#qty').val()+"&submit=Submit";
   }

</script>