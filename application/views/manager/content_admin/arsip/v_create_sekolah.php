<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tambah Arsip</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Tambah Arsip</li>
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
                <h3 class="card-title">Tambah Arsip</h3>
              </div>
                <div class="card-body col-md-6">
                  
              <form action="<?php 
                if ($this->session->userdata('LEVEL') == 0){
                    echo (base_url('manager/AddArsip/addarsip'));
                }else if ($this->session->userdata('LEVEL') == 1 || $this->session->userdata('LEVEL') == 2) {
                    echo (base_url('manager/AddArsip/addarsip'));
                }
                ?>" method="post" enctype="multipart/form-data">
      
                  <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile" name="file" required>
                        <label class="custom-file-label" for="customFile">Pilih File</label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlTextarea2">Deskripsi singkat</label>
                    <textarea class="form-control rounded-0" name="deskripsi" id="exampleFormControlTextarea2" rows="3" required></textarea>
                  </div>
                 
                 <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
                  
                </div>
                <!-- /.card-body -->

                
                 </div>
                <!-- /.card-body -->

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