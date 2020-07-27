<?php

class m_arsipsaya extends CI_Model{
    private $_table = "tb_arsip";
    
    public $ID;
    public $NAMA_ARSIP;
    public $TANGGAL_MASUK;
    public $FILE;
    public $is_delete;

    public function jumlah_data(){        
        $this->db->where("tb_arsip.is_delete = 0");
        return $this->db->get("tb_arsip")->num_rows();
    }

    public function jumlah_dataLimit(){        
        $this->db->where("tb_arsip.is_delete = 0 AND tb_arsip.id_user =".$this->session->userdata('ID'));
        return $this->db->get("tb_arsip")->num_rows();;
    }  

    public function getAll($limit, $start){
        $this->db->select(" 
        $this->_table.ID,
        $this->_table.NAMA_ARSIP,
        $this->_table.TANGGAL_MASUK,
        $this->_table.FILE");

        $this->db->where("tb_arsip.is_delete = 0 AND tb_arsip.id_user = ".$this->session->userdata('ID'));
        $this->db->order_by("$this->_table.ID DESC");
        $this->db->group_by("$this->_table.ID");

        $query = $this->db->get($this->_table, $limit, $start)->result_array();
        return $query;
    }
    public function getAll_(){
        $this->db->select(" 
        $this->_table.ID,
        $this->_table.NAMA_ARSIP,
        $this->_table.TANGGAL_MASUK,
        $this->_table.FILE,
        $this->_table.DESKRIPSI
        ");

        $this->db->where("tb_arsip.is_delete = 0 AND tb_arsip.id_user = ".$this->session->userdata('ID'));
        $this->db->order_by("$this->_table.ID DESC");
        $this->db->group_by("$this->_table.ID");

        $query = $this->db->get($this->_table)->result_array();
        return $query;
    }

    public function uploadArsip($data) {
        return $this->db->insert('tb_arsip', $data);
    }

    public function data($limit,$start){
        $this->db->where("tb_arsip.is_delete = 0 AND tb_arsip.id_user =".$this->session->userdata('ID'));
        return $this->db->get('tb_arsip',$limit,$start)->result();
    }

    public function download($id){
        $query = $this->db->get_where('tb_arsip',array('ID'=>$id));
        return $query->row_array();
    }

    public function getRead($id){
        $query = $this->db->get_where('tb_arsip',array('ID'=>$id));
        return $query->result_array();
    }
    public function delete($id){
        $q="UPDATE tb_arsip SET tb_arsip.is_delete = 1 WHERE ID = $id";
        $query=$this->db->query($q);
        return $query;
    }

}