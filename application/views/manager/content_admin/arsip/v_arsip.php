<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Arsip Saya</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Arsip Saya</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
          <!-- /.card -->

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Arsip Saya</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Tanggal</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                    $nomer = 1;
                    
                    foreach ($datafix as $arsip) :
                    $path_parts = pathinfo($arsip['NAMA_ARSIP']);
                ?>
                  <tr>
                    <td><?php echo $nomer++; ?></td>
                    <td><?php echo $arsip['NAMA_ARSIP'];?>
                    </td>
                    <td><?php echo $arsip['TANGGAL_MASUK'];?></td>
                    <td>
                        <a href="#"onclick="deleteConfirm('<?= base_url('manager/ArsipSaya/delete/'.$arsip['ID'])?>')"data-id = '<?php echo $arsip["ID"] ?>'data-base_url = "<?php echo base_url('manager/ArsipSaya'); ?>" data-toggle = "modal"><button  type="button" class="btn btn-block bg-gradient-primary mb-2">Delete</button></a>
                        <?php if($path_parts['extension'] == "pdf" ): ?>
                            <a href="<?php echo base_url().'manager/ArsipSaya/read/'.$arsip["ID"]; ?>" target="_blank"><button type="button" class="btn btn-block bg-gradient-primary mb-2">View</button></a>
                        <?php elseif($path_parts['extension'] == "png" || $path_parts['extension'] == "jpg") : ?>
                            <a href="<?php echo base_url().$arsip['FILE']; ?>" target="_blank"><button type="button" class="btn btn-block bg-gradient-primary mb-2">View</button></a>
                        <?php else : ?>
                            <a href="<?php echo base_url().'manager/ArsipSaya/read/'.$arsip["ID"]; ?>" target="_blank"><button type="button" class="btn btn-block bg-gradient-primary mb-2" disabled>View</button></a>
                        <?php endif; ?>
                        <a href="<?php echo base_url().'manager/ArsipSaya/download/'.$arsip["ID"]; ?>" target="_blank"><button type="button" data-toggle="tooltip" data-placement="bottom" title="<?= $arsip['DESKRIPSI']?>" class="btn btn-block bg-gradient-primary">Download</button></a>
                    </td>
                  </tr>
                    <?php 
                      endforeach;
                    ?>
                </tbody>
                
        <tfoot>
        <tr>
        <th>
          <form method="post" action="<?php 
              if ($this->session->userdata('LEVEL') == 0){
                  echo (base_url('manager/ArsipSaya/create'));
              }else if ($this->session->userdata('LEVEL') == 1 || $this->session->userdata('LEVEL') == 2) {
                  echo (base_url('manager/ArsipSaya/create'));
              }
              ?>">
              <button class="btn btn-block bg-gradient-primary">Tambahkan</button>
          </form>  
        </th>
        <th></th>
        <th></th>
        <th></th>
        
        </tr>
                
                </tfoot>
                <!-- <div class="box-footer clearfix">
                    <ul class="pagination pagination-sm no-margin pull-right">
                      <?php echo $pagination; ?>
                    </ul>
                  </div>

                  <?php if(isset($pesan_notfounddata)){ echo $pesan_notfounddata;} ?>
                </div> -->
              </table>
              <div class="modal small fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                          <h3 id="myModalLabel">Delete Confirmation</h3>
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body">
                            <p class="error-text"><i class="fa fa-warning modal-icon"></i>Are you sure you want to delete this Data?
                        </div>
                        <div class="modal-footer">
                        <form method="post" action="">
                            <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Cancel</button> 
                            <a href="<?php echo(base_url('manager/ArsipSaya/delete/'.$arsip["ID"]));?>" class="btn btn-danger" id="modalDelete">Delete</a>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
          </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  
  <!-- /.content-wrapper -->
  <script>
function test(id){
  alert(id);
}
</script>