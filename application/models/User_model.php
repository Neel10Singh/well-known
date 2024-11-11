<?php 
class User_model extends CI_Model{
	
	protected $table = 'tbl_users';
	public function get_all_users()
	{
	    $this->db->order_by('id','desc') ;
		return $this->db->get($this->table)->result();
	}

	public function get_all_mail_info()
	{   $this->db->order_by('id','desc') ;
		return $this->db->get('tbl_mail_info')->result();
	}	
	public function get_all_join_wait_list()
	{   
	     $this->db->select(" waiting.*,  location.title as location_title,  city.title as city_title");
		$this->db->from('tbl_wait_list as waiting');
	    $this->db->join('tbl_location as location',"waiting.location_id = location.id",'left');
		$this->db->join('tbl_city as city',"waiting.city_id = city.id",'left');
	    $this->db->order_by('waiting.id' , 'desc') ;
		return $this->db->get()->result();
	}	
	public function get_all_subscriber()
	{
	     $this->db->order_by('id','desc') ;
		return $this->db->get('tbl_subscribe')->result();
	}
		
	public function insert_user($data)
	{
		$this->db->insert($this->table,$data);
		return $this->db->insert_id();
	}
	
	public function update_user($id,$data)
	{
		$this->db->where('id',$id);
		return $this->db->update($this->table,$data);
	}
	
	public function check_email($email)
	{
		$this->db->where('email',$email);	
		$rows = $this->db->get($this->table)->result();
		return $rows;
	}
	
	public function user_login($email,$password)
	{
		$this->db->where('email',$email);
		$this->db->where('password',$password);	
		$rows = $this->db->get($this->table)->result();
		return $rows;
	}
	
	public function get_user_by_email_activate_token($token)
	{
		$this->db->where('activate_token',$token);
		$rows = $this->db->get($this->table)->result();
		return $rows;
	}
	
	public function get_user_by_forgot_password_token($token)
	{
		$this->db->where('forgot_token',$token);
		$rows = $this->db->get($this->table)->result();
		return $rows;
	}
	
	public function get_user_by_id($id)
	{
		$this->db->where('id',$id);
		$rows = $this->db->get($this->table)->result();
		return $rows;
	}
	function get_all_users_by_ststus($status)
	{
		if($status!='all')
		{	
			$this->db->where('status',$status);
		}
		$rows = $this->db->get($this->table)->result();
		return $rows;
	}	
	
}
