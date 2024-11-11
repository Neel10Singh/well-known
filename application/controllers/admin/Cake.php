<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Cake extends CI_Controller 
{
	
	function __construct()
	{
		parent::__construct();
		$admin_id = $this->session->userdata('ADMIN_ID');
		if(empty($admin_id))
		{
			redirect('admin');
		}
		$this->load->library('form_validation');
		$this->load->library('upload');
		 $this->load->library('image_lib');
	}
	
	public function listing()
	{
		$data['RESULT'] = $this->cake_model->get_all_cake(); 
		$this->load->view('admin/cake/listing',$data);
	}
	
	public function add_new()
	{
		if(isset($_POST['submitform']))
		{			
		
			$this->form_validation->set_rules('status', 'Status', 'trim|required');
			$this->form_validation->set_rules('title', 'Title', 'trim|required');
			$this->form_validation->set_rules('price', 'Price', 'trim|required');
			$this->form_validation->set_error_delimiters('<div class="error"><i class="fa fa-warning"></i>&nbsp', '</div>');
			if ($this->form_validation->run() == TRUE)
			{
				$postdata = $this->input->post();
				if(isset($_FILES['image']['name']) && !empty ($_FILES['image']['name']))
				{
			    	$allow_ext = array('png','jpg','jpeg','JPEG','gif');
					$file_ext = image_extension($_FILES['image']['name']);
					if(in_array($file_ext,$allow_ext))
					{
							$file_name = create_image_unique($_FILES['image']['name']);
							$tmp_name = $_FILES['image']['tmp_name'];
							$path = 'uploads/cake/'.$file_name;
							move_uploaded_file($tmp_name,$path);
							$postdata['image'] = $file_name;					
					}
					
					
				}
			
				unset($postdata['submitform']);
				$postdata['create_date'] = date('Y-m-d h:i:s');		
				$this->cake_model->save_cake($postdata);
				$this->session->set_flashdata('msg','<div class="alert alert-success">record has been successfully saved.</div>');
				redirect('admin/cake/listing');

				
				
			}else{

				 $this->session->set_flashdata('msg',"<div class='alert alert-success'><font color='red'>" . validation_errors() . "</font>.</div>");
			}				
		}		
		$this->load->view('admin/cake/add');
	}
	
	public function edit()
	{
		$args = func_get_args();
		$data['RESULT'] = $this->cake_model->get_cake_by_id($args[0]); 
		
		if(isset($_POST['submitform']))
		{
	
			$this->form_validation->set_rules('status', 'Status', 'trim|required');
			$this->form_validation->set_rules('title', 'Title', 'trim|required');
			$this->form_validation->set_rules('price', 'Price', 'trim|required');
			$this->form_validation->set_error_delimiters('<div class="error"><i class="fa fa-warning"></i>&nbsp', '</div>');
			if ($this->form_validation->run() == TRUE)
			{
				$postdata = $this->input->post();
				if(isset($_FILES['image']['name']) && !empty ($_FILES['image']['name']))
				{
			    	$allow_ext = array('png','jpg','jpeg','JPEG','gif');
					$file_ext = image_extension($_FILES['image']['name']);
					if(in_array($file_ext,$allow_ext))
					{
							$file_name = create_image_unique($_FILES['image']['name']);
							$tmp_name = $_FILES['image']['tmp_name'];
							$path = 'uploads/cake/'.$file_name;
							move_uploaded_file($tmp_name,$path);
							$postdata['image'] = $file_name;					
					}
					
					
				}
			
				unset($postdata['submitform']);
				$this->cake_model->update_cake_by_id($args[0],$postdata);
				$this->session->set_flashdata('msg','<div class="alert alert-success">record has been successfully updated.</div>');
				redirect('admin/cake/listing');
			}	
		}else{

				 $this->session->set_flashdata('msg',"<div class='alert alert-success'><font color='red'>" . validation_errors() . "</font>.</div>");
		}
		$this->load->view('admin/cake/edit',$data);
	}
	
	public function delete()
	{
		$args = func_get_args();
		$cake = $this->cake_model->get_cake_by_id($args[0]);
		$this->cake_model->delete_cake_by_id($args[0]);
		delete_file('uploads/cake/',$cake[0]->image);
		$this->session->set_flashdata('msg','<div class="alert alert-success">record has been successfully deleted.</div>');
		redirect('admin/cake/listing');
	}

}