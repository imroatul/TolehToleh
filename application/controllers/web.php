<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Web extends CI_Controller
{
	public function index()
	{
		$this->load->view('Web/header');
		$this->load->view('Web/iklan');
		$this->load->view('Web/makanan');
		$this->load->view('Web/minuman');
		$this->load->view('Web/footer');
	}

	public function login()
	{
		$this->load->view('Web/header');
		$this->load->view('Web/login');
		$this->load->view('Web/footer');
	}

	public function register()
	{
		$this->load->view('Web/header');
		$this->load->view('Web/register');
		$this->load->view('Web/footer');
	}

	public function logout()
	{

	}
}
?>
<!--?php echo base_url();?>includes/web/-->
