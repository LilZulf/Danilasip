<?php 

class AddArsip extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('manager/m_model');
		$this->load->helper(array('form', 'url'));
		$this->menu = $this->load->view('manager/template_admin/section_menu', null, true);
		$this->load->library('session');
        if ($this->session->userdata('masuk') != true) {
            redirect('/login');
        }
	}

	function index(){
		$main_content['conten'] = $this->load->view('manager/content_admin/arsip/v_create_sekolah', "",true);
		$main_content['section_menu'] = $this->menu;
		$main_content['page'] = 'artikel';
		$this->load->view('manager/template_admin/header_footer', $main_content);
		//$this->load->view('Manager/content_admin/arsip/v_create', array('error' => ' ', 'file_name' => ' '));
	}

	function addArsip(){
		$config['upload_path']		= './arsip/';
		$config['allowed_types'] = 'docx|pdf|pptx|jpg|jpeg|png|xlsx|doc|xls';
		$config['max_size']			= 102400;

		$this->load->library('upload', $config);

		if(!$this->upload->do_upload('file')){

			$error = array('error' => $this->upload->display_errors());
			// $this->load->view('Manager/pages/tables/v_addarsip', $error);
			$main_content['conten'] = $this->load->view('manager/content_admin/arsip/v_create', $error);
			$main_content['section_menu'] = $this->menu;
			$main_content['page'] = 'artikel';
			$this->load->view('manager/template_admin/header_footer', $main_content);
		}else{
			$post = $this->input->post();
			$upload_data = $this->upload->data();
			$nama_arsip = $upload_data['file_name'];
			$this->load->helper('date');
			$format = "%Y-%m-%d";
			$tanggal_masuk = @mdate($format);
			$file = "arsip/".$upload_data['file_name'];

			$data = array(
				'NAMA_ARSIP' => $nama_arsip,
                'TANGGAL_MASUK' => date("y-m-d H:i:s"),
                'id_user' => $this->session->userdata('ID'),
				'FILE' => $file,
				'DESKRIPSI' => $_POST["deskripsi"],
                'is_delete' => 0
			);
			$addArsip = $this->m_model->addArsip($data);
			if($addArsip){
				redirect(base_url("Manager/ArsipSekolah/Index"));
			}else{
				echo "Add Arsip Error!";
			}
		}
		
	}
}

?>