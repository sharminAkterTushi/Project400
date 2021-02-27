<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	public function index()
	{

		$this->form_validation->set_rules('username', 'User Name', 'required|min_length[3]|max_length[30]|is_unique[users.username]');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->library("cart");
			$data['total_cart_items'] = count($this->cart->contents());
			$this->load->view('template/header',$data);
			$this->load->view('register');
			$this->load->view('template/footer');
		} else{
			$data['username']=$this->input->post('username');
			$data['email']=$this->input->post('email');
			$data['password']=md5($this->input->post('password'));

			$this->db->insert('users',$data);

			$insert_id = $this->db->insert_id();
			
			$last_id=md5($insert_id);
			
			
			$this->db->where('id',$insert_id);
			$this->db->set('unique_key',$last_id);
			$this->db->update('users');
			
			$edata['ulink']=base_url().'verify/pass/'.$last_id.'';
			$edata['uemail']='muhon199@gmail.com';
			

			require 'vendor/autoload.php'; 
			$email = new \SendGrid\Mail\Mail();
			
			$email->setFrom("muhon199@gmail.com", "E-shop");
			$email->setSubject("Verify your Email");
			$email->addTo($edata['uemail'], "shop");
			$email->addContent("text/html", "Hi, click here to verify your email address ".$edata['ulink']." ");


			$sendgrid = new \SendGrid('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');
			try {
				$sendgrid->send($email);
				
			} catch (Exception $e) {
				echo 'Caught exception: ' . $e->getMessage() . "\n";
			}

			$msg='<div class="alert alert-success">Congratulations! Your Account Created successfully. Please check your email to Verify.</div>';
			
			$this->session->set_flashdata('message',$msg);

			redirect('Register/index');

		}
	}

	

	public function email2(){
	require 'vendor/autoload.php'; // If you're using Composer (recommended)
// Comment out the above line if not using Composer
// require("<PATH TO>/sendgrid-php.php");
// If not using Composer, uncomment the above line and
// download sendgrid-php.zip from the latest release here,
// replacing <PATH TO> with the path to the sendgrid-php.php file,
// which is included in the download:
// https://github.com/sendgrid/sendgrid-php/releases
	$email = new \SendGrid\Mail\Mail();
            //$url = "http://localhost:8100/forgotten-password/" . $code;

	$email->setFrom("muhon199@gmail.com", "app-003");
	$email->setSubject("Forgot Password Link");
	$email->addTo("muhon199@gmail.com", "shop");
	$email->addContent("text/html", "Hi, your password reset code is ");


	$sendgrid = new \SendGrid('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');
	try {
		$sendgrid->send($email);
                //print $response->statusCode() . "\n";
                //print_r($response->headers());
               // print $response->body() . "\n";
	} catch (Exception $e) {
		echo 'Caught exception: ' . $e->getMessage() . "\n";
	}

}
}
