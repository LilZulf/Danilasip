<link rel="stylesheet" type="text/css" href="<?php echo(base_url('assets/loginregister/vendor/bootstrap/css/bootstrap.min.css'))?>">
<link rel="stylesheet" type="text/css" href="<?php echo(base_url('assets/Croppie/croppie.css'))?>" type="text/css" />
<!-- <link href="<?php echo(base_url('assets/register.css'))?>" rel="stylesheet" /> -->
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tambah Anggota</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Tambah Anggota</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="">
      <div class="row">
        <div class="col-12">
          <!-- /.card -->

          <div class="ml-3 mr-3">
            <div class="card-header">
             </div>
            <!-- /.card-header -->
			<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tambah Anggota</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="<?php echo base_url()?>manager/DataGuru/addGuru" method="post" enctype="multipart/form-data">
                <div class="card-body col-md-6">
				      <div class="form-group">
                    <label for="exampleInputEmail1">NIP</label>
                    <input type="" class="form-control" id="exampleInputEmail1" placeholder="NIP" name="nip">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Nama</label>
                    <input type="#" class="form-control" id="exampleInputPassword1" placeholder="Nama" name="namaGuru">
                  </div>
				  
                  <div class="form-group">
                    <label for="exampleInputPassword1">Mata Pelajaran</label>
                    <select class="form-control" name="mapel" id="mapel">
                        <?php
                            foreach ($mapel as $row) {
                                echo "<option value='$row->KODE_MAPEL'>".$row->NAMA_MAPEL."</option>";
                            }
                        ?>
                    </select>
                  </div>
				  
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
                  </div>
                  <div class="form-group">
                    <label for="img-input">Foto Profil</label>
                    <input type="file" class="form-control" id="img-input" accept="image/*" name="images">
                  <div class="uploaded_image"></div>
            </label>
            <?php echo $this->session->flashdata('pesan'); ?>
            <?php echo $this->session->flashdata('pesan_gambar'); ?>
                 </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
			    
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<!--===============================================================================================-->
  
<!--===============================================================================================-->
  

<!--===============================================================================================-->
 
<!--===============================================================================================-->
  
<!--===============================================================================================-->
 
<!--===============================================================================================-->
  <!-- <script src="<?php echo(base_url('assets/loginregister/js/main.js'))?>"></script> -->
<!--===============================================================================================-->
 

    <!--===============================================================================================-->
<div id="uploadimageModal" class="modal" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Photo profile</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true" style="cursor: pointer;">×</span></button>
      </div>
      <div class="modal-body">
        <div class="text-center">
          <div id="image_demo" style="margin-top:30px; height:350px;"></div>
        </div>
        <div class="text-center">
          <button class="btn crop-rotate" data-deg="-90" style="cursor: pointer;"><i class="fas fa-undo"></i></button>
          <button class="btn crop-rotate" data-deg="90" style="cursor: pointer;"><i class="fas fa-redo"></i></button>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-success crop_image"  style="cursor: pointer;">Upload</button>
        <button type="button" class="btn btn-default" data-dismiss="modal" style="cursor: pointer;">Close</button>
      </div>
    </div>
  </div>
</div><br>
<!--===============================================================================================-->