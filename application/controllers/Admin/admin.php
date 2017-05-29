<?php
session_start();
class Admin extends CI_Controller {
	
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
		$this->load->view('Admin/Main/header');
      	$this->load->view('Admin/Main/home');
		$this->load->view('Admin/index');
    	$this->load->view('Admin/Main/footer');
	}
	
	/*--------------TAMBAH ADMIN--------------------*/
	function data_admin()
		{
      $this->load->view('Admin/Main/header');
      $this->load->view('Admin/Main/home');

      $data['admin'] = $this->admin_model->tampil_data()->result();
      $this->load->view('Admin/Admin/data_admin',$data);

	  $this->load->view('Admin/Main/footer');
    }
	
    function tambah_admin()
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
			$this->admin_model->input_data('admin',$data);
			redirect('http://localhost/TolahToleh/index.php/Admin/admin/data_admin');
		}

    function hapus($idAdmin){
        $where = array('idAdmin' => $idAdmin);
        $this->admin_model->hapus_data('admin',$where);
        redirect('http://localhost/TolahToleh/index.php/Admin/admin/data_admin');
    }

	function edit($idAdmin){
		$where = array('idAdmin' => $idAdmin);
		$data['baradminang'] = $this->admin_model->edit_data($where,'admin')->result();
		$this->load->view('Admin/Main/header');
		$this->load->view('Admin/Main/home');
		$this->load->view('Admin/Main/footer');
		$this->load->view('Admin/Admin/edit_admin',$data);
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
	 
		$this->admin_model->update_data($where,$data,'admin');
		redirect('http://localhost/TolahToleh/index.php/Admin/admin/data_admin');
	}
	
	function cari_admin()
    {
        $keyword = $this->input->post('keyword');
        $data['results'] = $this->admin_model->search_admin($keyword);
        $this->load->view('Admin/Admin/cari_admin',$data);
    }
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
}
?>