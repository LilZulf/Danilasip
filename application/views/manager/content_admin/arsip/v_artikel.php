        <div class="box">
            <?php //echo $this->db->last_query(); ?>
            <div class="box-header with-border">
              <h3 class="box-title">
                <form method="post" action="<?php 
                if ($this->session->userdata('level') == 0){
                    echo (base_url('manager/Manage_Artikel/create'));
                }else if ($this->session->userdata('level') == 1 || $this->session->userdata('level') == 2) {
                    echo (base_url('manager/Manage_Artikel/createLimit'));
                }
                ?>">
                        <button class="btn btn-block btn-success" style="width: 170px">Add New Artikel...</button>
                </form>  
              </h3>
              <div class="box-tools" style="margin-top : 7px;">
                <form method="post" action="<?php echo (base_url('manager/Manage_Artikel/search')) ?>">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="keyword" class="form-control pull-right" value="<?php echo $pesan ?>" placeholder="Search">
                        <div class="input-group-btn">
                            <button type="submit" name="search_submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>            
            <!-- /.box-header -->
            <div class="box-body">
                <div style="width: 100%; overflow-x: auto;">
                  <table class="table table-bordered">
                    <tr>
                        <th>No</th>
                        <th>Nama Artikel</th>
                        <th>Slug</th>
                        <th>Created</th>
                        <th>Status</th>
                        <th>featured</th>
                        <th>Recomended</th>
                        <th>Action</th>
                    </tr>

                    <!--Fetch data dari database-->
                    <?php
                            $no = ($page + 1);
                            
                            foreach ($datafix as $artikel) :
                    ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $artikel['nama_artikel'];?></td>
                        <td><?php echo $artikel['slug']; ?></td>
                        <td><time class="timeago" datetime="<?php echo $artikel['created_at']; ?>" title="<?php echo date("j F Y H:i:s", strtotime($artikel['created_at'])); ?>"></time></td>
                        <td>
                        <?php 
                            if($artikel['is_featured'] == 0){ echo '<span class="label label-danger">Not featured</span>';}
                            else if($artikel['is_featured'] == 1){ echo '<span class="label label-success">Featured</span>';}
                        ?>
                        </td>
                        <?php
                            if($artikel['is_featured'] == 0){ ?>
                                <td>
                                    <form method="post" action="<?php echo (base_url('manager/Manage_Artikel/featured/'.$artikel['id_artikel'])) ?>">
                                        <input type="checkbox" onChange="this.form.submit()">
                                    </form>
                                </td>
                            <?php } else if($artikel['is_featured'] == 1){ ?>
                                <td>
                                    <input type="checkbox" onChange="this.form.submit()" checked disabled>
                                </td>
                            <?php }
                        ?>
                        <?php
                            if($this->session->userdata('level') == 0){
                                if($artikel['is_recomended'] == 0){ ?>
                                    <td>
                                        <form method="post" action="<?php echo (base_url('manager/Manage_Artikel/recomended/'.$artikel['id_artikel'])) ?>">
                                            <input type="checkbox" onChange="this.form.submit()">
                                        </form>
                                    </td>
                                <?php } else if($artikel['is_recomended'] == 1){ ?>
                                    <td>
                                        <form method="post" action="<?php echo (base_url('manager/Manage_Artikel/not_recomended/'.$artikel['id_artikel'])) ?>">
                                            <input type="checkbox" onChange="this.form.submit()" checked>
                                        </form>
                                    </td>
                                <?php }
                            } 
                        ?>
                        <?php if($this->session->userdata('level') == 0){ ?>
                        <td>
                            <form method="post" action="<?php echo base_url('manager/Manage_Artikel/edit/'.$artikel['id_artikel']); ?>">
                                <button class="btn btn-block btn-app" style="width: 20px;">
                                        <i class="fa fa-info-circle"></i>
                                </button>
                            </form>
                        </td>
                        <?php }?>
                        <?php if($this->session->userdata('level') == 1){ ?>
                        <td>
                            <form method="post" action="<?php echo base_url('manager/Manage_Artikel/editLimit/'.$artikel['id_artikel']); ?>">
                            <button class="btn btn-block btn-success" style="width: 50px">
                                <i class="fa fa-fw fa-pencil-square-o"></i>
                                </button>
                            </form>
                            <form method="post" action="<?php echo base_url('manager/Manage_Artikel/detail/'.$artikel['id_artikel']); ?>">
                            <button class="btn btn-block btn-warning" style="width: 50px">
                                <i class="fa fa-fw fa-newspaper-o"></i>
                                </button>
                            </form>
                            
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
                                            <a href="" class="btn btn-danger" id="modalDeletelimit">Delete</a>
                                        </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <a href="#myModal" data-id = '<?php echo $artikel['id_artikel'] ?>' class="btn btn-block btn-danger delete-button" style="width: 50px" data-base_url = "<?php echo base_url('manager/Manage_Artikel'); ?>" data-toggle = "modal"><i class="fa fa-fw fa-trash"></i></a>

                            <div class="modal fade" id="delete_confirmation_modal" role="dialog" style="display: none;">
                                <div class="modal-dialog" style="margin-top: 260.5px;">
                                            <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">×</button>
                                            <h4 class="modal-title">Do you really want to delete this Category?</h4>
                                        </div>
                                        <form role="form" method="post" action="category_delete" id="delete_data">
                                            <input type="hidden" id="delete_item_id" name="id" value="12">
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-danger">Yes</button>
                                                <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </td>
                        <?php }?>
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
