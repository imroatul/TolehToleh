<?php

class CRUD extends CI_Controller{

function __construct(){
parent::__construct();
$this->load->model('modeldata');
$this->load->helper('url');
}

function index(){
$data['pengguna'] = $this->modeldata->tampil_data()->result();
$this->load->view('tampilview',$data);
}

function tambah(){
$this->load->view('inputview');
}

function tambah_baru(){
$nama = $this->input->post('nama');
$jenis = $this->input->post('jenis');
$harga = $this->input->post('harga');

$data = array(
'nama' => $nama,
'harga' => $harga, 
'jenis' => $jenis
);

$this->modeldata->input_data($data,'pengguna');
redirect('CRUD/index');
}

function hapus($id){
$this->load->model('modeldata');
$this->modeldata->hapus_data($id);
redirect('CRUD/index');
}

function edit($id){
$where = array('id' => $id);
$data['pengguna'] = $this->modeldata->edit_data($where,'pengguna')->result();
$this->load->view('editview',$data);
}

function update(){
$id = $this->input->post('id');
$nama = $this->input->post('nama');
$harga = $this->input->post('harga');
$jenis = $this->input->post('jenis');

$data = array(
'nama' => $nama,
'harga' => $harga,
'jenis' => $jenis
);

$where = array(
'id' => $id
);

$this->modeldata->update_data($where,$data,'pengguna');
redirect('CRUD/index');
}

}
?>