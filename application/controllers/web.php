<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Web extends CI_Controller
{
	public function index()
	{
		$this->load->view('Web/header');
		$this->load->view('Web/home');
		$this->load->view('Web/footer');
	}
}
?>
