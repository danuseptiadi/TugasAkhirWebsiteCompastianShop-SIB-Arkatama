<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function index()
	{
		$this->login_model->Login();
		$this->session->sess_destroy();
		$data = [
			'css' => 'login',
			'js' => 'login',
			'title' => 'CompastianShop | Login'
		];
		$this->load->view('template/header',$data);
		$this->load->view('login');
		$this->load->view('template/footer',$data);
	}
}