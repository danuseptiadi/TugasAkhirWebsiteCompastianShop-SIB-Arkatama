<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	function __construct()
	{
		parent::__construct();
        if ($this->session->admin_id == null) {
			redirect(base_url('Auth'));
		}
		
	}

	public function index()
	{
        $data['total_pending'] = $this->order_model->getTotalOrder('pending');
        $data['total_product'] = $this->product_model->getTotalProduct();
        $data['total_completes'] = $this->order_model->getTotalOrder('completed');
        $data['total_placed'] = $this->order_model->getPlacedOrder('completed');
        $data['total_user'] = $this->user_model->getTotalUser();
        $data['total_admin'] = $this->admin_model->getTotalAdmin();
        $data['total_message'] = $this->message_model->getTotalMessage();
        $data['admin'] = $this->admin_model->getAdmin();

		$this->load->view('admin/dashboard',$data);
	}

    public function products($delete = null){
        $data['admin'] = $this->admin_model->getAdmin();
        $data['products'] = $this->product_model->getProduct();
        if ($delete != null) {
            $this->product_model->deleteProduct($delete);
        }
        $this->product_model->addProduct();
        $this->load->view('admin/products',$data);
        if ($delete != null) {
            $this->product_model->deleteProduct($delete);
        }
    }

    public function hero($delete = null){
        $data['admin'] = $this->admin_model->getAdmin();
        $data['hero'] = $this->hero_model->getHero();
        if ($delete != null) {
            $this->hero_model->deleteHero($delete);
        }
        $this->hero_model->addHero();
        $this->load->view('admin/hero',$data);
    }

    public function herosuper($delete = null){
        $data['admin'] = $this->admin_model->getAdmin();
        $data['hero'] = $this->hero_model->getHero();
        $this->hero_model->updateHero();
        if ($delete != null) {
            $this->hero_model->deleteHero($delete);
        }
        $this->load->view('superadmin/hero',$data);
    }

    public function update_product($id = null){
        $data['admin'] = $this->admin_model->getAdmin();
        $data['product'] = $this->product_model->getProduct(1,$id);
        $this->product_model->updateProduct();
        $this->load->view('admin/update_product',$data);
    }

    public function orders($delete = null){
        $data['admin'] = $this->admin_model->getAdmin();
        $data['orders'] = $this->order_model->getAllOrders();
        if ($delete != null) {
            $this->order_model->deleteOrder($delete);
        }
        $this->product_model->updateProduct();
        $this->order_model->update_payment();
        $this->load->view('admin/placed_orders',$data);
    }

    public function accounts($delete = null){
        $data['admin'] = $this->admin_model->getAdmin();
        $data['admins'] = $this->admin_model->getAllAdmin();
        $data['orders'] = $this->order_model->getAllOrders();
        if ($delete != null) {
            $this->admin_model->deleteAdmin($delete);
        }
        $this->product_model->updateProduct();
        $this->order_model->update_payment();
        $this->load->view('admin/admin_accounts',$data);
    }

    public function update_profile(){
        $data['admin'] = $this->admin_model->getAdmin();
        if ($this->input->post('upadm') != null) {
            $this->admin_model->updateAdmin();
        }
        $this->load->view('admin/update_profile',$data);
    }
    public function register(){
        $data['admin'] = $this->admin_model->getAdmin();
        if ($this->input->post('admadd') != null) {
            $this->admin_model->addAdmin();
        }
        $this->load->view('admin/register_admin',$data);
    }

    public function users($delete = null){
        $data['admin'] = $this->admin_model->getAdmin();
        $data['users'] = $this->user_model->getAllUser();
        if ($delete != null) {
            $this->user_model->deleteUser($delete);
        }
        $this->load->view('admin/users_accounts',$data);
    }

    public function messages($delete = null){
        $data['admin'] = $this->admin_model->getAdmin();
        $data['messages'] = $this->message_model->getAllMessage();
        if ($delete != null) {
            $this->message_model->deleteMessage($delete);
        }
        $this->load->view('admin/messages',$data);
    }

	public function logout(){
		$this->session->sess_destroy();
		redirect('Landing_page');
	}
}