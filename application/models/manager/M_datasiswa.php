<?php

class m_datasiswa extends CI_Model{
    private $_table = "tb_siswa";
    
    public $NIS;
    public $NAMA_SISWA;
    public $JK;
    public $KODE_KELAS;
    public $NAMA_KELAS;
    public $ALAMAT;
    public $TGL_LAHIR;
    public $is_delete;

    public function jumlah_data(){        
        $this->db->where("tb_siswa.is_delete = 0");
        return $this->db->get("tb_siswa")->num_rows();
    }

    public function getAll($limit, $start){
        $this->db->select(" 
        $this->_table.NIS,
        $this->_table.NAMA_SISWA,
        $this->_table.JK,
        $this->_table.KODE_KELAS,
        $this->_table.ALAMAT,
        $this->_table.TGL_LAHIR");

        $this->db->where("tb_siswa.is_delete = 0");
        $this->db->order_by("$this->_table.NIS DESC");
        $this->db->group_by("$this->_table.NIS");

        $query = $this->db->get($this->_table, $limit, $start)->result_array();
        return $query;
    }

    public function jumlah_datanilai()
    {
        $this->db->select("
        $this->_table.NIS,
        $this->_table.NAMA_SISWA,
        $this->_table.JK,
        $this->_table.KODE_KELAS,
        $this->_table.ALAMAT,
        $this->_table.TGL_LAHIR,
        tb_kelas.NAMA_KELAS,
        tb_mapel.NAMA_MAPEL,
        tb_nilai.NILAI_UH,
        tb_nilai.NILAI_UTS,
        tb_nilai.NILAI_UAS");

        $this->db->join('tb_nilai', "$this->_table.NIS = tb_nilai.NIS AND tb_nilai.is_delete = 0", 'LEFT OUTER');
        $this->db->join('tb_mapel', "tb_nilai.KODE_MAPEL = tb_mapel.KODE_MAPEL AND tb_mapel.is_delete = 0", 'LEFT OUTER');
        $this->db->join('tb_kelas', "$this->_table.KODE_KELAS = tb_kelas.KODE_KELAS AND tb_kelas.is_delete = 0", 'LEFT OUTER');

        $this->db->where("tb_siswa.is_delete = 0");
        return $this->db->get("tb_siswa")->num_rows();
    }
    public function getDataById($id){
        $this->db->select("
        $this->_table.NIS,
        $this->_table.NAMA_SISWA,
        $this->_table.JK,
        $this->_table.KODE_KELAS,
        $this->_table.ALAMAT,
        $this->_table.TGL_LAHIR,
        ");

        $this->db->where("tb_siswa.is_delete = 0 AND tb_siswa.NIS = $id");

        $query = $this->db->get($this->_table)->result_array();
        return $query;
    }
    public function getNilaiById($id){
        $this->db->select("*");

        $this->db->where("tb_nilai.is_delete = 0 AND tb_nilai.ID = $id");

        $query = $this->db->get("tb_nilai")->result_array();
        return $query;
    }
    public function updateSiswa($id,$data){
		$this->db->where('NIS', $id);
        $this->db->update($this->_table, $data);
        return ($this->db->affected_rows() > 0);
    }
    public function updateNilai($id,$data){
		$this->db->where('ID', $id);
        $this->db->update("tb_nilai", $data);
        return ($this->db->affected_rows() > 0);
	}
    public function getById($id,$sms){
        $this->db->select("
        $this->_table.NIS,
        $this->_table.NAMA_SISWA,
        $this->_table.JK,
        $this->_table.KODE_KELAS,
        $this->_table.ALAMAT,
        $this->_table.TGL_LAHIR,
        tb_kelas.NAMA_KELAS,
        tb_mapel.NAMA_MAPEL,
        tb_nilai.ID,
        tb_nilai.NILAI_UH,
        tb_nilai.NILAI_UTS,
        tb_nilai.NILAI_UAS");

        $this->db->join('tb_nilai', "$this->_table.NIS = tb_nilai.NIS AND tb_nilai.is_delete = 0", 'LEFT OUTER');
        $this->db->join('tb_mapel', "tb_nilai.KODE_MAPEL = tb_mapel.KODE_MAPEL AND tb_mapel.is_delete = 0", 'LEFT OUTER');
        $this->db->join('tb_kelas', "$this->_table.KODE_KELAS = tb_kelas.KODE_KELAS AND tb_kelas.is_delete = 0", 'LEFT OUTER');

        $this->db->where("tb_siswa.NIS = $id AND tb_siswa.is_delete = 0 AND tb_nilai.SEMESTER = $sms");
        return $this->db->get("tb_siswa")->result_array();
        // return $this->db->get_where("tb_siswa", ["NIS" => $id])->result_array();
    }
  

    public function getAllkelas7(){
        $this->db->select(" 
        $this->_table.NIS,
        $this->_table.NAMA_SISWA,
        $this->_table.JK,
        $this->_table.ALAMAT,
        $this->_table.TGL_LAHIR,
        $this->_table.KODE_KELAS,
        tb_kelas.NAMA_KELAS");

        $this->db->join('tb_kelas', "$this->_table.KODE_KELAS = tb_kelas.KODE_KELAS AND tb_kelas.is_delete = 0", 'LEFT OUTER');
        $this->db->where("$this->_table.is_delete = 0 AND $this->_table.KODE_KELAS = 'k7'");
        $this->db->order_by("$this->_table.NAMA_SISWA DESC");
        $this->db->group_by("$this->_table.NAMA_SISWA");

        $query = $this->db->get($this->_table)->result_array();
        return $query;
    }

    public function getAllkelas8(){
        $this->db->select(" 
        $this->_table.NIS,
        $this->_table.NAMA_SISWA,
        $this->_table.JK,
        $this->_table.ALAMAT,
        $this->_table.TGL_LAHIR,
        $this->_table.KODE_KELAS,
        tb_kelas.NAMA_KELAS");

        $this->db->join('tb_kelas', "$this->_table.KODE_KELAS = tb_kelas.KODE_KELAS AND tb_kelas.is_delete = 0", 'LEFT OUTER');
        $this->db->where("$this->_table.is_delete = 0 AND $this->_table.KODE_KELAS = 'k8'");
        $this->db->order_by("$this->_table.NAMA_SISWA DESC");
        $this->db->group_by("$this->_table.NAMA_SISWA");

        $query = $this->db->get($this->_table)->result_array();
        return $query;
    }

    public function getAllkelas9(){
        $this->db->select(" 
        $this->_table.NIS,
        $this->_table.NAMA_SISWA,
        $this->_table.JK,
        $this->_table.ALAMAT,
        $this->_table.TGL_LAHIR,
        $this->_table.KODE_KELAS,
        tb_kelas.NAMA_KELAS");

        $this->db->join('tb_kelas', "$this->_table.KODE_KELAS = tb_kelas.KODE_KELAS AND tb_kelas.is_delete = 0", 'LEFT OUTER');
        $this->db->where("$this->_table.is_delete = 0 AND $this->_table.KODE_KELAS = 'k9'");
        $this->db->order_by("$this->_table.NAMA_SISWA DESC");
        $this->db->group_by("$this->_table.NAMA_SISWA");

        $query = $this->db->get($this->_table)->result_array();
        return $query;
    }

    public function uploadSiswa($data) {
        return $this->db->insert('tb_siswa', $data);
    }

    public function addNilai($data){
        return $this->db->insert('tb_nilai', $data);
    }

    public function delete($id){
        $q="UPDATE tb_siswa SET tb_siswa.is_delete = 1 WHERE NIS = $id";
        $query=$this->db->query($q);
        return $query;
    }
    public function deleteNilai($id){
        $q="UPDATE tb_nilai SET tb_nilai.is_delete = 1 WHERE ID = $id";
        $query=$this->db->query($q);
        return $query;
    }

}