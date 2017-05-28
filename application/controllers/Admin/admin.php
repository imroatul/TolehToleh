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

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
}
?>