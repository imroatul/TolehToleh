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
		$this->load->library('upload');
        $nmfile = "file_barang".time(); //nama file saya beri nama langsung dan diikuti fungsi time
        $config['upload_path'] = './includes/img/Barang/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '2048'; //maksimum besar file 2M
        $config['max_width']  = '1288'; //lebar maksimum 1288 px
        $config['max_height']  = '768'; //tinggi maksimu 768 px
        $config['file_name'] = $nmfile; //nama yang terupload nantinya

        $this->upload->initialize($config);
        
        if($_FILES['filefoto']['name'])
        {
            if ($this->upload->do_upload('filefoto'))
            {
                $gbr = $this->upload->data();
				$data = array(
								'idBarang' => $this->input->post('idBarang'),
								'fotoBarang' =>$gbr['file_name'],
								'deskripsi' => $this->input->post('deskripsi'),
								'namaBarang' => $this->input->post('namaBarang'),
								'kategoriBarang' => $this->input->post('kategoriBarang'),
								'hargaBarang' => $this->input->post('hargaBarang'),
								'stokBarang' => $this->input->post('stokBarang')
			);
			$this->barang->input_data('barang',$data);
			$this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success\" id=\"alert\">Upload gambar berhasil !!</div></div>");
                redirect('http://localhost/TolahToleh/index.php/Admin/admin/'); //jika berhasil maka akan ditampilkan view vupload
            }else{
                //pesan yang muncul jika terdapat error dimasukkan pada session flashdata
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Gagal upload gambar !!</div></div>");
                redirect('http://localhost/TolahToleh/index.php/Admin/admin/'); //jika gagal maka akan ditampilkan form upload
            }
        }
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