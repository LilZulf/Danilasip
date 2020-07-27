<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class dashboard extends CI_Controller {

        function __construct(){

                parent::__construct();

                $this->load->model('manager/m_dashboard');
                $this->load->helper('url');
                $this->load->library('form_validation');
                $this->load->library('pagination');
                $this->menu = $this->load->view('manager/template_admin/section_menu', null, true);
                //session_start();
                $this->load->library('session');
                if ($this->session->userdata('masuk') != true) {
                    redirect('/login');
                }
                // if ($this->session->userdata('LEVEL') != '0'){
                //     redirect('Web/index/');
                // }
        }
        public function index(){
            $uri_segment = 4;
            $config['base_url'] = base_url().'manager/Dashboard/index'; //site url
            $config['total_rows'] = $this->m_dashboard->jumlah_data(); //total row
            $config['per_page'] = 10;  //show record per halaman
            $config["uri_segment"] = $uri_segment;  // uri parameter
            $config["use_page_numbers"] = FALSE;		
            $choice = $config["total_rows"] / $config["per_page"];
            $config["num_links"] = floor($choice);
    
            // Membuat Style pagination untuk BootStrap v4
            $config['first_link']       = 'First';
            $config['last_link']        = 'Last';
            $config['next_link']        = 'Next';
            $config['prev_link']        = 'Prev';
            $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination pagination-sm no-margin pull-right">';
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
            $data['data'] = $this->m_dashboard->getUser($config['per_page'], $data['page']);
            $data['user'] = $this->m_dashboard->count_user();
            
            $data['pagination'] = $this->pagination->create_links();
            $data['per_page'] = $config['per_page'];
            
            $data['datafix'] = $data['data'];

            $main_content['conten'] = $this->load->view('manager/content_admin/v_dashboard',  $data, true);
            $main_content['section_menu'] = $this->menu;
            $main_content['page'] = 'dashboard';
            $this->load->view('manager/template_admin/header_footer', $main_content);
        }
    }
?>