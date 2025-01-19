<?php
class User_model extends CI_Model
{
    public function getAllUser()
    {
        return $this->db->get('user')->result_array();
    }

    public function tambahUser(){
        $adduser = [
            'username' => $this->input->post('username', true),
            'password' => $this->input->post('password', true),
            // 'image' => 'default.png',
            'nama' => $this->input->post('nama', true),
            'user_role' => $this->input->post('user_role', true),
            'status' => 'Aktif',
            'date_created' => time()
        ];

        $this->db->insert('user', $adduser);
    }

    public function editUser()
    {
        $data = [
            'user_id' => $this->input->post('user_id', true),
            'username' => $this->input->post('username', true),
            'password' => $this->input->post('password', true),
            'nama' => $this->input->post('nama', true),
            'status' => $this->input->post('status', true),
            'user_role' => $this->input->post('user_role', true)
        ];

        $this->db->where('user_id', $this->input->post('user_id'));
        $this->db->update('user', $data);
        if ($this->input->post('user_id') == $this->session->userdata('user_id')) {
            $this->session->set_userdata($data);
        }
    }
}
