<?php

class admin_model extends CI_Model
{
    public function addAdmin(){
        if ($this->input->post('admadd')!=null) {
            $data = array_merge($this->input->post('addadm'),['role' => 'admin']);
            $data['password'] = sha1($data['password']);
            $this->db->insert('users', $data);
            return $this->db->affected_rows();
        }
    }
    
    public function getAdmin($limit = null){
        return $this->db->get_where('users', ['id' => $this->session->admin_id, 'role' => 'admin'])->row_array();    
    }

    public function getAllAdmin($limit = null){
        return $this->db->get_where('users',['role' => 'admin'])->result_array();
    }

    public function getTotalAdmin(){
        $sql = "SELECT COUNT(id) as total FROM users WHERE role = 'admin'";
        $data = $this->db->query($sql)->row_array();
        if ($data['total'] == null) {
            $data['total'] = 0;
        }
        return $data;
    }
    
    public function updateAdmin(){
        if ($this->input->post('upadm')!=null) {
            $admin = $this->admin_model->getAdmin();
            $data = $this->input->post('updateadm');
            if ($data['new_pass'] == $data['confirm_pass']) {
                if (sha1($data['old_pass']) == $admin['password']) {
                    $data = [
                        'id' => $this->session->admin_id,
                        'name' => $data['name'],
                        'password' => sha1($data['new_pass'])
                    ];
                    $this->db->update('admins', $data, ['id' => $data['id']]);
                    return $this->db->affected_rows();
                }else{
                    $this->db->update('admins',['name' => $this->input->post('updateadm')['name']], ['id' => $admin['id']]);
                    return "password lama salah";
                }
            }else {
                $this->db->update('admins',['name' => $this->input->post('updateadm')['name']], ['id' => $admin['id']]);
                return "password baru tidak sama";
            }
        }
    }

    public function deleteAdmin($id)
    {
        $this->db->delete('users', ['id' => $id]);
        return $this->db->affected_rows();
    }
}

