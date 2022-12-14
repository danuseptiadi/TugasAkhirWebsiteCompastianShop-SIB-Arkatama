<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landing_page extends CI_Controller {

	function __construct($logout = null)
	{
		parent::__construct();
		if ($this->session->user_id == null) {
			$this->session->user_id = 'pengunjung';
		}
		if($this->input->post() != null && $this->session->user_id == 'pengunjung'){
			redirect(base_url('Auth'));
		}
	}

	public function index()
	{
		$data['all_product'] = $this->product_model->getProduct(10);
		$data['wishlist'] = $this->wishlist_model->getWishlist();
		$data['hero'] = $this->hero_model->getAccHero();
		$this->wishlist_model->addWishlist(base_url('Landing_page'));
		$data['cart'] = $this->cart_model->getCart();
		$this->cart_model->addCart(base_url('Landing_page'));
		$data['user'] = $this->user_model->getUser();
		$this->load->view('components/home', $data);
	}
	
	public function shop(){
		$data['all_product'] = $this->product_model->getProduct();
		$data['wishlist'] = $this->wishlist_model->getWishlist();
		$this->wishlist_model->addWishlist(base_url('Landing_page/shop'));
		$data['cart'] = $this->cart_model->getCart();
		$this->cart_model->addCart(base_url('Landing_page/shop'));
		$data['user'] = $this->user_model->getUser();
		$this->load->view('components/shop', $data);

	}

	public function orders(){
		$data['all_product'] = $this->product_model->getProduct();
		$data['wishlist'] = $this->wishlist_model->getWishlist();
		$data['cart'] = $this->cart_model->getCart();
		$data['user'] = $this->user_model->getUser();
		$data['orders'] = $this->order_model->getOrder();
		$this->load->view('components/orders', $data);

	}
	public function contact(){
		$data['all_product'] = $this->product_model->getProduct();
		$data['wishlist'] = $this->wishlist_model->getWishlist();
		$data['cart'] = $this->cart_model->getCart();
		$data['user'] = $this->user_model->getUser();
		$data['messages'] = $this->message_model->addMessage();
		$this->load->view('components/contact', $data);

	}

	public function about(){
		$data['wishlist'] = $this->wishlist_model->getWishlist();
		$data['cart'] = $this->cart_model->getCart();
		$data['user'] = $this->user_model->getUser();
		$this->load->view('components/about', $data);
		
	}
	public function search_page(){
		if ($this->input->post('search_box') != null) {
			$data['all_product'] = $this->product_model->filterProduct($this->input->post('search_box'));
		}
		$data['wishlist'] = $this->wishlist_model->getWishlist();
		$this->wishlist_model->addWishlist(base_url('Landing_page/search_page'));
		$data['cart'] = $this->cart_model->getCart();
		$this->cart_model->addCart(base_url('Landing_page/search_page'));
		$data['user'] = $this->user_model->getUser();
		$data['messages'] = $this->message_model->addMessage();
		$this->load->view('components/search_page', $data);
		
	}

	public function category($category = null){
		$data['all_product'] = $this->product_model->filterProduct($category);
		$data['wishlist'] = $this->wishlist_model->getWishlist();
		$this->wishlist_model->addWishlist(base_url('Landing_page/category/'.$category));
		$data['cart'] = $this->cart_model->getCart();
		$this->cart_model->addCart(base_url('Landing_page/category/'.$category));
		$data['user'] = $this->user_model->getUser();
		$data['messages'] = $this->message_model->addMessage();
		$data['page'] = $category;
		$this->load->view('components/category', $data);
		
	}

	public function wishlist($delete = null){
		$data['wishlist'] = $this->wishlist_model->getWishlist();
		$data['cart'] = $this->cart_model->getCart();
		$this->cart_model->addCart(base_url('Landing_page/wishlist'));
		$data['user'] = $this->user_model->getUser();
		if ($delete != null) {
			$this->wishlist_model->deleteWishlist($delete,base_url('Landing_page/wishlist'));
		}
		$this->load->view('components/wishlist', $data);
		
	}
	
	public function cart($delete = null){
		$data['wishlist'] = $this->wishlist_model->getWishlist();
		$this->wishlist_model->addWishlist(base_url('Landing_page/cart'));
		$data['carts'] = $this->cart_model->getCart();
		$this->cart_model->addCart(base_url('Landing_page/cart'));
		$data['user'] = $this->user_model->getUser();
		if ($delete != null) {
			$this->cart_model->deleteCart($delete,base_url('Landing_page/cart'));
		}
		$this->cart_model->updateQuantity();
		$this->load->view('components/cart', $data);

	}
	
	public function quick_view($product_id = null){
		$data['product'] = $this->product_model->getProduct(1,$product_id);
		$data['wishlist'] = $this->wishlist_model->getWishlist();
		$this->wishlist_model->addWishlist(base_url('Landing_page/quick_view/'.$product_id));
		$data['cart'] = $this->cart_model->getCart();
		$this->cart_model->addCart(base_url('Landing_page/quick_view/'.$product_id));
		$data['user'] = $this->user_model->getUser();
		$this->load->view('components/quick_view', $data);
		
	}
	public function checkout(){
		$data['wishlist'] = $this->wishlist_model->getWishlist();
		$data['cart'] = $this->cart_model->getCart();
		$data['user'] = $this->user_model->getUser();
		$this->order_model->addOrder();
		$this->load->view('components/checkout', $data);
		
	}

	public function update_user(){
		$data['wishlist'] = $this->wishlist_model->getWishlist();
		$data['cart'] = $this->cart_model->getCart();
		$data['user'] = $this->user_model->getUser();
		$this->user_model->updateUser();
		$this->load->view('components/update_user', $data);
		
	}

	
}