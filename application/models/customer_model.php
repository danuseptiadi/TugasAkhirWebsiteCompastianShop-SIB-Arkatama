<?php

class customer_model extends CI_Model
{
    public function addCustomer(){
        $data = [
            'customer_id' => 'CTR100000001',
            'customer_name' => 'Malabi',
            'customer_gender' => 'male',
            'customer_birth' => '2022-12-01',
            'customer_email' => 'number',
            'customer_number' => '0896128144252',
            'customer_image' => 'CTR100000001'
        ];
        $this->db->insert('customer', $data);
        return $this->db->affected_rows();
    }
    
    public function getCustomer($limit = null,$data = null){
        if ($data == null) {
            return $this->db->get('customer',$limit)->result_array();
        } else {
            return $this->db->get_where('customer', $data)->row_array();
        }
    }
    
    public function updateCustomer(){
        $data = [
            'customer_id' => 'CTR100000001',
            'customer_name' => 'Malabi',
            'customer_gender' => 'male',
            'customer_birth' => '2022-12-01',
            'customer_email' => 'number',
            'customer_number' => '0896128144252',
            'customer_image' => 'CTR100000001.jpg'
        ];

        $this->db->update('customer', $data, ['customer_id' => $data['customer_id']]);
        return $this->db->affected_rows();
    }

    public function deleteCustomer()
    {
        $customer_id = "CTR100000001";
        $this->db->delete('customer', ['customer_id' => $customer_id]);
        return $this->db->affected_rows();
    }
    
    public function filterCustomer($limit = null){
        $data = [
            'customer_id' => '001'
        ];
    
        $sql = 'SELECT * FROM customer WHERE';
        foreach($data as $key => $value){
            $sql = $sql." ".$key." LIKE '%". $value."%' OR";
        }
        $sql = rtrim($sql, "OR").';';
        return $this->db->query($sql)->result_array();
    }
}

