<?php

class Transaksi_model extends CI_Model
{

    public function getAllTransaksi()
    {
        $this->db->select('*');
        $this->db->order_by('transaksi_id DESC');
        $this->db->from('transaksi');
        $this->db->join('pelanggan', 'transaksi.nomor_pelanggan = pelanggan.nomor_pelanggan');
        return $this->db->get('')->result_array();
        // return $this->db->get('transaksi')->result_array();
    }

    public function getTransaksiByUser($nomor_pelanggan)
    {
        $this->db->select('*');
        $this->db->order_by('transaksi_id DESC');
        $this->db->from('transaksi');
        $this->db->join('pelanggan', 'transaksi.nomor_pelanggan = pelanggan.nomor_pelanggan');
        $this->db->where('transaksi.nomor_pelanggan', $nomor_pelanggan);
        return $this->db->get('')->result();
    }

    public function cariDataTransaksi()
    {
        $cari = $this->input->post('keyword', true);
        $this->db->like('nama', $cari);
        $this->db->join('pelanggan', 'transaksi.nomor_pelanggan = pelanggan.nomor_pelanggan');
        return $this->db->get('transaksi')->result_array();
    }

    public function bayar()
    {
        date_default_timezone_set('Asia/Jakarta');
        $bayar = $this->input->post('bayar');
        $total_bayar = $this->input->post('total_pembayaran');
        $jam_transaksi = date('H:i:s');
        $waktu_tanggal = date('Y-m-d');

        $data = [
            'transaksi_id' => $this->input->post('transaksi_id', true),
            'jam_transaksi' => $jam_transaksi,
            'tanggal_transaksi' => $waktu_tanggal,
            'bayar' => $bayar,
            'kembalian' => $bayar - $total_bayar
        ];

        $this->db->where('transaksi_id', $this->input->post('transaksi_id'));
        $this->db->update('transaksi', $data);

        $up = [
            'status_pembayaran' => 'Sudah DiBayar'
        ];

        $this->db->where('pengair_id', $this->input->post('pengair_id'));
        $this->db->update('penggunaan_air', $up);
    }

    public function getByIdTransaksi($kode_transaksi)
    {
        $this->db->where('kode_transaksi', $kode_transaksi);
        $this->db->join('pelanggan', 'transaksi.nomor_pelanggan = pelanggan.nomor_pelanggan');
        return $this->db->get('transaksi')->row_array();
    }
}
