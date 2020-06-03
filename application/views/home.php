
				<div class="row">
					<div class="col-md-10 col-md-push-2">
						<div class="row row-pb-lg">
							

         					<?php foreach($data->result() as $key) : ?>
         						<form action="<?= site_url('cart/add/'.$key->link); ?>" method="post">
							<div class="col-md-4 text-center">
								<div class="product-entry">
									<div class="product-img" style="background-image: url(<?= base_url('assets/upload/'.$key->gambar); ?>);">
										<div class="cart">
											<p>
												<span class="addtocart">
													<a href="<?= site_url('cart/add/'.$key->link); ?>?qty=1&submit=Submit"><i class="icon-shopping-cart"></i></a>
												</span> 
												<span><a href="<?= site_url('home/detail/'.$key->link); ?>"><i class="icon-eye"></i></a></span> 
												<span><a href="<?= site_url('home/favorite/'.$key->link); ?>"><i class="icon-heart3"></i></a></span>
											</p>
										</div>
									</div>
									<div class="desc">
										<h3><a href="<?= site_url('home/detail/'.$key->link); ?>"><?= $key->nama_item; ?></a></h3>
										<p class="price"><span>Rp. <?= number_format($key->harga, 0, ',', '.'); ?>,-</span></p>
									</div>
								</div>
							</div>
								</form>
							<?php endforeach; ?>
						</div>
						<div class="row">
							<div class="col-md-12">
								<?= $link; ?>
							</div>
						</div>
					</div>
					<div class="col-md-2 col-md-pull-10">
						<div class="sidebar">
							<div class="side">
								<h2>Price Range</h2>
								<form action="<?=site_url('home/price');?>" method="post" class="colorlib-form-2">
								<div class="row">
				                <div class="col-md-12">
				                  <div class="form-group">
				                    <label for="guests">Price from:</label>
				                    <div class="form-field">
				                      <i class="icon icon-arrow-down3"></i>
				                      <input type="text" class="form-control" name="min" min="0" value="0" onfocus="this.value = ''">
				                    </div>
				                  </div>
				                </div>
				                <div class="col-md-12">
				                  <div class="form-group">
				                    <label for="guests">Price to:</label>
				                    <div class="form-field">
				                      <i class="icon icon-arrow-down3"></i>
				                      <input type="text" class="form-control" name="max" min="0" value="0" onfocus="this.value = ''">
				                    </div>
				                  </div>
				                </div>
				                <div class="col-md-12">
                  					<button type="submit" name="submit" class="btn btn-info btn-block" width="100%" value="Filter">Filter</button>
				                </div>
				              </div>
				            </form>
							</div>
							
						</div>
					</div>
				</div>

			