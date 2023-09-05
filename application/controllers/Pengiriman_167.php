<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Pengiriman_167 extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();


        $this->load->model("pengiriman_model_167");
        $this->load->library('form_validation');
    }
    public function index()
    {
        $data['pengiriman'] = $this->pengiriman_model_167->getAll();
        $this->load->view('template_167/header_167');
        $this->load->view('pengiriman_167/pengiriman_view_167', $data);
        $this->load->view('template_167/footer_167');
    }
    public function menampilkan_transaksi(){
        $kd_transaksi = $_POST['kd_transaksi'];
        $s = "SELECT * FROM transaksi WHERE kd_transaksi='$kd_transaksi'";
    $res = $this->db->query($s)->row_array();
    echo json_encode($res);
    }
    public function create()
    {
        $this->load->model('pengiriman_model_167');
        $dariDB = $this->pengiriman_model_167->cekkd();
        $nourut = substr($dariDB, 3, 4);
        $kdprm = $nourut + 1;
        $data = array(
            'kd_pengiriman' => $kdprm,
            'transaksi' => $this->pengiriman_model_167->gettransaksi(),
        );
        $this->load->view('template_167/header_167');
        $this->load->view('pengiriman_167/create_167', $data);
        $this->load->view('template_167/footer_167');
    }
    public function save()
    { 
		$kd_pengiriman = $this->input->post('kd_pengiriman');
        $this->form_validation->set_rules('kd_pengiriman', 'Kode pengiriman', 'required');
        $this->form_validation->set_rules('kd_transaksi', 'Kode Transaksi', 'required');
        if ($this->form_validation->run() == true) {
            $data['kd_pengiriman'] = $this->input->post('kd_pengiriman');
            $data['kd_transaksi'] = $this->input->post('kd_transaksi');
            $this->pengiriman_model_167->save($data);
            $this->load->library('session');
		    $this->session->set_flashdata('sukses', 'Data dengan kode ' . $kd_pengiriman . ' berhasil ditambahkan.');
            redirect('pengiriman_167');
        } else {
            $this->load->view('template_167/header_167');
            $this->load->view('pengiriman_167/create_167');
            $this->load->view('template_167/footer_167');
        }
    }

     function edit($kd_pengiriman)
    {
        $data = array(
       'pengiriman' => $this->pengiriman_model_167->getById($kd_pengiriman),
        'transaksi' => $this->pengiriman_model_167->gettransaksi(),
        );
        $this->load->view('template_167/header_167');
    $this->load->view('pengiriman_167/edit_167', $data);
        $this->load->view('template_167/footer_167');
}

    public function update()
    {
        $this->form_validation->set_rules('kd_transaksi', 'Kode Transaksi', 'required');
      if ($this->form_validation->run() == true) {
            $kd_pengiriman = $this->input->post('kd_pengiriman');
           $data['kd_transaksi'] = $this->input->post('kd_transaksi');
           $this->pengiriman_model_167->update($data, $kd_pengiriman);
            $this->load->library('session');
            $this->session->set_flashdata('sukses', 'Data dengan kode ' . $kd_pengiriman . ' berhasil diubah.');
            redirect('pengiriman_167');
       } else {
           $kd_pengiriman = $this->input->post('kd_pengiriman');
           $data['pengiriman'] = $this->pengiriman_model_167->getById($kd_pengiriman);
            $this->load->view('template_167/header_167');
            $this->load->view('pengiriman_167/edit_167', $data);
            $this->load->view('template_167/footer_167');
        }
    }
    function delete($kd_pengiriman)
    {
        $this->pengiriman_model_167->delete($kd_pengiriman);
        $this->load->library('session');
        $this->session->set_flashdata('delete', 'Data dengan kode ' . $kd_pengiriman . ' berhasil dihapus.');
        $this->session->set_flashdata('delete2', 'Data dengan kode ' . $kd_pengiriman . ' tidak Bisa dihapus.');
        redirect('pengiriman_167');
    }
}