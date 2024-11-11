<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
	}
	
	public function register()
	{
		$data['RESULT'] = $this->page_model->get_page_by_id(20);

	    $this->load->view('front/user/register',$data);
	}

	public function register_process()
	{
	    error_reporting(0);
		$user_id = $this->session->userdata('USER_ID');
		$redirect_url = '';
		$response['status'] = 0;
		$response['message'] = '';
		$link = $this->setting_model->get_all_setting();
		if(isset($_GET['redirect']) && !empty($_GET['redirect']))
		{
			$redirect_url = $_GET['redirect'];
		}
    	$this->form_validation->set_rules('fname', 'First Name', 'trim|required');
        $this->form_validation->set_rules('email', 'email', 'trim|required|is_unique[tbl_users.email]',array(
            'required'      => 'You have not provided %s.',
            'is_unique'     => 'This e-mail id is already registered with us. Please enter a new e-mail id.'
            )  ); 
            
        $this->form_validation->set_rules('contact_no', 'Phone', 'trim|required|is_unique[tbl_users.contact_no]',array(
            'required'      => 'You have not provided %s.',
            'is_unique'     => 'This phone number is already registered with us. Please enter a new phone number.'
            )  );
    	$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
		$this->form_validation->set_rules('confirm_password', 'Password', 'trim|required|matches[password]',array(
            'required'      => 'You have not provided %s.',
            'matches'     => 'The Passwords don’t match. Please re-check and enter the same passwords.'
            ) );
		$this->form_validation->set_error_delimiters('<div class="error"><i class="fa fa-warning"></i>&nbsp', '</div>');
		if ($this->form_validation->run() == TRUE)
		{	
                   
                unset($_POST['confirm_password']);
                $postdata['fname'] = $_POST['fname'];
                $postdata['lname'] = $_POST['lname'];
                $postdata['email'] = $_POST['email'];
                $postdata['contact_no'] = $_POST['contact_no'];
				$postdata['password'] = base64_encode($_POST['password']);
				$postdata['status'] = '1';
				$postdata['email_verify'] = '0';
				$postdata['create_date'] = date('Y-m-d h:i:s');
	            $postdata['phone_verify'] ="1";
				$user_id = $this->user_model->insert_user($postdata);
			    $this->registration_email($user_id , $postdata['email'] ,$_POST['password'] ) ; 
				$rows =  $this->user_model->get_user_by_id($user_id);
				$admin_data = array('USER_ID'=>$rows[0]->id,'USER_NAME'=>$rows[0]->fname.' '.$rows[0]->lname,'USER_EMAIL'=>$rows[0]->email);
				$this->session->set_userdata($admin_data);
				$response['status'] = 1; 
				$response['url'] = base_url('login') ;
				$msg ="Your Account is created, We've sent you a verification email. Please verify your email id before logging in" ;
				$response['message'] = '<div class="alert alert-success">'.$msg.'</div>';
    				
		}else{

			 $response['message'] = '<div class="alert alert-danger">'.validation_errors().'</div>';
			
		}

		echo json_encode($response);
	}	
	
    public function login()
	{
	    
		 $user_id = $this->session->userdata('USER_ID');
		if(!empty($user_id)){ redirect('dashboard');}
		$data['RESULT'] = $this->page_model->get_page_by_id(15);

	    $this->load->view('front/user/login',$data);
	}
	

	public function login_process()
	{
	   
		$user_id = $this->session->userdata('USER_ID');
		$redirect_url = '';
		$response['status'] = 0;
		$response['message'] = '';
		if(isset($_SESSION['redirect']) && !empty($_SESSION['redirect']))
		{
		 $redirect_url = $_SESSION['redirect'];
		}

		if(isset($_POST['email']))
		{
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			if(empty($email) || empty($password))
			{
				  $response['message'] = '<div class="alert alert-danger">Invalid login credentials</div>'; 
			}
			else
			{
				$rows = $this->user_model->user_login($email,base64_encode($password));
				if(count($rows)>0)
				{
					if($rows[0]->status==1)
					{
					   
    					    
    					    $_SESSION['user_session'] = $gen_refer_code   = substr(md5(rand(100, 2147483647)), 0, 15);
    					    $_SESSION['guest'] = 'No';
    						$admin_data = array('USER_ID'=>$rows[0]->id,'USER_NAME'=>$rows[0]->fname.' '.$rows[0]->lname,'USER_EMAIL'=>$rows[0]->email);
    						$this->session->set_userdata($admin_data);
    						$response['status'] = 1; 
     						$response['message'] = '<div class="alert alert-success">Login successfully.</div>'; 						
     						$response['signup-box-msg-2'] = '<div class="alert alert-success">Login successfully.</div>'; 						
    
    						if(!empty($redirect_url))
    						{
    							$response['url'] = base_url($redirect_url) ;
    						}
    						else
    						{
    						     if(count($this->cart->contents()) > 0){ 
    
    						    	$response['url'] = base_url('cart') ;
    
    						     }else{
    						     	
    						     	$response['url'] = base_url('dashboard') ;
    						     }
    						}
    						unset($_SESSION['redirect']);
    				
				
					}
					else
					{
						$response['message'] = '<div class="alert alert-danger">This account is inactive. Please contact to admin.</div>'; 
					}	
				}
				else
				{
					 $response['message'] = '<div class="alert alert-danger">Invalid login credentials</div>'; 
					
				}			
			}
		}
		
		
		echo json_encode($response);
	}
	
	public function logout()
	{
		$this->session->unset_userdata('USER_ID');
		$this->session->unset_userdata('USER_EMAIL');
		$this->session->unset_userdata('USER_NAME');
		$this->session->unset_userdata('user_session');
		redirect('login');
	}
	
	function registration_email($user_id , $email , $password) {
	    
	    $link = $this->setting_model->get_all_setting();
		$token = sha1($user_id.time().$email);
		$upd_data['activate_token'] = $token;
		$this->user_model->update_user($user_id,$upd_data);
	    $this->load->library('email');	
		$this->email->set_mailtype("html");
		$this->email->set_newline("\r\n");		
		$htmlContent = 'Thanks for signing up!<br>
								Your account has been created, you can login with the following credentials<br>
								<strong>Email: </strong>'.$email.'<br><strong>Password: </strong>'.$password.'<br><br>
							<br><br>Thanks<br>'.$link[0]->title;;
	
		$this->email->to(trim($email));
		$this->email->from($link[0]->from_email,$link[0]->title);
		$this->email->subject($link[0]->title.':: Thank You For Registration');
		$this->email->message($htmlContent);				
		$this->email->send(); 
            				
	} 
	
	function verification_email($user_id , $email) {
	    $link = $this->setting_model->get_all_setting();
		$token = sha1($user_id.time().$email);
		$upd_data['activate_token'] = $token;
		$this->user_model->update_user($user_id,$upd_data);
	    $this->load->library('email');	
		$this->email->set_mailtype("html");
		$this->email->set_newline("\r\n");				
		 $htmlContent = 'Verify Your Email <br><br><br>
						Please click this link to Verify your account email: <a href='.base_url('user/verifyemail/'.$token).'>Click Here</a> or <br> '.base_url('user/verifyemail/'.$token).'<br><br><br>Thanks<br>'.$link[0]->title;;
		$this->email->to(trim($email));
		$this->email->from($link[0]->from_email,$link[0]->title);
		$this->email->subject($link[0]->title.':: Thank You For Registration');
		$this->email->message($htmlContent);				
		$va = $this->email->send(); 				
	} 
	
	function verifyemail()
	{
		$args = func_get_args();
		if(count($args)>0)
		{
			$rows = $this->user_model->get_user_by_email_activate_token($args[0]);
			if(count($rows)==1)
			{
				$user_id = $rows[0]->id;
				$upd_data['status'] = '1';
				$upd_data['email_verify'] = '1';				
				$upd_data['activate_token'] = '';
				$this->user_model->update_user($user_id,$upd_data);
				$this->session->set_flashdata('msg','<div class="alert alert-success">Your email has been verified successfully.</div>');
				redirect('login');
			}else
			{
				$this->session->set_flashdata('msg','<div class="alert alert-warning">Security token does not match</div>');
				redirect('login');
			}	
		}
		else
		{
			$this->session->set_flashdata('msg','<div class="alert alert-warning">Security token does not match</div>');
			redirect('login');
		}	
	}
	
	 
    public function forgot_password()
	{

		$data['RESULT'] = $this->page_model->get_page_by_id(21);

	    $this->load->view('front/user/forgot-password',$data);
	}
	
	public function forgot_password_process()
	{

		error_reporting();
		ini_set("display_errors", 1);

	
			$email = $this->input->post('email');
			if(empty($email))
			{
				$this->session->set_flashdata('msg','<div class="alert alert-danger">Please enter a valid email.</div>');
				
			}
			else
			{
				$user_data = $this->user_model->check_email($email);
				if(count($user_data)==0)
				{
					$this->session->set_flashdata('msg','<div class="alert alert-danger">This e-mail address is not registered with us. Please enter a registered e-mail address</div>');
				
				}	
				else
				{
					$user_id = $user_data[0]->id;
					$token = sha1($user_id.time().$_POST['email']);
					$upd_data['forgot_token'] = $token;
					$this->user_model->update_user($user_id,$upd_data);
				     $link = $this->setting_model->get_all_setting();
			       $this->load->library('email');
                   $this->email->set_mailtype("html");
					$this->email->set_newline("\r\n");				
					//Email content
				    $htmlContent = 'Dear '. $user_data[0]->fname.' '.$user_data[0]->lname .',
								<br>Please Click Here to reset the password. If you are not able to access the above link, copy & paste the entire url given below in your browser address bar and press enter. <a href='.base_url('user/reset_password/'.$token).'> 
							
								<br> '.base_url('user/reset_password/'.$token).'</a><br><br><br>Thanks<br>'.$link[0]->title;;
					$this->email->to(trim($_POST['email']));
					$this->email->from($link[0]->from_email,$link[0]->title);
				    $this->email->subject($link[0]->title.':: Reset your Account Password!');
			
					$this->email->message($htmlContent);
				    $sendmail = 	$this->email->send();
				
					if($sendmail){

					
						$this->session->set_flashdata('msg','<div class="alert alert-success">Please check your inbox/spam for an email we just sent you with instructions for how to reset your password</div>');
					}else{
				
						
					     

						$this->session->set_flashdata('msg','<div class="alert alert-danger">Error ,Please Try Again !!! </div>');
					}
				
				}
			}	
	
		echo $this->session->flashdata('msg');
	}
	
	function reset_password()
	{
		$args = func_get_args();
		if(count($args)>0)
		{
			$rows = $this->user_model->get_user_by_forgot_password_token($args[0]);
			if(count($rows)==1)
			{
				if(isset($_POST['reset_password']))
				{	
					$npwd = $this->input->post('npwd');
					$opwd = $this->input->post('cpwd');
					
				
					if(empty($npwd) || empty($opwd))
					{
						$this->session->set_flashdata('msg','<div class="alert alert-danger">Please fill all field.</div>');
						redirect('user/reset_password/'.$args[0]);
					}
					else
					{
						if($opwd!=$npwd)
						{
							$this->session->set_flashdata('msg','<div class="alert alert-danger">New password and Confirm password not matched.</div>');
							redirect('user/reset_password/'.$args[0]);
							
							
						}
						else
						{
							$user_id = $rows[0]->id;
							$upd_data['forgot_token'] = '';
							$upd_data['password'] = base64_encode($npwd);
							$this->user_model->update_user($user_id,$upd_data);				
							$this->session->set_flashdata('reset_msg','<div class="alert alert-success">Your password has been changed successfully. Login with new password.</div>');
							
						
							redirect('login');
						}	
						
					}	
				}
					$data['RESULT'] = $this->page_model->get_page_by_id(21);
				$this->load->view('front/user/reset-password' ,$data);
			}else
			{
				$this->session->set_flashdata('msg','<div class="alert alert-warning">security token does not match.</div>');
				redirect('');
			}	
		}
		else
		{
			$this->session->set_flashdata('msg','<div class="alert alert-warning">security token does not match.</div>');
			redirect('');
		}
	}

	public function dashboard()
	{
		 $user_id = $this->session->userdata('USER_ID');
		if(empty($user_id)){ redirect('login');}
		$data['user']  = $this->user_model->get_user_by_id($user_id);
		$data['RESULT'] = $this->page_model->get_page_by_id(23);
		$this->load->view('front/account/dashboard',$data);
	}
	public function profile()
	{
		 $user_id = $this->session->userdata('USER_ID');
		if(empty($user_id)){ redirect('login');}
		$data['user']  = $this->user_model->get_user_by_id($user_id);
		$data['RESULT'] = $this->page_model->get_page_by_id(25);
		if(isset($_POST['updateprofile']))
		{
			$post_data = $this->input->post();
			unset($post_data['updateprofile']);
			$this->user_model->update_user($user_id,$post_data);
			$this->session->set_flashdata('msg','<div class="alert alert-success">Your profile has been updated successfully.</div>');
			redirect('user/profile');
		}
		$this->load->view('front/account/profile',$data);
	}

	
	public function change_password()
	{

		
	     $user_id = $this->session->userdata('USER_ID');
		if(empty($user_id)){ redirect('login');}
		
		$data['user']  = $this->user_model->get_user_by_id($user_id);
		
		if(isset($_POST['changepass']))
		{
			$post_data = $this->input->post();
			if(empty($post_data['opwd']) || empty($post_data['npwd']) || empty($post_data['cpwd']))
			{
				$this->session->set_flashdata('msg','<div class="alert alert-danger">Please fill all field</div>');
				redirect('user/change_password#msg');
			}
			else
			{
				if($post_data['opwd']==base64_decode($data['user'][0]->password))
				{
					if($post_data['npwd']==$post_data['cpwd'])
					{
						unset($post_data['opwd']);
						unset($post_data['cpwd']);
						unset($post_data['form_key']);
						$post_data['password']= base64_encode($post_data['npwd']);
						unset($post_data['changepass']);
						unset($post_data['npwd']);						
						$this->user_model->update_user($user_id,$post_data);
						$this->session->set_flashdata('msg','<div class="alert alert-success">Your password has been changed successfully.</div>');
						redirect('user/change_password#msg');
						
					}
                    else
					{
						$this->session->set_flashdata('msg','<div class="alert alert-danger">New password and Confirm password not matched.</div>');
						redirect('user/change_password#msg');
					}	
				}
				else
				{
					$this->session->set_flashdata('msg','<div class="alert alert-danger">Old password not matched.</div>');
					redirect('user/change_password#msg');
				}				
			}			
		}	
	  
		$data['user']  = $this->user_model->get_user_by_id($user_id);
		$data['RESULT'] = $this->page_model->get_page_by_id(26);
		$this->load->view('front/account/change_password',$data);
	}
	
	function booking()
	{
	    $user_id = $this->session->userdata('USER_ID');
		if(empty($user_id)){ redirect('login');}
		$data['RESULT'] = $this->page_model->get_page_by_id(24);
		$data['user']  = $this->user_model->get_user_by_id($user_id);
		$data['booking']  = $this->booking_model->get_all_booking_by_user_id($user_id);
		$this->load->view('front/account/booking',$data);
	}
		 
	function booking_details($invoice_no)
	{
		 $user_id = $this->session->userdata('USER_ID');
		if(empty($user_id)){ redirect('login');}
		$data['user']  = $this->user_model->get_user_by_id($user_id);
		$data['booking']  = $this->booking_model->get_booking_by_user_id_and_invoice($user_id , $invoice_no);
			$data['RESULT'] = $this->page_model->get_page_by_id(24);
		if(count($data['booking'] ) > 0 ){
		   		$this->load->view('front/account/booking-details',$data);
		}else{
		    redirect('booking');
		}
	

	}
	
	function booking_status($invoice_no)
	{
	 $user_id = $this->session->userdata('USER_ID');
		if(empty($user_id)){ redirect('login');}
		$data['user']  = $this->user_model->get_user_by_id($user_id);
		$data['booking']  = $this->booking_model->get_booking_by_user_id_and_invoice($user_id , $invoice_no);
		if(count($data['booking'] ) > 0 ){
		   $update['status'] = 'Cancelled' ; 
		   $update['cancellation_date'] = date('Y-m-d') ; 
		   $update['cancellation_by'] = 'User' ; 
		   $this->db->where('id' ,	$data['booking'][0]->id ) ; 
		   $this->db->update('tbl_booking' ,$update) ; 
		   $this->session->set_flashdata('msg','<div class="alert alert-success">Your booking has been cancelled successfully.</div>');
		   redirect('booking');
		}else{
		    redirect('booking');
		}
	}
	
	
	function add_review($invoice_no)
	{
		 $user_id = $this->session->userdata('USER_ID');
		if(empty($user_id)){ redirect('login');}
		$data['RESULT'] = $this->page_model->get_page_by_id(43);
		$data['user']  = $this->user_model->get_user_by_id($user_id);
		$data['booking']  = $this->booking_model->get_booking_by_user_id_and_invoice($user_id , $invoice_no);
		if(count($data['booking'] ) > 0 ){
		    $data['theatre'] = $this->theatre_model->get_theatre_by_id($data['booking'][0]->theatre_id);
		}else{
		    redirect('booking');
		}
		
		if(isset($_POST['comment']))
		{
			$post_data = $this->input->post();
		    
		    $count =  $this->db->get_where('tbl_booking_review' , array('booking_id'=> $data['booking'][0]->id ,'user_id'=> $user_id ) )->num_rows() ;
		    if($count == 0 ){ 
		        $post_data['booking_id'] = $data['booking'][0]->id ; 
		        $post_data['theatre_id'] = $data['booking'][0]->theatre_id ; 
		        $post_data['user_id'] = $user_id ; 
    			$post_data['create_date'] = date('Y-m-d') ; 
    		    $this->db->insert('tbl_booking_review' , $post_data) ;
			
		    }else{
		        
		        $update_data = $post_data ; 
		        $this->db->where('booking_id' , $data['booking'][0]->id);
		        $this->db->where('user_id' , $user_id);
		        $this->db->update('tbl_booking_review' , $update_data) ;
		    }
		    
			$this->session->set_flashdata('msg','<div class="alert alert-success">Thank You For Your Review</div>');
			redirect('booking');
		}	
		$data['review'] =  $this->db->get_where('tbl_booking_review' , array('booking_id'=> $data['booking'][0]->id ,'user_id'=> $user_id ) )->result() ;
		$this->load->view('front/account/add-review',$data);
	}
	function review()
	{
		 $user_id = $this->session->userdata('USER_ID');
		if(empty($user_id)){ redirect('login');}
		$data['RESULT'] = $this->page_model->get_page_by_id(43);
		$data['user']  = $this->user_model->get_user_by_id($user_id);
		$this->load->view('front/account/review',$data);
	}


	public function cancel_order(){

	    	$postdata = $this->input->post();
	    	$data['status'] = 'Cancelled' ; 
	    	$data['remarks'] = $postdata['remarks'] ; 
	    	$this->db->where('order_id',$postdata['order_id']);
	    	$this->db->where('pro_id',$postdata['pro_id']);
		    $this->db->update('tbl_order_item',$data);
			$this->session->set_flashdata('msg','<div class="alert alert-success">Booking has been cancelled.</div>');
			redirect('booking');
	}

}
