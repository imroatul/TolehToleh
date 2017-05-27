<?php
session_start();
class Admin extends CI_Controller {
	
	public function index()
	{

		$this->load->view('Juragan/Main/header');
      	$this->load->view('Juragan/Main/home');
		$this->load->view('Admin/index');
    	$this->load->view('Juragan/Main/footer');
	}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
}
?>