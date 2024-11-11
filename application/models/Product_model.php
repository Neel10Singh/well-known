<?php 
class Product_model extends CI_Model
{	
	protected $table = 'tbl_products';
	/*start forum product model*/
	public function save_product($data)
	{

		$this->db->insert($this->table,$data);
	} 
	public function get_all_product()
	{
		$this->db->order_by('id' , 'desc') ;
		return $this->db->get($this->table)->result();
	}

    public function get_all_product_multiple_ids($ids)
	{
	    $this->db->where_in('id', $ids);
	   $this->db->order_by('id' , 'desc') ;
		return $this->db->get($this->table)->result();
	}
	
	public function search_products($keyword)
	{

    $this->db->like('title',$keyword);
     $this->db->where('status','1');
	  $this->db->order_by('id' , 'desc') ;
    return $this->db->get($this->table)->result();

	}
	public function get_product_by_id($id)
	{
		$this->db->where('id',$id);
		return $this->db->get($this->table)->result();
	}
	public function update_product_by_id($id,$data)
	{
		$this->db->where('id',$id);
		$this->db->update($this->table,$data);
	}
	public function get_all_active_product()
	{
		$this->db->where('status','1');
	    $this->db->order_by('id' , 'desc') ;
		return $this->db->get($this->table)->result(); 
	}

	public function get_all_active_product_by_filter($age,$price,$color)
	{
		if(!empty($age)){ $this->db->where('age_id',$age);  }
		if(!empty($price)){  $this->db->where('price_id',$price);  }
		if(!empty($color)){ $this->db->where('color_id',$color);  }

		$this->db->where('status','1');
		return $this->db->get($this->table)->result();
	}	
	
	public function save_product_images($data)
	{
		$this->db->insert('tbl_product_images',$data);
	}
	public function select_product_images($pro_id)
	{
	    $this->db->order_by('position' ,'Asc') ;
		$this->db->where('product_id',$pro_id);
		return $this->db->get('tbl_product_images')->result();
	}

	public function select_product_images_by_id($pro_id)
	{
		$this->db->where('product_id',$pro_id);
		$this->db->limit(1);
		return $this->db->get('tbl_product_images')->result();
	}
	
	function delete_product_images($pro_id)
	{
		$this->db->where('id',$pro_id);
		$this->db->delete('tbl_product_images');
	}
	

	public function get_all_latest_product($limit=0)
	{
		if($limit!=0){ $this->db->limit($limit); }
		$this->db->where('status','1');
		$this->db->where('is_latest','yes');
		$this->db->order_by('id' , 'desc') ;
		return $this->db->get($this->table)->result();
	}	
	public function get_all_featured_product($limit=0)
	{
		if($limit!=0){ $this->db->limit($limit); }
		$this->db->where('status','1');
		$this->db->where('is_featured','yes');
		$this->db->order_by('position') ;
		return $this->db->get($this->table)->result();
	}	
	public function get_product_by_category_id($cat_id)
	{
		$this->db->select(" category.url_slug as cat_url, category.title as cat_title,product.url_slug,product.title,product.special_price,product.price,product.id,product.qty,product.weight,product.unit,product.is_latest");
		$this->db->from('tbl_products as product');
		$this->db->join('tbl_categories as category',"product.cat_id = category.id",'left');
		$this->db->where('product.cat_id',$cat_id);
		$this->db->where('product.status','1');
		$this->db->where('product.is_latest','yes');
		$this->db->order_by('product.id' , 'desc') ;
		return $this->db->get()->result();
	}
	public function get_product_by_urlslug($key)
	{
		$this->db->where('url_slug',$key);
		return $this->db->get($this->table)->result();
	}
	
	function get_product_url($pri_id)
	{
		$this->db->select("CONCAT(category.url_slug,'/',product.url_slug,'.html') as product_url");
		$this->db->from('tbl_products as product');
		$this->db->join('tbl_categories as category',"product.cat_id = category.id",'inner');
		$this->db->where('product.id',$pri_id);
		$data =  $this->db->get()->result();
		return base_url($data[0]->product_url);
	}

	public function get_all_featured_product_home($limit=0)
	{
		

		$this->db->select(" category.url_slug as cat_url, category.title as cat_title,product.url_slug,product.title,product.special_price,product.price,product.id,product.qty,product.weight,product.unit,product.is_latest");
		$this->db->from('tbl_products as product');
		$this->db->join('tbl_categories as category',"product.cat_id = category.id",'left');
		$this->db->where('product.status','1');
		$this->db->where('product.is_featured','yes');
		$this->db->order_by('product.id' , 'desc') ;
		if($limit!=0){ $this->db->limit($limit); }
		return $this->db->get()->result();
	}
	
	public function get_all_is_deal_product_home($limit=0)
	{
		

		$this->db->select(" category.url_slug as cat_url, category.title as cat_title,product.url_slug,product.title,product.special_price,product.price,product.id,product.qty,product.weight,product.unit,product.is_latest");
		$this->db->from('tbl_products as product');
		$this->db->join('tbl_categories as category',"product.cat_id = category.id",'left');
		$this->db->where('product.status','1');
		$this->db->where('product.is_deal','1');
		$this->db->order_by('product.id' , 'desc') ;
		if($limit!=0){ $this->db->limit($limit); }
		return $this->db->get()->result();
	}

	public function get_all_latest_product_home($limit=0)
	{
		if($limit!=0){ $this->db->limit($limit); }
		$this->db->select(" category.url_slug as cat_url, category.title as cat_title,product.url_slug,product.title,product.special_price,product.price,product.id,product.qty,product.weight,product.unit,product.is_latest");
		$this->db->from('tbl_products as product');

		$this->db->join('tbl_categories as category',"product.cat_id = category.id",'left');
		$this->db->where('product.status','1');
		$this->db->order_by('product.id' , 'desc') ;
		$this->db->group_by('product.id') ;
		return $this->db->get()->result();
	}

    public function get_product_by_category_id_order_by($cat_id)
	{
		$this->db->select(" category.url_slug as cat_url, category.title as cat_title,product.url_slug,product.title,product.special_price,product.price,product.id,product.qty,product.weight,product.unit,product.is_latest");
		$this->db->from('tbl_products as product');
		$this->db->join('tbl_categories as category',"product.cat_id = category.id",'left');
		$this->db->where('product.cat_id',$cat_id);
		$this->db->where('product.status','1');
		return $this->db->get()->result();
	} 

	public function get_product_by_mulit_category_id_order_by($cat_id_array)
	{
		$this->db->select("category.url_slug as cat_url, category.title as cat_title,product.title,product.title,product.special_price,product.price,product.id,product.qty,product.weight,product.unit,product.is_latest");
		$this->db->from('tbl_products as product');
		$this->db->join('tbl_categories as category',"product.cat_id = category.id",'left');
		$this->db->where_in('product.cat_id',$cat_id_array);
		$this->db->where('product.status','1');
		return $this->db->get()->result();
	}
	
	public function get_wishlist_data($user_id){
	   
	   	$this->db->select(" wishlist.id as wish_id,category.url_slug as cat_url, category.title as cat_title,product.url_slug,product.title,product.special_price,product.price,product.id,product.qty,product.weight,product.unit,product.is_latest");
		$this->db->from('tbl_wishlist as wishlist');
		$this->db->join('tbl_products as product',"wishlist.product_id = product.id",'left');
		$this->db->join('tbl_categories as category',"product.cat_id = category.id",'left');
		$this->db->where('product.status','1');
		$this->db->where('wishlist.user_id',$user_id);
		return $this->db->get()->result(); 
	}
}
