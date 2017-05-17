<?php /**
 *
 */
class login_verify extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this -> load -> model('login_model','',TRUE);
  }

  function index()
  {
    //Aksi untuk melakukan validasi
    $this -> load -> library('form_validation');
    $this -> form_validation -> set_rules('emailAdmin', 'Email', 'trim|required|xss_clean');
    $this -> form_validation -> set_rules('passwordAdmin', 'Password', 'trim|required|xss_clean|callback_check_database');

    if($this -> form_validation -> run() == FALSE)
    {
      //Jika validasi gagal user akan diarahkan kembali ke halaman login
      $this -> load -> view('login_view');
    }
    else
    {
      //Jika berhasil user akan di arahkan ke private area
      redirect('login', 'refresh');
    }
  }

  function check_database($passwordAdmin)
  {
    //validasi field terhadap database
    $emailAdmin = $this -> input ->post('emailAdmin');
    //query ke database
    $result = $this -> login_model -> login($emailAdmin, $passwordAdmin);

    if($result)
    {
      $sess_array = array();
      foreach($result as $row)
      {
        $sess_array = array(
          'idAdmin' => $row->idAdmin,
          'emailAdmin' => $row->emailAdmin
        );
        $this -> session -> set_userdata('logged_in', $sess_array);
      }
      return TRUE;
    }
    else
    {
      $this -> form_validation -> set_message('check_database', 'Invalid email or password');
      return false;
    }
  }
}
?>
