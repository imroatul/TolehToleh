<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {
    
	public function index()
	{
		$this->load->view('login');
	}

	public function cek_login()
	{
		$data = array('namaAdmin' => $this->input->post('namaAdmin') , 
					  'passwordAdmin' => $this->input->post('passwordAdmin')
					  );
		$hasil = $this->login->cek_user($data);
		if ($hasil->num_rows() == 1){
			foreach($hasil->result() as $sess)
            {
              $sess_data['logged_in'] = 'Sudah Login';
              $sess_data['namaAdmin'] = $sess->namaAdmin;
              $sess_data['level'] = $sess->level;
              $this->session->set_userdata($sess_data);
            }
			if ($this->session->userdata('level')=='Superadmin'){
				redirect('Admin/admin');
			}
			elseif ($this->session->userdata('level')=='Admin'){
				redirect('Juragan/juragan');
			}
		}
		else
		{
			echo " <script>alert('Gagal Login: Cek username , password!');history.go(-1);</script>";
		}
		
	}

	public function logout() {
		$this->session->unset_userdata('namaAdmin');
		$this->session->unset_userdata('level');
		session_destroy();
		redirect('main');
	} 
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
?>