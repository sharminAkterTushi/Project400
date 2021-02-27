<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
$this->load->library("cart");
$data['total_cart_items'] = count($this->cart->contents());


		$query=  $this->db->select('*')->from('products')->order_by('id','desc')->limit(9)->get();
		$data['products'] = $query->result_array();


		$query=  $this->db->select('*')->from('products')->order_by('review','desc')->limit(9)->get();
		$data['popular_products'] = $query->result_array();

		$this->load->view('template/header',$data);
		$this->load->view('home',$data);
		$this->load->view('template/footer');
	}
}
 