<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Service extends CI_Controller 
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
		$data['RESULT'] = $this->service_model->get_all_service(); 
		$this->load->view('admin/service/listing',$data);
	}
	
	public function add_new()
	{
		if(isset($_POST['submitform']))
		{			
		
			$this->form_validation->set_rules('status', 'Status', 'trim|required');
			$this->form_validation->set_rules('title', 'Title', 'trim|required');
			$this->form_validation->set_rules('url_slug', 'Url Slug', 'trim|required|is_unique[tbl_service.url_slug]');
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
							$path = 'uploads/service/'.$file_name;
							move_uploaded_file($tmp_name,$path);
							$postdata['image'] = $file_name;					
					}
					
					
				}
				if(isset($_FILES['icon']['name']) && !empty ($_FILES['icon']['name']))
				{
			    	$allow_ext = array('png','jpg','jpeg','JPEG','gif');
					$file_ext = image_extension($_FILES['icon']['name']);
					if(in_array($file_ext,$allow_ext))
					{
							$file_name = create_image_unique($_FILES['icon']['name']);
							$tmp_name = $_FILES['icon']['tmp_name'];
							$path = 'uploads/service/'.$file_name;
							move_uploaded_file($tmp_name,$path);
							$postdata['icon'] = $file_name;					
					}
					
					
				}
			
				unset($postdata['submitform']);
				$postdata['create_date'] = date('Y-m-d h:i:s');		
				$this->service_model->save_service($postdata);
				$this->session->set_flashdata('msg','<div class="alert alert-success">record has been successfully saved.</div>');
				redirect('admin/service/listing');

				
				
			}else{

				 $this->session->set_flashdata('msg',"<div class='alert alert-success'><font color='red'>" . validation_errors() . "</font>.</div>");
			}					
		}		
		$this->load->view('admin/service/add');
	}
	
	public function edit()
	{
		$args = func_get_args();
		$data['RESULT'] = $this->service_model->get_service_by_id($args[0]); 
		
		if(isset($_POST['submitform']))
		{
	
		$this->form_validation->set_rules('status', 'Status', 'trim|required');
			$this->form_validation->set_rules('title', 'Title', 'trim|required');
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
							$path = 'uploads/service/'.$file_name;
							move_uploaded_file($tmp_name,$path);
							$postdata['image'] = $file_name;					
					}
					
					
				}	
				
				if(isset($_FILES['icon']['name']) && !empty ($_FILES['icon']['name']))
				{
			    	$allow_ext = array('png','jpg','jpeg','JPEG','gif');
					$file_ext = image_extension($_FILES['icon']['name']);
					if(in_array($file_ext,$allow_ext))
					{
							$file_name = create_image_unique($_FILES['icon']['name']);
							$tmp_name = $_FILES['icon']['tmp_name'];
							$path = 'uploads/service/'.$file_name;
							move_uploaded_file($tmp_name,$path);
							$postdata['icon'] = $file_name;					
					}
					
					
				}
			
			
				unset($postdata['submitform']);
				$this->service_model->update_service_by_id($args[0],$postdata);
				$this->session->set_flashdata('msg','<div class="alert alert-success">record has been successfully updated.</div>');
				redirect('admin/service/listing');
			}else{

				 $this->session->set_flashdata('msg',"<div class='alert alert-success'><font color='red'>" . validation_errors() . "</font>.</div>");
			}		
		}
		$this->load->view('admin/service/edit',$data);
	}
	
	public function delete()
	{
		$args = func_get_args();
		$service = $this->service_model->get_service_by_id($args[0]);
		$this->service_model->delete_service_by_id($args[0]);
		delete_file('uploads/service/',$service[0]->image);
		$this->session->set_flashdata('msg','<div class="alert alert-success">record has been successfully deleted.</div>');
		redirect('admin/service/listing');
	}

}