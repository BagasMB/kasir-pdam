<?php
class Pelanggan_model extends CI_Model
{
    public function getAllPelanggan()
    {
        $this->db->order_by('pelanggan_id ASC');
        return $this->db->get('pelanggan')->result_array();
    }

    public function tambahPelanggan()
    {
        $data = [
            'pelanggan_id' => $this->input->post('pelanggan_id', true),
            'nama' => $this->input->post('nama', true),
            'jenis_kelamin' => $this->input->post('jenis_kelamin', true),
            'dusun' => $this->input->post('dusun', true),
            'rt' => $this->input->post('rt', true),
            'rw' => $this->input->post('rw', true),
            'desa' => $this->input->post('desa', true),
            'kecamatan' => $this->input->post('kecamatan', true),
            'kabupaten' => $this->input->post('kabupaten', true),
            'kategori' => $this->input->post('kategori', true),
            'meter_awal' => '0'
        ];

        $this->db->insert('pelanggan', $data);
    }

    public function editPelanggan()
    {
        $data = [
            'pelanggan_id' => $this->input->post('pelanggan_id', true),
            'nama' => $this->input->post('nama', true),
            'jenis_kelamin' => $this->input->post('jenis_kelamin', true),
            'dusun' => $this->input->post('dusun', true),
            'rt' => $this->input->post('rt', true),
            'rw' => $this->input->post('rw', true),
            'desa' => $this->input->post('desa', true),
            'kecamatan' => $this->input->post('kecamatan', true),
            'kabupaten' => $this->input->post('kabupaten', true),
            'kategori' => $this->input->post('kategori', true)

        ];
        $this->db->where('pelanggan_id', $this->input->post('pelanggan_id'));
        $this->db->update('pelanggan', $data);
    }
}
