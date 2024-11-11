<?php 
class Location_model extends CI_Model
{	
	protected $table = 'tbl_location';
	public function save_location($data)
	{
		$this->db->insert($this->table,$data);
	}
	public function get_all_location()
	{
	    
	    $this->db->select(" locn.*,  city.title as city_title");
		$this->db->from('tbl_location as locn');
		$this->db->join('tbl_city as city',"locn.city_id = city.id",'left');
		$this->db->order_by('locn.id' , 'desc') ;
		return $this->db->get()->result();
		
		return $this->db->get($this->table)->result();
	}
	public function get_location_by_id($id)
	{
		$this->db->where('id',$id);
		return $this->db->get($this->table)->result();
	}
	
	public function get_location_by_url_slug($url_slug)
	{
		$this->db->where('url_slug',$url_slug);
		return $this->db->get($this->table)->result();
	}
	public function update_location_by_id($id,$data)
	{
		$this->db->where('id',$id);
		$this->db->update($this->table,$data);
	}
	public function get_all_active_location()
	{
	    $this->db->select(" locn.*,  city.title as city_title");
		$this->db->from('tbl_location as locn');
		$this->db->join('tbl_city as city',"locn.city_id = city.id",'left');
		$this->db->order_by('locn.id' , 'desc') ;
		$this->db->where('locn.status',1);
		return $this->db->get()->result();
	}
	
	public function get_location_by_city_id($city_id)
	{
	    $this->db->select(" locn.*,  city.title as city_title");
		$this->db->from('tbl_location as locn');
		$this->db->join('tbl_city as city',"locn.city_id = city.id",'left');
		$this->db->order_by('locn.id' , 'desc') ;
		$this->db->where('locn.city_id',$city_id);
		$this->db->where('locn.status',1);
		return $this->db->get()->result();
	}
	public function delete_location_by_id($id)
	{
		$this->db->where('id',$id);
		$this->db->delete($this->table);
	}
}
