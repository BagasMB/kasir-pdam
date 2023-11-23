<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PenggunaanAir extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('username') == null) {
            redirect('auth');
        } 
        $this->load->model('PenggunaanAir_model');
        $this->load->model('Pelanggan_model');
    }

    public function index()
    {
        $data = [
            'title' => 'Penggunaan Air',
            'bulan' => ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
            'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
            'pelangan' => $this->db->get('pelanggan')->result_array()
        ];

        $this->form_validation->set_rules('pelanggan_id', 'Id Pelanggan', 'trim|required|numeric');
        $this->form_validation->set_rules('pemakaian_awal', 'Pemakaian Awal', 'trim|required|numeric');
        $this->form_validation->set_rules('pemakaian_akhir', 'Pemakaian Akhir', 'trim|required|numeric');

        if ($this->form_validation->run() == false) {
            $this->template->load('layout/template', 'penggunaanair/index', $data);
        } else {
            $this->PenggunaanAir_model->tambahDataPenggunaanAir();
            $this->session->set_flashdata('flash', 'Berhasil DiTambah');
            redirect('penggunaanair/belumBayar');
        }
    }

    public function input()
    {
        $data = [
            'title' => 'Penggunaan Air | Input',
            'bulan' => ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
            'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
            'pelangan' => $this->db->get('pelanggan')->result_array()
        ];

        $this->form_validation->set_rules('pelanggan_id', 'Id Pelanggan', 'trim|required|numeric');
        $this->form_validation->set_rules('pemakaian_awal', 'Pemakaian Awal', 'trim|required|numeric');
        $this->form_validation->set_rules('pemakaian_akhir', 'Pemakaian Akhir', 'trim|required|numeric');

        if ($this->form_validation->run() == false) {
            $this->template->load('layout/template', 'penggunaanAir/input', $data);
        } else {
            $this->PenggunaanAir_model->tambahDataPenggunaanAir();
            $this->session->set_flashdata('flash', 'Berhasil DiTambah');
            redirect('penggunaanair/belumBayar');
        }
    }

    public function sudahBayar()
    {
        $data = [
            'title' => 'Penggunaan Air | Sudah Bayar',
            'bulan' => ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
            'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
            'bayar' => $this->PenggunaanAir_model->getPenggunaanAirSudahBayar()
        ];

        $this->template->load('layout/template', 'penggunaanAir/sudahBayar', $data);
    }

    public function belumBayar()
    {
        $data = [
            'title' => 'Penggunaan Air | Belum Bayar',
            'bulan' => ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
            'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
            'bayar' => $this->PenggunaanAir_model->getPenggunaanAirBelumBayar()
        ];
        $this->template->load('layout/template', 'penggunaanAir/belumBayar', $data);

    }
}
