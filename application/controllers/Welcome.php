<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Welcome extends CI_Controller
{

    function __construct(){
	 	 parent::__construct();
		$this->load->library('upload');
	 	
	}


	public function index($parent = 0)
	{	 
		$data['slider'] = $this->slider_model->get_all_active_slider();
		$data['city'] = $this->city_model->get_all_active_city();
		$data['review'] = $this->booking_model->get_all_active_review();
		$data['service'] = $this->service_model->get_all_active_service();
	    $data['gallery'] = $this->gallery_model->get_all_active_gallery(9);
	  	$data['RESULT'] = $this->page_model->get_page_by_id(14);
	    $this->load->view('front/home',$data);
	}

	function about()
	{
		$data['RESULT'] = $this->page_model->get_page_by_id(1);
		$this->load->view('front/about',$data);

	}
	
	function city()
	{
	    $data['city'] = $this->city_model->get_all_active_city();
		$data['RESULT'] = $this->page_model->get_page_by_id(32);
		$this->load->view('front/city',$data);

	}	
	
	function location($a)
	{ 
	    if(isset($_GET['date'])){
	         $data['date'] =  $_GET['date'];
	    }else{
	         $data['date'] =  date('Y-m-d');
	    }
	   
	   
	 
	    $data['city'] = $this->city_model->get_city_by_url_slug($a);
	    $data['location'] = $this->location_model->get_location_by_city_id($data['city'][0]->id);
		$data['RESULT'] = $this->page_model->get_page_by_id(33);
		$this->load->view('front/location',$data);

	}	
	
	function theatre($a)
	{ 
	    $data['date'] =  $_GET['date'];
	    $data['location'] = $this->location_model->get_location_by_url_slug($a);
	    $data['theatre'] = $this->theatre_model->get_active_theatre_by_location_id($data['location'][0]->id);
		$data['RESULT'] = $this->page_model->get_page_by_id(38);
		$this->load->view('front/theatre',$data);

	}	
	
	 
    function get_location_of_city_on_date(){
        
        $data['date'] =$date =  $_POST['date'] ; 
        $city_id = $_POST['city_id'] ; 
	    $data['location'] = $this->location_model->get_location_by_city_id($city_id);
        $this->load->view('front/location-view',$data);
    } 
    function get_theatre_of_location_on_date(){
        
        $data['date'] =$date =  $_POST['date'] ; 
        $location_id = $_POST['location_id'] ; 
	    $data['theatre'] = $this->theatre_model->get_active_theatre_by_location_id($location_id);
        $this->load->view('front/theatre-view',$data);
    }
    
    
    function theatre_page($a)
	{ 
	    unset($_SESSION['booking']) ;
	    if(isset($_GET['date'])){
	         $data['date'] =  $_GET['date'];
	    }else{
	         $data['date'] =  date('Y-m-d');
	    }
	   
	    $data['RESULT'] = $this->theatre_model->get_theatre_by_url_slug($a);
	    $data['slots'] =  $this->theatre_model->get_active_slots_by_theatre_id($data['RESULT'][0]->id) ;
	    $disabled_dates = $a2 = '' ; 
	    foreach($data['slots'] as $key=>$value){
	       $a1 = $value->disabled_dates ; 
	       if($key == 0 ){
	            $a2= $a1 ;  ; 
	       }else{
	           $a2= $a1.','.$a2 ;  ;
	       } 
	    }
	    $data['disabled_dates'] = array_unique( explode(',', $a2)) ;
		$this->load->view('front/theatre-page',$data);

	}
	
	
	function get_slots_of_theatre_on_date(){
        
        $data['date'] =$date =  $_POST['date'] ; 
        $theatre_id = $_POST['theatre_id'] ; 
	    $data['slots'] =  $this->theatre_model->get_active_slots_by_theatre_id($theatre_id) ;
        $this->load->view('front/theatre-slots',$data);
    }
    
    function get_booking_information(){
    
        $_SESSION['booking'] = $_POST;
        
         $user_id = $this->session->userdata('USER_ID');
         if(empty($user_id)){
              $_SESSION['redirect'] = 'booking-information';
              redirect('login') ; 
         }else{
              redirect('booking-information') ; 
         }
       
        
    }
    
    
	
	function booking_information()
	{
	     $user_id = $this->session->userdata('USER_ID');
		if(empty($user_id)){ redirect('login');}
        unset($_SESSION['booking']['user']) ; 
		$data['RESULT'] = $this->page_model->get_page_by_id(39);
		$data['booking'] = $this->theatre_model->get_theatre_by_id($_SESSION['booking']['threatre_id']);
		$data['slots'] = $this->theatre_model->get_theatre_slots_by_id($_SESSION['booking']['slots_id']);
	    $data['amount'] = $this->get_total_user_booking_amount() ; 
		$this->load->view('front/booking-user-information',$data);

	}
	
	function get_user_booking_information(){
    
        $_SESSION['booking']['user'] = $_POST;
        redirect('decoration-information') ; 
        
    }
    
	
	function decoration_information()
	{
	     $user_id = $this->session->userdata('USER_ID');
		if(empty($user_id)){ redirect('login');}
	    unset($_SESSION['booking']['cake']) ; 
	    $data['RESULT'] = $this->page_model->get_page_by_id(39);
		$data['booking'] = $this->theatre_model->get_theatre_by_id($_SESSION['booking']['threatre_id']);
		$data['slots'] = $this->theatre_model->get_theatre_slots_by_id($_SESSION['booking']['slots_id']);
		$data['service'] = $this->service_model->get_all_active_service();

		$data['amount'] = $this->get_total_user_booking_amount() ;
		$this->load->view('front/booking-decoration-details',$data);

	}
	
	function get_decoration_booking_information(){
    
     
        $_SESSION['booking']['decoration'] = $_POST;
        redirect('cake-information') ; 
        
    } 
   
    
	
	function cake_information()
	{
	     $user_id = $this->session->userdata('USER_ID');
		if(empty($user_id)){ redirect('login');}
	    unset($_SESSION['booking']['cake']) ; 
		$data['RESULT'] = $this->page_model->get_page_by_id(39);
		$data['booking'] = $this->theatre_model->get_theatre_by_id($_SESSION['booking']['threatre_id']);
		$data['slots'] = $this->theatre_model->get_theatre_slots_by_id($_SESSION['booking']['slots_id']);
		$data['cake'] = $this->cake_model->get_all_active_cake();
		$data['amount'] = $this->get_total_user_booking_amount() ; 
		$this->load->view('front/booking-cake-details',$data);

	}
	
	 function get_cake_booking_information(){
    
        $_SESSION['booking']['cake'] = $_POST;
        redirect('extra-decoration-information') ; 
        
    }
   
	
	function extra_decoration_information()
	{
	     $user_id = $this->session->userdata('USER_ID');
		if(empty($user_id)){ redirect('login');}
	     unset($_SESSION['booking']['extra_decoration']) ; 
		$data['RESULT'] = $this->page_model->get_page_by_id(39);
		$data['booking'] = $this->theatre_model->get_theatre_by_id($_SESSION['booking']['threatre_id']);
		$data['slots'] = $this->theatre_model->get_theatre_slots_by_id($_SESSION['booking']['slots_id']);
		$data['extra_decoration'] = $this->extra_decoration_model->get_all_active_extra_decoration();
		$data['amount'] = $this->get_total_user_booking_amount() ; 
		$this->load->view('front/booking-extra-decoration-details',$data);

	}
	
	function get_extra_decoration_booking_information(){
    
        $_SESSION['booking']['extra_decoration'] = $_POST;
        redirect('gift-information') ; 
        
    }
	
	function gift_information()
	{
	     $user_id = $this->session->userdata('USER_ID');
		if(empty($user_id)){ redirect('login');}
	     unset($_SESSION['booking']['gift']) ; 
		$data['RESULT'] = $this->page_model->get_page_by_id(39);
		$data['booking'] = $this->theatre_model->get_theatre_by_id($_SESSION['booking']['threatre_id']);
		$data['slots'] = $this->theatre_model->get_theatre_slots_by_id($_SESSION['booking']['slots_id']);
		$data['gift'] = $this->gift_model->get_all_active_gift();
		$data['amount'] = $this->get_total_user_booking_amount() ; 
		$this->load->view('front/booking-gift-details',$data);

	}
	
	 function get_gift_booking_information(){
    
        $_SESSION['booking']['gift'] = $_POST;
        redirect('terms-condition-information') ; 
        
    }
	
	function terms_condition_information()
	{
	     $user_id = $this->session->userdata('USER_ID');
		if(empty($user_id)){ redirect('login');}
		$data['RESULT'] = $this->page_model->get_page_by_id(39);
		$data['booking'] = $this->theatre_model->get_theatre_by_id($_SESSION['booking']['threatre_id']);
		$data['slots'] = $this->theatre_model->get_theatre_slots_by_id($_SESSION['booking']['slots_id']);
		$data['amount'] = $this->get_total_user_booking_amount() ; 
		$this->load->view('front/booking-terms-condition-details',$data);

	}
	
    function	get_total_user_booking_amount(){
	    
	    $booking = $this->theatre_model->get_theatre_by_id($_SESSION['booking']['threatre_id']);
	    $_SESSION['booking']['min_amount'] = $total_amount = $booking[0]->min_price ; 
	    $extra_person_amount = $cake_amount = $extra_decoration_amount=$gift_amount=$want_decoartion=0 ;
	    if(isset( $_SESSION['booking']['user']) && (!empty($_SESSION['booking']['user']['no_of_people']))){
	         if( $_SESSION['booking']['user']['no_of_people'] >  $booking[0]->min_person){
    	        $extra_person =$_SESSION['booking']['user']['no_of_people']-$booking[0]->min_person ; 
    	        $_SESSION['booking']['extra_person_amount'] = $extra_person_amount = $extra_person*$booking[0]->price_per_person;
    	        
	        } 
	    }
	    if(isset( $_SESSION['booking']['user']) && (!empty($_SESSION['booking']['user']['want_decoartion']))){
	         if( $_SESSION['booking']['user']['want_decoartion'] =='Yes'){
    	        $_SESSION['booking']['want_decoartion'] = $want_decoartion = $booking[0]->decoration_charges ; 
    	        
	        } 
	    }
	    if(isset( $_SESSION['booking']['cake']) && (!empty($_SESSION['booking']['cake']['cake_option']))){
            foreach($_SESSION['booking']['cake']['cake_option'] as $key=>$value){
    	         $cake = $this->cake_model->get_cake_by_id($value);
    	         $_SESSION['booking']['cake_amount'] = $cake_amount = $cake_amount + $cake[0]->price ; 
    	    }
    	   
        } 
        if(isset( $_SESSION['booking']['extra_decoration']) && (!empty($_SESSION['booking']['extra_decoration']['decoration_option']))){
            foreach($_SESSION['booking']['extra_decoration']['decoration_option'] as $key=>$value){
    	          $extra_decoration = $this->extra_decoration_model->get_extra_decoration_by_id($value);
    	          $_SESSION['booking']['extra_amount'] = $extra_decoration_amount = $extra_decoration_amount + $extra_decoration[0]->price ; 
    	    }
    	   
        }
        if(isset( $_SESSION['booking']['gift']) && (!empty($_SESSION['booking']['gift']['gift_option']))){
            foreach($_SESSION['booking']['gift']['gift_option'] as $key=>$value){
    	          $gift = $this->gift_model->get_gift_by_id($value);
    	          $_SESSION['booking']['gift_amount'] = $gift_amount = $gift_amount + $gift[0]->price ; 
    	    }
    	   
        }
        $total_amount = $total_amount + $extra_person_amount +$want_decoartion + $cake_amount+$extra_decoration_amount+$gift_amount ; 
    	return  $total_amount ;
	   
	}
	
	function get_cake_booking_amount(){
	    
	    $html = '' ;
	    $total_amount = $this->get_total_user_booking_amount() ; 
	    $cake_amount = 0 ;
	    if((isset($_POST['cake']) ) && (count($_POST['cake']) > 0 )){
	        foreach($_POST['cake'] as $key=>$value){
    	         $cake = $this->cake_model->get_cake_by_id($value);
    	         $cake_amount = $cake_amount + $cake[0]->price ; 
    	    }
    
    	    $total_amount = $total_amount + $cake_amount ; 
    	    $html = "<tr><td>Cake Amount</td><td>Rs ".$cake_amount."</td></tr>" ; 
    	    $html .= "<tr><td>Total Amount</td><td>Rs ".$total_amount."</td></tr>" ; 

	    }
	    echo   $html ;  
	   
	    
	}

	function get_extra_decoration_booking_amount(){
	     $html = '' ;
	    $total_amount = $this->get_total_user_booking_amount() ; 
	    $extra_decoration_amount = 0 ; 
	      if((isset($_POST['extra_decoration']) ) && (count($_POST['extra_decoration']) > 0 )){
    	    foreach($_POST['extra_decoration'] as $key=>$value){
    	         $extra_decoration = $this->extra_decoration_model->get_extra_decoration_by_id($value);
    	         $extra_decoration_amount = $extra_decoration_amount + $extra_decoration[0]->price ; 
    	    }
    	    $total_amount = $total_amount + $extra_decoration_amount ; 
    	    $html = "<tr><td>Extra Amount</td><td>Rs ".$extra_decoration_amount."</td></tr>" ; 
    	    $html .= "<tr><td>Total Amount</td><td>Rs ".$total_amount."</td></tr>" ;
	    }
	    echo   $html ; 
	    
	}
	
	function get_gift_booking_amount(){
	      $html = '' ;
	    $total_amount = $this->get_total_user_booking_amount() ; 
	    $gift_amount = 0 ;
	        if((isset($_POST['gift']) ) && (count($_POST['gift']) > 0 )){
    	    foreach($_POST['gift'] as $key=>$value){
    	         $gift = $this->gift_model->get_gift_by_id($value);
    	         $gift_amount = $gift_amount + $gift[0]->price ; 
    	    }
    	    $total_amount = $total_amount + $gift_amount ; 
    	    $html = "<tr><td>Gift Amount</td><td>Rs ".$gift_amount."</td></tr>" ; 
    	    $html .= "<tr><td>Total Amount</td><td>Rs ".$total_amount."</td></tr>" ; 
	     }
	    echo   $html ; 
	    
	}
	
	
	function checkout(){
	    $link = $this->setting_model->get_all_setting();
	     $user_id = $this->session->userdata('USER_ID');
		if(empty($user_id)){ redirect('login');}
	     $user_id = $this->session->userdata('USER_ID'); 
         $userdata = $this->user_model->get_user_by_id($user_id) ;

	    $post_data['user_id'] = $user_id ;
	    $post_data['slots_id'] = $_SESSION['booking']['slots_id'] ;
	    $post_data['theatre_id'] = $_SESSION['booking']['threatre_id'] ;
	    $post_data['date'] = $_SESSION['booking']['date'] ;
	    $post_data['name'] = $userdata[0]->fname.' '. $userdata[0]->lname ;  
	    $post_data['whatsapp_number'] = $_SESSION['booking']['user']['whatsapp_number'] ;  
	    $post_data['phone'] = $userdata[0]->contact_no ;  
	    $post_data['email'] = $userdata[0]->email ;  
	    $post_data['no_of_people'] = $_SESSION['booking']['user']['no_of_people'] ;  
	    $post_data['want_decoartion'] = $_SESSION['booking']['user']['want_decoartion'] ;  
	     
	    $post_data['nick_name'] = $_SESSION['booking']['decoration']['nick_name'] ;  
	    $post_data['partner_nickname'] = $_SESSION['booking']['decoration']['partner_nickname'] ;  
	    $post_data['service_id'] = $_SESSION['booking']['decoration']['service_id'] ;
	   
	    if($_SESSION['booking']['cake']['cake_option'] ){
	          $post_data['cake_option'] =  implode(',', $_SESSION['booking']['cake']['cake_option']  ) ;  
	    }
	    if(isset($_SESSION['booking']['extra_decoration']) && (!empty($_SESSION['booking']['extra_decoration']['decoration_option'])) ){
	          $post_data['extra_decoration_option'] =  implode(',', $_SESSION['booking']['extra_decoration']['decoration_option']  ) ;  
	    }

	    if(isset($_SESSION['booking']['gift']) && (!empty($_SESSION['booking']['gift']['gift_option'])) ){
	           $post_data['gift_option'] =  implode(',', $_SESSION['booking']['gift']['gift_option']  ) ;  
	    }
	
	    $post_data['amount'] =  $_SESSION['booking']['min_amount'] ;
	    
	    if(isset( $_SESSION['booking']['extra_person_amount']) && (!empty($_SESSION['booking']['extra_person_amount']))){
	    $post_data['extra_person_amount'] = $_SESSION['booking']['extra_person_amount'] ; 
	    }
	    if(isset( $_SESSION['booking']['want_decoartion']) && (!empty($_SESSION['booking']['want_decoartion']))){
	    $post_data['want_decoartion_amount'] = $_SESSION['booking']['want_decoartion'] ; 
	    }
	   if(isset( $_SESSION['booking']['cake_amount']) && (!empty($_SESSION['booking']['cake_amount']))){
	    $post_data['cake_amount'] = $_SESSION['booking']['cake_amount'] ; 
	    }
	    if(isset( $_SESSION['booking']['extra_amount']) && (!empty($_SESSION['booking']['extra_amount']))){
	    $post_data['extra_amount'] = $_SESSION['booking']['extra_amount'] ; 
	    }
	    if(isset( $_SESSION['booking']['gift_amount']) && (!empty($_SESSION['booking']['gift_amount']))){
	    $post_data['gift_amount'] = $_SESSION['booking']['gift_amount'] ; 
	    }
	    
	    $post_data['booking_amount'] = $link[0]->booking_price; 
	    $post_data['total_amount'] = $this->get_total_user_booking_amount() ; 
	    $post_data['create_date'] = date('Y-m-d h:i') ; 
	    $post_data['invoice_no'] = $this->create_invoice_no(); 
	    $this->db->insert('tbl_booking' ,$post_data ) ; 
	    $insert_id = $this->db->insert_id() ; 

	    $_SESSION['booking_id'] = $insert_id;
	    redirect('razorpay') ;

	}


 	function create_invoice_no(){
	    
	     $year = date("Y") ; 
	     $total_order = $this->db->get_where('tbl_booking' ,array('year'=>$year ))->num_rows();

	    if($total_order == 0 ){
	        $order_no = 1 ; 
	    }else{
	       $order_no =  $total_order + 1 ; 
	    }
	    $length =    strlen((string)$order_no);
	    $remain_length = 6-$length;
	    $var ='';
	    for($i=0 ; $i < $remain_length ; $i++){
	        
	        $var .=  "0" ; 
	    }
	    return 'TPQ'.date('Y').$var.$order_no ; 
	    
	}
	
	function booking_mail(){
	    
	    $booking_id = $_SESSION['booking_id'] ; 
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
	function gallery()
	{
		$data['RESULT'] = $this->page_model->get_page_by_id(34);
		$data['service'] = $this->service_model->get_all_active_service();
		  $data['gallery'] = $this->gallery_model->get_all_active_gallery(9);
		$this->load->view('front/gallery',$data);

	}
	
	
	function privacy_policy()
	{
		$data['RESULT'] = $this->page_model->get_page_by_id(35);
		$this->load->view('front/page',$data);

	}
	

	function terms_conditions()
	{
		$data['RESULT'] = $this->page_model->get_page_by_id(36);
		$this->load->view('front/page',$data);

	}


    function refund_policy()
	{
		$data['RESULT'] = $this->page_model->get_page_by_id(37);
		$this->load->view('front/page',$data);

	} 
	function join_wait_list()
	{
	     $link = $this->setting_model->get_all_setting();
		if(isset($_POST['name']))
		{
            $name = $this->input->post('name'); 
            $whatsapp_number = $this->input->post('whatsapp_number'); 
    		$to_email = $this->input->post('email');
    		$phone = $this->input->post('phone');
    		$date = $this->input->post('date');
    		$no_of_people = $this->input->post('no_of_people');
    		$city_id = $this->input->post('city_id');
    		$location_id = $this->input->post('location_id');
    		$city = $this->city_model->get_city_by_id($city_id);
    		$location  = $this->location_model->get_location_by_id($location_id);
            $postdata = $this->input->post() ; 
            unset($postdata['submit']);
            $postdata['create_date']= date('Y-m-d H:i:s') ;
             //Load email library 
            $this->load->library('email'); 
            $this->email->from($link[0]->from_email,$link[0]->title);
            $this->email->subject($link[0]->title.':: Join Wait List!');    
            $this->email->to($link[0]->email);
    		$this->email->set_mailtype("html");
    		$message = '<html><body>';
			$message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
			$message .= "<tr style='background: #eee;'><td colspan='2'>Join Wait List</td></tr>";
			$message .= "<tr><td><strong>Name:</strong> </td><td>" . $name . "</td></tr>";
			$message .= "<tr><td><strong>Email:</strong> </td><td>" . $to_email . "</td></tr>";
			$message .= "<tr><td><strong>Whats App Number:</strong> </td><td>" . $whatsapp_number . "</td></tr>";
			$message .= "<tr><td><strong>Mobile:</strong> </td><td>" . $phone . "</td></tr>";
			$message .= "<tr><td><strong>Date:</strong> </td><td>" . $date . "</td></tr>";
			$message .= "<tr><td><strong>No Of People:</strong> </td><td>" . $no_of_people . "</td></tr>";
			$message .= "<tr><td><strong>City Name:</strong> </td><td>" . $city[0]->title . "</td></tr>";
			$message .= "<tr><td><strong>Location Name:</strong> </td><td>" . $location[0]->title . "</td></tr>";
			$message .= "</table>";
			$message .= "</body></html>";
            $this->email->message($message); 
            $this->email->send();
             if( $this->db->insert('tbl_wait_list', $postdata )) {
                  $this->session->set_flashdata('msg','<div class="alert alert-success">Message  sent successfully.We will contact you soon.</div>');
             }else{
                  $this->session->set_flashdata('msg','<div class="alert alert-danger">Sending Error, Please try again.</div>');
             }
             redirect('join-wait-list#form');
            		
		}
		
	    $data['city'] = $this->city_model->get_all_active_city(); 
		$data['location'] = $this->location_model->get_all_active_location();
		$data['RESULT'] = $this->page_model->get_page_by_id(42);
		$this->load->view('front/join-wait-list',$data);

	} 
	function faq()
	{
	     $data['faq'] = $this->faq_model->get_all_active_faq();
		$data['RESULT'] = $this->page_model->get_page_by_id(41);
		$this->load->view('front/faq',$data);

	}
	
	
    function coupon()
	{
		$data['RESULT'] = $this->coupon_model->get_all_active_coupon(); 
		
		$this->load->view('front/coupon',$data);

	}


	function review()
	{
		error_reporting(0);


		$data['review'] = $this->review_model->get_all_active_review();
 
		$data['RESULT'] = $this->page_model->get_page_by_id(14);
		if(isset($_POST['submit']))
		{
			//print_r($_POST);	
		 
         $postdata = $this->input->post(); 

         	if($_FILES['image']['name'] != '' ){	


				$file_name = create_image_unique($_FILES['image']['name']);
				$tmp_name = $_FILES['image']['tmp_name'];
				$path = 'uploads/review/'.$file_name;
				move_uploaded_file($tmp_name,$path);
				$postdata['image'] = $file_name;	
		
				}

			    unset($postdata['submit']);
		        $postdata['create_date']= date('D-M-Y') ;
		        $postdata['status']= 0;
				 
		         if( $this->db->insert('tbl_review', $postdata )){
		         			 $this->session->set_flashdata('msg','<div class="alert alert-success">Your Review successfully send, Thank For your review..</div>');
		         } else{
		         	 $this->session->set_flashdata("email_sent","Error in sending ."); 
		         }
		
		}
		$this->load->view('front/review',$data);

	}

	function subscription()
	{
	
		$link = $this->setting_model->get_all_setting();
		$email = $this->input->post('email');
         //Load email library 
        $this->load->library('email'); 
        $this->email->from($link[0]->email,$link[0]->title);
		$this->email->subject($link[0]->title.':: Subscribe!');    
        $this->email->to($link[0]->email);
		$this->email->set_mailtype("html");
		 
		$message = '<html><body>';
		$message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
		$message .= "<tr style='background: #eee;'><td colspan='2'>Subscribe</td></tr>";
		$message .= "<tr><td><strong>Email:</strong> </td><td>" . $email . "</td></tr>";
		$message .= "</tabl e>";
		$message .= "</body></html>";
        $this->email->message($message); 
         //Send mail 
        if($this->email->send()) {
		 
		 echo ' Thank You For Subscribe. ';
		 
		}else{
       
         echo ' Error in subscribe, please try again.'; 
        
		}

	}
	
	function mail_us()
	{
	
		$link = $this->setting_model->get_all_setting();
		$email = $this->input->post('email');
		$name = $this->input->post('name');
		$phone = $this->input->post('mobile');

         //Load email library 
        $this->load->library('email'); 
        $this->email->from($link[0]->from_email,$link[0]->title);
		$this->email->subject($link[0]->title.':: Get in touch!');    
        $this->email->to($link[0]->email);
		$this->email->set_mailtype("html");
		 
		$message = '<html><body>';
		$message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
		$message .= "<tr style='background: #eee;'><td colspan='2'>Get in touch</td></tr>";
		$message .= "<tr><td><strong>Name:</strong> </td><td>" . $name . "</td></tr>";
		$message .= "<tr><td><strong>Email:</strong> </td><td>" . $email . "</td></tr>";
		$message .= "<tr><td><strong>Phone:</strong> </td><td>" . $phone . "</td></tr>";
		$message .= "</tabl e>";
		$message .= "</body></html>";
        $this->email->message($message); 
         //Send mail
         
        $postdata = $this->input->post() ;  
        $postdata['create_date']= date('Y-m-d H:i:s') ;
         $this->db->insert('tbl_mail_info', $postdata ) ; 
        if($this->email->send()) {
		 
		 echo ' Thank You For Mail us. ';
		 
		}else{
       
         echo ' Error, please try again.'; 
        
		}

	}


	public function error404()
    {
        
       
        $this->load->view('404');
       
    }
   
   
   	function thankyou()
	{
	      $user_id = $this->session->userdata('USER_ID');
		if(empty($user_id)){ redirect('login');}
	    $booking_id = $_SESSION['booking_id'] ; 
	    if($booking_id){
	        $data['booking'] = $this->booking_model->get_booking_by_id($booking_id);
    		$data['RESULT'] = $this->page_model->get_page_by_id(40);
    		$this->load->view('front/thank-you',$data); 
	    }else{
	        redirect() ; 
	    }
	    

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

