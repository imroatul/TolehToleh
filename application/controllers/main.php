<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class main extends CI_Controller {
    public function __construct()
		{
			parent::__construct();
			$this->load->model('barang');
			$this->load->helper('url');
		}

		public function index()
		{
			$this->load->view('Juragan/Main/header');
			$this->load->view('Juragan/Main/home');
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

    function tambah_barang()
		{
			$this->load->view('Juragan/Barang/barang_form_input');
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
        redirect('http://localhost/TolahToleh/main/index');
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
