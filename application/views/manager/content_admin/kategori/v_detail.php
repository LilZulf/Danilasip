<div class="box">
    <div class="box-body" style="width: 100%; overflow: auto;">
		<form action="<?php echo base_url('manager/Manage_Kategori/edit/'.$kategori->id_kategori); ?>" method="post" enctype="multipart/form-data">
              <div class="box-content">
                  <div class="box-header">
                    <h4 class="box-title">Kategori</h4>
                  </div>
                  
                  <div class="box-body">
                    <label>Nama Kategori</label><br>
                    <input type="text" class="form-control" name="kategori" value="<?php echo ($kategori->kategori) ?>" id="judul" onkeyup="createslug()">
                  </div>
                  <div class="box-body">
                      <label>Slug</label><br>
                      <input type="text" name="slug" class="form-control" id="slug" value="<?php echo ($kategori->slug) ?>" readonly>
                  </div>
									<div class="box-body">
                    <label>Created at</label><br>
                    <input type="text" class="form-control" value="<?php echo ($kategori->created_at) ?>" disabled>
                  </div>
									<div class="box-body">
                    <label>Updated at</label><br>
                    <input type="text" name="updated_at" class="form-control" value="<?php echo ($kategori->updated_at) ?>" disabled>
                  </div>
                  <div class="box-body">
                    <label>Gambar Lama</label><br>
                    <img src="<?php echo base_url($kategori->gambar);?>" width="120px"><br>
										<br><label>Gambar Baru</label><br>
                    <div class="pull-left">
                      <input type="file" accept="image/jpeg" name="gambar_kategori" class="dropify" data-height="200">
                    </div>
                  </div>
                    
                  <div class="box-footer">
                    <button class="btn btn-primary" name="submit">Edit Kategori</button>
										<a href="#myModal" data-id-kategori = '<?php echo $kategori->id_kategori ?>' class="btn btn-danger delete-button" data-base_url = "<?php echo base_url('manager/Manage_Kategori'); ?>" data-toggle = "modal">Delete</a>
                  </div>
                </div>
              <!-- /.modal-content -->
              </form>
							<div class="modal small fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								<div class="modal-dialog">
										<div class="modal-content">
												<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
															<h3 id="myModalLabel">Delete Confirmation</h3>

												</div>
												<div class="modal-body">
														<p class="error-text"><i class="fa fa-warning modal-icon"></i>Are you sure you want to delete category <?php echo $kategori->kategori;?> ?
												</div>
												<div class="modal-footer">
												<form method="post" action="">
														<button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Cancel</button> 
														<a href="" class="btn btn-danger" id="modalDelete_kategori">Delete</a>
												</form>
												</div>
										</div>
								</div>
						</div>
        </div>
    </div>