<?php 
class City_model extends CI_Model
{	
	protected $table = 'tbl_city';
	public function save_city($data)
	{
		$this->db->insert($this->table,$data);
	}
	public function get_all_city()
	{
		return $this->db->get($this->table)->result();
	}
	public function get_city_by_url_slug($url_slug)
	{
		$this->db->where('url_slug',$url_slug);
		return $this->db->get($this->table)->result();
	}
	public function get_city_by_id($id)
	{
		$this->db->where('id',$id);
		return $this->db->get($this->table)->result();
	}
	public function update_city_by_id($id,$data)
	{
		$this->db->where('id',$id);
		$this->db->update($this->table,$data);
	}
	public function get_all_active_city()
	{
		$this->db->where('status',1);
		return $this->db->get($this->table)->result();
	}
	public function delete_city_by_id($id)
	{
		$this->db->where('id',$id);
		$this->db->delete($this->table);
	}
}
