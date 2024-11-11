<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
	}
	
	public function index()
	{
		$this->check_admin_login('IS_LOGIN');
		if(isset($_POST['login']))
		{
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			if(empty($email) || empty($password))
			{
				$this->session->set_flashdata('msg','<div class="alert alert-danger">Invalid login credentials. please try again</div>');
				redirect('admin');
			}
			else
			{
				$rows = $this->admin_model->admin_login($email,$password);
				if(count($rows)==1)
				{
					if($rows[0]->status==0)
					{
						$this->session->set_flashdata('msg','<div class="alert alert-warning">Your account has been disabled. Please contact your system administrator.</div>');
						redirect('admin/');
					}
					else
					{
						$admin_data = array('ADMIN_ID'=>$rows[0]->id,'ADMIN_ROLE'=>$rows[0]->role,'ADMIN_EMAIL'=>$rows[0]->email, 'ADMIN_AUTH'=>$rows[0]->authority);
						$this->session->set_userdata($admin_data);
						redirect('admin/dashboard');
					}
				}
				else
				{
					$this->session->set_flashdata('msg','<div class="alert alert-danger">Invalid login credentials. please try again</div>');
					redirect('admin');
				}
			}
		}	
		$this->load->view('admin/login');
	}
	
	public function dashboard()
	{
		$this->check_admin_login('IS_NOT_LOGIN');
		$data['All_USERS'] = $this->user_model->get_all_users_by_ststus('all');
		$data['ACTIVE_USERS'] = $this->user_model->get_all_users_by_ststus('1');
		$data['INACTIVE_USERS'] = $this->user_model->get_all_users_by_ststus('0');
		$data['city'] = $this->city_model->get_all_active_city(); 
		$data['date'] =  date('Y-m-d');
	    $data['disabled_dates'] =[] ;
		$this->load->view('admin/dashboard',$data);
	}
	
	public function logout()
	{
		$this->session->unset_userdata('ADMIN_ID');
		$this->session->unset_userdata('ADMIN_EMAIL');
		$this->session->unset_userdata('ADMIN_ROLE');		
		$this->session->sess_destroy();
		redirect('admin');
	}
	
	function check_admin_login($check_type)
	{
		if($check_type=='IS_LOGIN')
		{	
			$admin_id = $this->session->userdata('ADMIN_ID');
			if(!empty($admin_id))
			{
				redirect('admin/dashboard');
			}
		}
		if($check_type=='IS_NOT_LOGIN')
		{	
			$admin_id = $this->session->userdata('ADMIN_ID');
			if(empty($admin_id))
			{
				redirect('admin');
			}
		}
	}
}
