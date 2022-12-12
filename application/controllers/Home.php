<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		if ($this->input->get('logout') == 'true') {
			$this->session->login = null;
		}
		if ($this->session->login == null) {
			redirect(base_url('Auth'));
		}
	}
	
	public function Customer()
	{
		$data = [
			'css' => 'landing_page',
			'js' => 'landing_page',
			'title' => 'CompastianShop | Home'
		];
		$data['all_product'] = $this->product_model->getProduct();
		$this->load->view('template/header',$data);
		$this->load->view('landing_page',$data);
		$this->load->view('template/footer');
	}
	
	public function admin()
	{
		if ($this->input->post('addHero') != null) {
			$this->hero_model->addHero();
		}
		if ($this->input->post('addProduct') != null) {
			$this->product_model->addProduct();
			redirect(base_url('Home/admin'));
		}
		if ($this->input->post('updateProduct') != null) {
			$this->product_model->updateProduct();
			redirect(base_url('Home/admin'));
		}
		if ($this->input->post('deleteProduct') != null) {
			$this->product_model->deleteProduct();
			redirect(base_url('Home/admin'));
		}
		if ($this->input->post('deleteHero') != null) {
			$this->hero_model->deleteHero();
		}
		$data = [
			'css' => 'admin',
			'js' => 'landing_page',
			'title' => 'CompastianShop | Admin Page',
			'opt' => $this->input->post('opt')
		];
		$this->load->view('template/header',$data);
		$data['all_product'] = $this->product_model->getProduct();
		$data['all_hero'] = $this->hero_model->getHero();
		$this->load->view('admin',$data);
		$this->load->view('template/footer');
	}

	public function superAdmin()
	{
		$data = [
			'css' => 'landing_page',
			'js' => 'landing_page',
			'title' => 'CompastianShop | SuperAdmin Page'
		];
		$data['all_product'] = $this->product_model->getProduct();
		$this->load->view('template/header',$data);
		$this->load->view('landing_page',$data);
		$this->load->view('template/footer');
	}
	
}