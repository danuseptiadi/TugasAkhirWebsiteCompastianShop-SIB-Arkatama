<?php

class product_model extends CI_Model
{
    public function addProduct(){
        if ($this->input->post('add_product')!=null) {
            $sql = 'SELECT id FROM products ORDER BY id DESC LIMIT 1';
            $new_id = $this->db->query($sql)->row_array();
            if ($new_id != null) {
                $new_id = $new_id['id']+1;
                //$new_id = 'PDT'.(int)trim($new_id,"PDT")+1;
            }else{
                $new_id = 1;
            }
            $data = array_merge($this->input->post('addproduct'),
            [
                'id' => $new_id,
                'image_01' => $new_id.'pd_01.jpg',
                'image_02' => $new_id.'pd_011.jpg',
                'image_03' => $new_id.'pd_012.jpg'
            ]);
            $config['upload_path']          = './public/uploaded_img/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['file_name'] = $data['image_01'];
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('productimage_01') || !$this->upload->do_upload('productimage_02')||!$this->upload->do_upload('productimage_03'))
            {
                $error = array('error' => $this->upload->display_errors());
                var_dump($error);
            }else{
                $this->db->insert('products', $data);
                return $this->db->affected_rows();
            }
        }
    }
    
    public function getProduct($limit = null,$product = null){
        if ($product == null) {
            return $this->db->get('products',$limit)->result_array();
        } else {
            return $this->db->get_where('products',['id' => $product])->row_array();
        }
    }

    public function getTotalProduct(){
        $sql = "SELECT COUNT(id) as total FROM products";
        $data = $this->db->query($sql)->row_array();
        if ($data['total'] == null) {
            $data['total'] = 0;
        }
        return $data;
    }
    
    public function updateProduct(){
        if ($this->input->post('updateproduct')!=null) {
            $id = $this->input->post('updateproduct')['id'];
            $config['upload_path']          = './public/uploaded_img/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['file_name'] = $id.'pd_01.jpg';
            $this->load->library('upload', $config);
            if ($_FILES['updateproductimage_01']['name'] != null) {
                $path = 'public/uploaded_img/'.$id.'pd_01.jpg';
                if(is_file($path)){
                    unlink($path);
                    if(!$this->upload->do_upload('updateproductimage_01')){
                        echo'gagal upload';
                    }
                } 
            }
            if ($_FILES['updateproductimage_02']['name'] != null) {
                $path = 'public/uploaded_img/'.$id.'pd_011.jpg';
                if(is_file($path)){
                    unlink($path);
                    if(!$this->upload->do_upload('updateproductimage_02')){
                        echo'gagal upload';
                    }
                } 
            }
            if ($_FILES['updateproductimage_03']['name'] != null) {
                $path = 'public/uploaded_img/'.$id.'pd_012.jpg';
                if(is_file($path)){
                    unlink($path);
                    if(!$this->upload->do_upload('updateproductimage_03')){
                        echo'gagal upload';
                    }
                } 
            }
            $this->db->update('products', $this->input->post('updateproduct'), ['id' => $id]);
            return $this->db->affected_rows();
        }
    }

    public function deleteProduct($id)
    {
        $path_1 = 'public/uploaded_img/'.$id.'pd_01.jpg';
        $path_2 = 'public/uploaded_img/'.$id.'pd_011.jpg';
        $path_3 = 'public/uploaded_img/'.$id.'pd_012.jpg';
        if(is_file($path_1)){
            unlink($path_1);
        }
        if(is_file($path_2)){
            unlink($path_2);
        }
        if(is_file($path_3)){
            unlink($path_3);
        }
        $this->db->delete('products', ['id' => $id]);
            redirect(base_url('Admin/products'));
        return $this->db->affected_rows();
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

