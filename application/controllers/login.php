<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
    {
		parent::__construct();
        //load library form validasi
        $this->load->library('session');
        $this->load->library('form_validation');
        //load model admin
		$this->load->model('manager/M_login');
		
    }

	public function index(){
		
		if($this->M_login->logged_id()){
			redirect('manager/dashboard');
		}else{
			$this->check_cookie();
			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			
			$this->form_validation->set_message('required', '<div class="alert alert-danger" style="margin-top: 3px">
				<div class="header"><b><i class="fa fa-exclamation-circle"></i> {field}</b> harus diisi</div></div>');
			if ($this->form_validation->run() == TRUE) {

				$username = $this->input->post("username", TRUE);
				$password = $this->input->post('password');
				
				$checking = $this->M_login->check_login('tb_user', array('username' => $username), array('password' => $password), array('updated_at' => date("y-m-d H:i:s")) );
				if ($checking != FALSE) {
					foreach ($checking as $apps) {
						// var_dump($apps->is_suspend);exit();
						
						$key = random_string('alnum', 64);
						set_cookie('smp_lukman', $key, 3600*24*30); 
					
						$update_data = array(
							'cookie' => $key
						);
						$this->M_login->update($update_data, $apps->ID);
						$this->login($apps);
					}
				}
				else{
					// exit;
					$data['error'] = '<div class="alert alert-danger alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h5><i class="icon fa fa-ban"></i> Username atau password salah !</h5>
					</div>';
					// var_dump($data);
					$this->load->view('manager/template_admin/v_login', $data);
				}

			}
			else{
				$this->load->view('manager/template_admin/v_login');
			}
		}
	}
	
	private function check_cookie(){
		$cookie = get_cookie('smp_lukman');

		if($cookie <> '') {
			// cek cookie
			$row = $this->M_login->get_by_cookie($cookie)->row();
			if ($row) {
				$this->login($row);
				//$this->_daftarkan_session($row);
			}
		}
	}

	public function login($data){
		$session_data = array(	                        
			'ID' => $data->ID,
			'NIP' => $data->NIP,
			'NAMA_GURU' => $data->NAMA_GURU,
			'USERNAME' => $data->USERNAME,
			'PASSWORD' => $data->PASSWORD,
			'KODE_MAPEL' => $data->KODE_MAPEL,
			'gambar' => $data->gambar,							
			'LEVEL'   => $data->LEVEL,
			'masuk'	=> true
		);

		$this->M_login->logged_in($data->ID);
		$this->session->set_userdata($session_data);
		redirect('manager/dashboard/');
		
	}

	public function logout($id){
		//echo $id;
      $this->load->model('manager/M_login');
      $update_data = array(
        'cookie' => ''
      );
      $this->M_login->update($update_data, $id);
      $this->session->unset_userdata('ID');
      delete_cookie('smp_lukman');
      $this->session->sess_destroy();
      redirect(base_url('login/'));
    }


	
}
?>