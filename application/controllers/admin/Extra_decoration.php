<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Extra_decoration extends CI_Controller 
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
		$data['RESULT'] = $this->extra_decoration_model->get_all_extra_decoration(); 
		$this->load->view('admin/extra_decoration/listing',$data);
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
							$path = 'uploads/extra_decoration/'.$file_name;
							move_uploaded_file($tmp_name,$path);
							$postdata['image'] = $file_name;					
					}
					
					
				}
			
				unset($postdata['submitform']);
				$postdata['create_date'] = date('Y-m-d h:i:s');		
				$this->extra_decoration_model->save_extra_decoration($postdata);
				$this->session->set_flashdata('msg','<div class="alert alert-success">record has been successfully saved.</div>');
				redirect('admin/extra_decoration/listing');

				
				
			}else{

				 $this->session->set_flashdata('msg',"<div class='alert alert-success'><font color='red'>" . validation_errors() . "</font>.</div>");
			}				
		}		
		$this->load->view('admin/extra_decoration/add');
	}
	
	public function edit()
	{
		$args = func_get_args();
		$data['RESULT'] = $this->extra_decoration_model->get_extra_decoration_by_id($args[0]); 
		
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
							$path = 'uploads/extra_decoration/'.$file_name;
							move_uploaded_file($tmp_name,$path);
							$postdata['image'] = $file_name;					
					}
					
					
				}
			
				unset($postdata['submitform']);
				$this->extra_decoration_model->update_extra_decoration_by_id($args[0],$postdata);
				$this->session->set_flashdata('msg','<div class="alert alert-success">record has been successfully updated.</div>');
				redirect('admin/extra_decoration/listing');
			}	
		}else{

				 $this->session->set_flashdata('msg',"<div class='alert alert-success'><font color='red'>" . validation_errors() . "</font>.</div>");
		}
		$this->load->view('admin/extra_decoration/edit',$data);
	}
	
	public function delete()
	{
		$args = func_get_args();
		$extra_decoration = $this->extra_decoration_model->get_extra_decoration_by_id($args[0]);
		$this->extra_decoration_model->delete_extra_decoration_by_id($args[0]);
		delete_file('uploads/extra_decoration/',$extra_decoration[0]->image);
		$this->session->set_flashdata('msg','<div class="alert alert-success">record has been successfully deleted.</div>');
		redirect('admin/extra_decoration/listing');
	}

}