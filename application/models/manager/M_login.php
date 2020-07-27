<?php

class m_login extends CI_Model{
    private $_table3 = "tb_user";
    private $_table2 = "tb_art";
    
    public $ID;
    public $NIP;
    public $NAMA_GURU;
    public $USERNAME;
    public $PASSWORD;
    public $LEVEL;
    
    function logged_id(){
        return $this->session->userdata('LEVEL');
    }

    function check_login($_table2, $field2, $field5){
        $this->db->select('*');
        $this->db->from($_table2);
        $this->db->where($field2);
        $this->db->where($field5);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result();
        }
    }

    function logged_in($id){
        unset($this->ID);        
        $post = $this->input->post();
        $data = array(
            'updated_at' => date("y-m-d H:i:s")
        );
        $this->db->update($this->_table3, $data, array('ID' => $id));
    }

    function logout_at($id){
        unset($this->ID);        
        $post = $this->input->post();
        $data = array(
            'cookie' => '',
            'updated_at' => date("y-m-d H:i:s")
        );
        $this->db->update('tb_user', $data, array('ID' => $id));
    }
    
    function get_by_cookie($cookie){
        $this->db->select('*');
        $this->db->from('tb_user');
        $this->db->where('cookie', $cookie);
        return $this->db->get();
    }

    function update($update_data, $id){
        $this->db->update($this->_table3, $update_data, array('ID' => $id));
    }
  }		