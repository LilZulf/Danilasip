<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class DataSiswa extends CI_Controller {

        function __construct(){

                parent::__construct();

                $this->load->model('manager/M_datasiswa');
                $this->load->model('manager/m_dataguru');
                $this->load->helper('url', 'time_ago');
                $this->load->helper(array('string', 'text'));
                $this->load->library('form_validation');
                $this->load->library('session');
                $this->load->library('pagination');
                $this->menu = $this->load->view('manager/template_admin/section_menu', null, true);
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
            $config['base_url'] = base_url().'manager/DataSiswa/index'; //site url
            $config['total_rows'] = $this->M_datasiswa->jumlah_data(); //total row
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
            $config['title'] = 'Detail Siswa';
    
            $this->pagination->initialize($config);
            $data['page'] = ($this->uri->segment($uri_segment)) ? $this->uri->segment($uri_segment) : 0;  
            $data['data'] = $this->M_datasiswa->getAll($config['per_page'], $data['page']);
            
            $data['pagination'] = $this->pagination->create_links();
            $data['per_page'] = $config['per_page'];
            $data['pesan'] = '';
            $data['pesan_notfounddata'] = '';
            
            // $time_get = strtotime($created_at);
            // echo time_ago($time_get);
            // exit();

            $data['datafix'] = $data['data'];
            $main_content['conten'] = $this->load->view('manager/content_admin/datasiswa/v_datasiswa',  $data, true);
            $main_content['section_menu'] = $this->menu;
            $main_content['page'] = 'artikel';
            
            $this->load->view('manager/template_admin/header_footer', $main_content);
        }
        public function addNilai($id=null,$sms=null){
            $mapel = $this->m_dataguru->get_mapel_not($id,$sms);
            $data["mapel"]= $mapel->result();
            $data["id"] = $id;
            $data["semester"] = $sms;
            $jml = $mapel->num_rows();
            if($jml > 0){
                $main_content['conten'] = $this->load->view('manager/content_admin/datasiswa/v_addnilai', $data,true);
                $main_content['section_menu'] = $this->menu;
                $main_content['page'] = 'artikel';
                $this->load->view('manager/template_admin/header_footer', $main_content);
            }
            else{
                // echo $jml;
                // echo "<script>alert('Sudah Semua Nilai');</script>";
                $url= $this->session->userdata('URL');
                $this->session->set_flashdata('create', '<script>alert("Data Penuh")</script>');
                redirect($url);
            }
		   
        }

        public function kelas7() {
            $uri_segment = 4;
            $config['base_url'] = base_url().'manager/DataSiswa/index'; //site url
            $config['total_rows'] = $this->M_datasiswa->jumlah_data(); //total row
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
            $data['data'] = $this->M_datasiswa->getAllkelas7();
            
            $data['pagination'] = $this->pagination->create_links();
            $data['per_page'] = $config['per_page'];
            $data['pesan'] = '';
            $data['pesan_notfounddata'] = '';
            
            // $time_get = strtotime($created_at);
            // echo time_ago($time_get);
            // exit();

            $data['datafix'] = $data['data'];
            $main_content['conten'] = $this->load->view('manager/content_admin/datasiswa/v_kelas7',  $data, true);
            $main_content['section_menu'] = $this->menu;
            $main_content['page'] = 'artikel';
            
            $this->load->view('manager/template_admin/header_footer', $main_content);
        }

        public function kelas8() {
            $uri_segment = 4;
            $config['base_url'] = base_url().'manager/DataSiswa/index'; //site url
            $config['total_rows'] = $this->M_datasiswa->jumlah_data(); //total row
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
            $data['data'] = $this->M_datasiswa->getAllkelas8();
            
            $data['pagination'] = $this->pagination->create_links();
            $data['per_page'] = $config['per_page'];
            $data['pesan'] = '';
            $data['pesan_notfounddata'] = '';
            
            // $time_get = strtotime($created_at);
            // echo time_ago($time_get);
            // exit();

            $data['datafix'] = $data['data'];
            $main_content['conten'] = $this->load->view('manager/content_admin/datasiswa/v_kelas8',  $data, true);
            $main_content['section_menu'] = $this->menu;
            $main_content['page'] = 'artikel';
            
            $this->load->view('manager/template_admin/header_footer', $main_content);
        }

        public function kelas9() {
            $uri_segment = 4;
            $config['base_url'] = base_url().'manager/DataSiswa/index'; //site url
            $config['total_rows'] = $this->M_datasiswa->jumlah_data(); //total row
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
            $data['data'] = $this->M_datasiswa->getAllkelas9();
            
            $data['pagination'] = $this->pagination->create_links();
            $data['per_page'] = $config['per_page'];
            $data['pesan'] = '';
            $data['pesan_notfounddata'] = '';
            
            // $time_get = strtotime($created_at);
            // echo time_ago($time_get);
            // exit();

            $data['datafix'] = $data['data'];
            $main_content['conten'] = $this->load->view('manager/content_admin/datasiswa/v_kelas9',  $data, true);
            $main_content['section_menu'] = $this->menu;
            $main_content['page'] = 'artikel';
            
            $this->load->view('manager/template_admin/header_footer', $main_content);
        }

        
        public function addmurid()
        {
            $main_content['conten'] = $this->load->view('manager/content_admin/datasiswa/v_addmurid', "",true);
            $main_content['section_menu'] = $this->menu;
            $main_content['page'] = 'artikel';
            $this->load->view('manager/template_admin/header_footer', $main_content);
        }
        public function updatenilai($id=null,$namaMapel = null)
        {
            $data['data'] = $this->M_datasiswa->getNilaiById($id);
            $data['datafix'] = $data['data'];
            $data['mapel'] = $namaMapel;
            $data['id_nilai'] = $id;
            $main_content['conten'] = $this->load->view('manager/content_admin/datasiswa/v_updatenilai',$data ,true);
            $main_content['section_menu'] = $this->menu;
            $main_content['page'] = 'artikel';
            $this->load->view('manager/template_admin/header_footer', $main_content);
        }
        public function updatemurid($id){
            $data['data'] = $this->M_datasiswa->getDataById($id);
            $data['datafix'] = $data['data'];
            $main_content['conten'] = $this->load->view('manager/content_admin/datasiswa/v_updatemurid',$data ,true);
            $main_content['section_menu'] = $this->menu;
            $main_content['page'] = 'artikel';
            $this->load->view('manager/template_admin/header_footer', $main_content);
        }

        public function detail($id = null,$kelas = "",$kd_kel="",$sms = null){
            $uri_segment = 4;
            $config['total_rows'] = $this->M_datasiswa->jumlah_datanilai(); //total row
            $config['per_page'] = 5;  //show record per halaman
            $config["uri_segment"] = $uri_segment;  // uri parameter
            $config["use_page_numbers"] = FALSE;        
            $choice = $config["total_rows"] / $config["per_page"];
            $config["num_links"] = floor($choice);
            
            $this->session->unset_userdata('URL');
            $this->session->unset_userdata('KELAS_TEMP');
            $currentURL = current_url();
            $this->session->set_userdata('URL', $currentURL);
            $this->session->set_userdata('KELAS_TEMP', $kd_kel);

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
            $data['data'] = $this->M_datasiswa->getDataById($id);
            $data['user']= $this->M_datasiswa->getById($id,$sms);
            $data['kelas'] = $kelas;
            $data['semester'] = $sms;
            $data['kd_kel'] = $kd_kel;
            $data['datafix'] = $data['user'];
            $main_content['conten'] = $this->load->view('manager/content_admin/datasiswa/v_siswa', $data, true);
            $main_content['section_menu'] = $this->menu;
            $main_content['page'] = 'user';
            $main_content['Tittle'] = $data['data'][0]['NAMA_SISWA'];
            $this->load->view('manager/template_admin/header_footer', $main_content);
        }

        public function create(){
            $post = $this->input->post();

            $data = array(
                'NIS' => $_POST["nis"], 
                'NAMA_SISWA' => $_POST["namaSiswa"],
                'JK' => $_POST["jenisKelamin"],
                'KODE_KELAS' => $_POST["kelas"],
                'ALAMAT' => $_POST["alamat"],
                'TGL_LAHIR' => $_POST["tanggal"],
                'is_delete' => 0
            );
            $this->M_datasiswa->uploadSiswa($data);
            echo "berhasil upload";
            $this->session->set_flashdata('create', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><i class="icon fa fa-check"></i>Siswa Berhasil ditambahkan</div>');

            redirect(site_url('manager/DataSiswa/index'));
        }
        public function createNilai(){
            $post = $this->input->post();
            $data = array(
                'NIP' => $this->session->userdata("NIP"), 
                'NIS' => $_POST["nis"],
                'KODE_KELAS' => $this->session->userdata("KELAS_TEMP"),
                'KODE_MAPEL' => $_POST["mapel"],
                 $_POST["tipe"] => $_POST["nilai"],
                'Semester' => $_POST["semester"],
                'is_delete' => 0
            );
            $this->M_datasiswa->addNilai($data);
            echo "berhasil upload";
            $this->session->set_flashdata('create', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><i class="icon fa fa-check"></i>Siswa Berhasil ditambahkan</div>');
            $url= $this->session->userdata('URL');
            redirect($url);
            // $currentURL = current_url();
           
            // echo $this->session->userdata('URL');
        }

        public function update(){
            $post = $this->input->post();

            $data = array(
                'NIS' => $_POST["nis"], 
                'NAMA_SISWA' => $_POST["namaSiswa"],
                'JK' => $_POST["jenisKelamin"],
                'KODE_KELAS' => $_POST["kelas"],
                'ALAMAT' => $_POST["alamat"],
                'TGL_LAHIR' => $_POST["tanggal"],
                'is_delete' => 0
            );
            $this->M_datasiswa->updateSiswa($_POST["nis"],$data);
            echo "berhasil update";
            $this->session->set_flashdata('create', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><i class="icon fa fa-check"></i>Siswa Berhasil diupdate</div>');

            redirect(site_url('manager/DataSiswa/index'));
        }
        public function updateNilaiPost(){
            $post = $this->input->post();

            $data = array(
                'NIP' => $this->session->userdata("NIP"), 
                'NIS' => $_POST["nis"],
                'KODE_KELAS' => $this->session->userdata("KELAS_TEMP"),
                'KODE_MAPEL' => $_POST["mapel"],
                 $_POST["tipe"] => $_POST["nilai"],
                'Semester' => $_POST["semester"],
                'is_delete' => 0
            );
            $this->M_datasiswa->updateNilai($_POST["id"],$data);
            echo "berhasil update";
            $this->session->set_flashdata('create', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><i class="icon fa fa-check"></i>Siswa Berhasil diupdate</div>');
            $url= $this->session->userdata('URL');
            redirect($url);
        }

        public function delete($id = null){
            if (!isset($id)) redirect(site_url('manager/dashboard/index'));
            
            //echo $id;
            if ($this->M_datasiswa->delete($id)) {
                $this->session->set_flashdata('delete', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><i class="icon fa fa-check"></i>Siswa Berhasil dihapus</div>');
                redirect(site_url('manager/DataSiswa/index'));
            }
           $data["siswa"]= $this->M_datasiswa->getById($id);
        }
        public function deleteNilai($id = null){
            if (!isset($id)) redirect('');
            
            if ($this->M_datasiswa->deleteNilai($id)) {
                $this->session->set_flashdata('delete', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><i class="icon fa fa-check"></i>Nilai Berhasil dihapus</div>');
                $url= $this->session->userdata('URL');
                redirect($url);
            }
           $data["siswa"]= $this->M_datasiswa->getById($id);
        }
    }
?>