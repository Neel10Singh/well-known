<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Razorpay extends CI_Controller
{


	function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		$this->load->model('order_model');
	}
	

	public function index($value=''){

        // error_reporting(0);
    	$user_id = $this->session->userdata('USER_ID');
		$userdata = $this->user_model->get_user_by_id($user_id);
		if(empty($user_id))
		{				
			 redirect('login') ; 
		}
		$booking_id = $_SESSION['booking_id'] ; 
	    if($booking_id){
	       $booking = $this->booking_model->get_booking_by_id($booking_id);
	       	$userdata = $this->user_model->get_user_by_id($user_id);
    		$data['item_name'] =  $booking[0]->theatre_title;    
    		$data['amount'] =$booking[0]->booking_amount;
    		$data['item_number'] = $booking[0]->id;
        	$data['name'] = $booking[0]->name;
        	$data['email'] =$booking[0]->email;
        	$data['phone'] =$booking[0]->phone;
        	$data['return_url'] = base_url().'razorpay/callback';
        	$data['surl'] = base_url().'razorpay/success';;
        	$data['furl'] = base_url().'razorpay/failed';
           	$data['currency_code'] = 'INR';
           	$_SESSION['caporderid'] = $data['item_number'] ; 
           
            $this->load->view('front/razorpay' ,$data) ;
	       
	        
	    }else{
	        redirect() ; 
	    }
	
            
    }

        // initialized cURL Request
    private function get_curl_handle($payment_id, $amount)  {
        $url = 'https://api.razorpay.com/v1/payments/'.$payment_id.'/capture';
        $key_id = RAZOR_KEY_ID;
        $key_secret = RAZOR_KEY_SECRET;
        $fields_string = "amount=$amount";
        //cURL Request
        $ch = curl_init();
        //set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_USERPWD, $key_id.':'.$key_secret);
        curl_setopt($ch, CURLOPT_TIMEOUT, 60);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
       
        return $ch;
    }   
        
    // callback method
    public function callback() {        

        error_reporting(0);    
        if (!empty($this->input->post('razorpay_payment_id')) && !empty($this->input->post('merchant_order_id'))) {
           $_SESSION['Transaction_ID'] =  $razorpay_payment_id = $this->input->post('razorpay_payment_id');
            $merchant_order_id = $this->input->post('merchant_order_id');
            $currency_code = 'INR';
            $amount = $this->input->post('merchant_total');
            $success = false;
            $error = '';
            try {                
                $ch = $this->get_curl_handle($razorpay_payment_id, $amount);
                //execute post
                $result = curl_exec($ch);
                $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                if ($result === false) {
                    $success = false;
                    $error = 'Curl error: '.curl_error($ch);
                } else {
                    $response_array = json_decode($result, true);
                  
                        //Check success response
                        if ($http_status === 200 and isset($response_array['error']) === false) {
                            $success = true;
                        } else {
                            $success = false;
                            if (!empty($response_array['error']['code'])) {
                                $error = $response_array['error']['code'].':'.$response_array['error']['description'];
                            } else {
                                $error = 'RAZORPAY_ERROR:Invalid Response <br/>'.$result;
                            }
                        }
                }
                //close connection
                curl_close($ch);
                $_SESSION['responce'] =$response_array ; 
            } catch (Exception $e) {
                $success = false;
                $error = 'OPENCART_ERROR:Request to Razorpay Failed';
            }
            if ($success === true) {
                if(!empty($this->session->userdata('ci_subscription_keys'))) {
                    $this->session->unset_userdata('ci_subscription_keys');
                 }
                
                 $_SESSION['payment_status'] = 'Success' ; 
                 redirect($this->input->post('merchant_surl_id'));
            } else {

              $_SESSION['payment_status'] = 'Failed' ;                 
              redirect($this->input->post('merchant_furl_id'));
            }
        } else {
            echo 'An error occured. Contact site administrator, please!';
        }

       
    } 


    public function success() {
        
         if(isset($_SESSION['caporderid'])){
             if($_SESSION['payment_status'] == 'Success'){ 
                	error_reporting(0);
            		$data['msg']= '' ;
            		$booking_id = $_SESSION['caporderid'] ; 
            		$booking = $this->booking_model->get_booking_by_id($booking_id);
            	    
            	    $insert_data['txn_no']= $_SESSION['Transaction_ID'];
            	    $insert_data['amount']= $_SESSION['responce']['amount']/100;
            	    $insert_data['status']='Success' ;
            	    $insert_data['booking_id']=$booking_id ;
            	    $insert_data['create_date']=date('Y-m-d') ;
            		$this->db->insert('tbl_payment', $insert_data);
            		
            		$update_data['status']='Booked' ;
            		$this->db->where('id' ,$booking_id) ; 
            		$this->db->update('tbl_booking' , $update_data) ; 
                    $data['table'] =  "<center>";
            		$data['msg'] =  "<br><h3>Thank you for shopping with Us!!</h3>";
            		$this->booking_mail($booking_id);	
            		$_SESSION['success_msg'] = $data ;
            
            		unset(	$_SESSION['booking']) ; 
        	        redirect('thank-you');	
             }

         }else{

            redirect('terms-condition-information') ; 
        }

    }  
    
    public function failed() {

         error_reporting(0) ; 
            
         if(isset($_SESSION['caporderid'])){

            if(!$_SESSION['payment_status'] == 'Failed'){
                
                	$data['msg']= '' ;
            		$booking_id = $_SESSION['caporderid'] ; 
            		$booking = $this->booking_model->get_booking_by_id($booking_id);
            	      $insert_data['txn_no']= $_SESSION['Transaction_ID'];
            	    $insert_data['status']='Failed' ;
            	    $insert_data['booking_id']=$booking_id ;
            	    $insert_data['create_date']=date('Y-m-d') ;
            		$this->db->insert('tbl_payment', $insert_data);
                    $data['table'] =  "<center>";
            		$data['msg'] =  "<br><h3>Thank you for booking with us..However,the transaction has been declined</h3>";
            	
            		$this->booking_mail($booking_id);	
            		$_SESSION['success_msg'] = $data ;
        	        redirect('terms-condition-information') ; 
            }


         }else{

           redirect('terms-condition-information') ; 
        }    
    }    
	
	function booking_mail($booking_id){
	    
	    
	    if($booking_id){
	       $booking = $this->booking_model->get_booking_by_id($booking_id);
	       $link = $this->setting_model->get_all_setting();
	       
	         //Load email library 
            $this->load->library('email'); 
            $this->email->from($link[0]->from_email,$link[0]->title);
    		$this->email->subject($link[0]->title.':: Thank you For Booking');    
            $this->email->to($booking[0]->email);
    		$this->email->set_mailtype("html");
    		$message = '<html><body>';
    		$message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
    		$message .= "<tr style='background: #eee;'><td colspan='2'>Thank You For Booking</td></tr>";
    		$message .= "<tr><td><strong>Booking No:</strong> </td><td>" .  $booking[0]->invoice_no . "</td></tr>";
    		$message .= "<tr><td><strong>Boooking Date:</strong> </td><td>" .  date ('D, d  m, Y' ,strtotime($booking[0]->date)) . "</td></tr>";
    		$message .= "<tr><td><strong>Booking Slots:</strong> </td><td>" .  $booking[0]->slots_title . "</td></tr>";
    		$message .= "<tr><td><strong>Booking Theatre:</strong> </td><td>" .  $booking[0]->theatre_title . "</td></tr>";
    		$message .= "<tr><td><strong>Booking location:</strong> </td><td>" .  $booking[0]->location_title .' '.$booking[0]->city_title. "</td></tr>";
    		$message .= "<tr><td><strong>Name:</strong> </td><td>" .  $booking[0]->name . "</td></tr>";
    		$message .= "<tr><td><strong>Email:</strong> </td><td>" . $booking[0]->email  . "</td></tr>";
    		$message .= "<tr><td><strong>Phone:</strong> </td><td>" . $booking[0]->phone  . "</td></tr>";
    		$message .= "</tabl e>";
    		$message .= "</body></html>";
            $this->email->message($message); 
            $this->email->send();
            
             $this->load->library('email'); 
            $this->email->from($link[0]->from_email,$link[0]->title);
    		$this->email->subject($link[0]->title.':: New  Booking');    
            $this->email->to($link[0]->email);
    		$this->email->set_mailtype("html");
    		$message = '<html><body>';
    		$message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
    		$message .= "<tr style='background: #eee;'><td colspan='2'>Thank You For Booking</td></tr>";
    		$message .= "<tr><td><strong>Booking No:</strong> </td><td>" .  $booking[0]->invoice_no . "</td></tr>";
    		$message .= "<tr><td><strong>Boooking Date:</strong> </td><td>" .  date ('D, d  m, Y' ,strtotime($booking[0]->date)) . "</td></tr>";
    		$message .= "<tr><td><strong>Booking Slots:</strong> </td><td>" .  $booking[0]->slots_title . "</td></tr>";
    		$message .= "<tr><td><strong>Booking Theatre:</strong> </td><td>" .  $booking[0]->theatre_title . "</td></tr>";
    		$message .= "<tr><td><strong>Booking location:</strong> </td><td>" .  $booking[0]->location_title .' '.$booking[0]->city_title. "</td></tr>";
    		$message .= "<tr><td><strong>Name:</strong> </td><td>" .  $booking[0]->name . "</td></tr>";
    		$message .= "<tr><td><strong>Email:</strong> </td><td>" . $booking[0]->email  . "</td></tr>";
    		$message .= "<tr><td><strong>Phone:</strong> </td><td>" . $booking[0]->phone  . "</td></tr>";
    		$message .= "</tabl e>";
    		$message .= "</body></html>";
            $this->email->message($message); 
            $this->email->send();
    	
	    }else{
	        redirect() ; 
	    }
	}
	
}
