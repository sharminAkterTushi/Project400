<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {



	public function index()
	{

		$this->form_validation->set_rules('name', 'Name', 'required');

		$this->form_validation->set_rules('email', 'Email', 'required');
		
		$this->form_validation->set_rules('message', 'Message', 'required');


		if ($this->form_validation->run() == FALSE)
		{

$this->load->library("cart");
$data['total_cart_items'] = count($this->cart->contents());
			$this->load->view('template/header',$data);
			$this->load->view('contact');
			$this->load->view('template/footer');
		}else{

			$data['name']=$this->input->post('name');
			$data['email']=$this->input->post('email');
			$data['message']=$this->input->post('message');
			$data['message']=$this->input->post('message');
			$data['time']=date("Y-m-d");


			$this->db->insert('contact',$data);

			$msg='<div class="alert alert-success">Thanks for your message!</div>';
		
		$this->session->set_flashdata('message',$msg);
			redirect($_SERVER['HTTP_REFERER']);

		
	}
}


public function messages(){

$this->load->library('pagination');

		if (!empty($_GET['name'])) {

			$query = $this->db->LIKE('name', $_GET['name']);
			$data['name'] = $_GET['name'];
		}


		if (!empty($_GET['email'])) {

			$query = $this->db->LIKE('email', $_GET['email'],'both');
			$data['email'] = $_GET['email'];
		}

		if (!empty($_GET['message'])) {

			$query = $this->db->LIKE('message', $_GET['message'],'both');
			$data['message'] = $_GET['message'];
		}


		$query=$this->db->select('*')->from('contact')->get();

		$data['totalmessage'] = $query->num_rows();

		$data['result'] = $query->result_array();

		$config['suffix']          = "?" . http_build_query($_GET, '', "&");
		$config['base_url']        = site_url('Contact/messages/');
		$config['total_rows']      = $query->num_rows();
		$config['per_page']        = 10;
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


		if (!empty($_GET['name'])) {

			$query = $this->db->LIKE('name', $_GET['name']);
			$data['name'] = $_GET['name'];
		}


		if (!empty($_GET['email'])) {

			$query = $this->db->LIKE('email', $_GET['email'],'both');
			$data['email'] = $_GET['email'];
		}

		if (!empty($_GET['message'])) {

			$query = $this->db->LIKE('message', $_GET['message'],'both');
			$data['message'] = $_GET['message'];
		}


		$query = $this->db->limit($config['per_page'], $data['segment'])->select('*')->from('contact')->get();

		$data['result'] = $query->result_array();




			$this->load->view('admin/header');
			$this->load->view('admin/sidebar');
			$this->load->view('messages',$data);
			$this->load->view('admin/footer');

}

	public function delete($id)
	{
		
		$this->db->where('id',$id);
		$this->db->delete('contact');

	$msg='<div class="alert alert-success">Deleted successfully!</div>';
		
		$this->session->set_flashdata('message',$msg);

		redirect('Contact/messages');
	}


}
