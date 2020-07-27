<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <?php if(isset($Tittle)):?>
    <title><?= $Tittle?></title>
  <?php else :?>
    <title>Danilasip</title>
  <?php endif;?>
  
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/fontawesome-free/css/all.min.css') ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" type="text/css" href="<?php echo(base_url('assets/loginregister/vendor/bootstrap/css/bootstrap.min.css'))?>">
  <link rel="stylesheet" type="text/css" href="<?php echo(base_url('assets/Croppie/croppie.css'))?>" type="text/css" />
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') ?>">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') ?>">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/jqvmap/jqvmap.min.css') ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/adminlte.min.css') ?>">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css') ?>">

  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') ?>">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/daterangepicker/daterangepicker.css') ?>">
  <!-- summernote -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/summernote/summernote-bs4.css') ?>">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?php echo base_url('manager/Dashboard/index') ?>" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?php echo base_url('manager/DataGuru/index') ?>" class="nav-link">Daftar Guru</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <!-- <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form> -->

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

      <li class="nav-item">
    <li class="nav-item" >
        <a class="nav-link d-inline" data-widget="control-sidebar" data-slide="true" href="#">
          <i class="fas fa-th-large"></i>
        </a>
    
      <a class="nav-link d-inline"  href="<?= base_url('login/logout/1')?>">
      <i class="fas fa-sign-out-alt"></i>
    </a>
      </li>
    
      </li>
    
    </ul>

  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="<?php echo base_url('assets/dist/img/AdminLTELogo.png') ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Danilasip</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url($this->session->userdata('gambar')); ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $this->session->userdata('NAMA_GURU'); ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item <!--has-treeview menu-open-->">
            <a href="<?php echo base_url('manager/dashboard/index') ?>" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
      
      <li class="nav-item has-treeview menu-close">
            <a href="pages/widgets.html" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Arsip 
         <i class="right fas fa-angle-left"></i>
              
              </p>
            </a>
      <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('manager/ArsipSaya/index') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Arsip Saya</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('manager/ArsipSekolah/index') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Arsip Sekolah</p>
                </a>
              </li>
            </ul>
          </li>
      <li class="nav-item">
            
      <a href="<?php echo base_url('manager/DataSiswa/index') ?>" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Data Siswa
               </p>
            </a> 
          
          </li>
      <li class="nav-item has-treeview">
        <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/layout/top-nav.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Top Navigation</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/layout/boxed.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Boxed</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/layout/fixed-sidebar.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Fixed Sidebar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/layout/fixed-topnav.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Fixed Navbar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/layout/fixed-footer.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Fixed Footer</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/layout/collapsed-sidebar.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Collapsed Sidebar</p>
                </a>
              </li>
            </ul>
          </li>
        </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
 
  <?php echo ($conten) ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
            <?php echo $this->session->flashdata('pesan'); ?>
            <?php echo $this->session->flashdata('create'); ?>
            <?php echo $this->session->flashdata('create_kategori'); ?>
            <?php echo $this->session->flashdata('create_tags'); ?>
            <?php echo $this->session->flashdata('create_user'); ?>
            <?php echo $this->session->flashdata('edit'); ?>
            <?php echo $this->session->flashdata('edit_kategori'); ?>
            <?php echo $this->session->flashdata('gagal_upload'); ?>
            <?php echo $this->session->flashdata('edit_tags'); ?>
            <?php echo $this->session->flashdata('edit_user'); ?>
            <?php echo $this->session->flashdata('delete'); ?>
            <?php echo $this->session->flashdata('delete_kategori'); ?>
            <?php echo $this->session->flashdata('delete_tags'); ?>
            <?php echo $this->session->flashdata('delete_user'); ?>
    </section>
      <!-- Main content -->
    <!-- /.content -->
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.0.1
    </div>
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
    reserved.
  </footer>


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Data yang dihapus masih bisa dikembalikan.</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <a id="btn-delete" class="btn btn-danger" href="#">Delete</a>
      </div>
    </div>
  </div>
</div>
<!-- jQuery -->
<script src="<?php echo base_url('assets/plugins/jquery/jquery.min.js')?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url('assets/plugins/jquery-ui/jquery-ui.min.js') ?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<script src="<?php echo(base_url('assets/loginregister/vendor/animsition/js/animsition.min.js'))?>"></script>
<script src="<?php echo(base_url('assets/loginregister/vendor/bootstrap/js/popper.js'))?>"></script>
<script src="<?php echo(base_url('assets/loginregister/vendor/bootstrap/js/bootstrap.min.js'))?>"></script>
<script src="<?php echo(base_url('assets/loginregister/vendor/select2/select2.min.js'))?>"></script>
<script src="<?php echo(base_url('assets/loginregister/vendor/countdowntime/countdowntime.js'))?>"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<!-- ChartJS -->
<script src="<?php echo base_url('assets/plugins/chart.js/Chart.min.js') ?>"></script>
<!-- Sparkline -->
<script src="<?php echo base_url('assets/plugins/sparklines/sparkline.js') ?>"></script>
<!-- JQVMap -->
<script src="<?php echo base_url('assets/plugins/jqvmap/jquery.vmap.min.js') ?>"></script>
<script src="<?php echo base_url('assets/plugins/jqvmap/maps/jquery.vmap.usa.js') ?>"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url('assets/plugins/jquery-knob/jquery.knob.min.js') ?>"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url('assets/plugins/datatables/jquery.dataTables.js') ?>"></script>
<script src="<?php echo base_url('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js') ?>"></script>
<script src="<?php echo base_url('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') ?>"></script>
<script src="<?php echo base_url('assets/plugins/datatables-buttons/js/buttons.flash.js') ?>"></script>
<script src="<?php echo base_url('assets/plugins/jszip/jszip.min.js') ?>"></script>
<script src="<?php echo base_url('assets/plugins/pdfmake/pdfmake.min.js') ?>"></script>
<script src="<?php echo base_url('assets/plugins/pdfmake/vfs_fonts.js') ?>"></script>
<script src="<?php echo base_url('assets/plugins/datatables-buttons/js/buttons.html5.min.js') ?>"></script>
<script src="<?php echo base_url('assets/plugins/datatables-buttons/js/buttons.print.min.js') ?>"></script>
<script src="<?php echo base_url('assets/plugins/moment/moment.min.js') ?>"></script>
<script src="<?php echo base_url('assets/plugins/daterangepicker/daterangepicker.js') ?>"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo base_url('assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') ?>"></script>
<!-- Summernote -->
<script src="<?php echo base_url('assets/plugins/summernote/summernote-bs4.min.js') ?>"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/dist/js/adminlte.js') ?>"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url('assets/dist/js/pages/dashboard.js') ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('assets/dist/js/demo.js') ?>"></script>
<script src="<?php echo(base_url('assets/Croppie/croppie.js'))?>"></script>
<script>
function deleteConfirm(url){
	$('#btn-delete').attr('href', url);
	$('#deleteModal').modal();
}
</script>
  <script> 
      (function(){
      $(document).ready(function(){
        $image_crop = $('#image_demo').croppie({
        enableExif: true,
        enableOrientation: true,
        viewport: {
        width:200,
        height:200,
        // type:'square' 
        type: 'circle'
        },
        boundary:{
        width:300,
        height:300
        },
        enableOrientation: true
      });

      $('#img-input').on('change', function(){
        var reader = new FileReader();
        reader.onload = function (event) {
        $image_crop.croppie('bind', {
          url: event.target.result,
        }).then(function(){
          console.log('jQuery bind complete');
        });
        }
        reader.readAsDataURL(this.files[0]);
        $('#uploadimageModal').modal('show');
      });

      $('.crop-rotate').on('click', function(event) {
        $image_crop.croppie('rotate',
          parseInt($(this).data('deg'))
        );
      });

      $('.crop_image').click(function(event){
        $image_crop.croppie('result', {
        type: 'canvas',
        size: 'viewport'
        }).then(function(response){
        $.ajax({
          url:"upload_foto/",
          type: "POST",
          data:{"images": response},
          success:function(data)
          {
          $('#uploadimageModal').modal('hide');
          $('.uploaded_image').html(data);
          
          }
        });
        var img = document.getElementById('img-profile');
          img.style.display="none";
        })
      });

      }); 
      })(jQuery); 
    </script>
<script>
   $(function () {
      $("#example1").DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": false,
      "info": true,
      "autoWidth": true,
      "pageLength": 5
    });
    $("#example2").DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": false,
      "info": true,
      "autoWidth": true,
      "pageLength": 5,
        dom: 'Bfrtip',
        buttons: [
          'excel'
        ]
    });
   });
</script>
<script>
 $(function() {
  $('#nav a[href~="' + location.href + '"]').parents('li').addClass('active');
 });
</script>

<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
  });
</script>


<script type="text/javascript">
$('.delete-button').click(function(){
    var NIS=$(this).attr('data-NIS');
    var id_user=$(this).attr('data-id-user');
    var base_url = $(this).attr('data-base_url');
    $('#modalDelete').attr('href',base_url+'/delete/'+NIS);
    $('#modalDelete_user').attr('href',base_url+'/delete/'+id_user);
})
</script>

<script>
    $('#input').hide();             
    $('.cancel').hide();   
              
    $('.cancel').click(function(){
        $('#input').hide();
        $('#view').show();
        $('.change').show();
        $('.cancel').hide(); 
    });

    $('.change').click(function(){
        $('#input').show();
        $('#view').hide();     
        $('.cancel').show(); 
        $('.change').hide();  
    });
</script>

</body>
</html>