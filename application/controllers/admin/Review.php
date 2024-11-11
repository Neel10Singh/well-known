<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Review extends CI_Controller 
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
		$this->load->model('review_model');
	}
	
	public function listing()
	{
		$data['RESULT'] = $this->review_model->get_all_review(); 
		$this->load->view('admin/review/listing',$data);
	}

	
	public function edit()
	{
		$args = func_get_args();
		$data['RESULT'] = $this->review_model->get_review_by_id($args[0]); 
		
		if(isset($_POST['submitform']))
		{
			
			$this->form_validation->set_rules('status', 'Status', 'trim|required');
			$this->form_validation->set_error_delimiters('<div class="error"><i class="fa fa-warning"></i>&nbsp', '</div>');
			if ($this->form_validation->run() == TRUE)
			{
				$postdata = $this->input->post();


				if($_FILES['image']['name'] != '' ){	


					$file_name = create_image_unique($_FILES['image']['name']);
						$tmp_name = $_FILES['image']['tmp_name'];
						$path = 'uploads/review/'.$file_name;
						move_uploaded_file($tmp_name,$path);
						$postdata['image'] = $file_name;	
					

				}else{

					$postdata['image'] = $postdata['image_old'] ; 

				}
							unset($postdata['submitform']);
						unset($postdata['image_old']);
						$this->review_model->update_review_by_id($args[0],$postdata);
						$this->session->set_flashdata('msg','<div class="alert alert-success">record has been successfully updated.</div>');
						redirect('admin/review/listing');
															 
				
				
			}	
		}
		$this->load->view('admin/review/edit',$data);
	}
	
	public function delete_review()
	{
		$args = func_get_args();
		$review = $this->review_model->get_review_by_id($args[0]);
		$this->review_model->delete_review_by_id($args[0]);
	
		$this->session->set_flashdata('msg','<div class="alert alert-success">record has been successfully deleted.</div>');
		redirect('admin/review/listing');
	}

	public function upload_files() {

	    $post_data = $this->input->post();
	      $arr['error'] = false;
	      $arr['uploaded_data'] = []; 



	      foreach ($_FILES as $key => $value) {
	          if ( ! $value['name']) {
	            continue;
	          }

	          $config['upload_path'] = 'uploads/review/';
	          $config['allowed_types'] = 'jpg|png|jpeg';
	          $config['file_name'] = time(). "_" . $value['name'];
	          $config['max_width']            = 2000;
	          $config['max_height']           = 900;
	          $config['image_height']           = 1000;
	          $config['image_width']           = 500;

	          $this->upload->initialize($config);
	         

	          if ($this->upload->do_upload($key)) {

	            $arr['uploaded_data'][$key] = $this->upload->data();
	          

	          } else {

	              return ['error' => true , 'file_name' => $key, 'msg' => $this->upload->display_errors()];
	          	
	           
	          }
	    } 



	    return $arr;

	}

	
}