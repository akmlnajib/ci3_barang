<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Transaksi_167 extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("transaksi_model_167");
        $this->load->library('form_validation');
        $this->load->database();
    }

    function cancel($kd_transaksi)
    {   
        $data = array(
            'transaksi' => $this->transaksi_model_167->getById($kd_transaksi),
        );
        $this->load->view('template_167/header_167');
        $this->load->view('transaksi_167/transaksi_view_167', $data);
        $this->load->view('template_167/footer_167');
    }

    public function cancelconfirm()
    {
        $this->form_validation->set_rules('status', 'Status');
        if ($this->form_validation->run() == true) {
            $kd_transaksi = $this->input->post('kd_transaksi');
            $data['status'] = $this->input->post('status');
            $this->transaksi_model_167->cancelconfirm($data, $kd_transaksi);
            $this->load->library('session');
            $this->session->set_flashdata('sukses', 'Data dengan kode ' . $kd_transaksi . ' berhasil diubah.');
            redirect('transaksi');
        } else {
            $kd_transaksi = $this->input->post('kd_transaksi');
            $data['transaksi'] = $this->transaksi_model_167->getById($kd_transaksi);
            $this->load->view('template_167/header_167');
            $this->load->view('transaksi_167/transaksi_view_167', $data);
            $this->load->view('template_167/footer_167');
        }
    }
    public function index()
    {
        $data['transaksi'] = $this->transaksi_model_167->getAll();
        $data['pelanggan'] = $this->transaksi_model_167->getpelanggan();
        $this->load->view('template_167/header_167');
        $this->load->view('transaksi_167/transaksi_view_167', $data);
        $this->load->view('template_167/footer_167');
    }

    public function menampilkan_barang(){
        $kd_barang = $_POST['kd_barang'];
        $s = "SELECT * FROM barang WHERE kd_barang='$kd_barang'";
    $res = $this->db->query($s)->row_array();
    echo json_encode($res);
    }

    public function menampilkan_pelanggan(){
        $kd_pelanggan = $_POST['kd_pelanggan'];
        $s = "SELECT nama_pelanggan as nama_pelanggan FROM pelanggan WHERE kd_pelanggan='$kd_pelanggan'";
    $res = $this->db->query($s)->row_array();
    echo json_encode($res);
    }

    public function create()
    {
        $this->load->model("transaksi_model_167");
        $dariDB = $this->transaksi_model_167->cekkd();
        $nourut = substr($dariDB, 3, 4);
        $kdtrx = $nourut + 1;
        $data = array(
            'pelanggan' => $this->transaksi_model_167->get_pelanggan(),
            'barang' => $this->transaksi_model_167->getbarang(),
            'kd_transaksi' => $kdtrx,
        );
        $this->load->view('template_167/header_167');
        // $this->load->view('transaksi/create', $data);
        $this->load->view('transaksi_167/create_167', $data);
        $this->load->view('template_167/footer_167');
    }

    public function save()
    {
        
        $kd_transaksi = $this->input->post('kd_transaksi');
        $this->form_validation->set_rules('kd_transaksi', 'Kode Transaksi', 'required');
        $this->form_validation->set_rules('kd_pelanggan', 'Kode Pelanggan', 'required');
        $this->form_validation->set_rules('nama_pelanggan', 'Nama Pelanggan', 'required');
        $this->form_validation->set_rules('kd_barang', 'Kode Barang', 'required');
        $this->form_validation->set_rules('nama_barang', 'Nama barang', 'required');
        $this->form_validation->set_rules('qty_keluar', 'Qty barang', 'required');
        if ($this->form_validation->run() == true) {
            $data['kd_transaksi'] = $this->input->post('kd_transaksi');
            $data['kd_pelanggan'] = $this->input->post('kd_pelanggan');
            $data['nama_pelanggan'] = $this->input->post('nama_pelanggan');
            $data['kd_barang'] = $this->input->post('kd_barang');
            $data['nama_barang'] = $this->input->post('nama_barang');
            $data['qty_keluar'] = $this->input->post('qty_keluar');
            $this->transaksi_model_167->save($data);
            $this->load->library('session');
            $this->session->set_flashdata('sukses', 'Data dengan kode ' . $kd_transaksi . ' berhasil ditambahkan.');
            redirect('transaksi_167');
        } else {
            $this->load->view('template_167/header_167');
            $this->load->view('transaksi_167/create_167');
            $this->load->view('template_167/footer_167');
        }
    }

    function edit($kd_transaksi)
    {   
        $data = array(
            'transaksi' => $this->transaksi_model_167->getById($kd_transaksi),
            'pelanggan' => $this->transaksi_model_167->get_pelanggan(),
            'barang' => $this->transaksi_model_167->getbarang(),
        );
        $this->load->view('template_167/header_167');
        $this->load->view('transaksi_167/edit_167', $data);
        $this->load->view('template_167/footer_167');
    }

    public function update()
    {
        $this->form_validation->set_rules('kd_pelanggan', 'Kode Pelanggan', 'required');
        $this->form_validation->set_rules('nama_pelanggan', 'Nama Pelanggan', 'required');
        $this->form_validation->set_rules('kd_barang', 'Kode Barang', 'required');
        $this->form_validation->set_rules('nama_barang', 'Nama barang', 'required');
        $this->form_validation->set_rules('qty_keluar', 'Qty barang', 'required');
        $this->form_validation->set_rules('status', 'Status');
        if ($this->form_validation->run() == true) {
            $kd_transaksi = $this->input->post('kd_transaksi');
            $data['kd_pelanggan'] = $this->input->post('kd_pelanggan');
            $data['nama_pelanggan'] = $this->input->post('nama_pelanggan');
            $data['kd_barang'] = $this->input->post('kd_barang');
            $data['nama_barang'] = $this->input->post('nama_barang');
            $data['qty_keluar'] = $this->input->post('qty_keluar');
            $data['status'] = $this->input->post('status');
            $this->transaksi_model_167->update($data, $kd_transaksi);
            $this->load->library('session');
            $this->session->set_flashdata('sukses', 'Data dengan kode ' . $kd_transaksi . ' berhasil diubah.');
            $this->session->set_flashdata('sukses2', 'Data status dengan kode ' . $kd_transaksi . ' berhasil diubah.');
            redirect('transaksi_167');
        } else {
            $kd_transaksi = $this->input->post('kd_transaksi');
            $data['transaksi'] = $this->transaksi_model_167->getById($kd_transaksi);
            $this->load->view('template_167/header_167');
            $this->load->view('transaksi_167/edit_167', $data);
            $this->load->view('template_167/footer_167');
        }
    }
    function delete($kd_transaksi)
    {
        $this->transaksi_model_167->delete($kd_transaksi);
        $this->load->library('session');
        $this->session->set_flashdata('delete', 'Data dengan kode ' . $kd_transaksi . ' berhasil dihapus.');
        redirect('transaksi_167');
    }
}