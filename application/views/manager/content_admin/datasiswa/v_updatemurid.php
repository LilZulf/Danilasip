<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Update Murid</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Update Murid</li>
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
                <h3 class="card-title">Tambah Murid</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="<?php 
                if ($this->session->userdata('LEVEL') == 0){
                    echo (base_url('manager/DataSiswa/update'));
                }else if ($this->session->userdata('LEVEL') == 1 || $this->session->userdata('LEVEL') == 2) {
                    echo (base_url('manager/DataSiswa/update'));
                }
                ?>" method="post" enctype="multipart/form-data">
                <div class="card-body col-md-6">
				          <div class="form-group">
                    <label for="exampleInputEmail1">No.induk</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" value="<?= $datafix[0]['NIS']?>" placeholder="No.induk" name="nis" readonly>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Nama</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" value="<?= $datafix[0]['NAMA_SISWA']?>" placeholder="Nama" name="namaSiswa" required>
                  </div>
				  
                  <div class="form-group">
                    <label for="exampleInputPassword1">Alamat</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Alamat" value="<?= $datafix[0]['ALAMAT']?>" name="alamat" required>
                  </div>
				  
                  <div class="form-group">
                  <label>Tanggal Lahir</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                    </div>
                    <input type="text" class="form-control" value="<?= $datafix[0]['TGL_LAHIR']?>" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy/mm/dd" placeholder="yyyy-mm-dd" data-mask name="tanggal" required>
                  </div>
                </div>
				  
                  <div class="form-group">
                    <label for="exampleInputPassword1">Jenis Kelamin</label>
					           <div class="form-check">
                      <input class="form-check-input" type="radio" name="jenisKelamin" value="L" <?php if($datafix[0]['JK'] == "L"){ echo 'checked';}?> required>
                      <label class="form-check-label">Laki Laki</label>
                    </div>
					           <div class="form-check">
                      <input class="form-check-input" type="radio" name="jenisKelamin" value="P" <?php if($datafix[0]['JK'] == "P"){ echo 'checked';}?>>
                      <label class="form-check-label">Perempuan</label>
                    </div>
                  </div>
				  
				              <div class="form-group">
                    <label for="exampleInputPassword1">Kelas</label>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="kelas" <?php if($datafix[0]['KODE_KELAS'] == "k7"){ echo 'checked';}?> value="k7" required>
                      <label class="form-check-label">VII</label>
                    </div>
					           <div class="form-check">
                      <input class="form-check-input" type="radio" name="kelas" <?php if($datafix[0]['KODE_KELAS'] == "k8"){ echo 'checked';}?> value="k8">
                      <label class="form-check-label">VIII</label>
                    </div>
					           <div class="form-check">
                      <input class="form-check-input" type="radio" name="kelas" <?php if($datafix[0]['KODE_KELAS'] == "k9"){ echo 'checked';}?> value="k9">
                      <label class="form-check-label">IX</label>
                    </div>
                  </div>
				  
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