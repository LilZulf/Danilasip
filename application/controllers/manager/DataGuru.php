<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class DataGuru extends CI_Controller {

        function __construct(){

                parent::__construct();

                $this->load->model('manager/M_dataguru');
                $this->load->helper('url', 'time_ago');
                $this->load->helper(array('string', 'text'));
                $this->load->library('form_validation');
                $this->load->library('session');
                $this->load->library('pagination');
                $this->menu = $this->load->view('manager/template_admin/section_menu', null, true);
                $this->_version = "DanilasipV.0";
                if ($this->session->userdata('masuk') != true) {
                  redirect('/login');
                }
                // if ($this->session->userdata('level') == '') {
                //     redirect('manager/login');
                // }
                // if ($this->session->userdata('level') != '0'){
                //     redirect('Web/index/');
                // }
        }

        public function index(){
            $uri_segment = 4;
            $config['base_url'] = base_url().'manager/DataGuru/index'; //site url
            $config['total_rows'] = $this->M_dataguru->jumlah_data(); //total row
            $config['per_page'] = 5;  //show record per halaman
            $config["uri_segment"] = $uri_segment;  // uri parameter
            $config["use_page_numbers"] = FALSE;            
            $choice = $config["total_rows"] / $config["per_page"];
            $config["num_links"] = floor($choice);
    
            // Membuat Style pagination untuk BootStrap v4
            $config['first_link']       = 'First';
            $config['last_link']        = 'Last';
            $config['next_link']        = 'Next';
            $config['prev_link']        = 'Prev';
            $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
            $config['full_tag_close']   = '</ul></nav></div>';
            $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
            $config['num_tag_close']    = '</span></li>';
            $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
            $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
            $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
            $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
            $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
            $config['prev_tagl_close']  = '</span>Next</li>';
            $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
            $config['first_tagl_close'] = '</span></li>';
            $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
            $config['last_tagl_close']  = '</span></li>';
    
            $this->pagination->initialize($config);
            $data['page'] = ($this->uri->segment($uri_segment)) ? $this->uri->segment($uri_segment) : 0;  
            $data['data'] = $this->M_dataguru->getAll();
            
            // $time_get = strtotime($created_at);
            // echo time_ago($time_get);
            // exit();
            $data['level'] = $this->session->userdata('LEVEL');
            $data['datafix'] = $data['data'];
            $main_content['conten'] = $this->load->view('manager/content_admin/kategori/v_guru',  $data, true);
            $main_content['section_menu'] = $this->menu;
            $main_content['page'] = 'artikel';
            
            $this->load->view('manager/template_admin/header_footer', $main_content);
        }

        public function addguru() {
            $this->load->model('manager/M_dataguru');

          if($this->input->post()){

            $this->form_validation->set_rules('namaGuru', 'NamaGuru', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');

            if ($this->form_validation->run() == TRUE) {
                if($this->input->post('gambar_profile') != NULL){
                  $file_name = $this->input->post('gambar_profile');                        
                  $this->M_dataguru->addGuru($file_name);
                  redirect('manager/DataGuru/index');
                }else{
                  $this->session->set_flashdata('pesan_gambar', '                      
                    <h4 class="modal-title" style="text-align: center;">Please insert image !</h4>             
                  ');
                  redirect('manager/DataGuru/index');
                }
            }else{
              $this->session->set_flashdata('pesan', '
                <button type="button" style="display: none;" data-toggle="modal" data-target="#modal-default" id="autoKlik">
                </button>
                <div class="modal fade in" id="modal-default" style="display: block; padding-right: 17px;" >
                  <div class="modal-dialog">
                    <div class="modal-content">                    
                      <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">please fill out all the forms provided</h4>
                      </div>
                    </div>
                    <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>              
                ');
                redirect('manager/DataGuru/index');
            }

            
            }
            $data["mapel"]= $this->M_dataguru->get_mapel();

            $main_content['conten'] = $this->load->view('manager/content_admin/datasiswa/v_addguru', $data,true);
            $main_content['section_menu'] = $this->menu;
            $main_content['page'] = 'artikel';
            $this->load->view('manager/template_admin/header_footer', $main_content);
        }

        public function upload_foto(){
          $data = $_POST['images'];
          list($type, $data) = explode(';', $data);
          list(, $data)      = explode(',', $data);
          $data = base64_decode($data);
          $imageName = time().'.png';
          file_put_contents('gambar_profile/'.$imageName, $data);
          // $data['gambar'] = $imageName;
          // redirect('manager/template_admin/v_register', $data);
          echo '<img src="/danilasip-1.0.0'.'/gambar_profile/'.$imageName.'" name="gambar_profile" id="img-profile" />
          <input type="hidden" name="gambar_profile" value="gambar_profile/'.$imageName.'">
          ';
        }

        public function addguruLimit()
        {
            $main_content['conten'] = $this->load->view('manager/content_admin/datasiswa/v_addguru', true);
            $main_content['section_menu'] = $this->menu;
            $main_content['page'] = 'artikel';
            $this->load->view('manager/template_admin/header_footer', $main_content);
        }

        public function create(){
            $post = $this->input->post();

            $data = array(
                'NIP' => $_POST["nip"], 
                'NAMA_GURU' => $_POST["namaSiswa"],
                'USERNAME' => $_POST["jenisKelamin"],
                'PASSWORD' => $_POST["kelas"],
                'KODE_MAPEL' => $_POST["alamat"],
                'gambar' => $_POST["tanggal"],
                'updated_at' => $_POST["tanggal"],
                'is_delete' => 0
            );
            $this->M_dataguru->uploadGuru($data);
            echo "berhasil upload";
            $this->session->set_flashdata('create', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><i class="icon fa fa-check"></i>Siswa Berhasil ditambahkan</div>');

            redirect(site_url('manager/DataGuru/index'));
        }

        public function delete($id = null){
            if (!isset($id)) redirect('');
            
            if ($this->M_dataguru->delete($id)) {
                $this->session->set_flashdata('delete', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><i class="icon fa fa-check"></i>Siswa Berhasil dihapus</div>');
                redirect(site_url('manager/DataGuru/index'));
            }
           $data["siswa"]= $this->M_dataguru->getById($id);
        }
    }
?>