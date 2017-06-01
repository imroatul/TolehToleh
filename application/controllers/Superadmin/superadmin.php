<?php
session_start();
class Superadmin extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if ($this->session->userdata('namaAdmin')=="") {
			redirect('main');
		}
		$this->load->helper('text');
	}
	public function index()
	{
		$data['namaAdmin'] = $this->session->userdata('namaAdmin');
		$this->load->view('Superadmin/Main/header');
      	$this->load->view('Superadmin/Main/home');
		$this->load->view('Superadmin/index');
    	$this->load->view('Superadmin/Main/footer');
	}
	/*--------------TAMBAH ADMIN--------------------*/
	function data_superadmin(){
	  $this->load->view('Superadmin/Main/header');
      $this->load->view('Superadmin/Main/home');

      $data['admin'] = $this->superadmin_model->tampil_data();
      $this->load->view('Superadmin/superadmin/data_superadmin',$data);

	  $this->load->view('Superadmin/Main/footer');    }
	
    function tambah_superadmin()
		{
		$idAdmin = $this->input->post('idAdmin');
		$namaAdmin = $this->input->post('namaAdmin');
		$passwordAdmin = $this->input->post('passwordAdmin');
		$level = $this->input->post('level');
    	$emailAdmin = $this->input->post('emailAdmin');
    	$jkAdmin = $this->input->post('jkAdmin');
		$alamatAdmin = $this->input->post('alamatAdmin');
		$telpAdmin = $this->input->post('telpAdmin');

			$data = array(
				'idAdmin' => $idAdmin,
     			'namaAdmin' => $namaAdmin,
				'passwordAdmin' => $passwordAdmin,
      			'level' => $level,
      			'emailAdmin' => $emailAdmin,
				'jkAdmin' => $jkAdmin,
				'alamatAdmin' => $alamatAdmin,
				'telpAdmin' => $telpAdmin
			);
			$this->superadmin_model->input_data('admin',$data);
			redirect('http://localhost/TolahToleh/index.php/Superadmin/superadmin/data_superadmin');
		}

    function hapus_superadmin($idAdmin){
        $where = array('idAdmin' => $idAdmin);
        $this->superadmin_model->hapus_data('admin',$where);
        redirect('http://localhost/TolahToleh/index.php/Superadmin/superadmin/data_superadmin');
    }

	function edit_superadmin($idAdmin){
		$where = array('idAdmin' => $idAdmin);
		$data['admin'] = $this->superadmin_model->edit_data($where,'admin')->result();
		$this->load->view('Superadmin/Main/header');
		$this->load->view('Superadmin/Main/home');
		$this->load->view('Superadmin/Main/footer');
		$this->load->view('Superadmin/superadmin/edit_superadmin',$data);

	}
	
	function update_superadmin(){
		$idAdmin = $this->input->post('idAdmin');
		$namaAdmin = $this->input->post('namaAdmin');
		$passwordAdmin = $this->input->post('passwordAdmin');
		$level = $this->input->post('level');
    	$emailAdmin = $this->input->post('emailAdmin');
    	$jkAdmin = $this->input->post('jkAdmin');
		$alamatAdmin = $this->input->post('alamatAdmin');
		$telpAdmin = $this->input->post('telpAdmin');
	 
		$data = array(
				'idAdmin' => $idAdmin,
     			'namaAdmin' => $namaAdmin,
				'passwordAdmin' => $passwordAdmin,
      			'level' => $level,
      			'emailAdmin' => $emailAdmin,
				'jkAdmin' => $jkAdmin,
				'alamatAdmin' => $alamatAdmin,
				'telpAdmin' => $telpAdmin
			);
	 
		$where = array(
			'idAdmin' => $idAdmin
		);
	 
		$this->superadmin_model->update_data($where,$data,'admin');
		redirect('http://localhost/TolahToleh/index.php/Superadmin/superadmin/data_superadmin');
	}
	public function excel_admin(){
 
        $data['title'] = 'Cetak Excel Barang'; //judul title
        $data['admin'] = $this->superadmin_model->tampil_data(); //query model semua barang
        $this->load->view('Superadmin/superadmin/print_admin', $data);
    }
	/*----------------BARANG-------------------------------------------------------------*/
	function profil_superadmin(){
      $this->load->view('Superadmin/Main/header');
      $this->load->view('Superadmin/Main/home');

//    $data['toko'] = $this->profil->tampil_toko()->result();
      $this->load->view('Superadmin/Profil/profil_toko');

      $this->load->view('Superadmin/Main/footer');
    }

    function data_makanan(){
      $this->load->view('Superadmin/Main/header');
      $this->load->view('Superadmin/Main/home');

      $data['barang'] = $this->barang->tampil_data();
      $this->load->view('Superadmin/Barang/data_makanan',$data);

	  $this->load->view('Superadmin/Main/footer');
    }
	
	function data_minuman()
		{
      $this->load->view('Superadmin/Main/header');
      $this->load->view('Superadmin/Main/home');

      $data['barang'] = $this->barang->tampil_data1();
      $this->load->view('Superadmin/Barang/data_minuman',$data);

	  $this->load->view('Superadmin/Main/footer');
    }
	
    function tambah_barang(){
		$idBarang = $this->input->post('idBarang');
		$fotoBarang = $this->input->post('fotoBarang');
		$deskripsi = $this->input->post('deskripsi');
		$namaBarang = $this->input->post('namaBarang');
    	$kategoriBarang = $this->input->post('kategoriBarang');
    	$hargaBarang = $this->input->post('hargaBarang');
		$stokBarang = $this->input->post('stokBarang');

			$data = array(
				'idBarang' => $idBarang,
     			'fotoBarang' => $fotoBarang,
				'deskripsi' => $deskripsi,
      			'namaBarang' => $namaBarang,
      			'kategoriBarang' => $kategoriBarang,
				'hargaBarang' => $hargaBarang,
				'stokBarang' => $stokBarang
			);
			$this->barang->input_data('barang',$data);
			redirect('http://localhost/TolahToleh/index.php/Superadmin/superadmin/index');
	}
    function hapus_barang($idBarang){
        $where = array('idBarang' => $idBarang);
        $this->barang->hapus_data('barang',$where);
        redirect('http://localhost/TolahToleh/index.php/Superadmin/superadmin/index');
    }

	function edit_barang($idBarang){
		$where = array('idBarang' => $idBarang);
		$data['barang'] = $this->barang->edit_data($where,'barang')->result();
		$this->load->view('Superadmin/Main/header');
		$this->load->view('Superadmin/Main/home');
		$this->load->view('Superadmin/Main/footer');
		$this->load->view('Superadmin/Barang/edit_barang',$data);
	}
	
	function update_barang(){
		$idBarang = $this->input->post('idBarang');
		$fotoBarang = $this->input->post('fotoBarang');
		$deskripsi = $this->input->post('deskripsi');
		$namaBarang = $this->input->post('namaBarang');
		$kategoriBarang = $this->input->post('kategoriBarang');
		$hargaBarang = $this->input->post('hargaBarang');
		$stokBarang = $this->input->post('stokBarang');
	 
		$data = array(
			'fotoBarang' => $fotoBarang,
			'deskripsi' => $deskripsi,
			'namaBarang' => $namaBarang,
			'kategoriBarang' => $kategoriBarang,
			'hargaBarang' => $hargaBarang,
			'stokBarang' => $stokBarang
		);
	 
		$where = array(
			'idBarang' => $idBarang
		);
	 
		$this->barang->update_data($where,$data,'barang');
		redirect('http://localhost/TolahToleh/index.php/Superadmin/superadmin/index');
	}
	
	function cari_barang1()
    {
        $keyword = $this->input->post('keyword');
        $data['results'] = $this->barang->search_barang($keyword);
        $this->load->view('Superadmin/Barang/cari_barang',$data);
    }
	public function excel_barang_makanan(){
 
        $data['title'] = 'Cetak Excel Makanan'; //judul title
        $data['barang'] = $this->barang->tampil_data(); //query model semua barang
        $this->load->view('print_barang', $data);
    }
	public function excel_barang_minuman(){
 
        $data['title'] = 'Cetak Excel Minuman'; //judul title
        $data['barang'] = $this->barang->tampil_data1(); //query model semua barang
        $this->load->view('print_barang', $data);
    }
	
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
}
?>
