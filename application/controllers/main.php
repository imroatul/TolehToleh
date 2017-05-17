<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class main extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

    public function __construct()
		{
			parent::__construct();
			$this->load->model('barang_model');
			$this->load->helper('url');
		}

		public function index()
		{
			$this->load->view('Main/header');
			$this->load->view('Main/home');
			$this->load->view('Main/footer');
		}

    function tampil_barang()
		{
        $this->load->view('Main/header');
        $this->load->view('Main/home');
				
        $data['barang'] = $this->barang_model->tampil_data()->result();
        $this->load->view('barang_form_view',$data);
		$this->load->view('Main/footer');
    }

    function tambah(){
		$this->load->view('barang_form_input');
	}
    function tambah_aksi(){
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
