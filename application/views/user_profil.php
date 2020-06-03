<div class="row">
   <div class="col-md-12">
                  <form method="post" class="colorlib-form" action="">
                     <h1>Edit Profil</h1>
                     <div class="row">
                        <?= validation_errors('<p style="color:red">', '</p>'); ?>
                        <div class="form-group">
                           <div class="col-md-6">
                              <label>Nama Depan</label>
                              <input type="text" class="form-control" name="nama1" value="<?= $nama1; ?>">
                           </div>
                           <div class="col-md-6">
                              <label>Nama Belakang</label>
                              <input type="text" class="form-control" placeholder="Nama Belakang" name="nama2" value="<?= $nama2; ?>">
                           </div>
                        </div>

                        <div class="form-group">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label>Userame</label>
                                 <input type="text" class="form-control" name="user" value="<?= $user; ?>">
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label>E-mail</label>
                                 <input type="email" class="form-control" name="email" value="<?= $email; ?>">
                              </div>
                           </div>
                        </div>

                        <div class="col-md-12">
                           <div class="form-group">
                              <label>No. Handphone</label>
                              <input type="number" class="form-control" name="telp" value="<?= $telp; ?>">
                           </div>
                        </div>

                        <div class="form-group">
                           <div class="col-md-12">
                              <label>Alamat</label>
                              <textarea id="alamat" name="alamat" class="form-control"><?= $alamat; ?></textarea>
                           </div>
                        </div>

                         <div class="col-md-12">
                           <div class="form-group">
                              <label>Masukkan password anda</label>
                              <input type="password" id="password" placeholder="Password" class="form-control" name="pass">
                           </div>
                        </div>

                        <div class="panel-footer right">
                           <button type="submit" name="submit" value="Submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                  </form>
               </div>
</div>