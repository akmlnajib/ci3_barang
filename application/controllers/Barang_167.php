<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Barang_167 extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();


        $this->load->model("barang_model_167");
        $this->load->library('form_validation');
    }
    public function index()
    {
        $data['barang'] = $this->barang_model_167->getAll();
        $this->load->view('template_167/header_167');
        $this->load->view('barang_167/barang_view_167', $data);
        $this->load->view('template_167/footer_167');
    }

    public function create()
    {
        $this->load->model('barang_model_167');
        $dariDB = $this->barang_model_167->cekkd();
        $nourut = substr($dariDB, 3, 4);
        $kdbrg = $nourut + 1;
        $data = array(
            'kd_barang' => $kdbrg,
        );
        $this->load->view('template_167/header_167');
        $this->load->view('barang_167/create_barang_167', $data);
        $this->load->view('template_167/footer_167');
    }
    public function save()
    { 
		$kd_barang = $this->input->post('kd_barang');
        $this->form_validation->set_rules('kd_barang', 'Kode Barang', 'required');
        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required');
        $this->form_validation->set_rules('qty_masuk', 'Qty', 'required');
        if ($this->form_validation->run() == true) {
            $data['kd_barang'] = $this->input->post('kd_barang');
            $data['nama_barang'] = $this->input->post('nama_barang');
            $data['harga'] = $this->input->post('harga');
            $data['qty_masuk'] = $this->input->post('qty_masuk');
            $this->barang_model_167->save($data);
            $this->load->library('session');
		    $this->session->set_flashdata('sukses', 'Data dengan kode ' . $kd_barang . ' berhasil ditambahkan.');
            redirect('barang_167');
        } else {
            $this->load->view('template_167/header_167');
            $this->load->view('barang_167/create_barang_167');
            $this->load->view('template_167/footer_167');
        }
    }

    function edit($kd_barang)
    {
        $data['barang'] = $this->barang_model_167->getById($kd_barang);
        $this->load->view('template_167/header_167');
        $this->load->view('barang_167/edit_barang_167', $data);
        $this->load->view('template_167/footer_167');
    }

    public function update()
    {
        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required');
        $this->form_validation->set_rules('qty_masuk', 'Qty', 'required');
        if ($this->form_validation->run() == true) {
            $kd_barang = $this->input->post('kd_barang');
            $data['nama_barang'] = $this->input->post('nama_barang');
            $data['harga'] = $this->input->post('harga');
            $data['qty_masuk'] = $this->input->post('qty_masuk');
            $this->barang_model_167->update($data, $kd_barang);
            $this->load->library('session');
            $this->session->set_flashdata('sukses', 'Data dengan kode ' . $kd_barang . ' berhasil diubah.');
            redirect('barang_167');
        } else {
            $kd_barang = $this->input->post('kd_barang');
            $data['barang'] = $this->barang_model_167->getById($kd_barang);
            $this->load->view('template_167/header_167');
            $this->load->view('barang_167/edit_barang_167', $data);
            $this->load->view('template_167/footer_167');
        }
    }
    function delete($kd_barang)
    {
        $this->barang_model_167->delete($kd_barang);
        $this->load->library('session');
        $this->session->set_flashdata('delete', 'Data dengan kode ' . $kd_barang . ' berhasil dihapus.');
        $this->session->set_flashdata('delete2', 'Data dengan kode ' . $kd_barang . ' tidak Bisa dihapus.');
        redirect('barang_167');
    }
}