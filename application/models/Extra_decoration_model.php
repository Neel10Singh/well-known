<?php 
class Extra_decoration_model extends CI_Model
{	
	protected $table = 'tbl_extra_decoration';
	public function save_extra_decoration($data)
	{
		$this->db->insert($this->table,$data);
	}
	public function get_all_extra_decoration()
	{
		return $this->db->get($this->table)->result();
	}
	public function get_extra_decoration_by_id($id)
	{
		$this->db->where('id',$id);
		return $this->db->get($this->table)->result();
	}
	public function update_extra_decoration_by_id($id,$data)
	{
		$this->db->where('id',$id);
		$this->db->update($this->table,$data);
	}
	public function get_all_active_extra_decoration()
	{
		$this->db->where('status',1);
		return $this->db->get($this->table)->result();
	}
	public function delete_extra_decoration_by_id($id)
	{
		$this->db->where('id',$id);
		$this->db->delete($this->table);
	}
}
