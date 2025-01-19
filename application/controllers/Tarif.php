<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tarif extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $data = [
      'title' => 'Tarif',
      'tarif' => $this->db->get('tarif')->result_array(),
    ];

    $this->template->load('layout/template', 'transaksi/tarif', $data);
  }

  public function tambahTarif()
  {
    $this->form_validation->set_rules('nama_tarif', 'nama_tarif', 'trim|required');
    $this->form_validation->set_rules('biaya', 'biaya', 'trim|required');
    $cek_nama_tarif = $this->db->where('nama_tarif', $this->input->post('nama_tarif'))->count_all_results('tarif');
    if ($this->form_validation->run() == false) {
      $this->session->set_flashdata('gagal', 'Data ada yang belum diisi');
    } elseif ($cek_nama_tarif) {
      $this->session->set_flashdata('gagal', 'Yahh, Nama Tarif ' . $this->input->post('nama_tarif') . ' sudah digunakan!!!');
    } else {
      $data = [
        'nama_tarif' => $this->input->post('nama_tarif', true),
        'biaya'      => $this->input->post('biaya', true),
      ];
      $this->db->insert('tarif', $data);
      $this->session->set_flashdata('flash', 'Berhasil DiTambah');
    }
    redirect("tarif");
  }

  public function editTarif()
  {
    $this->form_validation->set_rules('nama_tarif', 'nama_tarif', 'trim|required');
    $this->form_validation->set_rules('biaya', 'biaya', 'trim|required');
    if ($this->form_validation->run() == false) {
      $this->session->set_flashdata('gagal', 'Data ada yang belum diisi');
    } else {
      $data = [
        'nama_tarif' => $this->input->post('nama_tarif', true),
        'biaya'      => $this->input->post('biaya', true),
      ];
      $where = ["tarif_id" => $this->input->post('tarif_id')];
      $this->db->update('tarif', $data, $where);
      $this->session->set_flashdata('flash', 'Berhasil DiEdit');
    }
    redirect("tarif");
  }

  public function deleteTarif($tarif_id)
  {
    $this->db->where('tarif_id', $tarif_id)->delete('tarif');
    $this->session->set_flashdata('flash', 'Berhasil DiHapus');
    redirect('tarif');
  }
}
