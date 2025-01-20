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

    public function getKodeTransaksi()
    {
        date_default_timezone_set('Asia/Jakarta');
        $lastcode = $this->db->select_max('kode_transaksi')->get('transaksi')->row()->kode_transaksi;

        if ($lastcode) {
            // Ambil tanggal transaksi terakhir dan nomor urut
            $lastDate = substr($lastcode, 0, 6); // Ambil 6 karakter pertama (ymd)
            $noUrut = (int) substr($lastcode, 6); // Ambil karakter setelah tanggal (nomor urut)

            // Reset nomor urut jika tanggal berbeda
            if ($lastDate != date('ymd')) {
                $noUrut = 0; // Reset urutan jika tanggal berganti
            }
        } else {
            $noUrut = 0; // Jika belum ada transaksi
        }
        $noUrut++;

        $newCode = sprintf('%01d', $noUrut);
        $code = date('ymd') . $newCode;
        return $code;
    }

    public function tambahDataPenggunaanAir($pelangan)
    {
        date_default_timezone_set('Asia/Jakarta');
        $pemakaian_perbulan = $this->input->post('pemakaian_perbulan');
        $pemakaian_perbulan .= '-' . date('d');
        $penggunaanair = [
            'nomor_pelanggan' => $this->input->post('nomor_pelanggan'),
            'pemakaian_perbulan' => $pemakaian_perbulan,
            'pemakaian_awal' => $pelangan->meter_awal,
            'pemakaian_akhir' => $this->input->post('pemakaian_akhir'),
            'status_pembayaran' => 'Belum Bayar'
        ];

        $this->db->insert('penggunaan_air', $penggunaanair);

        $last_id = $this->db->insert_id();
        $nomor_pelanggan = $this->input->post('nomor_pelanggan');
        $pemakaian_awal = $pelangan->meter_awal;
        $pemakaian_akhir = $this->input->post('pemakaian_akhir');


        $transaksi = [
            'pengair_id' => $last_id,
            'nomor_pelanggan' => $nomor_pelanggan,
            'kode_transaksi' => $this->getKodeTransaksi(),
            'total_pembayaran' => ($pemakaian_akhir - $pemakaian_awal) * $pelangan->biaya,
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
