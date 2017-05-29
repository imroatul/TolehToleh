<?php
session_start();
class Juragan extends CI_Controller {

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
		$this->load->view('Juragan/Main/header');
      	$this->load->view('Juragan/Main/home');
		$this->load->view('Juragan/index');
    	$this->load->view('Juragan/Main/footer');
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
			$this->barang->input_data('barang',$data);
			redirect('http://localhost/TolahToleh/index.php/Juragan/juragan/data_barang');
		}

    function hapus($idBarang){
        $where = array('idBarang' => $idBarang);
        $this->barang->hapus_data('barang',$where);
        redirect('http://localhost/TolahToleh/index.php/Juragan/juragan/data_barang');
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
		redirect('http://localhost/TolahToleh/index.php/Juragan/juragan/data_barang');
	}
	
	function cari_barang()
    {
        $keyword = $this->input->post('keyword');
        $data['results'] = $this->barang->search_barang($keyword);
        $this->load->view('Juragan/Barang/cari_barang',$data);
    }
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
}
?>