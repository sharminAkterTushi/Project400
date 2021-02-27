<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CI_Controller {

 
	public function __construct(){
		parent::__construct();
		if(($this->session->userdata('admin_id'))){
		}else{
			redirect('Admin');
		}
}

	public function add_categories()
	{

		$this->form_validation->set_rules('name', 'Name', 'required');


		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('admin/header');
			$this->load->view('admin/sidebar');
			$this->load->view('add_categories');
			$this->load->view('admin/footer');
		}else{

			$data['name']=$this->input->post('name');

			$this->db->insert('categories',$data);

			$msg='<div class="alert alert-success">Added successfully!</div>';
		
		$this->session->set_flashdata('message',$msg);
			redirect($_SERVER['HTTP_REFERER']);

		
	}
}




	public function edit_categories($id)
	{
		
		$this->form_validation->set_rules('name', 'Category Name', 'required');

		if ($this->form_validation->run() == FALSE)
		{



			$query=  $this->db->select('*')->from('categories')->where('id',$id)->get();

			$data['categories'] = $query->result_array();

			$this->load->view('admin/header');
			$this->load->view('admin/sidebar');
			$this->load->view('edit_categories',$data);
			$this->load->view('admin/footer');
		}else{


			$data['name']=$this->input->post('name');

			
			$this->db->where('id',$id);

			$this->db->update('categories',$data);

			$msg='<div class="alert alert-success">Updated successfully!</div>';
		
		$this->session->set_flashdata('message',$msg);

			redirect('Categories');

		}

}
public function index(){

$this->load->library('pagination');

		if (!empty($_GET['id'])) {

			$query = $this->db->where('id', $_GET['id']);
			$data['id'] = $_GET['id'];
		}

		if (!empty($_GET['name'])) {

			$query = $this->db->LIKE('name', $_GET['name'],'both');
			$data['name'] = $_GET['name'];
		}


		$query=$this->db->select('*')->from('categories')->get();

		$data['totalcategories'] = $query->num_rows();

		$data['result'] = $query->result_array();

		$config['suffix']          = "?" . http_build_query($_GET, '', "&");
		$config['base_url']        = site_url('Categories/');
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

		if (!empty($_GET['id'])) {

			$query = $this->db->where('id', $_GET['id']);
			$data['id'] = $_GET['id'];
		}

		if (!empty($_GET['name'])) {

			$query = $this->db->LIKE('name', $_GET['name'],'both');
			$data['name'] = $_GET['name'];
		}


		$query = $this->db->limit($config['per_page'], $data['segment'])->select('*')->from('categories')->get();

		$data['result'] = $query->result_array();

			$this->load->view('admin/header');
			$this->load->view('admin/sidebar');
			$this->load->view('categories',$data);
			$this->load->view('admin/footer');

}

	public function delete($id)
	{
		
		$this->db->where('id',$id);
		$this->db->delete('categories');

	$msg='<div class="alert alert-success">Deleted successfully!</div>';
		
		$this->session->set_flashdata('message',$msg);

		redirect('Categories');
	}


}
