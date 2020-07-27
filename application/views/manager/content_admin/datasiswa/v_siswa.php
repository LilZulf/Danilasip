<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php echo $kelas;?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"><?php echo $kelas;?></li>
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
              <?php
                foreach ($data as $datasiswa) :
              ?>
               <h3 class="card-title "><?php echo $kelas?>
               <br>Nama: <?php echo $datasiswa['NAMA_SISWA'];?>
               <br>Nis: <?php echo $datasiswa['NIS'];?></h3>
            
             </div>
              <div class="card-header">
              <div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Semester</label>
                      <select id="mySelect" class="form-control" name="mapel" onchange="myFunction('<?= $kelas?>','<?php echo $datasiswa['NIS'];?>','<?= $kd_kel?>')" id="mapel">
                          <option value="0"> - Pilih Semeter -</option>
                          <option value="1">Semester 1</option>
                          <option value="2">Semester 2</option>
                          <option value="3">Semester 3</option>
                          <option value="4">Semester 4</option>
                          <option value="5">Semester 5</option>
                          <option value="6">Semester 6</option>
                      </select>
                    </div>
                  <!-- /.card-body -->
                    <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
                </div>
             </div>
             <?php
                endforeach;
              ?>
            <!-- /.card-header -->
            <div class="card-body">
             <h1>Semester <?= $semester?></h1>
              <table id="example2" class="table table-bordered table-striped">
                <thead><tr>
                  
                  <th>No</th>
				          <th>Mata Pelajaran</th>
                  <th>Harian</th>
                  <th>UTS</th>
                  <th>UAS</th>
                  <?php if(($kelas == "KELAS 8" && $semester == 1 || $semester == 2) || ($kelas == "KELAS 9" && ($semester == 1 || $semester == 2 || $semester == 3 || $semester == 4) ) ): ?>
                  <th></th>
                  <?php else:?>
                    <th>Action</th>
                  <?php endif;?>
                 </tr>
                </thead>
                <tbody>
                <?php
                  $no = 1;
                  foreach ($datafix as $datasiswa) :
                ?>
                <tr>
                  <td><?= $no++?></td>
                  <td><?php echo $datasiswa['NAMA_MAPEL'];?></td>
                  <td><?php echo $datasiswa['NILAI_UH'];?></td>
                  <td><?php echo $datasiswa['NILAI_UTS'];?></td>
                  <td><?php echo $datasiswa['NILAI_UAS'];?></td>
                  <td>
                  <?php if(($kelas == "KELAS 8" && $semester == 1 || $semester == 2) || ($kelas == "KELAS 9" && ($semester == 1 || $semester == 2 || $semester == 3 || $semester == 4) ) ): ?>
                  </td>
                    <?php else :?>
                      <a href="<?php echo base_url('manager/DataSiswa/updatenilai/'.$datasiswa['ID']."/".$datasiswa['NAMA_MAPEL'])?>"><button  type="button" class="btn btn-block bg-gradient-primary mb-2">Edit</button></a>
                    <a href="#"  onclick="deleteConfirm('<?= base_url('manager/DataSiswa/deleteNilai/'.$datasiswa['ID'])?>')"><button  type="button" class="btn btn-block bg-gradient-primary">Delete</button></a>
                    </td>
                  <?php endif;?>
                    
                 

                </tr>
                <?php 
                    endforeach;
                ?>
                </tbody>
               
                <tfoot>
				<tr>
				<th>
              <?php
                foreach ($data as $datasiswa) :
              ?>
                    <?php if(($kelas == "KELAS 8" && $semester == 1 || $semester == 2) || ($kelas == "KELAS 9" && ($semester == 1 || $semester == 2 || $semester == 3 || $semester == 4) ) ):  ?>
                      <a href="<?php echo base_url('manager/DataSiswa/addNilai/'.$datasiswa['NIS'])."/". $semester?>"><button style="display: none;" type="button" class="btn btn-block bg-gradient-primary">Tambah</button></a>
                    <?php else:?>
                      <a href="<?php echo base_url('manager/DataSiswa/addNilai/'.$datasiswa['NIS'])."/". $semester?>"><button type="button" class="btn btn-block bg-gradient-primary">Tambah</button></a>
                      <?php endif ;?>
				    
                <?php endforeach;?>
          </th>
         <th>
          <!-- <a href="#"><button  type="button" class="btn btn-block bg-gradient-primary">Cetak</button></a> -->
         </th>
         <th></th>
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
  <script>
function myFunction(kelas,NIS,kd) {
  var x = document.getElementById("mySelect").value;
  // document.getElementById("demo").innerHTML = "You selected: " + x;
  if(x == 0){
    alert("Silahkan Pilih Semester");
  }
  else if(x == 1){
    window.location.href = "<?php echo base_url();?>"+"manager/DataSiswa/detail/"+NIS+"/"+kelas+"/"+kd+"/1";
  }
  else if(x == 2){
    window.location.href = "<?php echo base_url();?>"+"manager/DataSiswa/detail/"+NIS+"/"+kelas+"/"+kd+"/2";
  }
  else if(x == 3){
    window.location.href = "<?php echo base_url();?>"+"manager/DataSiswa/detail/"+NIS+"/"+kelas+"/"+kd+"/3";
  }
  else if(x == 4){
    window.location.href = "<?php echo base_url();?>"+"manager/DataSiswa/detail/"+NIS+"/"+kelas+"/"+kd+"/4";
  }
  else if(x == 5){
    window.location.href = "<?php echo base_url();?>"+"manager/DataSiswa/detail/"+NIS+"/"+kelas+"/"+kd+"/5";
  }
  else if(x == 6){
    window.location.href = "<?php echo base_url();?>"+"manager/DataSiswa/detail/"+NIS+"/"+kelas+"/"+kd+"/6";
  }
}
</script>