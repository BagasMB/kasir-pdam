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
    }

    public function index()
    {
        $data = [
            'title' => 'Account | My Profile',
            'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
        ];

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');

        if ($this->form_validation->run() == false) {
            $this->template->load('layout/template', 'myprofile', $data);
        } else {
            $nama = $this->input->post('nama');
            $namaFoto = $this->input->post('namafoto');
            if ($namaFoto == null) {
                $namaFoto = date('YmdHis') . '.jpg';
            }
            $config['allowed_types'] = 'jpeg|jpg|png';
            $config['max_size']      = '2048';
            $config['upload_path']   = './assets/img/profile/';
            $config['overwrite']     = true;
            $config['file_name']     = $namaFoto;
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('image')) {
                $error = array('error', $this->upload->display_errors());
                // die;
                $data1 = ['nama' => $nama];

                $this->session->set_userdata($data1);
                $where = ['user_id' => $this->input->post('user_id')];
                $this->db->update('user', $data1, $where);
            } else {
                $data3 = array('upload_data' => $this->upload->data());
                $data1 = ['nama' => $nama, 'image' => $namaFoto];

                $where = ['user_id' => $this->input->post('user_id')];
                $this->db->update('user', $data1, $where);
                $this->session->set_userdata($data1);
            }

            $this->session->set_flashdata('flash', 'Berhasil DiEdit');
            redirect('myprofile');
        }
    }
}
