<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {


	public function index()
	{
		$this->session->unset_userdata('userid');
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('username');
		redirect('Login');
	}
}
