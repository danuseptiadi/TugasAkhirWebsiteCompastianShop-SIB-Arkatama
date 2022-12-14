<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function index()
	{
		if ($this->input->post('lgn')) {
			$this->user_model->login();
		}
		$this->load->view('components/login');
	}

	public function register(){
		if ($this->input->post('useradd') != null) {
            $this->user_model->addUser();
        }
		$this->load->view('components/user_register');
	}
	public function logout(){
		$this->session->sess_destroy();
		redirect('Landing_page');
	}
}