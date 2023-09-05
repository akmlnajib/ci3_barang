<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Pelanggan_167 extends CI_Controller
{
    
    public function __construct()
    {
        parent::__construct();


        $this->load->model("pelanggan_model_167");
        $this->load->library('form_validation');
    }
    public function index()
    {
        $data['pelanggan'] = $this->pelanggan_model_167->getAll();
        $this->load->view('template_167/header_167');
        $this->load->view('pelanggan_167/pelanggan_view_167', $data);
        $this->load->view('template_167/footer_167');
    }

    public function create()
    {
        
        $this->load->model('pelanggan_model_167');
        $dariDB = $this->pelanggan_model_167->cekkd();
        $nourut = substr($dariDB, 3, 4);
        $kdplg = $nourut + 1;
        $data = array(
            'kd_pelanggan' => $kdplg,
        );
        $this->load->view('template_167/header_167');
        $this->load->view('pelanggan_167/create_pelanggan_167', $data);
        $this->load->view('template_167/footer_167');
    }
    public function save()
    {
		$kd_pelanggan = $this->input->post('kd_pelanggan');
        $this->form_validation->set_rules('kd_pelanggan', 'Kode pelanggan', 'required');
        $this->form_validation->set_rules('nama_pelanggan', 'Nama pelanggan', 'required');
        $this->form_validation->set_rules('member', 'member', 'required');
        if ($this->form_validation->run() == true) {


            $data['kd_pelanggan'] = $this->input->post('kd_pelanggan');
            $data['nama_pelanggan'] = $this->input->post('nama_pelanggan');
            $data['member'] = $this->input->post('member');
            $this->pelanggan_model_167->save($data);
		    $this->session->set_flashdata('sukses', 'Data dengan kode ' . $kd_pelanggan . ' berhasil ditambahkan.');
            redirect('pelanggan_167');
        } else {
            $this->load->view('template_167/header_167');
            $this->load->view('pelanggan_167/create_pelanggan_167');
            $this->load->view('template_167/footer_167');
        }
    }

    function edit($kd_pelanggan)
    {
        $data['pelanggan'] = $this->pelanggan_model_167->getById($kd_pelanggan);

        $this->load->view('template_167/header_167');
        $this->load->view('pelanggan_167/edit_pelanggan_167', $data);
        $this->load->view('template_167/footer_167');
    }

    public function update()
    {
        $this->form_validation->set_rules('nama_pelanggan', 'Nama pelanggan', 'required');
        $this->form_validation->set_rules('member', 'member', 'required');
        if ($this->form_validation->run() == true) {
            $kd_pelanggan = $this->input->post('kd_pelanggan');
            $data['nama_pelanggan'] = $this->input->post('nama_pelanggan');
            $data['member'] = $this->input->post('member');
            $this->pelanggan_model_167->update($data, $kd_pelanggan);


            redirect('pelanggan_167');
        } else {
            $kd_pelanggan = $this->input->post('kd_pelanggan');
            $data['pelanggan'] = $this->pelanggan_model_167->getById($kd_pelanggan);
            $this->load->view('template_167/header_167');
            $this->load->view('pelanggan_167/edit_pelanggan_167', $data);
            $this->load->view('template_167/footer_167');
        }
    }
    function delete($kd_pelanggan)
    {
        $this->pelanggan_model_167->delete($kd_pelanggan);
        redirect('pelanggan_167');
    }
}