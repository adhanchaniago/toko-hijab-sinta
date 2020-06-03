            <div class="row">
               <div class="col-md-12">
                  <form method="post" class="colorlib-form" action="">
                     <?= validation_errors('<p style="color:red">', '</p>'); ?>
                     <h2>Register</h2>
                        <p>*Lengkapi semua isian kosong di bawah ini</p><br>
                     <div class="row">
                        <div class="form-group">
                           <div class="col-md-6">
                              <label>Nama Depan</label>
                              <input type="text" class="form-control" placeholder="Nama Depan" name="nama1" value="<?= $nama1; ?>">
                           </div>
                           <div class="col-md-6">
                              <label>Nama Belakang</label>
                              <input type="text" class="form-control" placeholder="Nama Belakang" name="nama2" value="<?= $nama2; ?>">
                           </div>
                        </div>

                        <div class="form-group">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label>Username</label>
                                 <input type="text" class="form-control" placeholder="Username - Min 5 characters" name="user" value="<?= $user; ?>">
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label>Email</label>
                                 <input type="email" class="form-control" placeholder="Email" name="email" value="<?= $email; ?>">
                              </div>
                           </div>
                        </div>

                        <div class="form-group">
                           <div class="col-md-6">
                              <label>Password</label>
                              <input type="password" class="form-control" placeholder="Password" name="pass1">
                           </div>
                           <div class="col-md-6">
                              <label>Konfirmasi password</label>
                              <input type="password" class="form-control" placeholder="Konfirmasi password" name="pass2">
                           </div>
                        </div>

                        <div class="col-md-12">
                           <div class="form-group">
                              <label>No. Handphone</label>
                              <input type="number" id="telp" class="form-control" placeholder="No. Handphone" name="telp" value="<?= $telp; ?>" maxlength="12">
                           </div>
                        </div>

                        <div class="form-group">
                           <div class="col-md-12">
                              <label>Alamat</label>
                              <textarea id="alamat" name="alamat" class="form-control"><?= $alamat; ?></textarea>
                           </div>
                        </div>

                        <div class="row right">
                           
                           <button type="submit" name="submit" value="Submit" class="btn btn-primary">Registrasi Sekarang</button>
                           <p><br>Jika sudah memiliki akun?<a href="<?= site_url('home/login'); ?>" style="color: black !important;"> <u>Sign In</u></a> </p>
                        </div>
                    </div>
                  </form>
               </div>
            </div>
            