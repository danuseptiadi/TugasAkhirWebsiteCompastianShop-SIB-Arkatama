<?php
class order_model extends CI_Model
{
    public function addOrder(){
        if ($this->input->post('order')!=null) {
            $data = array_merge($this->input->post('addorder'),
            [
                'user_id' => $this->session->user_id,
                'address' => $this->input->post('street').", ".$this->input->post('flat').", ".$this->input->post('city').", ".$this->input->post('state')." ".$this->input->post('county').", ".$this->input->post('pin_code')
            ]);

            $this->db->insert('orders', $data);
            if($this->db->affected_rows() == 1){
                $this->cart_model->deleteCart('all',base_url());
                echo "berhasil";
            }else{
                echo "gagal";
            }
        }
    }

    public function getTotalOrder($option){
        $sql = "SELECT sum(total_price) as total FROM orders WHERE payment_status = '".$option."'";
        $data = $this->db->query($sql)->row_array();
        if ($data['total'] == null) {
            $data['total'] = 0;
        }
        return $data;
    }
    
    public function getPlacedOrder(){
        $sql = "SELECT COUNT(id) as total FROM orders WHERE placed_on IS NOT NULL";
        $data = $this->db->query($sql)->row_array();
        if ($data['total'] == null) {
            $data['total'] = 0;
        }
        return $data;
    }
    
    public function getOrder(){
            return $this->db->get_where('orders',['user_id' =>  $this->session->user_id])->result_array();
    }

    public function update_payment(){
        if ($this->input->post('update_payment') != null) {
            $this->db->update('orders', $this->input->post('updateorder'), ['id' => $this->input->post('updateorder')['id']]);
            return $this->db->affected_rows();
        }
    }

    public function getAllOrders($limit = null){
        return $this->db->get('orders',$limit)->result_array();
    }

    public function deleteOrder($id){
            $this->db->delete('orders', ['id' => $id]);
            return $this->db->affected_rows();
        }

}
?>