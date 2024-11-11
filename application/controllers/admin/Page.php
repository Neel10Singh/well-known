<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Page  extends CI_Controller 
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


	public function add_new()
	    {
		if(isset($_POST['submitform']))
		{	
            $this->form_validation->set_rules('title', 'Title', 'trim|required');
			$this->form_validation->set_rules('status', 'Status', 'trim|required');
			$this->form_validation->set_error_delimiters('<div class="error"><i class="fa fa-warning"></i>&nbsp', '</div>');
			if ($this->form_validation->run() == TRUE)
			{
				$postdata = $this->input->post();
				unset($postdata['submitform']);
				$postdata['create_date'] = date('Y-m-d h:i:s');		
				if(isset($_FILES['image']['name']) && !empty ($_FILES['image']['name']))
				{
			    	$allow_ext = array('png','jpg','jpeg','JPEG','gif','webp');
					$file_ext = image_extension($_FILES['image']['name']);
					if(in_array($file_ext,$allow_ext))
					{
							$file_name = create_image_unique($_FILES['image']['name']);
							$tmp_name = $_FILES['image']['tmp_name'];
							$path = 'uploads/page/'.$file_name;
							move_uploaded_file($tmp_name,$path);
							$postdata['image'] = $file_name;					
					}
					
					
				}
				$this->page_model->save_page($postdata);
				$this->session->set_flashdata('msg','<div class="alert alert-success">Record has been successfully saved.</div>');
				redirect('admin/Page/listing');

			}				
		}
			
		$this->load->view('admin/page/add');
	}
	
	public function listing()
	{
		$data['result'] = $this->page_model->get_all_page(); 
		$this->load->view('admin/page/listing',$data);
	}
		
		
	
	public function delete_data()
	{
		$args = func_get_args();
		$this->page_model->delete_page_by_id($args[0]);
		$this->session->set_flashdata('msg','<div class="alert alert-success">Record has been successfully deleted.</div>');
		redirect('admin/page/listing');
	}


	public function edit()
	{
		$args = func_get_args();
		$data['RESULT'] = $this->page_model->get_page_by_id($args[0]); 
		
		if(isset($_POST['submitform']))
		{
			
			$this->form_validation->set_rules('title', 'Title', 'trim|required');
			$this->form_validation->set_rules('status', 'Status', 'trim|required');
			$this->form_validation->set_error_delimiters('<div class="error"><i class="fa fa-warning"></i>&nbsp', '</div>');
			if ($this->form_validation->run() == TRUE)
			{
				$postdata = $this->input->post();
				unset($postdata['submitform']);
					if(isset($_FILES['image']['name']) && !empty ($_FILES['image']['name']))
				{
			    	$allow_ext = array('png','jpg','jpeg','JPEG','gif','webp');
					$file_ext = image_extension($_FILES['image']['name']);
					if(in_array($file_ext,$allow_ext))
					{
							$file_name = create_image_unique($_FILES['image']['name']);
							$tmp_name = $_FILES['image']['tmp_name'];
							$path = 'uploads/page/'.$file_name;
							move_uploaded_file($tmp_name,$path);
							$postdata['image'] = $file_name;					
					}
					
					
				}
				$this->page_model->update_page_by_id($args[0],$postdata);
				$this->session->set_flashdata('msg','<div class="alert alert-success">Record has been successfully updated.</div>');
				redirect('admin/page/listing');
			}	
		}
		
	
		$this->load->view('admin/page/edit',$data);
	}	

	
}