<?php

class m_user extends CI_Model{
    public $id_user;
    public $email;
    public $nama;
    public $is_suspend;
    public $level;
    public $created_at;
    public $updated_at;
    public $is_delete;

    function data($number,$offset){
		return $query = $this->db->get('tb_user',$number,$offset)->result();		
	}

    function jumlah_data(){        
        $this->db->where('tb_user.is_delete = 0');
        return $this->db->get("tb_user")->num_rows();;
    }
    
    public function getAll($orderBy, $orderType, $limit, $start){
        $this->db->select("
        tb_user.id_user,
        tb_user.nama,
        tb_user.email,
        tb_user.is_suspend,
        tb_user.gambar,
        tb_user.level,
        tb_user.created_at,
        tb_user.updated_at");
        $this->db->where("tb_user.is_delete = 0");
        $this->db->order_by($orderBy, $orderType);
       return $this->db->get("tb_user", $limit, $start)->result();
    }

    public function getById($id){
        $this->db->select("
        tb_user.id_user,
        tb_user.nama,
        tb_user.email,
        tb_user.gambar,
        tb_user.is_suspend,
        tb_user.level,
        tb_user.created_at,
        tb_user.updated_at ");
        return $this->db->get_where("tb_user", ["id_user" => $id])->row();
    }

    public function edit($id, $file_name){
        unset($this->id_user);       
        $post = $this->input->post();

        if(!empty($file_name)){
            $this->gambar = $file_name;
        }else{
            unset($this->gambar);
        }
        if(!empty($this->input->post('password'))){
            $pengacak = "p3ng4c4k";
            $password1 = MD5($this->input->post('password'));
            $password2 = md5($pengacak . md5($password1));
            $this->password = $password2;
        }else{
            unset($this->password);
        }
        $this->nama = $post["nama"];
        $this->updated_at = date("y-m-d H:i:s");
        unset($this->created_at);
        unset($this->level);
        unset($this->email);

        $this->db->update("tb_user", $this, array('id_user' => $id));
    }

    public function edit_for_admin($id, $data){
        unset($this->id_user);

        $data = array(   
            'level' => $data,
            'updated_at' => date("y-m-d H:i:s"),
            'is_delete' => '0'
        );
        $this->db->update("tb_user", $data, array('id_user' => $id));
    }

    public function delete($id){
        unset($this->id_user);

        $data = array(   
            'level' => '2',
            'updated_at' => date("y-m-d H:i:s"),
            'is_delete' => '1'
        );
        $this->db->update("tb_user", $data, array('id_user' => $id));
    }

    public function suspend($id){
        unset($this->id_user);

        $data = array(   
            'is_suspend' => '1',
            'updated_at' => date("y-m-d H:i:s"),
            'is_delete' => '0'
        );
        $this->db->update("tb_user", $data, array('id_user' => $id));
    }

    public function un_suspend($id){
        unset($this->id_user);

        $data = array(   
            'is_suspend' => '0',
            'updated_at' => date("y-m-d H:i:s"),
            'is_delete' => '0'
        );
        $this->db->update("tb_user", $data, array('id_user' => $id));
    }

    public function upload(){
		$post = $this->input->post();
        $this->nama = $post["nama"];
        $this->email = $post["email"];
        $this->password = $post["password"];
        $this->level = '1';
        $this->created_at = date("y-m-d H:i:s");
        $this->updated_at = date("y-m-d H:i:s");
        $this->is_delete = '0';
		$this->db->insert("tb_user", $this);
    }
    
    public function get_user_keyword($keyword, $limit, $start){
        $this->db->select("
        tb_user.id_user,
        tb_user.nama,
        tb_user.email,
        tb_user.is_suspend,
        tb_user.gambar,
        tb_user.level,
        tb_user.created_at,
        tb_user.updated_at");
        $this->db->where("tb_user.nama LIKE '%$keyword%' AND tb_user.is_delete = 0");
        return $this->db->get("tb_user", $limit, $start)->result();
    }

    public function getjumlah($keyword){
        $this->db->select("
        tb_user.id_user,
        tb_user.nama,
        tb_user.email,
        tb_user.is_suspend,
        tb_user.gambar,
        tb_user.level,
        tb_user.created_at,
        tb_user.updated_at");
        $this->db->where("tb_user.is_delete = 0 AND (id_user LIKE '%$keyword%' OR nama LIKE '%$keyword%')");
        $q = $this->db->get("tb_user")->num_rows();
        return $q;
    }
}

?>