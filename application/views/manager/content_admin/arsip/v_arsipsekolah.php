<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Arsip Sekolah</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('Dashboard') ?>">Home</a></li>
              <li class="breadcrumb-item active">Arsip Sekolah</li>
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
              <h3 class="card-title">Arsip Sekolah</h3>
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
                  $no = 1;
                  foreach ($arsipsekolah as $data) :
                  $path_parts = pathinfo($data['NAMA_ARSIP']);
                ?>   
                <tr>
                  <td><?php echo $no++ ?></td>
                  <td><?php echo $data['NAMA_ARSIP']?></td>
                  <td><?php echo $data['TANGGAL_MASUK']?></td>
				          <td> 
                        <?php if($path_parts['extension'] == "pdf" ): ?>
                            <a href="<?php echo base_url().'manager/ArsipSaya/read/'.$data["ID"]; ?>" target="_blank"><button type="button" class="btn btn-block bg-gradient-primary mb-2">View</button></a>
                        <?php elseif($path_parts['extension'] == "png" || $path_parts['extension'] == "jpg") : ?>
                            <a href="<?php echo base_url().$data['FILE']; ?>" target="_blank"><button type="button" class="btn btn-block bg-gradient-primary mb-2">View</button></a>
                        <?php else : ?>
                            <a href="<?php echo base_url().'manager/ArsipSaya/read/'.$data["ID"]; ?>" target="_blank"><button type="button" class="btn btn-block bg-gradient-primary mb-2" disabled>View</button></a>
                        <?php endif; ?>
                        <a href="<?php echo base_url().'manager/ArsipSaya/download/'.$data["ID"]; ?>"><button type="button" data-toggle="tooltip" data-placement="bottom" title="<?= $data['DESKRIPSI']?>" class="btn btn-block bg-gradient-primary">Download</button></a>
                  </td>
				        </tr>
                  <?php
                    endforeach;
                  ?>       
                </tbody>
                 
				
				
				<tfoot>
				<tr>
				<th>
          <?php if($level == 1):?>
            <a href="<?php echo base_url('manager/AddArsip') ?>"><button  type="button" class="btn btn-block bg-gradient-primary" disabled>Tambahkan</button></a>
          <?php else : ?>
            <a href="<?php echo base_url('manager/AddArsip') ?>"><button  type="button" class="btn btn-block bg-gradient-primary">Tambahkan</button></a>
          <?php endif; ?>
				</th>
				<th></th>
				<th></th>
				<th></th>
				
				</tr>
                </tfoot>
              </table>
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
  
  