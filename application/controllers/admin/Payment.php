<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Payment  extends CI_Controller 
{
	
	function __construct()
	{
		parent::__construct();
		$admin_id = $this->session->userdata('ADMIN_ID');
		if(empty($admin_id))
		{
			redirect('admin');
		}
	}
	
	public function listing()
	{
		$data['RESULT'] = $this->payment_model->get_all_payment(); 
		$this->load->view('admin/payment/listing',$data);
	}
	

	
}