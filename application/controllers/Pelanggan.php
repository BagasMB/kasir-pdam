<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('username') == null) {
            redirect('auth');
        }
        $this->load->model('Pelanggan_model');
    }

    public function index()
    {
        $data = [
            'title'     => 'Pelanggan',
            'pelanggan' => $this->Pelanggan_model->getAllPelanggan(),
            'tarif'     => $this->db->get('tarif')->result()
        ];

        $this->template->load('layout/template', 'user/pelanggan', $data);
    }

    public function detail($nomor_pelanggan)
    {
        $this->load->model("Transaksi_model");
        $data = [
            'title'     => 'Detail Pelanggan',
            'pelanggan' => $this->Pelanggan_model->getDetailPelanggan($nomor_pelanggan),
            'transaksi' => $this->Transaksi_model->getTransaksiByUser($nomor_pelanggan),
        ];

        $this->template->load('layout/template', 'user/detailPelanggan', $data);
    }

    public function tambah()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        $this->form_validation->set_rules('dusun', 'Dusun', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('no_wa', 'No Wa', 'trim|required');
        $this->form_validation->set_rules('rt', 'Rt', 'trim|required');
        $this->form_validation->set_rules('rw', 'Rw', 'trim|required');
        $this->form_validation->set_rules('desa', 'Desa', 'trim|required');
        $this->form_validation->set_rules('kecamatan', 'Kecamatan', 'trim|required');
        $this->form_validation->set_rules('kabupaten', 'Kabupaten', 'trim|required');
        $this->form_validation->set_rules('kategori', 'Kategori', 'trim|required');

        if ($this->form_validation->run() == TRUE) {
            $this->Pelanggan_model->tambahPelanggan();
            $this->session->set_flashdata('flash', 'Berhasil DiTambah');
            redirect('pelanggan');
        } else {
            $this->session->set_flashdata('gagal', 'Gagal DiTambah');
            redirect('pelanggan');
        }
    }

    public function edit()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        $this->form_validation->set_rules('dusun', 'Dusun', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('no_wa', 'No Wa', 'trim|required');
        $this->form_validation->set_rules('rt', 'Rt', 'trim|required');
        $this->form_validation->set_rules('rw', 'Rw', 'trim|required');
        $this->form_validation->set_rules('desa', 'Desa', 'trim|required');
        $this->form_validation->set_rules('kecamatan', 'Kecamatan', 'trim|required');
        $this->form_validation->set_rules('kabupaten', 'Kabupaten', 'trim|required');
        $this->form_validation->set_rules('kategori', 'Kategori', 'trim|required');


        if ($this->form_validation->run() == true) {
            $this->Pelanggan_model->editPelanggan();
            $this->session->set_flashdata('flash', 'Berhasil DiEdit');
            redirect('pelanggan');
        } else {
            $this->session->set_flashdata('gagal', 'Gagal DiEdit');
            redirect('pelanggan');
        }
    }

    public function delete($pelanggan_id)
    {
        $this->db->where('pelanggan_id', $pelanggan_id);
        $this->db->delete('pelanggan');
        $this->session->set_flashdata('flash', 'Berhasil DiHapus');
        redirect('pelanggan');
    }
}
