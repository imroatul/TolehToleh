	<?php
class Superadmin_model extends CI_Model{
	function tampil_data(){
        $data = $this->db->query("SELECT * from admin where level='Admin' ");
		return $data->result();
    }
	function tampil_member(){
        $data = $this->db->query("SELECT * from member ");
		return $data->result();
    }
    function input_data($table,$data){
        $this->db->insert($table,$data);
    }
    function hapus_data($table,$where){
	   	$this->db->where($where);
	   	$this->db->delete($table);
    }
	function edit_data($where,$table){		
		return $this->db->get_where($table,$where);
	}
	function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}
}
?>
