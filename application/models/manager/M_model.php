<?php 

class m_model extends CI_Model{

	function arsipsekolah(){
		$this->db->order_by("tb_arsip.ID DESC");
		return $this->db->get_where('tb_arsip',array('is_delete'=>0));
	}

	function addarsip($data){
		return $this->db->insert('tb_arsip',$data);
	}
	public function getRead($id){
        $query = $this->db->get_where('tb_arsip',array('ID'=>$id));
        return $query->result_array();
    }
}

?>