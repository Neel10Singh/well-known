<?php 
class Booking_model extends CI_Model
{	
	protected $table = 'tbl_booking';
	public function save_booking($data)
	{
		$this->db->insert($this->table,$data);
	}
	public function get_all_booking()
	{
	     $this->db->select(" booking.*,  thea.title as theatre_title,  slots.title as slots_title, location.title as location_title,  city.title as city_title");
		$this->db->from('tbl_booking as booking');
		$this->db->join('tbl_theatre as thea',"booking.theatre_id = thea.id",'left');
		$this->db->join('tbl_theatre_slots as slots',"booking.slots_id = slots.id",'left');
		$this->db->join('tbl_location as location',"thea.location_id = location.id",'left');
		$this->db->join('tbl_city as city',"location.city_id = city.id",'left');
		$this->db->order_by('booking.id' , 'desc') ;
		return $this->db->get()->result();
	}
	public function get_filter_booking($city_id , $location_id , $theatre_id , $date ,$status)
	{
	     $this->db->select(" booking.*,  thea.title as theatre_title,  slots.title as slots_title, location.title as location_title,  city.title as city_title");
		$this->db->from('tbl_booking as booking');
		$this->db->join('tbl_theatre as thea',"booking.theatre_id = thea.id",'left');
		$this->db->join('tbl_theatre_slots as slots',"booking.slots_id = slots.id",'left');
		$this->db->join('tbl_location as location',"thea.location_id = location.id",'left');
		$this->db->join('tbl_city as city',"location.city_id = city.id",'left');
		
		if($city_id){
		   $this->db->where('location.city_id' , $city_id) ;  
		}
		
		if($location_id){
		   $this->db->where('thea.location_id' , $location_id) ;  
		}
		
		if($theatre_id){
		   $this->db->where('booking.theatre_id' , $theatre_id) ;  
		}
		
		if($date){
		   $this->db->where('booking.date' , $date) ;  
		}
		if($status){
		   $this->db->where('booking.status' , $status) ;  
		}
		$this->db->order_by('booking.id' , 'desc') ;
		return $this->db->get()->result();
	}
	public function get_booking_by_id($id)
	{
	     $this->db->select(" booking.*,  thea.title as theatre_title,  slots.title as slots_title,  location.title as location_title,  city.title as city_title,  service.title as service_title");
		$this->db->from('tbl_booking as booking');
		$this->db->join('tbl_theatre as thea',"booking.theatre_id = thea.id",'left');
		$this->db->join('tbl_theatre_slots as slots',"booking.slots_id = slots.id",'left');
		$this->db->join('tbl_service as service',"booking.service_id = service.id",'left');
		$this->db->join('tbl_location as location',"thea.location_id = location.id",'left');
		$this->db->join('tbl_city as city',"location.city_id = city.id",'left');
		$this->db->order_by('booking.id' , 'desc') ;
		$this->db->where('booking.id',$id);
		return $this->db->get()->result();
	}
	
	public function update_booking_by_id($id,$data)
	{
		$this->db->where('id',$id);
		$this->db->update($this->table,$data);
	}
	

	
	public function check_slots_booking_on_that_date($slots_id , $date)
	{
	    
	  
		$this->db->from('tbl_booking as booking');
		$this->db->join('tbl_theatre as thea',"booking.theatre_id = thea.id",'left');
		$this->db->join('tbl_theatre_slots as slots',"booking.slots_id = slots.id",'left');
		$this->db->order_by('thea.id' , 'desc') ;
		$this->db->where('booking.slots_id',$slots_id);
		$this->db->where('booking.date',$date);
		$this->db->where('booking.status','Booked');
		return $this->db->get()->num_rows();
	}
	public function delete_booking_by_id($id)
	{
		$this->db->where('id',$id);
		$this->db->delete($this->table);
	}
	
	
		public function get_all_review()
	{
		$this->db->select("review.*, theatre.title as title,users.fname , users.email, booking.invoice_no ");
		$this->db->from("tbl_booking_review as review");
		$this->db->join("tbl_booking as booking","booking.id = review.booking_id",'left');
		$this->db->join("tbl_theatre as theatre","theatre.id = review.theatre_id",'left');
		$this->db->join("tbl_users as users","users.id = review.user_id",'left');
		return $this->db->get()->result();
	}
	
	
		public function get_all_active_review()
	{
		$this->db->select("review.*, theatre.title as title,users.fname ,users.lname  ");
		$this->db->from("tbl_booking_review as review");
		$this->db->join("tbl_theatre as theatre","theatre.id = review.theatre_id",'left');
		$this->db->join("tbl_users as users","users.id = review.user_id",'left');
		$this->db->where('review.home_view ','Active');
		return $this->db->get()->result();
	}

	
		public function get_all_booking_by_user_id($user_id)
	{
		
		$this->db->select(" booking.*,  thea.title as theatre_title,thea.image as theatre_image, ,thea.url_slug as url_slug, slots.title as slots_title,  location.title as location_title,  city.title as city_title,  service.title as service_title");
		$this->db->from('tbl_booking as booking');
		$this->db->join('tbl_theatre as thea',"booking.theatre_id = thea.id",'left');
		$this->db->join('tbl_theatre_slots as slots',"booking.slots_id = slots.id",'left');
		$this->db->join('tbl_service as service',"booking.service_id = service.id",'left');
		$this->db->join('tbl_location as location',"thea.location_id = location.id",'left');
		$this->db->join('tbl_city as city',"location.city_id = city.id",'left');
		$this->db->order_by('booking.id' , 'desc') ;
		$this->db->where('booking.user_id',$user_id);
		return $this->db->get()->result();	
	}	
	
	public function get_booking_by_user_id_and_invoice($user_id,$invoice)
	{
		
		$this->db->select(" booking.*,  thea.title as theatre_title,thea.image as theatre_image, ,thea.url_slug as url_slug, slots.title as slots_title,  location.title as location_title,  city.title as city_title,  service.title as service_title");
		$this->db->from('tbl_booking as booking');
		$this->db->join('tbl_theatre as thea',"booking.theatre_id = thea.id",'left');
		$this->db->join('tbl_theatre_slots as slots',"booking.slots_id = slots.id",'left');
		$this->db->join('tbl_service as service',"booking.service_id = service.id",'left');
		$this->db->join('tbl_location as location',"thea.location_id = location.id",'left');
		$this->db->join('tbl_city as city',"location.city_id = city.id",'left');
		$this->db->order_by('booking.id' , 'desc') ;
		$this->db->where('booking.user_id',$user_id);
		$this->db->where('booking.invoice_no',$invoice);
		return $this->db->get()->result();	
	}
	
		public function count_all_review_by_user_id($user_id)
	{
		
		$this->db->from("tbl_package_review as review");
		$this->db->join("tbl_packages as packages","packages.id = review.package_refid",'left');
		$this->db->where('review.user_id',$user_id);
		return $this->db->get()->num_rows();	
	}
	
	public function get_all_review_by_user_id($user_id)
	{
		$this->db->select("review.*, packages.title as title ");
		$this->db->from("tbl_package_review as review");
		$this->db->join("tbl_packages as packages","packages.id = review.package_refid",'left');
		$this->db->where('review.user_id',$user_id);
		return $this->db->get()->result();
	}
	

}
