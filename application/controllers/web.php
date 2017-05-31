<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Web extends CI_Controller
{
	public function index()
	{
		$this->load->view('Web/header');
		$this->load->view('Web/makanan');
		$this->load->view('Web/minuman');
		$this->load->view('Web/footer');
	}
}
?>
