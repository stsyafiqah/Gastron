<?php
class gastron_client extends CI_Model 
{
	public $table = 'gastron_client';
	public $primary_key = 'id_client';

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
    
    function insert_client()
	{
         $data = array(
				
             "csr_no"=>$this->csr_no,
             "name_client"=>$this->name_client,
			 "email_client"=>$this->email_client,
			 "phone_client"=>$this->phone_client,
              "address_client"=>$this->address_client,
			 "city_client"=>$this->city_client,
			 "state_client"=>$this->state_client,
             "zip_code_client"=>$this->zip_code_client,
					
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
    
    function update_client($id_client)
	{
         $data = array(
              "csr_no"=>$this->csr_no,
             "name_client"=>$this->name_client,
			 "email_client"=>$this->email_client,
			 "phone_client"=>$this->phone_client,
              "address_client"=>$this->address_client,
			 "city_client"=>$this->city_client,
			 "state_client"=>$this->state_client,
             "zip_code_client"=>$this->zip_code_client,
             "updated"=>'now()',
					
     	);
        
		$q = $this->db->where('id_client',$id_client)->update($this->table,$data);
		/*pre($q);
        exit();*/
		return $q;
	}
    
    function delete_client($id_client)
	{
         $data = array(
				
             "active"=>0,

					
     	);
        
		$q = $this->db->where('id_client',$id_client)->update($this->table,$data);
		/*pre($q);
        exit();*/
		return $q;
	}
    
    
}
?>