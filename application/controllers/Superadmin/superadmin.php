<?php
session_start();
class Superadmin extends CI_Controller {

	public function index()
	{
		$this->load->view('Superadmin/Main/header');
    $this->load->view('Superadmin/Main/home');
		$this->load->view('Superadmin/index');
    $this->load->view('Superadmin/Main/footer');
	}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
}
?>
