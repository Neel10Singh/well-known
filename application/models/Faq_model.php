<?php 
class Faq_model extends CI_Model
{	
	protected $table = 'tbl_faq';
	/*start forum product model*/
	public function save_faq($data)
	{
  
		$this->db->insert($this->table,$data);
	}

     public function get_all_faq()
	{
		return $this->db->get($this->table)->result();
	}
     public function get_all_active_faq()
	{
	    	$this->db->where('status','1');
		return $this->db->get($this->table)->result();
	}


	public function get_faq_by_id($id)
	{
	
		$this->db->where('id',$id);
		return $this->db->get($this->table)->result();
	}
	public function update_faq_by_id($id,$data)
	{
		$this->db->where('id',$id);
		$this->db->update($this->table,$data);
	}
	
	public function delete_faq_by_id($id)
	{
		$this->db->where('id',$id);
		$this->db->delete($this->table);
	}



}
