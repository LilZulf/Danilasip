<?php

class m_dataguru extends CI_Model{
    private $_table = "tb_user";
    
    public $NIP;
    public $NAMA_GURU;
    public $USERNAME;
    public $KODE_MAPEL;
    public $gambar;
    public $LEVEL;
    public $is_delete;

    public function jumlah_data(){        
        $this->db->where("tb_user.is_delete = 0");
        return $this->db->get("tb_user")->num_rows();
    }

    public function getAll(){
        $this->db->select(" 
        $this->_table.NIP,
        $this->_table.NAMA_GURU,
        $this->_table.USERNAME,
        $this->_table.KODE_MAPEL,
        $this->_table.gambar,
        tb_mapel.NAMA_MAPEL");

        $this->db->join('tb_mapel', "$this->_table.KODE_MAPEL = tb_mapel.KODE_MAPEL AND tb_mapel.is_delete = 0", 'LEFT OUTER');
        $this->db->where("tb_user.is_delete = 0");

        $query = $this->db->get($this->_table)->result_array();
        return $query;
    }

    public function uploadSiswa($data) {
        return $this->db->insert('tb_user', $data);
    }

    public function delete($id){
        $q="UPDATE tb_user SET tb_user.is_delete = '1' WHERE NIP = $id";
        $query=$this->db->query($q);
        return $query;
    }

    public function getById($id){
        $this->db->select(" 
        $this->_table.NIP,
        $this->_table.NAMA_SISWA,
        $this->_table.JK,
        $this->_table.ALAMAT,
        $this->_table.TGL_LAHIR,
        tb_kelas.NAMA_KELAS");

        $this->db->join('tb_kelas', "$this->_table.KODE_KELAS = tb_kelas.KODE_KELAS AND tb_kelas.is_delete = 0", 'LEFT OUTER');
        return $this->db->get_where($this->_table, ["tb_user.NIP" => $id])->row();
    }

    public function addGuru($file_name){
        if(!empty($file_name)){
            $this->gambar = $file_name;
        }else{
            unset($this->gambar);
        }

        $this->NIP = $this->input->post('nip'); 
        $this->NAMA_GURU = $this->input->post('namaGuru');
        $this->USERNAME = $this->input->post('namaGuru');
        $this->PASSWORD = $this->input->post('password');
        $this->KODE_MAPEL = $this->input->post('mapel');
        $this->updated_at = date("y-m-d H:i:s");
        $this->LEVEL = '1';
        $this->is_delete = '0';

        $this->db->insert('tb_user', $this);
    }

    public function get_mapel(){
        $this->db->select('*');
        $this->db->from('tb_mapel');
        $this->db->where('tb_mapel.is_delete = 0');
        $query = $this->db->get();
        return $query->result();
    }
    public function get_mapel_not($id,$sms){
        $query = $this->db->query("SELECT * FROM `tb_mapel` WHERE KODE_MAPEL NOT IN (SELECT KODE_MAPEL FROM tb_nilai WHERE tb_nilai.NIS = '$id' AND tb_nilai.SEMESTER = '$sms' AND tb_nilai.is_delete = 0) 
        AND tb_mapel.is_delete = 0 AND tb_mapel.KODE_MAPEL != 'p0'");
        return $query;
    }

    public function register($file_name){
        if(!empty($file_name)){
            $this->gambar = $file_name;
        }else{
            unset($this->gambar);
        }

        $this->email = $this->input->post('email'); 
        $this->nama = $this->input->post('nama');
        $this->password = $this->input->post('password'); 
        $this->created_at = date("y-m-d H:i:s");
        $this->updated_at = date("y-m-d H:i:s");
        $this->is_delete = '0';
        $this->level = '1';

        $this->db->insert('tb_user', $this);
    }

}