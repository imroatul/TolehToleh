<?php /**
 *
 */
class login extends CI_Controller
{
  function __construct()
  {
    parent:: __construct();
    $this->load->helper('url');
    $this->load->library('session');
    $this->load->database();
    $this->load->model('m_login');
  }

  function index()
  {
    if($this->session->userdata('emailAdmin'))
    {
      redirect('login/sukses');
    }
    else
    {
      $this->load->view('login_view');
    }
  }

  function proses()
  {
    $emailAdmin = $this->input->post('emailAdmin');
    $passwordAdmin = $this->input->post('passwordAdmin');

    $data_cek = $this->login_model->cek_login($emailAdmin, $passwordAdmin);
    $hasil_cek = $data_cek->num_rows();

    if($hasil_cek == 1)
    {
      $data = array(
        'emailAdmin'=>$this->input->post('emailAdmin'),
        'passwordAdmin'=>$this->input->post('passwordAdmin')
      );
      $this->session->set_userdata($data);
      redirect('login/sukses');
    }
    else
    {
      redirect('login');
    }
  }

  function sukses()
  {
    if($this->session->userdata('emailAdmin'))
    {
      $this->load->view('Main/header');
			$this->load->view('Main/home');
			$this->load->view('Main/footer');
    }
    else
    {
      redirect('login');
    }
  }

  function logout()
  {
    $this->session->sess_destroy();
    redirect('login');
  }
}
 ?>
