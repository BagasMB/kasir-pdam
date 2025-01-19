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
            'pelangan' => $this->db->get('pelanggan')->result()
        ];
        $this->template->load('layout/template', 'penggunaanair/penggunaanAir', $data);
    }

    public function getPelangganData($nomor_pelanggan)
    {
        $pelanggan = $this->db->join('tarif', "pelanggan.kategori=tarif.tarif_id")->get_where('pelanggan', ['nomor_pelanggan' => $nomor_pelanggan])->row();

        // Kembalikan data pelanggan dalam format JSON
        if ($pelanggan) {
            echo json_encode($pelanggan);
        } else {
            echo json_encode(null);
        }
    }


    public function input()
    {
        $this->form_validation->set_rules('pemakaian_akhir', 'Pemakaian Akhir', 'trim|required|numeric');

        $this->load->model('Pelanggan_model');
        $getPelanggan =   $this->Pelanggan_model->getDetailPelanggan($this->input->post('nomor_pelanggan'));
        // var_dump($getPelanggan->meter_awal);die;

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('gagal', 'Data Belum di isi');
        } elseif ($getPelanggan->meter_awal >= $this->input->post('pemakaian_akhir')) {
            $this->session->set_flashdata('gagal', 'Data penggunaan akhir kurang dari penggunaan saat ini');
            redirect('penggunaanAir');
        } else {
            $this->PenggunaanAir_model->tambahDataPenggunaanAir($getPelanggan);
            $this->session->set_flashdata('flash', 'Berhasil DiTambah');
        }
        redirect('penggunaanAir/belumBayar');
    }

    public function sudahBayar()
    {
        $data = [
            'title' => 'Penggunaan Air | Sudah Bayar',
            'bulan' => ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
            'bayar' => $this->PenggunaanAir_model->getPenggunaanAirSudahBayar()
        ];

        $this->template->load('layout/template', 'penggunaanAir/dataPenggunaanAir', $data);
    }

    public function belumBayar()
    {
        $data = [
            'title' => 'Penggunaan Air | Belum Bayar',
            'bulan' => ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
            'bayar' => $this->PenggunaanAir_model->getPenggunaanAirBelumBayar()
        ];
        $this->template->load('layout/template', 'penggunaanAir/dataPenggunaanAir', $data);
    }
}
