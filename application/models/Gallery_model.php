<?php 
class Gallery_model extends CI_Model
{	
	protected $table = 'tbl_gallery';
	public function save_gallery($data)
	{
		$this->db->insert($this->table,$data);
	}
	public function get_all_gallery()
	{
		$this->db->select(" gallery.*,  service.title as service_title");
		$this->db->from('tbl_gallery as gallery');
		$this->db->join('tbl_service as service',"gallery.service_id = service.id",'left');
		$this->db->order_by('gallery.id' , 'desc') ;
		return $this->db->get()->result();
	}
	public function get_gallery_by_id($id)
	{
		$this->db->where('id',$id);
		return $this->db->get($this->table)->result();
	}
	public function update_gallery_by_id($id,$data)
	{
		$this->db->where('id',$id);
		$this->db->update($this->table,$data);
	}
	public function get_all_active_gallery($limit)
	{
	    $this->db->select(" gallery.*,  service.title as service_title");
		$this->db->from('tbl_gallery as gallery');
		$this->db->join('tbl_service as service',"gallery.service_id = service.id",'left');
		$this->db->where('gallery.status',1);
		if($limit){
		  	$this->db->limit($limit);  
		}
		$this->db->order_by('gallery.id' , 'desc') ;
		return $this->db->get()->result();
	}
	
	public function get_location_by_service_id($service_id)
	{
	     $this->db->select(" gallery.*,  service.title as service_title");
		$this->db->from('tbl_gallery as gallery');
		$this->db->join('tbl_service as service',"gallery.service_id = service.id",'left');
		$this->db->where('gallery.service_id',$service_id);
		$this->db->where('gallery.status',1);
		$this->db->order_by('gallery.id' , 'desc') ;
		return $this->db->get()->result();
	}
	public function delete_gallery_by_id($id)
	{
		$this->db->where('id',$id);
		$this->db->delete($this->table);
	}
}
