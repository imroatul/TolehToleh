<?php
session_start();
class Superadmin extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if ($this->session->userdata('namaAdmin')=="") {
			redirect('main');
		}
		$this->load->helper('text');
	}
	public function index()
	{
		$data['namaAdmin'] = $this->session->userdata('namaAdmin');
		$this->load->view('Superadmin/Main/header');
      	$this->load->view('Superadmin/Main/home');
		$this->load->view('Superadmin/index');
    	$this->load->view('Superadmin/Main/footer');
	}
	/*--------------TAMBAH ADMIN--------------------*/
	function data_superadmin()
		{
      $this->load->view('Superadmin/Main/header');
      $this->load->view('Superadmin/Main/home');

      $data['admin'] = $this->superadmin_model->tampil_data()->result();
      $this->load->view('Superadmin/superadmin/data_superadmin',$data);

	  $this->load->view('Superadmin/Main/footer');
    }
	
    function tambah_superadmin()
		{
		$idAdmin = $this->input->post('idAdmin');
		$namaAdmin = $this->input->post('namaAdmin');
		$passwordAdmin = $this->input->post('passwordAdmin');
		$level = $this->input->post('level');
    	$emailAdmin = $this->input->post('emailAdmin');
    	$jkAdmin = $this->input->post('jkAdmin');
		$alamatAdmin = $this->input->post('alamatAdmin');
		$telpAdmin = $this->input->post('telpAdmin');

			$data = array(
				'idAdmin' => $idAdmin,
     			'namaAdmin' => $namaAdmin,
				'passwordAdmin' => $passwordAdmin,
      			'level' => $level,
      			'emailAdmin' => $emailAdmin,
				'jkAdmin' => $jkAdmin,
				'alamatAdmin' => $alamatAdmin,
				'telpAdmin' => $telpAdmin
			);
			$this->superadmin_model->input_data('admin',$data);
			redirect('http://localhost/TolahToleh/index.php/Superadmin/superadmin/data_admin');
		}

    function hapus($idAdmin){
        $where = array('idAdmin' => $idAdmin);
        $this->superadmin_model->hapus_data('admin',$where);
        redirect('http://localhost/TolahToleh/index.php/Superadmin/superadmin/data_superadmin');
    }

	function edit($idAdmin){
		$where = array('idAdmin' => $idAdmin);
		$data['barang'] = $this->superadmin_model->edit_data($where,'admin')->result();
		$this->load->view('Superadmin/Main/header');
		$this->load->view('Superadmin/Main/home');
		$this->load->view('Superadmin/Main/footer');
		$this->load->view('Superadmin/Admin/edit_admin',$data);
	}
	
	function update(){
		$idAdmin = $this->input->post('idAdmin');
		$namaAdmin = $this->input->post('namaAdmin');
		$passwordAdmin = $this->input->post('passwordAdmin');
		$level = $this->input->post('level');
    	$emailAdmin = $this->input->post('emailAdmin');
    	$jkAdmin = $this->input->post('jkAdmin');
		$alamatAdmin = $this->input->post('alamatAdmin');
		$telpAdmin = $this->input->post('telpAdmin');
	 
		$data = array(
				'idAdmin' => $idAdmin,
     			'namaAdmin' => $namaAdmin,
				'passwordAdmin' => $passwordAdmin,
      			'level' => $level,
      			'emailAdmin' => $emailAdmin,
				'jkAdmin' => $jkAdmin,
				'alamatAdmin' => $alamatAdmin,
				'telpAdmin' => $telpAdmin
			);
	 
		$where = array(
			'idAdmin' => $idAdmin
		);
	 
		$this->superadmin_model->update_data($where,$data,'admin');
		redirect('http://localhost/TolahToleh/index.php/Superadmin/superadmin/data_superadmin');
	}
	
	function cari_admin()
    {
        $keyword = $this->input->post('keyword');
        $data['results'] = $this->superadmin_model->search_admin($keyword);
        $this->load->view('Superadmin/superadmin/cari_superadmin',$data);
    }
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
}
?>
