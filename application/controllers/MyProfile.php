<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MyProfile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('username') == null) {
            redirect('auth');
        }
        $this->load->model('User_model');
    }

    public function index()
    {
        $dat = [
            'title' => 'Account | My Profile',
            'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
            'akun' => $this->User_model->getAllUser()
        ];

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header', $dat);
            $this->load->view('layout/sidebar', $dat);
            $this->load->view('layout/navbar', $dat);
            $this->load->view('myProfile', $dat);
            $this->load->view('layout/footer');
        } else {
            $user_id = $this->input->post('user_id');
            $username = $this->input->post('username');
            $nama = $this->input->post('nama');
            $status = $this->input->post('status');
            $user_role = $this->input->post('user_role');

            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'jpeg|jpg|png';
                $config['max_size']      = '2048';
                $config['upload_path']   = './assets/img/profile/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $dat['user']['image'];
                    if ($old_image != 'default.png') {
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set('username', $username);
            $this->db->set('nama', $nama);
            $this->db->set('status', $status);
            $this->db->set('user_role', $user_role);

            $this->db->where('user_id', $user_id);
            $this->db->update('user');

            $this->session->set_flashdata('flash', 'Berhasil DiEdit');
            redirect('myprofile');
        }
    }
}
