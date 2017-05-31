<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function index(){
	{
		$this->data['hasil'] = $this->modelku->getAdmin('admin');
		$this->load->view('welcome_message', $this->data);
	}
}
}