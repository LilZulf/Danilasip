<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Daftar Guru</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Daftar Guru</li>
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
              <h3 class="card-title ">Daftar Guru</h3>
             </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead><tr>
                  <th>No</th>
				          <th>NIP</th>
                  <th>Nama</th>
				          <th>Jabatan</th>
                  <th>Action</th>
			           </tr>
                </thead>
              
                <tbody>
                <?php
                    $no =  1;
                    
                    foreach ($datafix as $dataguru) :
                ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $dataguru['NIP'];?></td>
                  <td><?php echo $dataguru['NAMA_GURU'];?></td>
                  <td><?php echo $dataguru['NAMA_MAPEL'];?></td>
                  <td>
                  <?php if($level == 1):?>
                    <a href="#myModal" data-id = '<?php echo $dataguru["NIP"] ?>'data-base_url = "<?php echo base_url('manager/DataGuru'); ?>" data-toggle = "modal"><button  type="button" class="btn btn-block bg-gradient-primary" disabled>Delete</button></a>
                  <?php elseif($dataguru['NIP']== $this->session->userdata('NIP')):?>
                    <a href="#myModal" data-id = '<?php echo $dataguru["NIP"] ?>'data-base_url = "<?php echo base_url('manager/DataGuru'); ?>" data-toggle = "modal"><button  type="button" class="btn btn-block bg-gradient-primary" disabled>Delete</button></a>
                  <?php elseif($dataguru['NAMA_MAPEL']== "Petugas"):?>
                    <a href="#myModal" data-id = '<?php echo $dataguru["NIP"] ?>'data-base_url = "<?php echo base_url('manager/DataGuru'); ?>" data-toggle = "modal"><button  type="button" class="btn btn-block bg-gradient-primary" disabled>Delete</button></a>
                  <?php else : ?>
                    <a href="#" onclick="deleteConfirm('<?= base_url('manager/DataGuru/delete/'.$dataguru['NIP'])?>')"  data-id = '<?php echo $dataguru["NAMA_GURU"] ?>'data-base_url = "<?php echo base_url('manager/DataGuru'); ?>" data-toggle = "modal"><button  type="button" class="btn btn-block bg-gradient-primary">Delete</button></a>
                  <?php endif; ?>
                    
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
                  echo (base_url('manager/DataGuru/addguru'));
              }else if ($this->session->userdata('LEVEL') == 1 || $this->session->userdata('LEVEL') == 2) {
                  echo (base_url('manager/DataGuru/addguru'));
              }
              ?>">
               <?php if($level == 1):?>
                <button class="btn btn-block bg-gradient-primary" disabled>Tambahkan</button>
                <?php else : ?>
                  <button class="btn btn-block bg-gradient-primary">Tambahkan</button>
                <?php endif; ?>
              
          </form> 
         </th>
         <th></th>
         <th></th>
         <th></th>
         <th></th>
				</tr>
                </tfoot>
              </table>
              <div class="modal small fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                              <h3 id="myModalLabel">Delete Confirmation</h3>

                        </div>
                        <div class="modal-body">
                            <p class="error-text"><i class="fa fa-warning modal-icon"></i>Are you sure you want to delete this Teacher?
                        </div>
                        <div class="modal-footer">
                        <form method="post" action="">
                            <div><?php echo($dataguru['NAMA_GURU'])?></div>
                            <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Cancel</button> 
                            <a href="<?php echo(base_url('manager/DataGuru/delete/'.$dataguru['NAMA_GURU']))?>" class="btn btn-danger" id="modalDelete">Delete</a>
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