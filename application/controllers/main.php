<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller
{
	public function web()
	{
		$this->load->view('Web/web');
	}

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
			if ($this->session->userdata('level')=='Admin'){
				redirect('Admin/admin');
			}
			elseif ($this->session->userdata('level')=='Superadmin'){
				redirect('Superadmin/superadmin');
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
    function profil_toko()
    {
      $this->load->view('Juragan/Main/header');
      $this->load->view('Juragan/Main/home');

//      $data['toko'] = $this->profil->tampil_toko()->result();
      $this->load->view('Juragan/Profil/profil_toko');

      $this->load->view('Juragan/Main/footer');
    }

    function data_barang()
		{
      $this->load->view('Juragan/Main/header');
      $this->load->view('Juragan/Main/home');

      $data['barang'] = $this->barang->tampil_data()->result();
      $this->load->view('Juragan/Barang/data_barang',$data);

	  $this->load->view('Juragan/Main/footer');
    }

    function tambah_aksi()
		{
		$idBarang = $this->input->post('idBarang');
		$fotoBarang = $this->input->post('fotoBarang');
		$namaBarang = $this->input->post('namaBarang');
		$kategoriBarang = $this->input->post('kategoriBarang');
    	$hargaBarang = $this->input->post('hargaBarang');
    	$stokBarang = $this->input->post('stokBarang');

			$data = array(
				'idBarang' => $idBarang,
     			'fotoBarang' => $fotoBarang,
				'namaBarang' => $namaBarang,
      			'kategoriBarang' => $kategoriBarang,
      			'hargaBarang' => $hargaBarang,
				'stokBarang' => $stokBarang
			);
			$this->barang_model->input_data('barang',$data);
			redirect('http://localhost/TolahToleh/main/index');
		}

    function hapus($idBarang){
        $where = array('idBarang' => $idBarang);
        $this->barang_model->hapus_data('barang',$where);
        redirect('http://localhost/TolahToleh/index.php/main/data_barang');
    }

	function edit($idBarang){
		$where = array('idBarang' => $idBarang);
		$data['barang'] = $this->barang->edit_data($where,'barang')->result();
		$this->load->view('Juragan/Main/header');
		$this->load->view('Juragan/Main/home');
		$this->load->view('Juragan/Main/footer');
		$this->load->view('Juragan/Barang/edit_barang',$data);
	}

	function update(){
		$idBarang = $this->input->post('idBarang');
		$namaBarang = $this->input->post('namaBarang');
		$kategoriBarang = $this->input->post('kategoriBarang');
		$hargaBarang = $this->input->post('hargaBarang');
		$stokBarang = $this->input->post('stokBarang');

		$data = array(
			'namaBarang' => $namaBarang,
			'kategoriBarang' => $kategoriBarang,
			'hargaBarang' => $hargaBarang,
			'stokBarang' => $stokBarang
		);

		$where = array(
			'idBarang' => $idBarang
		);

		$this->barang->update_data($where,$data,'barang');
		redirect('http://localhost/TolahToleh/index.php/main/data_barang');
	}

	function cari_barang()
    {
        $keyword = $this->input->post('keyword');
        $data['results'] = $this->barang->search_barang($keyword);
        $this->load->view('Juragan/Barang/cari_barang',$data);
    }

    function transaksi_baru()
    {
      $this->load->view('Juragan/Main/header');
      $this->load->view('Juragan/Main/home');

//      $data['toko'] = $this->profil->tampil_toko()->result();
      $this->load->view('Juragan/Transaksi/transaksi_baru');

      $this->load->view('Juragan/Main/footer');
    }

    function transaksi_selesai()
    {
      $this->load->view('Juragan/Main/header');
      $this->load->view('Juragan/Main/home');

//      $data['toko'] = $this->profil->tampil_toko()->result();
      $this->load->view('Juragan/Transaksi/transaksi_sukses');

      $this->load->view('Juragan/Main/footer');
    }

	}


/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
?>
