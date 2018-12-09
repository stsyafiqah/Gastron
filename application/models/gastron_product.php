<?php
class gastron_product extends CI_Model 
{
	public $table = 'gastron_product';
	public $primary_key = 'id_product';

	function field($id,$field)
	{
		$db = $this->db;
		$db->select($field);
		$db->where($this->primary_key,$id);
		$db->limit(1);
		$q = $db->get($this->table)->row()->$field;
		return $q;
	}

	function field_array($id)
	{
		$db = $this->db;
		$db->select('*');
		$db->where($this->primary_key,$id);
		$db->limit(1);
		$q = $db->get($this->table)->row();
		return $q;
	}
    
    function insert_product()
	{
         $data = array(
				
             "code_product"=>$this->code_product,
			 "desc_product"=>$this->desc_product,
			 
					
     	);
        
		$q = $this->db->insert($this->table,$data);
		/*pre($q);
        exit();*/
		return $q;
	}
    
    function listing_all()
	{
         
        $db = $this->db;
		$db->select('*');
        $db->from($this->table);
		$db->where('active',1);
		$q = $db->get()->result();
		return $q;
        
		/*pre($q);
        exit();*/
		return $q;
	}
    
    function update_product($id_product)
	{
         $data = array(
             
			"code_product"=>$this->code_product,
			 "desc_product"=>$this->desc_product,
			 
             "updated"=>'now()',
					
     	);
        
		$q = $this->db->where('id_product',$id_product)->update($this->table,$data);
		/*pre($q);
        exit();*/
		return $q;
	}
    
}
?>