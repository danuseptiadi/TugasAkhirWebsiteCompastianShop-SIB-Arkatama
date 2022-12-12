<?php

class admin_model extends CI_Model
{
    public function addAdmin(){
        $data = [
            'admin_id' => 'ADM1000000001',
            'admin_name' => 'Malabi',
            'admin_gender' => 'male',
            'admin_birth' => '2022-12-01',
            'admin_email' => 'number',
            'admin_number' => '0896128144252',
            'admin_image' => 'ADM1000000001',
            'admin_status' => 'active'
        ];
        $this->db->insert('admin', $data);
        return $this->db->affected_rows();
    }
    
    public function getAdmin($limit = null,$data = null){
        if ($data == null) {
            return $this->db->get('admin',$limit)->result_array();
        } else {
            return $this->db->get_where('admin', $data)->row_array();
        }
    }
    
    public function updateAdmin(){
        $data = [
            'admin_id' => 'ADM1000000001',
            'admin_name' => 'Malabi',
            'admin_gender' => 'male',
            'admin_birth' => '2022-12-01',
            'admin_email' => 'number',
            'admin_number' => '0896128144252',
            'admin_image' => 'ADM1000000001.jpg',
            'admin_status' => 'active'
        ];

        $this->db->update('admin', $data, ['admin_id' => $data['admin_id']]);
        return $this->db->affected_rows();
    }

    public function deleteAdmin()
    {
        $admin_id = "ADM1000000001";
        $this->db->delete('admin', ['admin_id' => $admin_id]);
        return $this->db->affected_rows();
    }
    
    public function filterAdmin($limit = null){
        $data = [
            'admin_id' => '001'
        ];
    
        $sql = 'SELECT * FROM admin WHERE';
        foreach($data as $key => $value){
            $sql = $sql." ".$key." LIKE '%". $value."%' OR";
        }
        $sql = rtrim($sql, "OR").';';
        return $this->db->query($sql)->result_array();
    }
}

