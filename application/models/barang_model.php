<?php
class barang_model extends CI_Model{
	function tampil_data(){
        return $this->db->get('barang');
    }
    
    function input_data($table,$data){
        $this->db->insert($table,$data);
    }
    function update_data(){
		return $this->db->get('barang');
	}
    function hapus_data($table,$where){
	   $this->db->where($where);
	   $this->db->delete($table);
    }
}
?>