<?php
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Login extends RestController
{
    public function index_post($user = null, $pass = null)
    {
        $user = $this->post('username');
        $pass = $this->post('password');
        var_dump($this->post());
            $user_model = $this->user_model->getDataLogin($user,$pass);

        if ($user_model) {
            $this->response([
                'status' => true,
                'message' => 'Login Sucess',
                'data' => $user_model
            ], 200);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Login Gagal'
            ], 404);
        }
    }

    public function index_put(){
        $user = $this->put('username');
        $pass = $this->put('password');
        $login = $this->user_model->getDataLogin($user,$pass);
        if ($login) {
            $this->response([
                'status' => true,
                'message' => 'Sucess',
                'data' => $login
            ], 200);
        }else{
            $this->response([
                'status' => true,
                'message' => 'Gagal Login'
            ], 200);

        }
    }

    
}
