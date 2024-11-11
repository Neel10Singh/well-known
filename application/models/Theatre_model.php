<?php 
class Theatre_model extends CI_Model
{	
	protected $table = 'tbl_theatre';
	public function save_theatre($data)
	{
		$this->db->insert($this->table,$data);
	}
	public function get_all_theatre()
	{
	      $this->db->select(" thea.*,  location.title as location_title,  city.title as city_title");
		$this->db->from('tbl_theatre as thea');
		$this->db->join('tbl_location as location',"thea.location_id = location.id",'left');
				$this->db->join('tbl_city as city',"location.city_id = city.id",'left');
		$this->db->order_by('thea.id' , 'desc') ;
		return $this->db->get()->result();
	}
	public function get_theatre_by_id($id)
	{
	    $this->db->select(" thea.*,  location.title as location_title,  city.title as city_title");
		$this->db->from('tbl_theatre as thea');
		$this->db->join('tbl_location as location',"thea.location_id = location.id",'left');
		$this->db->join('tbl_city as city',"location.city_id = city.id",'left');
		$this->db->where('thea.id',$id);
		return $this->db->get()->result();
	}
	
	public function get_theatre_by_url_slug($url_slug)
	{
	    $this->db->select(" thea.*,  location.title as location_title,  city.title as city_title");
		$this->db->from('tbl_theatre as thea');
		$this->db->join('tbl_location as location',"thea.location_id = location.id",'left');
		$this->db->join('tbl_city as city',"location.city_id = city.id",'left');
		$this->db->where('thea.url_slug',$url_slug);
		return $this->db->get()->result();
	}
	public function update_theatre_by_id($id,$data)
	{
		$this->db->where('id',$id);
		$this->db->update($this->table,$data);
	}
	
	public function get_all_active_theatre()
	{
	      $this->db->select(" thea.*,  location.title as location_title,  city.title as city_title");
		$this->db->from('tbl_theatre as thea');
		$this->db->join('tbl_location as location',"thea.location_id = location.id",'left');
		$this->db->join('tbl_city as city',"location.city_id = city.id",'left');
		$this->db->order_by('thea.id' , 'desc') ;
		$this->db->where('thea.status',1);
		return $this->db->get()->result();
	}
	
	public function get_theatre_by_location_id($location_id)
	{
	    $this->db->select(" thea.*,  location.title as location_title,  city.title as city_title");
		$this->db->from('tbl_theatre as thea');
		$this->db->join('tbl_location as location',"thea.location_id = location.id",'left');
		$this->db->join('tbl_city as city',"location.city_id = city.id",'left');
		$this->db->order_by('thea.id' , 'desc') ;
		$this->db->where('thea.location_id',$location_id);
		return $this->db->get()->result();
	}
	public function get_active_theatre_by_location_id($location_id)
	{
	    $this->db->select(" thea.id,thea.url_slug,thea.image,thea.short_description,thea.person_range,thea.title,");
		$this->db->from('tbl_theatre as thea');
		$this->db->join('tbl_location as location',"thea.location_id = location.id",'left');
		$this->db->join('tbl_city as city',"location.city_id = city.id",'left');
		$this->db->order_by('thea.id' , 'desc') ;
		$this->db->where('thea.location_id',$location_id);
		$this->db->where('thea.status',1);
		return $this->db->get()->result();
	}
	public function delete_theatre_by_id($id)
	{
		$this->db->where('id',$id);
		$this->db->delete($this->table);
	}
	
	public function get_slots_by_theatre_id($theatre_id)
	{
	    
		$this->db->where('theatre_id',$theatre_id);
		return $this->db->get('tbl_theatre_slots')->result();
	}
	
	public function save_theatre_slots($data)
	{
		$this->db->insert('tbl_theatre_slots',$data);
	}
	
	public function get_theatre_slots_by_id($id)
	{
		$this->db->where('id',$id);
		return $this->db->get('tbl_theatre_slots')->result();
	}
	public function update_theatre_slots_by_id($id,$data)
	{
		$this->db->where('id',$id);
		$this->db->update('tbl_theatre_slots',$data);
	}
	
	public function get_active_slots_by_theatre_id($theatre_id)
	{
		$this->db->where('theatre_id',$theatre_id);
		$this->db->where('status',1);
		return $this->db->get('tbl_theatre_slots')->result();
	}
}
