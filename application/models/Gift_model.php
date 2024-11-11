<?php 
class Gift_model extends CI_Model
{	
	protected $table = 'tbl_gift';
	public function save_gift($data)
	{
		$this->db->insert($this->table,$data);
	}
	public function get_all_gift()
	{
		return $this->db->get($this->table)->result();
	}
	public function get_gift_by_id($id)
	{
		$this->db->where('id',$id);
		return $this->db->get($this->table)->result();
	}
	public function update_gift_by_id($id,$data)
	{
		$this->db->where('id',$id);
		$this->db->update($this->table,$data);
	}
	public function get_all_active_gift()
	{
		$this->db->where('status',1);
		return $this->db->get($this->table)->result();
	}
	public function delete_gift_by_id($id)
	{
		$this->db->where('id',$id);
		$this->db->delete($this->table);
	}
}
