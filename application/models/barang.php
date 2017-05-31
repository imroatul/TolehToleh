	<?php
class barang extends CI_Model{
	function tampil_data(){
        $data = $this->db->query("SELECT * from barang where kategoriBarang='Makanan' ");
		return $data->result();
    }
	
	function tampil_data1(){
        $data = $this->db->query("SELECT * from barang where kategoriBarang='Minuman' ");
		return $data->result();
    }

    function input_data($data){
       $this->db->insert($this->tabel, $data);
       return TRUE;
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
	function search_barang($keyword){
        $cari = $this->input->GET('cari', TRUE);
		$data = $this->db->query("SELECT * from barang where namaBarang like '%$cari%' ");
		return $data->result();
    }
}
?>
