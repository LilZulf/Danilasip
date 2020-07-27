        <div class="box">
            <?php //echo $this->db->last_query(); ?>
            <div class="box-header with-border">
              <h3 class="box-title">
                
                <div class="modal small fade" id="myModal-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h3 id="myModalLabel">Adding New Kategori</h3>
                            </div>
                            <form method="post" action="<?php echo (base_url('manager/Manage_Kategori/create')) ?>" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <label>Nama Kategori</label><br>
                                    <input type="text" class="form-control" name="kategori" id="judul" onkeyup="createslug()">
                                </div>
                                <div class="modal-body">
                                    <label>Slug</label><br>
                                    <input type="text" name="slug" class="form-control" id="slug" readonly>
                                </div>
                                <div class="modal-body">
                                    <label>Gambar</label><br>  
                                    <input type="file" accept="image/jpeg" name="gambar_kategori" class="dropify" data-height="200" readonly>
                                </div>
                                <div class="modal-footer">
                                <button class="btn btn-block btn-success" style="width: 170px">Submit</button>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                <a href="#myModal-delete" class="btn btn-block btn-success" style="width: 170px" data-base_url = "<?php echo base_url('manager/Manage_Kategori'); ?>" data-toggle = "modal">Add New Kategori...</a>  
              </h3>

              <div class="box-tools" style="margin-top : 7px;">
                <?php echo form_open('manager/Manage_Kategori/search') ?>
                <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="keyword" class="form-control pull-right" value="<?php echo $pesan ?>" placeholder="Search">
                    <div class="input-group-btn">
                        <button type="submit" name="search_submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                    </div>
                </div>
                <?php 
                    echo form_close() 
                  ?>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div style="width: 100%; overflow-x: auto;">
                  <table class="table table-hover table-striped">
                    <tr>
                        <th>No</th>
                        <th>nama kategori</th>
                        <th>slug name</th>
                        <th>created</th>
                        <th>action</th>
                    </tr>

                    <!--Fetch data dari database-->
                    <?php
                            $no = ((int)$page + 1);
                            foreach ($data as $kategori) :
                    ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $kategori->kategori;?></td>
                        <td><?php echo $kategori->slug;?></td>
                        <td><time class="timeago" datetime="<?php echo $kategori->created_at; ?>" title="<?php echo date("j F Y H:i:s", strtotime($kategori->created_at)); ?>"></time></td>
                        <td>
                        <form method="post" action="<?php echo base_url('manager/Manage_Kategori/detail/'.$kategori->id_kategori); ?>" enctype="multipart/form-data">
                            <button class="btn btn-block btn-app" style="width: 20px;">
                                    <i class="fa fa-info-circle"></i>
                            </button>
                        </form>
                        </td>
                    </tr>
                    <?php 
                        endforeach;
                      ?>
                  </table>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <ul class="pagination pagination-sm no-margin pull-right">
                <?php echo $pagination; ?>
              </ul>
            </div>
            <?php if(isset($pesan_notfounddata)){ echo $pesan_notfounddata;} ?>
          </div>
