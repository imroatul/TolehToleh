<?php
session_start();
class Admin extends CI_Controller {

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
		$this->load->view('Admin/Main/header');
      	$this->load->view('Admin/Main/home');
		$this->load->view('Admin/index');
    	$this->load->view('Admin/Main/footer');
	}
	
	
	
	function profil_toko()
    {
      $this->load->view('Admin/Main/header');
      $this->load->view('Admin/Main/home');

//      $data['toko'] = $this->profil->tampil_toko()->result();
      $this->load->view('Admin/Profil/profil_toko');

      $this->load->view('Admin/Main/footer');
    }

    function data_makanan()
		{
      $this->load->view('Admin/Main/header');
      $this->load->view('Admin/Main/home');

      $data['barang'] = $this->barang->tampil_data();
      $this->load->view('Admin/Barang/data_makanan',$data);

	  $this->load->view('Admin/Main/footer');
    }
	
	function data_minuman()
		{
      $this->load->view('Admin/Main/header');
      $this->load->view('Admin/Main/home');

      $data['barang'] = $this->barang->tampil_data1();
      $this->load->view('Admin/Barang/data_minuman',$data);

	  $this->load->view('Admin/Main/footer');
    }
	
    function tambah_aksi(){
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
    function hapus($idBarang){
        $where = array('idBarang' => $idBarang);
        $this->barang->hapus_data('barang',$where);
        redirect('http://localhost/TolahToleh/index.php/Admin/admin/');
    }

	function edit($idBarang){
		$where = array('idBarang' => $idBarang);
		$data['barang'] = $this->barang->edit_data($where,'barang')->result();
		$this->load->view('Admin/Main/header');
		$this->load->view('Admin/Main/home');
		$this->load->view('Admin/Main/footer');
		$this->load->view('Admin/Barang/edit_barang',$data);
	}
	
	function update(){
		$idBarang = $this->input->post('idBarang');
		$fotoBarang = $this->input->post('fotoBarang');
		$deskripsi = $this->input->post('deskripsi');
		$namaBarang = $this->input->post('namaBarang');
		$kategoriBarang = $this->input->post('kategoriBarang');
		$hargaBarang = $this->input->post('hargaBarang');
		$stokBarang = $this->input->post('stokBarang');
	 
		$data = array(
			'namaBarang' => $namaBarang,
			'fotoBarang' => $fotoBarang,
			'deskripsi' => $deskripsi,
			'kategoriBarang' => $kategoriBarang,
			'hargaBarang' => $hargaBarang,
			'stokBarang' => $stokBarang
		);
	 
		$where = array(
			'idBarang' => $idBarang
		);
	 
		$this->barang->update_data($where,$data,'barang');
		redirect('http://localhost/TolahToleh/index.php/Admin/admin/');
	}
	
	function cari_barang()
    {
        $keyword = $this->input->post('keyword');
        $data['results'] = $this->barang->search_barang($keyword);
        $this->load->view('Admin/Barang/cari_barang',$data);
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