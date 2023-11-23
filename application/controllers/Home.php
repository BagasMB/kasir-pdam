<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('username') == null) {
			redirect('auth');
		}
		$this->load->model('Home_model');
	}

	public function index()
	{
		$data = [
			'title' => 'Dashboard',
			'user' =>  $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
			'total_rows' => $this->Home_model->countAllPeoples(),
			'total_rows_transaksi' => $this->Home_model->countAllTransaksi(),
			'transaksi' => $this->Home_model->getAllTransaksi(),

		];

		$this->template->load('layout/template', 'dashboard', $data);
	}

	public function laporan()
	{
		$tanggal1 = $this->input->post('tanggal1');
		$tanggal2 = $this->input->post('tanggal2');
		$tanggals1 = date('d F Y', strtotime($tanggal1));
		$tanggals2 = date('d F Y', strtotime($tanggal2));

		$data['transaksi'] = $this->Home_model->filterByTanggal($tanggal1, $tanggal2);
		$data['saldo_awal'] = $this->Home_model->saldo_awal($tanggal1);
		$data['judul'] = "Laporan Dari Tanggal $tanggals1 Sampai $tanggals2";
		$data['tanggal_awal'] = $tanggals1;

		$this->load->view('laporan', $data);

		$paper_size = 'A4';
		$orientation = 'portrait';
		$html = $this->output->get_output();

		$this->load->library('pdf');

		$this->pdf->generate(
			$html,
			"Laporan_transaksi",
			$paper_size,
			$orientation
		);
	}



}
