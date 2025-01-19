<?php
class PenggunaanAir_model extends CI_Model
{
    public function getPenggunaanAirSudahBayar()
    {
        $this->db->select('*');
        $this->db->order_by('pengair_id DESC');
        // $this->db->from('penggunaan_air');
        $this->db->join('pelanggan', 'penggunaan_air.nomor_pelanggan = pelanggan.nomor_pelanggan');
        return $this->db->get_where('penggunaan_air', array('status_pembayaran' => 'Sudah DiBayar'))->result_array();
    }

    public function getPenggunaanAirBelumBayar()
    {
        $this->db->join('pelanggan', 'penggunaan_air.nomor_pelanggan = pelanggan.nomor_pelanggan');
        return $this->db->get_where('penggunaan_air', array('status_pembayaran' => 'Belum Bayar'))->result_array();
    }

    public function tambahDataPenggunaanAir($pelangan)
    {
        $penggunaanair = [
            'nomor_pelanggan' => $this->input->post('nomor_pelanggan'),
            'pemakaian_awal' => $pelangan->meter_awal,
            'pemakaian_akhir' => $this->input->post('pemakaian_akhir'),
            'status_pembayaran' => 'Belum Bayar'
        ];

        $this->db->insert('penggunaan_air', $penggunaanair);

        $last_id = $this->db->insert_id();
        $nomor_pelanggan = $this->input->post('nomor_pelanggan');
        $pemakaian_awal = $pelangan->meter_awal;
        $pemakaian_akhir = $this->input->post('pemakaian_akhir');

        date_default_timezone_set('Asia/Jakarta');
        $jam_transaksi = date('H:i');
        $waktu_tanggal = date('Y-m-d');
        $transaksi = [
            'pengair_id' => $last_id,
            'nomor_pelanggan' => $nomor_pelanggan,
            'total_pembayaran' => ($pemakaian_akhir - $pemakaian_awal) * $pelangan->biaya,
            'jam_transaksi' => $jam_transaksi,
            'tanggal_transaksi' => $waktu_tanggal,
        ];

        $this->db->insert('transaksi', $transaksi);

        $meteran_akhir = [
            'meter_awal' => ($pemakaian_akhir - $pemakaian_awal) + $pemakaian_awal,
        ];
        $this->db->where('nomor_pelanggan', $nomor_pelanggan);
        $this->db->update('pelanggan', $meteran_akhir);

        $this->db->trans_complete();
    }
}
