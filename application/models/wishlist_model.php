<?php
class wishlist_model extends CI_Model
{
    public function addWishlist($url){
        if ($this->input->post('addwish')!=null) {
            $data = array_merge($this->input->post('addwc'),
        [
            'user_id' => $this->session->user_id
        ]);
            $this->db->insert('wishlist', $data);
            if($this->db->affected_rows() == 1){
                redirect($url);
            }else{
                echo "gagal";
            }
        }
    }
    
    public function getWishlist($limit = null){
        return $this->db->get_where('wishlist',['user_id' =>  $this->session->user_id])->result_array();
    }

    public function deleteWishlist($id,$url){
        if ($id == 'all') {
            $this->db->delete('wishlist', ['user_id' => $this->session->user_id]);
        }else{
            $this->db->delete('wishlist', ['id' => $id]);
        }
        if($this->db->affected_rows() != 0){
            redirect($url);
        }
    }
}
?>