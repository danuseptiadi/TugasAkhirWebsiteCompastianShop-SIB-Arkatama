<?php
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Product extends RestController
{
    public function index_get()
    {
        $product_model = $this->product_model->getProduct();
        if ($product_model) {
            $this->response([
                'status' => true,
                'message' => 'Login Sucess',
                'data' => $product_model
            ], 200);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Login Gagal'
            ], 404);
        }
    }
    
}
