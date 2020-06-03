            <?= validation_errors('<p style="color:red">', '</p>'); ?>
            <div class="row">
               <div class="col-md-7">
                  <form method="post" class="colorlib-form" action="" enctype="multipart/form-data">
                     <h2>Upload Bukti Pembayaran</h2>
                     <div class="row">
                        <div class="col-md-12">
                           <div class="form-group">
                              <label for="no_invoice">No. Invoice / ID Order</label>
                              <input type="text" id="no_invoice" class="form-control" placeholder="No. Invoice / ID Order" value="<?= $id_invoice; ?>" name="id_invoice" required>
                           </div>
                        </div>
                        <div class="col-md-12">
                           <div class="form-group">
                              <label for="fname">Bukti</label>
                              <input type="file" name="bukti" class="form-control">
                              <i class="help-text">* Gunakan Format JPG, JPEG, PNG</i>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-12">
                               <button type="submit" name="submit" value="Submit" class="btn btn-success">Submit <i class="fa fa-paper-plane"></i></button>
                              <button type="button" onclick="window.history.go(-1)" class="btn btn-primary">Kembali</button>
                           </div>
                        </div>
                    </div>
                  </form>