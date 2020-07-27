<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Nilai</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Nilai</li>
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
                <h3 class="card-title">Forms</h3>
              </div>
              <?php
                  foreach ($datafix as $datasiswa) :
                ?>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="<?php echo (base_url('manager/DataSiswa/updateNilaiPost'))?>" method="POST">
                <div class="card-body col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">ID Nilai</label>
                    <input type="" value="<?= $id_nilai?>" class="form-control" name="id" id="exampleInputEmail1" readonly>
                  </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Nis</label>
                    <input type="" value="<?= $datasiswa["NIS"]?>" class="form-control" name="nis" id="exampleInputEmail1" readonly>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Semester</label>
                    <input type="" value="<?= $datasiswa['SEMESTER']?>" class="form-control" name="semester" id="exampleInputEmail1" readonly>
                  </div>
                  <div class="form-group" style="display: none;">
                        <input type="" value="<?= $datasiswa["KODE_MAPEL"]?>" class="form-control" name="mapel" id="exampleInputEmail1" readonly>
                    </div>
				      <div class="form-group">
                        <label>Mata Pelajaran</label>
                        <input type="" value="<?= $mapel?>" class="form-control" name="mapel_" id="exampleInputEmail1" readonly>
                    </div>
              
				
                  	<div class="form-group">
                  <label>Type</label>
                  <select class="form-control" name="tipe" id="tipel">
                        <option value='NILAI_UH'>Nilai Harian</option>
                        <option value='NILAI_UTS'>Nilai UTS</option>
                        <option value='NILAI_UAS'>Nilai UAS</option>
                    </select>
                </div>
				          <div class="form-group">
                    <label for="exampleInputEmail1">Nilai</label>
                    <input type="number" min="0" max="100" class="form-control" name="nilai" id="exampleInputEmail1" placeholder="Input nilai...">
                  </div>
				
                 </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
                  <?php endforeach;?>
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