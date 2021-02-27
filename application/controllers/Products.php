<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {


	public function index($cat_id)
	{
		$this->load->library('pagination');

		$query=  $this->db->select('*')->from('categories')->get();
		$data['categories'] = $query->result_array();
 

			$query=  $this->db->where('category_id',$cat_id);
		

		if (!empty($_GET['search'])) {
			$query = $this->db->LIKE('title', $_GET['search'],'both');
			$data['search']  = $_GET['search'];
			
		}


		$query=  $this->db->select('*')->from('products')->get();
		$total_rows = $query->num_rows();
		$data['products'] = $query->result_array();

		$config['suffix']          = "?" . http_build_query($_GET, '', "&");
		$config['base_url']        = site_url('Products/index/'.$cat_id.'/list/');
		$config['total_rows']      = $total_rows;
		$config['per_page']        = 12;
		$config['num_links']       = 4;
		$config['full_tag_open']   = '<ul class="pagination no-margin">';
		$config['full_tag_close']  = '</ul>';
		$config['cur_tag_open']    = '<li class="active"><a href="">';
		$config['cur_tag_close']   = '</a></li>';
		$config['prev_tag_open']   = '<li>';
		$config['prev_tag_close']  = '</li>';
		$config['next_tag_open']   = '<li>';
		$config['next_tag_close']  = '</li>';
		$config['num_tag_open']    = '<li>';
		$config['num_tag_close']   = '</li>';
		$config['last_tag_open']   = '<li>';
		$config['last_tag_close']  = '</li>';
		$config['first_tag_open']  = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['next_link']       = 'Next >';
		$config['prev_link']       = '< Prev';

		if ($this->uri->segment(4)) {
			$data['segment'] = $this->uri->segment(4);
		} else {
			$data['segment'] = 0;
		}

	$this->pagination->initialize($config);

			$query=  $this->db->where('category_id',$cat_id);

		if (!empty($_POST['search'])) {
			$query = $this->db->LIKE('title', $_POST['search'],'both');
			$data['search']  = $_POST['search'];
			$msg='<div class="alert alert-success">Search results for '."<b>".$_POST['search']."</b>".'</div>';
			$data['search'] = $msg;
			
		}

		$query = $this->db->limit($config['per_page'], $data['segment'])->select('*')->from('products')->get();

		$data['products'] = $query->result_array();

		$this->load->library("cart");

		$data['total_cart_items'] = count($this->cart->contents());


		$this->load->view('template/header',$data);
		$this->load->view('products',$data);
		$this->load->view('template/footer');
	}



public function search()
	{

		$this->load->library('pagination');
		$query=  $this->db->select('*')->from('categories')->get();
		$data['categories'] = $query->result_array();


		if (!empty($_POST['search'])) {
			$query = $this->db->LIKE('title', $_POST['search'],'both');
			$data['search']  = $_POST['search'];
			$msg='<div class="alert alert-success">Search results for '."<b>".$_POST['search']."</b>".'</div>';
			$data['search'] = $msg;
			
		}

		$query=  $this->db->select('*')->from('products')->get();
		$data['products'] = $query->result_array();


		$this->load->library("cart");

		$data['total_cart_items'] = count($this->cart->contents());


		$this->load->view('template/header',$data);
		$this->load->view('products',$data);
		$this->load->view('template/footer');
	}

	public function shop()
	{
		$this->load->library('pagination');
		$query=  $this->db->select('*')->from('categories')->get();
		$data['categories'] = $query->result_array();


		$query=  $this->db->select('*')->from('products')->get();
		$total_rows = $query->num_rows();
		$data['products'] = $query->result_array();

		$config['suffix']          = "?" . http_build_query($_GET, '', "&");
		$config['base_url']        = site_url('Products/shop/');
		$config['total_rows']      = $total_rows;
		$config['per_page']        = 12;
		$config['num_links']       = 4;
		$config['full_tag_open']   = '<ul class="pagination no-margin">';
		$config['full_tag_close']  = '</ul>';
		$config['cur_tag_open']    = '<li class="active"><a href="">';
		$config['cur_tag_close']   = '</a></li>';
		$config['prev_tag_open']   = '<li>';
		$config['prev_tag_close']  = '</li>';
		$config['next_tag_open']   = '<li>';
		$config['next_tag_close']  = '</li>';
		$config['num_tag_open']    = '<li>';
		$config['num_tag_close']   = '</li>';
		$config['last_tag_open']   = '<li>';
		$config['last_tag_close']  = '</li>';
		$config['first_tag_open']  = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['next_link']       = 'Next >';
		$config['prev_link']       = '< Prev';

		if ($this->uri->segment(3)) {
			$data['segment'] = $this->uri->segment(3);
		} else {
			$data['segment'] = 0;
		}

	$this->pagination->initialize($config);

		$query = $this->db->limit($config['per_page'], $data['segment'])->select('*')->from('products')->get();

		$data['products'] = $query->result_array();


		$this->load->library("cart");

		$data['total_cart_items'] = count($this->cart->contents());


		$this->load->view('template/header',$data);
		$this->load->view('products',$data);
		$this->load->view('template/footer');
	}




	public function top_product()
	{
		$this->load->library('pagination');
		$query=  $this->db->select('*')->from('categories')->get();
		$data['categories'] = $query->result_array();

		$query=  $this->db->order_by('review','desc');

		$query=  $this->db->select('*')->from('products')->get();
		$total_rows = $query->num_rows();
		$data['products'] = $query->result_array();

		$config['suffix']          = "?" . http_build_query($_GET, '', "&");
		$config['base_url']        = site_url('Products/top_product/');
		$config['total_rows']      = 36;
		$config['per_page']        = 12;
		$config['num_links']       = 4;
		$config['full_tag_open']   = '<ul class="pagination no-margin">';
		$config['full_tag_close']  = '</ul>';
		$config['cur_tag_open']    = '<li class="active"><a href="">';
		$config['cur_tag_close']   = '</a></li>';
		$config['prev_tag_open']   = '<li>';
		$config['prev_tag_close']  = '</li>';
		$config['next_tag_open']   = '<li>';
		$config['next_tag_close']  = '</li>';
		$config['num_tag_open']    = '<li>';
		$config['num_tag_close']   = '</li>';
		$config['last_tag_open']   = '<li>';
		$config['last_tag_close']  = '</li>';
		$config['first_tag_open']  = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['next_link']       = 'Next >';
		$config['prev_link']       = '< Prev';

		if ($this->uri->segment(3)) {
			$data['segment'] = $this->uri->segment(3);
		} else {
			$data['segment'] = 0;
		}

	$this->pagination->initialize($config);

		$query=  $this->db->order_by('review','desc');

		$query = $this->db->limit($config['per_page'], $data['segment'])->select('*')->from('products')->get();

		$data['products'] = $query->result_array();

		$this->load->library("cart");

		$data['total_cart_items'] = count($this->cart->contents());


		$this->load->view('template/header',$data);
		$this->load->view('products',$data);
		$this->load->view('template/footer');
	}


	public function details($id){


		$this->load->library("cart");

		$data['total_cart_items'] = count($this->cart->contents());

		$query=  $this->db->select('*')->from('products')->where('id',$id)->get();
		$data['products'] = $query->result_array();

		$data['reviews'] =  $this->db->select('*')->from('review')->join('users', 'review.user_id =users.id')->where('review.product_id',$id)->get()->result_array();

		

		$this->load->view('template/header',$data);
		$this->load->view('product_details',$data);
		$this->load->view('template/footer');

	}
}