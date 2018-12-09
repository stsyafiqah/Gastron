<?php
class gastron_model extends CI_Model 
{
	public $table = 'gastron_model';
	public $primary_key = 'id_modle';

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
    
    function insert_model()
	{
         $data = array(
				
              "id_products"=>$this->id_products,
             "code_model"=>$this->code_model,
			 "desc_model"=>$this->desc_model,
			 
					
     	);
        
		$q = $this->db->insert($this->table,$data);
		/*pre($q);
        exit();*/
		return $q;
	}
    
     function listing_all()
	{
         
        $db = $this->db;
		$db->select('a.*,b.*');
        $db->from($this->table.' a');
        $db->join('gastron_product b','a.id_products = b.id_product ','LEFT');
		$db->where('a.active',1);
		$q = $db->get()->result();
		return $q;
        
		/*pre($q);
        exit();*/
		return $q;
	}
    
    function update_model($id_model)
	{
         $data = array(
              "id_products"=>$this->id_products,
			"code_model"=>$this->code_model,
			 "desc_model"=>$this->desc_model,
			 
             "updated"=>'now()',
					
     	);
        
		$q = $this->db->where('id_model',$id_model)->update($this->table,$data);
		/*pre($q);
        exit();*/
		return $q;
	}
    
     function select_model($id_product)
	{
         
        $db = $this->db;
		$db->select('id_model,code_model');
        $db->from($this->table);
        $db->where('id_products',$id_product);
		$db->where('active',1);
		$q = $db->get()->result();
		return $q;
 
	}
    
}
?>