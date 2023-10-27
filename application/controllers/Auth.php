<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required', [
            'required' => 'Username Tidak Boleh Kosong'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'trim|required', [
            'required' => 'Password Tidak Boleh Kosong'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('auth/index');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $username = htmlspecialchars($this->input->post('username', true));
        $password = $this->input->post('password', true);

        $user = $this->db->get_where('user', ['username' => $username])->row_array();

        if ($user) {
            if ($user['status'] == 'Aktif') {
                if ($password == $user['password']) {
                    $data = [
                        'username' => $user['username'],
                        'user_role' => $user['user_role']
                    ];
                    $this->session->set_userdata($data);
                    redirect('home');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><i class="fa fa-circle-exclamation me-2"></i>Password anda salah! </div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><i class="fa fa-circle-exclamation me-2"></i>Username tidak aktif! </div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><i class="fa fa-circle-exclamation me-2"></i>Username tidak terdaftar! </div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth');
    }

    public function block(){
        $this->load->view('auth/error');
    }

}
