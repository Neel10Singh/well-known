<?php 
class Cake_model extends CI_Model
{	
	protected $table = 'tbl_cake';
	public function save_cake($data)
	{
		$this->db->insert($this->table,$data);
	}
	public function get_all_cake()
	{
		return $this->db->get($this->table)->result();
	}
	public function get_cake_by_id($id)
	{
		$this->db->where('id',$id);
		return $this->db->get($this->table)->result();
	}
	public function update_cake_by_id($id,$data)
	{
		$this->db->where('id',$id);
		$this->db->update($this->table,$data);
	}
	public function get_all_active_cake()
	{
		$this->db->where('status',1);
		return $this->db->get($this->table)->result();
	}
	public function delete_cake_by_id($id)
	{
		$this->db->where('id',$id);
		$this->db->delete($this->table);
	}
}
