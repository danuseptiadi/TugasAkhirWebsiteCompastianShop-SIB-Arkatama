<?php

class login_model extends CI_Model
{
    public function addLogin(){
        $data = [
            'login_id' => 'LGN1000000001',
            'login_username' => 'admin',
            'login_password' => 'admin',
            'user_role' => 'admin',
            'user_id' => 'ADM1000000001'
        ];
        $this->db->insert('login', $data);
        return $this->db->affected_rows();
    }
    
    public function Login(){
        if ($this->input->post('login') != null) {
            $data = $this->input->post('login');
            $this->session->login = $this->db->get_where('login', $data)->row_array();
        }
        
            if ($this->session->login != null) {
                if($this->session->login['user_role'] == 'customer'){
                    redirect('Home/customer');
                }
                if($this->session->login['user_role'] == 'admin2'){
                    redirect('Home/admin/product');
                }
            }
        var_dump($this->session->login);
    }

    public function getLogin($limit = null,$data = null){
        if ($data == null) {
            return $this->db->get('login',$limit)->result_array();
        } else {
            return $this->db->get_where('login', $data)->row_array();
        }
    }

    public function updateLogin(){
        $data = [
            'login_id' => 'LGN1000000001',
            'login_username' => 'admin',
            'login_password' => 'admin123',
            'user_role' => 'admin2',
            'user_id' => 'ADM1000000001'
        ];
        $this->db->update('login', $data, ['login_id' => $data['login_id']]);
        return $this->db->affected_rows();
    }

    public function deleteLogin()
    {
        $login_id = "LGN1000000001";
        $this->db->delete('login', ['login_id' => $login_id]);
        return $this->db->affected_rows();
    }
    
    public function filterLogin($limit = null){
        $data = [
            'login_id' => '001'
        ];
        $sql = 'SELECT * FROM login WHERE';
        foreach($data as $key => $value){
            $sql = $sql." ".$key." LIKE '%". $value."%' OR";
        }
        $sql = rtrim($sql, "OR").';';
        return $this->db->query($sql)->result_array();
    }
}

