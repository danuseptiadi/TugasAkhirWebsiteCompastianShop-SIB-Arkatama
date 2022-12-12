<?php

class product_model extends CI_Model
{
    public function addProduct(){
        $sql = 'SELECT product_id FROM product ORDER BY product_id DESC LIMIT 1';
        $new_id = $this->db->query($sql)->row_array();
        if ($new_id != null) {
            $new_id = $new_id['product_id'];
            $new_id = 'PDT'.(int)trim($new_id,"PDT")+1;
        }else{
            $new_id = 'PDT10000000';
        }
        $product = $this->input->post('addProduct');
        $product = array_merge($product,[
            'product_id' => $new_id,
            'product_image' => $new_id.'.jpg',
            'last_submit' => $this->session->login['user_id']
        ]);
        $config['upload_path']          = './public/assets/product-img/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name'] = $product['product_image'];
        
        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('addproductimg'))
        {
                $error = array('error' => $this->upload->display_errors());
        }
        else
        {
                $data = array('upload_data' => $this->upload->data());
                $this->db->insert('product', $product);
                return $this->db->affected_rows();
        }
    }
    
    public function getProduct($limit = null,$product = null){
        if ($product == null) {
            return $this->db->get('product',$limit)->result_array();
        } else {
            return $this->db->get_where('product', $product)->row_array();
        }
    }

    public function updateProduct(){
        $product = $this->input->post('updateProduct');
        $product = array_merge($product,[
            'product_image' => $product['product_id'].'.jpg',
            'last_submit' => $this->session->login['user_id']
        ]);
        if ($this->input->post('upimg') != null) {
            $config['upload_path']          = './public/assets/product-img/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['file_name'] = $product['product_image'];
            
            $this->load->library('upload', $config);
            $path_to_file = 'public/assets/product-img/'.$product['product_id'].'.jpg';
            if(unlink($path_to_file)) {
                $message = "Data Berhasil Di Update";
                echo "<script type='text/javascript'>alert('$message');</script>";
            }
            else {
                $message = "Data Gagal Di Update";
                echo "<script type='text/javascript'>alert('$message');</script>";
            }
    
            if ( ! $this->upload->do_upload('updateProductimg'))
            {
                    $error = array('error' => $this->upload->display_errors());
            }
            else
            {
                    $data = array('upload_data' => $this->upload->data());
            }
            $this->db->update('product', $product, ['product_id' => $product['product_id']]);
            return $this->db->affected_rows();
        }
    }

    public function deleteProduct()
    {
        $product_id = $this->input->post('deleteProduct');
        $path_to_file = 'public/assets/hero-img/'.$product_id.'.jpg';
            if(unlink($path_to_file)) {
                $message = "Data Berhasil Di Hapus";
                echo "<script type='text/javascript'>alert('$message');</script>";
            }
            else {
                $message = "Data Gagal Di Hapus";
                echo "<script type='text/javascript'>alert('$message');</script>";
            }
        $this->db->delete('product', ['product_id' => $product_id]);
        return $this->db->affected_rows();
    }
    
    public function filterProduct($limit = null){
        $product = [
            'product_id' => '001'
        ];
    
        $sql = 'SELECT * FROM product WHERE';
        foreach($product as $key => $value){
            $sql = $sql." ".$key." LIKE '%". $value."%' OR";
        }
        $sql = rtrim($sql, "OR").';';
        return $this->db->query($sql)->result_array();
    }
}

