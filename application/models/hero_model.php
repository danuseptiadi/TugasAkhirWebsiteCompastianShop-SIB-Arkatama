<?php

class hero_model extends CI_Model
{
    public function addHero(){
        if ($this->input->post('add_hero')!=null) {
            $sql = 'SELECT id FROM hero ORDER BY id DESC LIMIT 1';
            $new_id = $this->db->query($sql)->row_array();
            if ($new_id != null) {
                $new_id = $new_id['id']+1;
                //$new_id = 'PDT'.(int)trim($new_id,"PDT")+1;
            }else{
                $new_id = 1;
            }
            $data = array_merge($this->input->post('addhero'),
            [
                'id' => $new_id,
                'img' => $new_id.'hr_01.jpg',
                'status' => 'belum disetujui'
            ]);
            $config['upload_path']          = './public/uploaded_img/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['file_name'] = $data['img'];
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('heroimg'))
            {
                $error = array('error' => $this->upload->display_errors());
                var_dump($error);
            }else{
                $this->db->insert('hero', $data);
                return $this->db->affected_rows();
            }
        }
    }
    
    public function getHero($limit = null,$product = null){
        if ($product == null) {
            return $this->db->get('hero',$limit)->result_array();
        } else {
            return $this->db->get_where('hero',['id' => $product])->row_array();
        }
    }
    public function getAccHero($limit = null){
            return $this->db->get_where('hero',['status' => 'disetujui'])->result_array();
    }
    
    public function updateHero(){
        if ($this->input->post('update_hero_status')!=null) {
            
            $this->db->update('hero', $this->input->post('herosuper'), ['id' => $this->input->post('herosuper')['id']]);
            return $this->db->affected_rows();
        }
    }

    public function deleteHero($id)
    {
        $path = 'public/uploaded_img/'.$id.'hr_01.jpg';
        if(is_file($path)){
            unlink($path);
        }
        $this->db->delete('hero', ['id' => $id]);
        if ($this->db->affected_rows() == 1) {
            redirect(base_url('Admin/hero'));
        }
    }

    
    public function filterProduct($cari){
        $data = [
            'name' => $cari,
            'produsen' => $cari,
            'details' => $cari  
        ];
    
        $sql = 'SELECT * FROM products WHERE';
        foreach($data as $key => $value){
            $sql = $sql." ".$key." LIKE '%". $value."%' OR";
        }
        $sql = rtrim($sql, "OR").';';
        return $this->db->query($sql)->result_array();
    }
}

