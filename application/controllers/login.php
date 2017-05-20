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
    $this->load->model('login');
  }

  function index()
  {
    /*if($this->session->userdata('emailAdmin'))
    {
      redirect('login/sukses');
    }
    else
    {*/
      $this->load->view('Login/login');
  //  }
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
      $this->load->view('Juragan/Main/header');
			$this->load->view('Juragan/Main/home');
			$this->load->view('Juragan/Main/footer');
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
