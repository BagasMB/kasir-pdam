<?php
class PenggunaanAir_model extends CI_Model
{
    public function getPenggunaanAirSudahBayar()
    {
        $this->db->select('*');
        $this->db->order_by('pengair_id DESC');
        // $this->db->from('penggunaan_air');
        $this->db->join('pelanggan', 'penggunaan_air.pelanggan_id = pelanggan.pelanggan_id');
        return $this->db->get_where('penggunaan_air', array('status_pembayaran' => 'Sudah DiBayar'))->result_array();
    }

    public function getPenggunaanAirBelumBayar()
    {
        $this->db->join('pelanggan', 'penggunaan_air.pelanggan_id = pelanggan.pelanggan_id');
        return $this->db->get_where('penggunaan_air', array('status_pembayaran' => 'Belum Bayar'))->result_array();
    }

    public function tambahDataPenggunaanAir()
    {
        $this->db->trans_start();

        $penggunaanair = [
            'pelanggan_id' => $this->input->post('pelanggan_id', true),
            'pemakaian_awal' => $this->input->post('pemakaian_awal', true),
            'pemakaian_akhir' => $this->input->post('pemakaian_akhir', true),
            'status_pembayaran' => 'Belum Bayar'
        ];

        $this->db->insert('penggunaan_air', $penggunaanair);

        $last_id = $this->db->insert_id();
        $id_pelanggan = $this->input->post_get('pelanggan_id');
        $pemakaian_awal = $this->input->post_get('pemakaian_awal');
        $pemakaian_akhir = $this->input->post_get('pemakaian_akhir');

        $transaksi = [
            'pengair_id' => $last_id,
            'pelanggan_id' => $id_pelanggan,
            'total_pembayaran' => ($pemakaian_akhir - $pemakaian_awal) * 5000
        ];

        $this->db->insert('transaksi', $transaksi);

        $meteran_akhir = [
            'meter_awal' => ($pemakaian_akhir - $pemakaian_awal) +   $pemakaian_awal,
        ];
        $this->db->where('pelanggan_id', $id_pelanggan);
        $this->db->update('pelanggan', $meteran_akhir);

        $this->db->trans_complete();
    }
}
