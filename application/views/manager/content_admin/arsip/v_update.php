<div class="box">
    <div class="box-body" style="width: 100%; overflow: auto;">
      <form action="<?php 
        if ($this->session->userdata('level') == 0){
          echo base_url('manager/Manage_Artikel/edit/'.$artikel->id_artikel);
        }else if ($this->session->userdata('level') == 1 || $this->session->userdata('level') == 2) {
          echo base_url('manager/Manage_Artikel/editLimit/'.$artikel->id_artikel); 
        }
      ?>" method="post" enctype="multipart/form-data">
        <div class="box-content">
            <div class="box-header">
              <h4 class="box-title">Update artikel</h4>
            </div>
            
            <div class="box-body">
              <label>Nama Artikel</label><br>
              <input type="text" name="namaArtikel" class="form-control" value="<?php echo ($artikel->nama_artikel) ?>" id="judul" onkeyup="createslug()">
            </div>
            <div class="box-body">
              <label>Kategori</label><br>
              <select class="form-control" name="kategori" id="kategori">
                  <option value="disable selected">- Pilih Kategori -</option>
                  <?php
                      foreach ($data as $row) {
                        ?>
                            <option value="<?php echo ($row->id_kategori) ?>" 
                            <?php if ($row->id_kategori == $artikel->id_kategori){echo 'selected';}?>>
                            <?php echo $row->kategori ?>
                            </option>";
                        <?php
                      }
                  ?>
              </select>
            </div>
            <div class="box-body">
              <div class="form-group">
              <!-- class="select2-selection__choice" -->
                <label>Tags</label>
                <select class="form-control select2" name="tags[]" id="tags" multiple="multiple" style="width: 100%;">
                    <?php foreach($tags as $nama){?>
                      <option value="<?php echo ($nama->id_tags)?>"  
                      <?php if($nama->terpilih == 1){ echo 'selected';}?>>
                      <?php echo $nama->tags?></option>
                    <?php }?>
                </select>
              </div>
            </div>
            <div class="box-body">
              <label>Penulis</label><br>
              <input type="text" name="penulis" class="form-control" value="<?php echo ($artikel->nama) ?>" disabled>
            </div>
            <div class="box-body">
              <label>Slug</label><br>
              <input type="text" name="penulis" class="form-control" value="<?php echo ($artikel->slug) ?>" id="slug" readonly>
            </div>
            <div class="box-body">
              <label>Deskripsi Artikel</label><br>
              <textarea name="deskripsi" class="form-control"><?php echo ($artikel->deskripsi) ?></textarea>
            </div>
            <div class="box-body" id="input">
              <label>Gambar</label><br>
              <input type="file" accept="image/jpeg" name="gambar" class="dropify" data-height="300">
              <input type="button" class="btn btn-danger cancel" value="Cancel"/>
            </div>
            <div class="box-body" id="view">
              <label>Gambar</label><br>
              <img src='<?php echo base_url($artikel->gambar) ?>' style="max-width: 50%;">
              <input type="button" class="btn btn-success change" value="Change"/>
            </div>
              
            <div class="box-footer">
              <button class="btn btn-primary" name="submit">Edit Artikel</button>
              <a href="#myModal" data-id = '<?php echo $artikel->id_artikel ?>' class="btn btn-danger delete-button" data-base_url = "<?php echo base_url('manager/Manage_Artikel'); ?>" data-toggle = "modal">
                Hapus Artikel
              </a>
                <a class="btn btn-default pull-left" style="background-color: inherit;" href="<?php echo (base_url('manager/Manage_Artikel/index')) ?>" >Back</a>
            </div>
            
            <div class="modal small fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                              <h3 id="myModalLabel">Delete Confirmation</h3>

                        </div>
                        <div class="modal-body">
                            <p class="error-text"><i class="fa fa-warning modal-icon"></i>Are you sure you want to delete this Artikel?
                        </div>
                        <div class="modal-footer">
                        <form method="post" action="">
                            <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Cancel</button> 
                            <a href="" class="btn btn-danger" id="modalDelete">Delete</a>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        <!-- /.modal-content -->
        </form>
  </div>
</div>