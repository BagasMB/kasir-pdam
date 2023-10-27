<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Password extends CI_Controller
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
            'title' => 'Account | Password',
            'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array()
        ];

        $this->form_validation->set_rules('password_lama', 'Password Lama', 'trim|required');
        $this->form_validation->set_rules('password_baru1', 'Password Baru', 'trim|required|matches[password_baru2]');
        $this->form_validation->set_rules('password_baru2', 'Konfirmasi Password Baru', 'trim|required|matches[password_baru1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header', $data);
            $this->load->view('layout/sidebar', $data);
            $this->load->view('layout/navbar', $data);
            $this->load->view('ubahPassword', $data);
            $this->load->view('layout/footer');
        } else {
            $user_id = $this->input->post('user_id');
            $password_lama = $this->input->post('password_lama');
            $password_baru = $this->input->post('password_baru1');
            if ($password_lama != $data['user']['password']) {
                $this->session->set_flashdata('gagal', 'Password Anda Salah !');
                redirect('password');
            } else {
                if ($password_lama == $password_baru) {
                    $this->session->set_flashdata('gagal', 'Password Baru Sama Dengan Password Lama !');
                    redirect('password');
                } else {
                    $this->db->set('password', $password_baru);
                    $this->db->where('user_id', $user_id);
                    $this->db->update('user');

                    $this->session->set_flashdata('flash', 'Password Berhasil DiUbah');
                    redirect('password');
                }
            }
        }
    }
}