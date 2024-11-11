<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Theatre extends CI_Controller 
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
		$data['RESULT'] = $this->theatre_model->get_all_theatre(); 
		$this->load->view('admin/theatre/listing',$data);
	}
	
	public function add_new()
	{
		if(isset($_POST['submitform']))
		{			
		
			$this->form_validation->set_rules('status', 'Status', 'trim|required');
			$this->form_validation->set_rules('title', 'Title', 'trim|required');
			$this->form_validation->set_rules('location_id', 'Location ', 'trim|required');
			$this->form_validation->set_rules('min_price', 'Min Price ', 'trim|required');
			$this->form_validation->set_rules('price_per_person', 'Price Per Person ', 'trim|required');
			$this->form_validation->set_rules('min_person', 'Min Person ', 'trim|required');
			$this->form_validation->set_rules('total_person', 'Total Person ', 'trim|required');
			$this->form_validation->set_rules('url_slug', 'Url Slug', 'trim|required|is_unique[tbl_theatre.url_slug]');
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
							$path = 'uploads/theatre/'.$file_name;
							move_uploaded_file($tmp_name,$path);
							$postdata['image'] = $file_name;					
					}	
				}if(isset($_FILES['image_2']['name']) && !empty ($_FILES['image_2']['name']))
				{
			    	$allow_ext = array('png','jpg','jpeg','JPEG','gif');
					$file_ext = image_extension($_FILES['image_2']['name']);
					if(in_array($file_ext,$allow_ext))
					{
							$file_name = create_image_unique($_FILES['image_2']['name']);
							$tmp_name = $_FILES['image_2']['tmp_name'];
							$path = 'uploads/theatre/'.$file_name;
							move_uploaded_file($tmp_name,$path);
							$postdata['image_2'] = $file_name;					
					}	
				}if(isset($_FILES['image_3']['name']) && !empty ($_FILES['image_3']['name']))
				{
			    	$allow_ext = array('png','jpg','jpeg','JPEG','gif');
					$file_ext = image_extension($_FILES['image_3']['name']);
					if(in_array($file_ext,$allow_ext))
					{
							$file_name = create_image_unique($_FILES['image_3']['name']);
							$tmp_name = $_FILES['image_3']['tmp_name'];
							$path = 'uploads/theatre/'.$file_name;
							move_uploaded_file($tmp_name,$path);
							$postdata['image_3'] = $file_name;					
					}	
				}if(isset($_FILES['image_4']['name']) && !empty ($_FILES['image_4']['name']))
				{
			    	$allow_ext = array('png','jpg','jpeg','JPEG','gif');
					$file_ext = image_extension($_FILES['image_4']['name']);
					if(in_array($file_ext,$allow_ext))
					{
							$file_name = create_image_unique($_FILES['image_4']['name']);
							$tmp_name = $_FILES['image_4']['tmp_name'];
							$path = 'uploads/theatre/'.$file_name;
							move_uploaded_file($tmp_name,$path);
							$postdata['image_4'] = $file_name;					
					}	
				}
			
				unset($postdata['submitform']);
				$postdata['create_date'] = date('Y-m-d h:i:s');		
				$this->theatre_model->save_theatre($postdata);
				$this->session->set_flashdata('msg','<div class="alert alert-success">record has been successfully saved.</div>');
				redirect('admin/theatre/listing');

				
				
			}				
		}
		$data['city'] = $this->city_model->get_all_active_city(); 
		$data['location'] = $this->location_model->get_all_active_location();
		$this->load->view('admin/theatre/add' ,$data);
	}
	
	public function edit()
	{
		$args = func_get_args();
		$data['RESULT'] = $this->theatre_model->get_theatre_by_id($args[0]); 
		
		if(isset($_POST['submitform']))
		{
	
			$this->form_validation->set_rules('status', 'Status', 'trim|required');
			$this->form_validation->set_rules('title', 'Title', 'trim|required');
			$this->form_validation->set_rules('location_id', 'Location ', 'trim|required');
			$this->form_validation->set_rules('min_price', 'Min Price ', 'trim|required');
			$this->form_validation->set_rules('price_per_person', 'Price Per Person ', 'trim|required');
			$this->form_validation->set_rules('min_person', 'Min Person ', 'trim|required');
			$this->form_validation->set_rules('total_person', 'Total Person ', 'trim|required');
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
							$path = 'uploads/theatre/'.$file_name;
							move_uploaded_file($tmp_name,$path);
							$postdata['image'] = $file_name;					
					}	
				}if(isset($_FILES['image_2']['name']) && !empty ($_FILES['image_2']['name']))
				{
			    	$allow_ext = array('png','jpg','jpeg','JPEG','gif');
					$file_ext = image_extension($_FILES['image_2']['name']);
					if(in_array($file_ext,$allow_ext))
					{
							$file_name = create_image_unique($_FILES['image_2']['name']);
							$tmp_name = $_FILES['image_2']['tmp_name'];
							$path = 'uploads/theatre/'.$file_name;
							move_uploaded_file($tmp_name,$path);
							$postdata['image_2'] = $file_name;					
					}	
				}if(isset($_FILES['image_3']['name']) && !empty ($_FILES['image_3']['name']))
				{
			    	$allow_ext = array('png','jpg','jpeg','JPEG','gif');
					$file_ext = image_extension($_FILES['image_3']['name']);
					if(in_array($file_ext,$allow_ext))
					{
							$file_name = create_image_unique($_FILES['image_3']['name']);
							$tmp_name = $_FILES['image_3']['tmp_name'];
							$path = 'uploads/theatre/'.$file_name;
							move_uploaded_file($tmp_name,$path);
							$postdata['image_3'] = $file_name;					
					}	
				}if(isset($_FILES['image_4']['name']) && !empty ($_FILES['image_4']['name']))
				{
			    	$allow_ext = array('png','jpg','jpeg','JPEG','gif');
					$file_ext = image_extension($_FILES['image_4']['name']);
					if(in_array($file_ext,$allow_ext))
					{
							$file_name = create_image_unique($_FILES['image_4']['name']);
							$tmp_name = $_FILES['image_4']['tmp_name'];
							$path = 'uploads/theatre/'.$file_name;
							move_uploaded_file($tmp_name,$path);
							$postdata['image_4'] = $file_name;					
					}	
				}
				unset($postdata['submitform']);
				$this->theatre_model->update_theatre_by_id($args[0],$postdata);
				$this->session->set_flashdata('msg','<div class="alert alert-success">record has been successfully updated.</div>');
				redirect('admin/theatre/listing');
			}	
		}
		$data['city'] = $this->city_model->get_all_active_city(); 
		$data['location'] = $this->location_model->get_location_by_city_id($data['RESULT'][0]->city_id );
		$this->load->view('admin/theatre/edit',$data);
	}
	
	public function delete()
	{
		$args = func_get_args();
		$theatre = $this->theatre_model->get_theatre_by_id($args[0]);
		$this->theatre_model->delete_theatre_by_id($args[0]);
		delete_file('uploads/theatre/',$theatre[0]->image);
		$this->session->set_flashdata('msg','<div class="alert alert-success">record has been successfully deleted.</div>');
		redirect('admin/theatre/listing');
	}
	
	public function slots()
	{
	    	$args = func_get_args();
	    $data['RESULT'] = $this->theatre_model->get_theatre_by_id($args[0]); 
		$data['slots'] = $this->theatre_model->get_slots_by_theatre_id($args[0]); 
		$this->load->view('admin/theatre/slots',$data);
	}
	
	public function add_slots()
	{
	    $args = func_get_args();
	    $data['RESULT'] = $this->theatre_model->get_theatre_by_id($args[0]); 
		if(isset($_POST['submitform']))
		{			
		
			$this->form_validation->set_rules('status', 'Status', 'trim|required');
			$this->form_validation->set_rules('title', 'Title', 'trim|required');
			$this->form_validation->set_error_delimiters('<div class="error"><i class="fa fa-warning"></i>&nbsp', '</div>');
			if ($this->form_validation->run() == TRUE)
			{
				$postdata = $this->input->post();
				if(isset($_POST['disabled_dates'])){
				    	$postdata['disabled_dates']   = implode(',' , $_POST['disabled_dates'] );
				}
			
				$postdata['theatre_id']   = $args[0];
				unset($postdata['submitform']);
				$postdata['create_date'] = date('Y-m-d h:i:s');		
				$this->theatre_model->save_theatre_slots($postdata);
				$this->session->set_flashdata('msg','<div class="alert alert-success">record has been successfully saved.</div>');
				redirect('admin/theatre/listing');

				
				
			}				
		}
		$this->load->view('admin/theatre/add-slots' ,$data);
	}
	
	

	public function edit_slots()
	{
		$args = func_get_args();
		$data['RESULT'] = $this->theatre_model->get_theatre_by_id($args[0]); 
		$data['slots'] = $this->theatre_model->get_theatre_slots_by_id($args[1]); 
		
		if(isset($_POST['submitform']))
		{
	
			$this->form_validation->set_rules('status', 'Status', 'trim|required');
			$this->form_validation->set_rules('title', 'Title', 'trim|required');
			$this->form_validation->set_error_delimiters('<div class="error"><i class="fa fa-warning"></i>&nbsp', '</div>');
			if ($this->form_validation->run() == TRUE)
			{
				$postdata = $this->input->post();
			if(isset($_POST['disabled_dates'])){
				    	$postdata['disabled_dates']   = implode(',' , $_POST['disabled_dates'] );
				}
				unset($postdata['submitform']);
				$this->theatre_model->update_theatre_slots_by_id($args[1],$postdata);
				$this->session->set_flashdata('msg','<div class="alert alert-success">record has been successfully updated.</div>');
				redirect('admin/theatre/listing');
			}	
		}
		$this->load->view('admin/theatre/edit-slots',$data);
	}
	
	
	public function get_theatre_of_location()
	{
		$location_id = $_POST['location_id'];
		$this->db->order_by('title');
		$res = $this->db->get_where('tbl_theatre' ,  array('location_id' => $location_id))->result();
	
	     if( count($res) > 0){

	        echo '<option value="">Select Theatre</option>';

	        foreach ($res as $key => $respage) {

	      	  echo '<option  value="'.$respage->id.'">'.$respage->title.'</option>';
	        }
	     
	    }else{
	        echo '<option value="">Theatre not available</option>';
	    }
	}
	
	

}