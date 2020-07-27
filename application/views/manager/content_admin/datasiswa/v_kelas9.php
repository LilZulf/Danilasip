<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Kelas IX</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Kelas IX</li>
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
              <h3 class="card-title">Kelas IX</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead><tr>
                  <th>No</th>
				          <th>No.induk</th>
                  <th>Nama Siswa</th>
                  <th>Kelas</th>
                  <th>Action</th>
                 </tr>
                </thead>
                <tbody>
                <?php
                    $no = ($page + 1);
                    
                    foreach ($datafix as $datasiswa) :
                ?>
                <tr>
                 <td><?php echo $no++; ?></td>
                  <td><?php echo $datasiswa['NIS'];?></td>
                  <td><a href="<?php echo base_url('manager/DataSiswa/detail/'.$datasiswa["NIS"]."/".$datasiswa['NAMA_KELAS']."/".$datasiswa['KODE_KELAS']."/5"); ?>"><?php echo $datasiswa['NAMA_SISWA'];?></a></td>
                  <td><?php echo $datasiswa['NAMA_KELAS'];?></td>
                  <td>
                  <a href="<?= base_url().'manager/Datasiswa/updatemurid/'.$datasiswa['NIS']?>" ><button type="button" class="btn btn-block bg-gradient-primary mb-3">Update</button></a>
                    <a href="#"  onclick="deleteConfirm('<?= base_url('manager/DataSiswa/delete/'.$datasiswa['NIS'])?>')" data-id = '<?php echo $datasiswa["NIS"] ?>'data-base_url = "<?php echo base_url('manager/DataSiswa'); ?>" data-toggle = "modal"><button  type="button" class="btn btn-block bg-gradient-primary">Delete</button></a>
                  </td>
                </tr>
                <?php 
                    endforeach;
                ?>
              </tbody>
                </tfoot>
                <tr>
        <th>
            <form method="post" action="<?php 
              if ($this->session->userdata('LEVEL') == 0){
                  echo (base_url('manager/DataSiswa/addmurid'));
              }else if ($this->session->userdata('LEVEL') == 1 || $this->session->userdata('LEVEL') == 2) {
                  echo (base_url('manager/DataSiswa/addmurid'));
              }
              ?>">
              <button class="btn btn-block bg-gradient-primary">Tambahkan</button>
          </form>
         </th>
         <th></th>
        <th></th>
        <th></th>
        
        <th></th>
              </table>
              <div class="modal small fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                          <h3 id="myModalLabel">Delete Confirmation</h3>
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body">
                            <p class="error-text"><i class="fa fa-warning modal-icon"></i>Are you sure you want to delete this Student?
                        </div>
                        <div class="modal-footer">
                        <form method="post" action="">
                            <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Cancel</button> 
                            <a href="<?php echo(base_url('manager/DataSiswa/delete/'.$datasiswa["NIS"]));?>" class="btn btn-danger" id="modalDelete">Delete</a>
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