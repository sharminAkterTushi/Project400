<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if(($this->session->userdata('admin_id'))){
		}else{
			redirect('Admin');
		}
}


	public function index()
	{

		$query = $this->db->select('*')->from('users')->get();
		$data['totalusers'] = $query->num_rows();
		$data['result'] = $query->result_array();

		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('user_list',$data);
		$this->load->view('admin/footer');

	}

	public function delete($id)
	{
		$this->db->where('id',$id);

		$this->db->delete('users');

		$msg='<div class="alert alert-success">User account deleted successfully!</div>';
		
		$this->session->set_flashdata('message',$msg);

		redirect($_SERVER['HTTP_REFERER']);
	}



	public function messages()
	{

		$query = $this->db->select('*')->from('contact')->order_by('id','desc')->get();
		$data['totalmessage'] = $query->num_rows();
		$data['result'] = $query->result_array();

		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('user_message',$data);
		$this->load->view('admin/footer');

	}

	public function message_delete($id)
	{
		$this->db->where('id',$id);

		$this->db->delete('contact');

		$msg='<div class="alert alert-success">Message deleted successfully!</div>';
		
		$this->session->set_flashdata('message',$msg);

		redirect($_SERVER['HTTP_REFERER']);
	}


}