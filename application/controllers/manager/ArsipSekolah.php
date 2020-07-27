<?php 

class ArsipSekolah extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('manager/M_model');
		$this->load->helper('download');
		$this->load->library('session');
		$this->menu = $this->load->view('manager/template_admin/section_menu', null, true);
		if ($this->session->userdata('masuk') != true) {
			redirect('/login');
		}
	}

	public function index(){
		$data['arsipsekolah'] = $this->M_model->arsipsekolah()->result_array();
		$data['level'] = $this->session->userdata('LEVEL');
		$main_content['conten'] = $this->load->view('manager/content_admin/arsip/v_arsipsekolah',  $data, true);
        $main_content['section_menu'] = $this->menu;
        $main_content['page'] = 'artikel';
        
        $this->load->view('manager/template_admin/header_footer', $main_content);
	}

	// function view(){
	// 	$fname = $this->uri->segment(3);
	// 	$tofile = realpath("asset/arsip/".$fname);
	// 	header('Content-Type: application/pdf');
	// 	readfile($tofile);
	// }

	public function download($download){
		force_download('arsip/'.$download,NULL);
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
            $this->load->model('M_model');
            $data['data'] = $this->M_model->getRead($id);
            $data['datafix'] = $data['data'];
            $this->load->view('manager/content_admin/arsip/v_read',$data);
        }

}

?>