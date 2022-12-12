<?php

class hero_model extends CI_Model
{
    public function addHero(){
        $sql = 'SELECT hero_id FROM hero ORDER BY hero_id DESC LIMIT 1';
        $new_id = $this->db->query($sql)->row_array();
        if ($new_id != null) {
            $new_id = $new_id['hero_id'];
            $new_id = 'hero'.(int)trim($new_id,"hero")+1;
        }else{
            $new_id = 'hero1000000000';
        }
        $hero = [
                    'hero_id' => $new_id,
                    'hero_title' => $this->input->post('addHero')['hero_title'],
                    'hero_image' => $new_id.'.jpg',
                    'hero_status' => 'waiting',
                    'last_submit' => $this->session->login['user_id']
                ];
        $config['upload_path']          = './public/assets/hero-img/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name'] = $hero['hero_image'];
        
        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('addHeroimg'))
        {
                $error = array('error' => $this->upload->display_errors());
        }
        else
        {
                $data = array('upload_data' => $this->upload->data());
                $this->db->insert('hero', $hero);
                return $this->db->affected_rows();
        }
    }
    
    
    public function getHero($limit = null,$data = null){
        if ($data == null) {
            return $this->db->get('hero',$limit)->result_array();
        } else {
            return $this->db->get_where('hero', $data)->row_array();
        }
    }
    
    
    public function updateHero(){
        $hero = [
            'hero_id' => 'hero10000000001',
            'hero_title' => 'Account Telegram',
            'hero_image' => 'hero10000000001.jpg',
            'hero_status' => 'disetujui',
            'last_submit' => 'ADM10000000001'
        ];
        
        $path_to_file = 'public/assets/hero-img/'.$hero['hero_image'];
		if(unlink($path_to_file)) {
			 echo 'deleted successfully';
		}
		else {
			 echo 'errors occured';
		}

        $this->db->update('hero', $hero, ['hero_id' => $hero['hero_id']]);
        return $this->db->affected_rows();
    }

    public function deleteHero()
    {
        if ($this->input->post('deleteHero') != null) {
            $hero_id = $this->input->post('deleteHero');
            $path_to_file = 'public/assets/hero-img/'.$hero_id.'.jpg';
            if(unlink($path_to_file)) {
                $message = "Data Berhasil Di Hapus";
                echo "<script type='text/javascript'>alert('$message');</script>";
            }
            else {
                $message = "Data Gagal Di Hapus";
                echo "<script type='text/javascript'>alert('$message');</script>";
            }
            $this->db->delete('hero', ['hero_id' => $hero_id]);
            return $this->db->affected_rows();
        }
    }
    
    public function filterHero($limit = null){
        $data = [
            'hero_id' => '001'
        ];
    
        $sql = 'SELECT * FROM hero WHERE';
        foreach($data as $key => $value){
            $sql = $sql." ".$key." LIKE '%". $value."%' OR";
        }
        $sql = rtrim($sql, "OR").';';
        return $this->db->query($sql)->result_array();
    }
}

