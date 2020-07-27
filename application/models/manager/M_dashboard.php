<?php

class m_dashboard extends CI_Model{
    private $_table = "tb_user";
    
    public $ID;
    public $NIP;
    public $NAMA_GURU;
    public $is_delete;
    public $USERNAME;
    public $KODE_MAPEL;
    public $gambar;
    public $updated_at;
    public $LEVEL;

    function jumlah_data(){        
        return $this->db->get("tb_user")->num_rows();
    }

    public function getUser($limit, $start){
        $this->db->select("
        $this->_table.ID,
        $this->_table.NAMA_GURU,
        $this->_table.USERNAME,
        $this->_table.LEVEL,
        $this->_table.updated_at");
        $this->db->where("tb_user.is_delete = 0");
        $this->db->order_by("updated_at DESC");
       return $this->db->get($this->_table, $limit, $start)->result();
    }

    public function count_user(){
        $this->db->select("COUNT(ID) as data");
        $this->db->where("tb_user.is_delete = 0");
        $query = $this->db->get($this->_table); 
        return $query->result();
    }

    
}