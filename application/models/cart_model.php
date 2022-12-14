<?php
class cart_model extends CI_Model
{
    public function addCart($url){
        if ($this->input->post('addcart')!=null) {
            $data = array_merge($this->input->post('addwc'),
            [
                'quantity' => $this->input->post('quantity'),
                'user_id' => $this->session->user_id
            ]);

            $this->db->insert('cart', $data);
            if($this->db->affected_rows() == 1){
                redirect($url);
            }else{
                echo "gagal";
            }
        }
    }
    
    public function getCart($limit = null){
            return $this->db->get_where('cart',['user_id' =>  $this->session->user_id])->result_array();
    }

    public function updateQuantity(){
        if ($this->input->post('update_qty') != null) {
            $data = [
                'id' => $this->input->post('cart_id'),
                'quantity' => $this->input->post('quantity')
            ];
            $this->db->update('cart', $data, ['id' => $data['id']]);
            if($this->db->affected_rows() == 1){
                redirect(base_url('Landing_page/cart'));
            }         
        }
    }


    
    public function deleteCart($id,$url){
        if ($id == 'all') {
            $this->db->delete('cart', ['user_id' => $this->session->user_id]);
        }else{
            $this->db->delete('cart', ['id' => $id]);
        }
        if($this->db->affected_rows() != 0){
            redirect($url);
        }
    }
}
?>