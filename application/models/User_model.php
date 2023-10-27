<?php
class User_model extends CI_Model
{
    public function getAllUser()
    {
        return $this->db->get('user')->result_array();
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
    }
}
