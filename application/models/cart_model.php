<?php

class cart_model extends CI_Model
{
    public function addCart(){
        $data = [
            'cart_id' => 'cart10000000001',
            'product_id' => 'PDT10000000001',
            'customer_id' => 'CTR10000000001'
        ];
        $this->db->insert('cart', $data);
        return $this->db->affected_rows();
    }
    
    
    public function getCart($limit = null,$data = null){
        if ($data == null) {
            return $this->db->get('cart',$limit)->result_array();
        } else {
            return $this->db->get_where('cart', $data)->row_array();
        }
    }
    
    
    public function updateCart(){
        $data = [
            'cart_id' => 'cart10000000001',
            'product_id' => 'PDT10000000001',
            'customer_id' => 'ADM10000000001'
        ];

        $this->db->update('cart', $data, ['cart_id' => $data['cart_id']]);
        return $this->db->affected_rows();
    }

    public function deleteCart()
    {
        $cart_id = "cart10000000001";
        $this->db->delete('cart', ['cart_id' => $cart_id]);
        return $this->db->affected_rows();
    }
    
    public function filterCart($limit = null){
        $data = [
            'cart_id' => '001'
        ];
    
        $sql = 'SELECT * FROM cart WHERE';
        foreach($data as $key => $value){
            $sql = $sql." ".$key." LIKE '%". $value."%' OR";
        }
        $sql = rtrim($sql, "OR").';';
        return $this->db->query($sql)->result_array();
    }
}

