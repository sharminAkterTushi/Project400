<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reviews extends CI_Controller { 

	public function add_reviews($id){


		if(($this->session->userdata('userid'))){
		}else{ redirect('Login'); }
		
$check = $this->db->select('user_id')->from('review')->where('user_id',$this->session->userdata('userid'))->where('product_id', $id)->get()->num_rows();
if ($check > 0) {

			$msg='<div class="alert alert-danger">You already reviewed on this product.</div>';

			$this->session->set_flashdata('message',$msg);
			
			redirect($_SERVER['HTTP_REFERER']); 

}

		$this->form_validation->set_rules('review', 'Review', 'required');
		$this->form_validation->set_rules('rate', 'Rating', 'required');


		if ($this->form_validation->run() == FALSE)
		{


			$msg='<div class="alert alert-danger">Review and rating are required</div>';

			$this->session->set_flashdata('message',$msg);
			
			redirect($_SERVER['HTTP_REFERER']);

			
		}else{

			$data['user_id']=$this->session->userdata('userid');
			$data['product_id']=$id;
			$data['review']=$this->input->post('review');
			$data['rating']=$this->input->post('rate');

			$this->db->insert('review',$data);


			/*update review rating*/

			$this->db->select_avg('rating');
			$this->db->where('product_id',$id);
			$result = $this->db->get('review')->row();  
			$avg_rating =  round($result->rating);


			$this->db->set('review','review+1',FALSE);
			$this->db->set('total_rating','total_rating+1',FALSE);
			$this->db->set('avg_rating',$avg_rating);
			$this->db->where('id',$data['product_id']);
			$this->db->update('products');

			/*update review rating*/


			$msg='<div class="alert alert-success">Reviewed successfully!</div>';

			$this->session->set_flashdata('message',$msg);
			redirect($_SERVER['HTTP_REFERER']);


		}

	}

}