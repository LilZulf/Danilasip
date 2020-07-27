<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ArsipSaya extends CI_Controller {

        function __construct(){

                parent::__construct();

                $this->load->model('manager/M_arsipsaya');
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
            $config['base_url'] = base_url().'manager/ArsipSaya/index'; //site url
            $config['total_rows'] = $this->M_arsipsaya->jumlah_data(); //total row
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
            $data['data'] = $this->M_arsipsaya->getAll_();
            
            $data['pagination'] = $this->pagination->create_links();
            $data['per_page'] = $config['per_page'];
            $data['pesan'] = '';
            $data['pesan_notfounddata'] = '';
            
            // $time_get = strtotime($created_at);
            // echo time_ago($time_get);
            // exit();

            $data['datafix'] = $data['data'];
            $main_content['conten'] = $this->load->view('manager/content_admin/arsip/v_arsip',  $data, true);
            $main_content['section_menu'] = $this->menu;
            $main_content['page'] = 'artikel';
            
            $this->load->view('manager/template_admin/header_footer', $main_content);
        }

        public function create(){
            $config['upload_path'] = './arsip/';
            $config['allowed_types'] = 'docx|pdf|pptx|jpg|jpeg|png|xlsx';
            
            $this->load->library('upload', $config);        
            if($this->upload->do_upload('arsip')){
                $post = $this->input->post();

                $upload_data = $this->upload->data();
                $file_name = 'arsip/'.$upload_data['file_name'];
                $data = array(
                    'NAMA_ARSIP' => $upload_data['file_name'],
                    'TANGGAL_MASUK' => date("y-m-d H:i:s"),
                    'id_user' => $this->session->userdata('ID'),
                    'FILE' => $file_name,
                    'DESKRIPSI' => $_POST["deskripsi"],
                    'is_delete' => 0
                );
                $this->M_arsipsaya->uploadArsip($data);
                echo "berhasil upload";
                $this->session->set_flashdata('create', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><i class="icon fa fa-check"></i>Arsip Berhasil ditambahkan</div>');

                $this->load->library('notification');

                
                redirect(site_url('manager/ArsipSaya/index'));
                
            }else{

            }
            $data = "";
            $main_content['conten'] = $this->load->view('manager/content_admin/arsip/v_create',$data, true);
            $main_content['section_menu'] = $this->menu;
            $main_content['page'] = 'artikel';
            $this->load->view('manager/template_admin/header_footer', $main_content);
        }

        public function read($id)
        {
            // $this->load->model('M_arsipsaya');
            // $data['data'] = $this->M_arsipsaya->getRead($id);
            
            // $data['datafix'] = $data['data'];
            
            // $main_content['conten'] = $this->load->view('manager/content_admin/arsip/v_read', $data, true);
            // $main_content['section_menu'] = $this->menu;
            // $main_content['page'] = 'artikel';
            // $this->load->view('manager/template_admin/header_footer', $main_content);
            $this->load->model('M_arsipsaya');
            $data['data'] = $this->M_arsipsaya->getRead($id);
            $data['datafix'] = $data['data'];
            $this->load->view('manager/content_admin/arsip/v_read',$data);
        }

        public function download($id)
        {
            $this->load->helper('download');
            $fileinfo = $this->M_arsipsaya->download($id);
            $file_name = 'arsip/'.$fileinfo['NAMA_ARSIP'];
            force_download($file_name, null);
        }

        public function delete($id = null){
            if (!isset($id)) redirect('');
            
            echo $id;
            if ($this->M_arsipsaya->delete($id)) {
                //$this->M_arsipsaya->delete_tags($id);
                $this->session->set_flashdata('delete', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><i class="icon fa fa-check"></i>Artikel Berhasil dihapus</div>');
                redirect(site_url('manager/ArsipSaya/index'));
            }
           $data["artikel"]= $this->M_arsipsaya->getById($id);
        }

        public function search(){
            $uri_segment = 4;
            $keyword = $this->input->post('keyword');
            $config['base_url'] = base_url().'manager/Manage_Artikel/index'; //site url
            $config['total_rows'] = $this->M_arsipsaya->getjumlahartikel($keyword); //total row
            $config['per_page'] = 5;  //show record per halaman
            $config["uri_segment"] = $uri_segment;  // uri parameter		
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
            
            $data['pesan']='';
            if($keyword == null){
                redirect('manager/Manage_Artikel/index');
                $data['pesan'] = '';
            }else{
                $data['data'] = $this->M_arsipsaya->get_artikel_keyword($keyword, $config['per_page'], $data['page']);

                $data['datafix'] = $data['data'];
                
                if($data['datafix'] != null){
                    $data['pesan'] = $this->input->post('keyword');
                }else{
                    $data['pesan_notfounddata'] = '<div class="no-article" style="display: grid;
                    align-items: center;
                    justify-content: center;
                    object-position: center;">
                    <h1>Whoops!!!</h1>
                    <p>Data yang dicari tidak ada.</p>
                    </div>'; 
                }
                    
            }
            // var_dump($this->db->last_query());exit;
            $data['pagination'] = $this->pagination->create_links();

            $data['datafix'] = $data['data'];

            $main_content['conten'] = $this->load->view('manager/content_admin/artikel/v_arsip', $data, true);
            $main_content['section_menu'] = $this->menu;
            $main_content['page'] = 'artikel';
            $hasil = $this->load->view('manager/template_admin/header_footer', $main_content);
        }

        function featured($id){
            $this->M_arsipsaya->delete_all_featured();
            $this->M_arsipsaya->featured($id);
            redirect(site_url('manager/Manage_Artikel/index'));
            $data["artikel"]= $this->M_arsipsaya->getById($id);
            if((!$data)["data"]){
                show_404();
            }
        }   

        public function recomended($id = null){
            if (!isset($id)) redirect('');
            $this->M_arsipsaya->recomended($id);
            redirect(site_url('manager/Manage_Artikel/index'));
            $data["artikel"]= $this->M_arsipsaya->getById($id);
        }

        public function not_recomended($id = null){
            if (!isset($id)) redirect('');
            $this->M_arsipsaya->not_recomended($id);
            redirect(site_url('manager/Manage_Artikel/index'));
            $data["artikel"]= $this->M_arsipsaya->getById($id);
        }

        
    }
?>