<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Location extends CI_Controller 
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
		$data['RESULT'] = $this->location_model->get_all_location(); 
		$this->load->view('admin/location/listing',$data);
	}
	
	public function add_new()
	{
		if(isset($_POST['submitform']))
		{			
		
			$this->form_validation->set_rules('status', 'Status', 'trim|required');
			$this->form_validation->set_rules('city_id', 'City Id', 'trim|required');
			$this->form_validation->set_rules('title', 'Title', 'trim|required');
			$this->form_validation->set_rules('url_slug', 'Url Slug', 'trim|required|is_unique[tbl_location.url_slug]');
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
							$path = 'uploads/location/'.$file_name;
							move_uploaded_file($tmp_name,$path);
							$postdata['image'] = $file_name;					
					}
					
					
				}
			
				unset($postdata['submitform']);
				$postdata['create_date'] = date('Y-m-d h:i:s');		
				$this->location_model->save_location($postdata);
				$this->session->set_flashdata('msg','<div class="alert alert-success">record has been successfully saved.</div>');
				redirect('admin/location/listing');

				
				
			}else{

				 $this->session->set_flashdata('msg',"<div class='alert alert-success'><font color='red'>" . validation_errors() . "</font>.</div>");
			}					
		}
		$data['city'] = $this->city_model->get_all_active_city(); 
		$this->load->view('admin/location/add',$data);
	}
	
	public function edit()
	{
		$args = func_get_args();
		$data['RESULT'] = $this->location_model->get_location_by_id($args[0]); 
		$data['city'] = $this->city_model->get_all_active_city(); 
		if(isset($_POST['submitform']))
		{
		    $this->form_validation->set_rules('title', 'Title', 'trim|required');
		    $this->form_validation->set_rules('city_id', 'City Id', 'trim|required');
			$this->form_validation->set_rules('status', 'Status', 'trim|required');
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
							$path = 'uploads/location/'.$file_name;
							move_uploaded_file($tmp_name,$path);
							$postdata['image'] = $file_name;					
					}
					
					
				}
			
				unset($postdata['submitform']);
				$this->location_model->update_location_by_id($args[0],$postdata);
				$this->session->set_flashdata('msg','<div class="alert alert-success">record has been successfully updated.</div>');
				redirect('admin/location/listing');
			}else{

				 $this->session->set_flashdata('msg',"<div class='alert alert-success'><font color='red'>" . validation_errors() . "</font>.</div>");
			}		
		}
		$this->load->view('admin/location/edit',$data);
	}
	
	public function delete()
	{
		$args = func_get_args();
		$location = $this->location_model->get_location_by_id($args[0]);
		$this->location_model->delete_location_by_id($args[0]);
		delete_file('uploads/location/',$location[0]->image);
		$this->session->set_flashdata('msg','<div class="alert alert-success">record has been successfully deleted.</div>');
		redirect('admin/location/listing');
	}
	
	public function get_location_of_city()
	{
		$city_id = $_POST['city_id'];
		$this->db->order_by('title');
		$res = $this->db->get_where('tbl_location' ,  array('city_id' => $city_id))->result();
	
	     if( count($res) > 0){

	        echo '<option value="">Select Location</option>';

	        foreach ($res as $key => $respage) {

	      	  echo '<option  value="'.$respage->id.'">'.$respage->title.'</option>';
	        }
	     
	    }else{
	        echo '<option value="">location not available</option>';
	    }
	}

}