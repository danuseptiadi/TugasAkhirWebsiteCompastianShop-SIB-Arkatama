<?php
class message_model extends CI_Model
{
    public function addMessage(){
        if ($this->input->post('sendmsg')!=null) {
            var_dump($this->input->post('addmessage'));
            $data = array_merge($this->input->post('addmessage'),
            [
                'user_id' => $this->session->user_id
            ]);

            $this->db->insert('messages', $data);
            if($this->db->affected_rows() == 1){
                redirect('Landing_page');
            }else{
                echo "gagal";
            }
        }
    }
    public function getAllMessage($limit = null){
        return $this->db->get('messages',$limit)->result_array();
    }
    
    public function getMessage($limit = null){
            return $this->db->get_where('messages',['user_id' =>  $this->session->user_id])->result_array();
    }

    public function getTotalMessage(){
        $sql = "SELECT COUNT(id) as total FROM messages";
        $data = $this->db->query($sql)->row_array();
        if ($data['total'] == null) {
            $data['total'] = 0;
        }
        return $data;
    }

    public function deleteMessage($id){
        $this->db->delete('messages', ['id' => $id]);
        return $this->db->affected_rows();
    }
}
?>