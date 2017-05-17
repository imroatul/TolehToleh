<?php /**
 *
 */
class login extends CI_Controller
{
  function __construct()
  {
    parent:: __construct();
  }

  function index()
  {
    if($this -> session -> userdata('logged_in'))
    {
      $session_data = $this -> session -> userdata('logged_in');
      $data['emailAdmin'] = $session_data['emailAdmin'];
      $this->load->view('Main/header');
  		$this->load->view('Main/home');
  		$this->load->view('Main/footer');
    }
    else
    {
      redirect('login/login_index', 'refresh');
    }
  }

  function login_index()
  {
    if($this -> session -> userdata('logged_in'))
    {
      redirect('login', 'refresh');
    }
    else
    {
      $this -> load -> helper(array('form'));
      $this -> load -> view('login_view');
    }

   function logout()
   {
     $this -> session -> unset_userdata('logged_in');
     session_destroy();
     redirect('login/login_index', 'refresh');
   }
 }
 }
?>
