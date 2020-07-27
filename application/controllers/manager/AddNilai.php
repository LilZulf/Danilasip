<?php 

class AddNilai extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('manager/m_dataguru');
		$this->load->helper(array('form', 'url'));
		$this->menu = $this->load->view('manager/template_admin/section_menu', null, true);
		$this->load->library('session');
        if ($this->session->userdata('masuk') != true) {
            redirect('/login');
        }
	}

	function index(){
		
		$data["mapel"]= $this->m_dataguru->get_mapel_not();
		$main_content['conten'] = $this->load->view('manager/content_admin/datasiswa/v_addnilai', $data,true);
		$main_content['section_menu'] = $this->menu;
		$main_content['page'] = 'artikel';
		$this->load->view('manager/template_admin/header_footer', $main_content);
		//$this->load->view('Manager/content_admin/arsip/v_create', array('error' => ' ', 'file_name' => ' '));
	}

}

?>