<?php
class gastron_technician extends CI_Model 
{
	public $table = 'gastron_technician';
	public $primary_key = 'id_techician';

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
    
    function insert_technician()
	{
         $data = array(
				
             "name_technician"=>$this->name_technician,
			 "email_technician"=>$this->email_technician,
			 "phone_technician"=>$this->phone_technician,
              "password_technician"=>encryptor('encrypt',$this->email_technician),
             
					
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
    
    function update_technician($id_technician)
	{
         $data = array(
				
             "name_technician"=>$this->name_technician,
			 "email_technician"=>$this->email_technician,
			 "phone_technician"=>$this->phone_technician,
             "updated"=>'now()',
					
     	);
        
		$q = $this->db->where('id_technician',$id_technician)->update($this->table,$data);
		/*pre($q);
        exit();*/
		return $q;
	}
    
    function login($email,$password)
	{
		
			$db = $this->db;
			//$db->select('id,types,email,fullname,groups');
			$db->select('*');
			$db->where('email_technician',$email);
			$db->where('password_technician',encryptor('encrypt',$password));
			$db->limit(1);
			$q = $db->get($this->table)->row();
			//echo $this->db->last_query();
			return $q;
		}
    
      
    function select_id($id_technician)
	{
         
        $db = $this->db;
		$db->select('*');
        $db->from($this->table);
        $db->where('id_technician',$id_technician);
		$db->where('active',1);
		$q = $db->get()->result();
		return $q;
        
		/*pre($q);
        exit();*/
		return $q;
	}
    
    function self_update($id_technician)
	{
         $data = array(
				
             "name_technician"=>$this->name_technician,
			 "email_technician"=>$this->email_technician,
			 "phone_technician"=>$this->phone_technician,
             "sign_technician"=>$this->sign_technician,
             "updated"=>'now()',
					
     	);
        
		$q = $this->db->where('id_technician',$id_technician)->update($this->table,$data);
		
		return $q;
	}
    
      function listing_password($id_technician,$old_password)
	{
         
        $db = $this->db;
		$db->select('*');
        $db->from($this->table);
        $db->where('id_technician',$id_technician);
        $db->where('password_technician',encryptor('encrypt',$old_password));
		$db->where('active',1);
        $db->limit(1);
		$q = $db->get()->result();
		return $q;
       
	}
		
    function update_password($id_technician)
	{
         $data = array(
				
             "password_technician"=>encryptor('encrypt',$this->email_technician),
			 
     	);
        
		$q = $this->db->where('id_technician',$id_technician)->update($this->table,$data);
		/*pre($q);
        exit();*/
		return $q;
	}
    
    
    function delete_technician($id_technician)
	{
         $data = array(
				
             "active"=>0,

					
     	);
        
		$q = $this->db->where('id_technician',$id_technician)->update($this->table,$data);
		/*pre($q);
        exit();*/
		return $q;
	}
    
    
	}

?>