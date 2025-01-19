<?php
class Pelanggan_model extends CI_Model
{
    public function getAllPelanggan()
    {
        $this->db->order_by('pelanggan_id ASC');
        $this->db->join('tarif', "pelanggan.kategori=tarif.tarif_id");
        return $this->db->get('pelanggan')->result_array();
    }

    public function getDetailPelanggan($nomor_pelanggan)
    {
        $this->db->order_by('pelanggan_id ASC')->where('nomor_pelanggan', $nomor_pelanggan);
        $this->db->join('tarif', "pelanggan.kategori=tarif.tarif_id");
        return $this->db->get('pelanggan')->row();
    }

    public function tambahPelanggan()
    {
        $lastcode = $this->db->select_max('nomor_pelanggan')->get('pelanggan')->row()->nomor_pelanggan;
        $noUrut = (int) substr($lastcode, -6, 6);
        $noUrut++;
        $newCode = sprintf('%06s', $noUrut);
        $data = [
            'pelanggan_id' => $this->input->post('pelanggan_id', true),
            'nomor_pelanggan' => $newCode,
            'nama' => $this->input->post('nama', true),
            'jenis_kelamin' => $this->input->post('jenis_kelamin', true),
            'email' => $this->input->post('email', true),
            'no_wa' => $this->input->post('no_wa', true),
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
            'nama' => $this->input->post('nama', true),
            'jenis_kelamin' => $this->input->post('jenis_kelamin', true),
            'email' => $this->input->post('email', true),
            'no_wa' => $this->input->post('no_wa', true),
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
