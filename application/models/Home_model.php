<?php
class Home_model extends CI_Model
{
    public function getAllTransaksi()
    {
        $this->db->select('*');
        $this->db->order_by('tanggal_transaksi DESC');
        $this->db->from('transaksi');
        $this->db->join('pelanggan', 'transaksi.nomor_pelanggan = pelanggan.nomor_pelanggan');
        return $this->db->get('')->result_array();
    }

    public function countAllPeoples()
    {
        return $this->db->get('pelanggan')->num_rows();
    }

    public function countAllTransaksi()
    {
        return $this->db->get('transaksi')->num_rows();
    }

    public function filterByTanggal($tanggal1, $tanggal2)
    {
        $this->db->select('*');
        $this->db->order_by('tanggal_transaksi DESC');
        $this->db->from('transaksi');
        $this->db->join('pelanggan', 'transaksi.nomor_pelanggan = pelanggan.nomor_pelanggan');
        $this->db->where('tanggal_transaksi >=', $tanggal1);
        $this->db->where('tanggal_transaksi <=', $tanggal2);
        return $this->db->get()->result_array();
    }

    public function saldo_awal($tanggal1)
    {
        $this->db->select('sum(total_pembayaran) as total')->from('transaksi');
        $this->db->where('tanggal_transaksi <', $tanggal1);
        $result = $this->db->get()->row()->total;

        return $result ?? 0;
    }
}
