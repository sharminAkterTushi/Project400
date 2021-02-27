<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {


	public function index()
	{

		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required');


		if ($this->form_validation->run() == FALSE)
		{

$this->load->library("cart");
$data['total_cart_items'] = count($this->cart->contents());

			$this->load->view('template/header',$data);
			$this->load->view('login');
			$this->load->view('template/footer');

		}else{

			 $data['email']=$this->input->post('email');
			 $data['password']=md5($this->input->post('password'));

			$this->db->where('email',$data['email']);
			$this->db->where('password',$data['password']);
			$query=$this->db->get('users');
			$result=$query->result_array();


			if ($result) {

				if($result[0]['status']=='0'){
					
					$msg='<div class="alert alert-danger"> Your Account is  not Verifed Yet! </div>';
					
					$this->session->set_flashdata('message',$msg);
					
					
					redirect('login');
					
				} 
				if($result[0]['status']=='1'){
	          $this->session->set_userdata('userid', $result[0]['id']);
            $this->session->set_userdata('email', $result[0]['email']);
            $this->session->set_userdata('username', $result[0]['username']);
 
				redirect(base_url());
			}
			}
		else{

			$msg='<div class="alert alert-danger">Invalid Username or Password </div>';

			$this->session->set_flashdata('message',$msg);

			redirect('Login');

		}

	}
}
}