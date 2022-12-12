<?php

class owner_model extends CI_Model
{
    public function addOwner(){
        $data = [
            'owner_id' => 'OWN1000000001',
            'owner_name' => 'Malabi',
            'owner_gender' => 'male',
            'owner_birth' => '2022-12-01',
            'owner_email' => 'number',
            'owner_number' => '0896128144252',
            'owner_image' => 'OWN1000000001'
        ];
        $this->db->insert('owner', $data);
        return $this->db->affected_rows();
    }
    
    public function getOwner($limit = null,$data = null){
        if ($data == null) {
            return $this->db->get('owner',$limit)->result_array();
        } else {
            return $this->db->get_where('owner', $data)->row_array();
        }
    }
    
    public function updateOwner(){
        $data = [
            'owner_id' => 'OWN1000000001',
            'owner_name' => 'Malabi',
            'owner_gender' => 'male',
            'owner_birth' => '2022-12-01',
            'owner_email' => 'number',
            'owner_number' => '0896128144252',
            'owner_image' => 'OWN1000000001.jpg'
        ];

        $this->db->update('owner', $data, ['owner_id' => $data['owner_id']]);
        return $this->db->affected_rows();
    }

    public function deleteOwner()
    {
        $owner_id = "OWN1000000001";
        $this->db->delete('owner', ['owner_id' => $owner_id]);
        return $this->db->affected_rows();
    }
    
    public function filterOwner($limit = null){
        $data = [
            'owner_id' => '001'
        ];
    
        $sql = 'SELECT * FROM owner WHERE';
        foreach($data as $key => $value){
            $sql = $sql." ".$key." LIKE '%". $value."%' OR";
        }
        $sql = rtrim($sql, "OR").';';
        return $this->db->query($sql)->result_array();
    }
}

