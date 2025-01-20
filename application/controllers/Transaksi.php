<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('username') == null) {
            redirect('auth');
        }
        $this->load->model('Transaksi_model');
    }

    public function index()
    {
        $data['title'] = 'Transaksi | Pembayaran';
        $data['title_halaman'] = 'Pembayaran';
        $data['bayar'] = $this->Transaksi_model->getAllTransaksi();
        if ($this->input->post('keyword')) {
            $data['bayar'] = $this->Transaksi_model->cariDataTransaksi();
        }
        $this->template->load('layout/template', 'transaksi/transaksi', $data);
    }

    public function bayar()
    {
        $this->form_validation->set_rules('bayar', 'Bayar', 'trim|required|numeric');

        if ($this->form_validation->run() == true) {
            $this->Transaksi_model->bayar();
            $this->session->set_flashdata('flash', 'Berhasil DiBayar');
            redirect('transaksi');
        } else {
            $this->session->set_flashdata('gagal', 'Gagal DiBayar');
            redirect('transaksi');
        }
    }

    public function print_pembayaran($kode_transaksi)
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['bayar'] = $this->Transaksi_model->getByIdTransaksi($kode_transaksi);

        $this->load->view('transaksi/print_pembayaran', $data);
    }
}
