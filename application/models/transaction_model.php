<?php

class transaction_model extends CI_Model
{
    public function addTransaction(){
        $data = [
            'transaction_id' => 'TRX1000000001',
            'customer_id' => 'CTR1000000001',
            'product_id' => 'PDT1000000001',
            'total_price' => '1000',
            'payment_status' => 'sudah di bayar',
            'transaction_process' => 'selesai',
            'testimoni' => 'baguss'
        ];
        $this->db->insert('transaction', $data);
        return $this->db->affected_rows();
    }
    
    
    public function getTransaction($limit = null,$data = null){
        if ($data == null) {
            return $this->db->get('transaction',$limit)->result_array();
        } else {
            return $this->db->get_where('transaction', $data)->row_array();
        }
    }
    
    
    public function updateTransaction(){
        $data = [
            'transaction_id' => 'TRX1000000001',
            'customer_id' => 'CTR1000000001',
            'product_id' => 'PDT1000000001',
            'total_price' => '2000',
            'payment_status' => 'sudah di bayar',
            'transaction_process' => 'selesai',
            'testimoni' => 'baguss'
        ];

        $this->db->update('transaction', $data, ['transaction_id' => $data['transaction_id']]);
        return $this->db->affected_rows();
    }

    public function deleteTransaction()
    {
        $transaction_id = "TRX1000000001";
        $this->db->delete('transaction', ['transaction_id' => $transaction_id]);
        return $this->db->affected_rows();
    }
    
    public function filterTransaction($limit = null){
        $data = [
            'transaction_id' => '001'
        ];
    
        $sql = 'SELECT * FROM transaction WHERE';
        foreach($data as $key => $value){
            $sql = $sql." ".$key." LIKE '%". $value."%' OR";
        }
        $sql = rtrim($sql, "OR").';';
        return $this->db->query($sql)->result_array();
    }
}

