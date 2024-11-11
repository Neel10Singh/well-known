<?php 
class Service_model extends CI_Model
{	
	protected $table = 'tbl_service';
	public function save_service($data)
	{
		$this->db->insert($this->table,$data);
	}
	public function get_all_service()
	{
		return $this->db->get($this->table)->result();
	}
	public function get_service_by_id($id)
	{
		$this->db->where('id',$id);
		return $this->db->get($this->table)->result();
	}
	public function update_service_by_id($id,$data)
	{
		$this->db->where('id',$id);
		$this->db->update($this->table,$data);
	}
	public function get_all_active_service()
	{
		$this->db->where('status',1);
		return $this->db->get($this->table)->result();
	}
	public function delete_service_by_id($id)
	{
		$this->db->where('id',$id);
		$this->db->delete($this->table);
	}
}
