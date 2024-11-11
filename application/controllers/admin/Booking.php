<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Booking  extends CI_Controller 
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
	
	public function listing()
	{
	    $data['city'] = $this->city_model->get_all_active_city(); 
	    $data['location'] = [] ; 
	   $data['theatre'] = [];
	    
	    if(isset($_GET['city_id'])){
	    
	            $data['location'] = $this->location_model->get_location_by_city_id($_GET['city_id'] );
	            $data['theatre'] = $this->theatre_model->get_theatre_by_location_id($_GET['location_id'] );
	        	$data['RESULT'] = $this->booking_model->get_filter_booking($_GET['city_id'] ,$_GET['location_id'],  $_GET['theatre_id'] , $_GET['date'],$_GET['status']  ); 
	    }else{
	       $data['RESULT'] = $this->booking_model->get_all_booking();  
	    }
		$this->load->view('admin/booking/listing',$data);
	}
	
	
		public function review()
	{
		$data['RESULT'] = $this->booking_model->get_all_review(); 
		$this->load->view('admin/booking/review',$data);
	}
		

	
	function view()
	{
		$args = func_get_args();	
		$data['booking'] = $this->booking_model->get_booking_by_id($args[0]);
		$this->load->view('admin/booking/view',$data);
	}
	
	function change_theatre()
	{
		$args = func_get_args();	
		$data['booking'] = $this->booking_model->get_booking_by_id($args[0]);
		$data['city'] = $this->city_model->get_all_active_city(); 
		$data['theatre'] = $this->theatre_model->get_theatre_by_id($data['booking'][0]->theatre_id); 
		$data['location'] = $this->location_model->get_location_by_city_id($data['theatre'][0]->city_id );
		$data['theatreArray'] = $this->theatre_model->get_active_theatre_by_location_id($data['theatre'][0]->location_id );
		$data['theatreSlots'] = $this->theatre_model->get_slots_by_theatre_id($data['theatre'][0]->id );
	    $disabled_dates = $a2 = '' ; 
	    foreach($data['theatreSlots'] as $key=>$value){
	       $a1 = $value->disabled_dates ; 
	       if($key == 0 ){
	            $a2= $a1 ;  ; 
	       }else{
	           $a2= $a1.','.$a2 ;  ;
	       } 
	    }
	    $data['date'] =  $data['booking'][0]->date;
	    $data['disabled_dates'] = array_unique( explode(',', $a2)) ;
		if(isset($_POST['submitform']))
		{
	
				$postdata['date']   = $_POST['date'];
				$postdata['theatre_id']   = $_POST['theatre_id'];
				$postdata['slots_id']   = $_POST['slots_id'];
				$this->booking_model->update_booking_by_id($args[0],$postdata);
				$this->session->set_flashdata('msg','<div class="alert alert-success">record has been successfully updated.</div>');
				redirect('admin/booking/listing');
				
		}
		
		$this->load->view('admin/booking/change_theatre',$data);
	}
	
	function processbookingtatus(){
	    	$postdata = $this->input->post();
	    	$data['status'] = $postdata['status'] ; 
	    	$data['remarks'] = $postdata['remarks'] ; 
	    	$this->db->where('id',$postdata['booking_id']);
		    $this->db->update('tbl_booking',$data);
			$this->session->set_flashdata('msg','<div class="alert alert-success">Record has been successfully updated.</div>');
			redirect('admin/booking/listing');
	}
	
    function processReviewStatus(){
	    	$postdata = $this->input->post();
	    	$data['home_view'] = $postdata['home_view'] ; 
	    	$this->db->where('id',$postdata['id']);
		    $this->db->update('tbl_booking_review',$data);
			$this->session->set_flashdata('msg','<div class="alert alert-success">Record has been successfully updated.</div>');
			redirect('admin/booking/review');
	}
	
	function get_slots_of_theatre_on_date(){
        
        $data['date'] =$date =  $_POST['date'] ; 
        $theatre_id = $_POST['theatre_id'] ; 
        $slots_id = $_POST['slots_id'] ; 
	    $slots =  $this->theatre_model->get_active_slots_by_theatre_id($theatre_id) ;
	    if( count($slots) > 0){
	      
	         echo '<option value="">Select Theatre Slots</option>';
            foreach($slots as $key=>$value){
            $booked =  $this->booking_model->check_slots_booking_on_that_date($value->id ,date( 'Y-m-d' , strtotime( $date)) ) ;
                $con = '' ; 
                if($slots_id ==$value->id ){
                    $con = "Selected" ; 
                }
                if($booked== 0 ){
                     echo '<option  value="'.$value->id.'"   '.$con.' >'.$value->title.'</option>'; 
                }else{
                    if($slots_id ==$value->id ){
                         echo '<option  value="'.$value->id.'"  '.$con.'  >'.$value->title.' (Selected)</option>';
                    }else{
                         echo '<option  value="'.$value->id.'"    disabled>'.$value->title.' (Already Booked)</option>';
                    }
                     
                }
            }
        }else{
	        echo '<option value="">Theatre Slots not available</option>';
	    }
    }
    
	function get_slots_of_theatre_on_date_html(){
        
        $data['date'] =$date =  $_POST['date'] ; 
        $theatre_id = $_POST['theatre_id'] ; 
        $slots_id = $_POST['slots_id'] ; 
	    $slots =  $this->theatre_model->get_active_slots_by_theatre_id($theatre_id) ;
	    if( count($slots) > 0){
	      
	       
            foreach($slots as $key=>$value){
            $booked =  $this->booking_model->check_slots_booking_on_that_date($value->id ,date( 'Y-m-d' , strtotime( $date)) ) ;
                $con = '' ; 
                if($booked== 0 ){
                     echo '<div class="col-sm-3"> <button class="btn btn-info" >'.$value->title.'</button></div>'; 
                }else{
                  
                    echo '<div  class="col-sm-3"> <button class="btn btn-danger ">'.$value->title.' ( Booked)</button></div>';
                
                     
                }
            }
        }else{
	        echo '<div value="">Theatre Slots not available</div>';
	    }
    }
	
}