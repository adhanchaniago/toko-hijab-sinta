               <div class="row">
                  <div class="col-md-12">
                     <h2>Ubah Password</h2>
                     <div class="row">
                        <?= validation_errors('<p style="color:red">', '</p>'); ?>
                        <form action="" method="post">
                           <div class="alert alert-warning">
                              <p>Anda akan diminta login ulang ketika password berhasil diubah</p>
                           </div>
                     
                        <div class="col-md-12">
                           <div class="form-group">
                              <label for="password">Password Baru</label>
                              <input id="password" type="password" class="form-control" name="pass1"" placeholder="Password Baru">
                           </div>
                        </div>

                         <div class="col-md-12">
                           <div class="form-group">
                              <label for="companyname">Ketik Ulang Password Baru</label>
                              <input id="password" type="password" class="form-control" name="pass2"" placeholder="Password Baru">
                           </div>
                        </div>

                        <div class="col-md-12">
                           <div class="form-group">
                              <label for="companyname">Password Lama</label>
                              <input id="password" type="password" class="form-control" name="pass3"" placeholder="Password Lama">
                           </div>
                        </div>

                        <div class="panel-footer right">
                           <button type="submit" name="submit" value="Submit" class="btn btn-primary">Submit <i class="fa fa-paper-plane"></i></button>
                        </div>
                    </div>
                  </form>
               </div>
            </div>
</div>