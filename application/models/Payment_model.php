<?php 
class Payment_model extends CI_Model
{	
	protected $table = 'tbl_payment';
	public function save_payment($data)
	{
		$this->db->insert($this->table,$data);
	}
	public function get_all_payment()
	{
	    $this->db->select(" payment.* , booking.*,  thea.title as theatre_title,  slots.title as slots_title, location.title as location_title,  city.title as city_title");
		$this->db->from('tbl_payment as payment');
		$this->db->join('tbl_booking as booking',"payment.booking_id = booking.id",'left');
		$this->db->join('tbl_theatre as thea',"booking.theatre_id = thea.id",'left');
		$this->db->join('tbl_theatre_slots as slots',"booking.slots_id = slots.id",'left');
			$this->db->join('tbl_location as location',"thea.location_id = location.id",'left');
				$this->db->join('tbl_city as city',"location.city_id = city.id",'left');
		$this->db->order_by('thea.id' , 'desc') ;
		return $this->db->get()->result();
	}
	public function get_payment_by_id($id)
	{
	     $this->db->select(" payment.* , booking.*,  thea.title as theatre_title,  slots.title as slots_title, location.title as location_title,  city.title as city_title");
		$this->db->from('tbl_payment as payment');
		$this->db->join('tbl_booking as booking',"payment.booking_id = booking.id",'left');
		$this->db->join('tbl_theatre_slots as slots',"booking.slots_id = slots.id",'left');
		$this->db->join('tbl_service as service',"booking.service_id = service.id",'left');
		$this->db->join('tbl_location as location',"thea.location_id = location.id",'left');
		$this->db->join('tbl_city as city',"location.city_id = city.id",'left');
		$this->db->order_by('booking.id' , 'desc') ;
		$this->db->where('booking.id',$id);
		return $this->db->get()->result();
	}
	
	public function update_payment_by_id($id,$data)
	{
		$this->db->where('id',$id);
		$this->db->update($this->table,$data);
	}

}
