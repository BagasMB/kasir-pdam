<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('username') == null) {
            redirect('auth');
        } elseif ($this->session->userdata('user_role') != 'Admin') {
            redirect('auth/block');
        }
        $this->load->model('User_model');
    }

    public function index()
    {
        $data = [
            'title' => 'Halaman | User',
            'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
            'akun' => $this->User_model->getAllUser()
        ];

        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar', $data);
        $this->load->view('layout/navbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('layout/footer');
    }

    public function tambahUser()
    {

        $this->form_validation->set_rules('username', 'Username', 'trim|required', [
            'required' => 'Username Tidak Boleh Kosong'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'trim|required|matches[password]', [
            'required' => 'Password Tidak Boleh Kosong'
        ]);
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required', [
            'required' => 'Nama Tidak Boleh Kosong'
        ]);

        $data['title'] = 'Tambah | User';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $username = $this->input->post('username');
        $cek_username = $this->db->where('username', $username)->count_all_results('user');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('gagal', 'Data ada yang belum diisi');
            redirect('user');
        } elseif ($cek_username == 1) {
            $this->session->set_flashdata('gagal', 'Yahh, Username sudah digunakan!!!');
            redirect('user');
        } else {
            $adduser = [
                'username' => $this->input->post('username', true),
                'username' => $this->input->post('username', true),
                'password' => $this->input->post('password', true),
                'image' => 'default.png',
                'nama' => $this->input->post('nama', true),
                'user_role' => $this->input->post('user_role', true),
                'status' => 'Aktif',
                'date_created' => time()
            ];

            $this->db->insert('user', $adduser);
            $this->session->set_flashdata('flash', 'Berhasil DiTambah');
            redirect('user');
        }
    }

    public function editUser()
    {

        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'required|matches[password]');
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');

        if ($this->form_validation->run() == true) {
            $this->User_model->editUser();
            $this->session->set_flashdata('flash', 'Berhasil DiEdit');
            redirect('user');
        } else {
            $this->session->set_flashdata('gagal', 'Gagal DiEdit');
            redirect('user');
        }
    }

    public function deleteUser($user_id)
    {
        $this->db->where('user_id', $user_id);
        $this->db->delete('user');
        $this->session->set_flashdata('flash', 'Berhasil DiHapus');
        redirect('user');
    }
}
