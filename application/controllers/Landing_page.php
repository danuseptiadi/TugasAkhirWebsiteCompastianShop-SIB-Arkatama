<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landing_page extends CI_Controller {

	public function index()
	{
		$data = [
			'css' => 'landing_page',
			'js' => 'landing_page',
			'title' => 'CompastianShop | Landing Page'
		];
		$data['all_product'] = $this->product_model->getProduct();
		$this->load->view('template/header',$data);
		$this->load->view('landing_page',$data);
		$this->load->view('template/footer');
	}
}