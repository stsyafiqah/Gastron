<?php
class Gastron_warranty extends CI_Model 
{
	public $table = 'gastron_warranty';
	public $primary_key = 'id_warranty';

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
    
   function listing_all()
	{
         
        $db = $this->db;
		$db->select('a.*,b.*,c.*,d.*,e.*');
        $db->from($this->table.' a');
        $db->join('gastron_client b','a.client_warranty = b.id_client ','LEFT');
        $db->join('gastron_technician c','a.technician_warranty = c.id_technician ','LEFT');
        $db->join('gastron_product d','a.product_warranty = d.id_product ','LEFT');
        $db->join('gastron_model e','a.model_warranty = e.id_model ','LEFT');
		$db->where('a.active',1);
        $this->db->order_by('a.id_warranty', 'ASC');
		$q = $db->get()->result();
		return $q;
        
		/*pre($q);
        exit();*/
		//return $q;
	}
    
    function insert_warranty()
	{
         $data = array(
				
        
        "year_warranty"=>$this->year_warranty, 
        "product_warranty"=>$this->product_warranty,
        "model_warranty"=>$this->model_warranty,
        "client_warranty"=>$this->client_warranty,
        "location_warranty"=>$this->location_warranty,
        "next_service_warranty"=>$this->next_service_warranty,
        "start_date_warranty"=>$this->start_date_warranty,     
        "technician_warranty"=>$this->technician_warranty,
        "type_warranty"=>$this->type_warranty,
        //"serial_no_warranty"=>$this->serial_no_warranty,
        //"serial_no_warranty"=>implode(",", $this->serial_no_warranty)	,
        "serial_no_warranty"=>json_encode($this->serial_no_warranty),
				
     	);
        
		$q = $this->db->insert($this->table,$data);
		/*pre($q);
        exit();*/
		return $q;
	}
    
     function listing_id($id_technician)
	{
         
        $db = $this->db;
		$db->select('a.*,b.*,c.*,d.*,e.*');
        $db->from($this->table.' a');
        $db->join('gastron_client b','a.client_warranty = b.id_client ','LEFT');
         $db->join('gastron_technician c','a.technician_warranty = c.id_technician ','LEFT');
        $db->join('gastron_product d','a.product_warranty = d.id_product ','LEFT');
         $db->join('gastron_model e','a.model_warranty = e.id_model ','LEFT');
         $db->where('a.technician_warranty',$id_technician);
		$db->where('a.active',1);
		$q = $db->get()->result();
		return $q;
        
		/*pre($q);
        exit();*/
		//return $q;
	}
    
    function limited($id)
	{
         
        $db = $this->db;
		$db->select('a.*,b.*,c.*,d.*,e.*');
        $db->from($this->table.' a');
        $db->join('gastron_client b','a.client_warranty = b.id_client ','LEFT');
        $db->join('gastron_technician c','a.technician_warranty = c.id_technician ','LEFT');
        $db->join('gastron_product d','a.product_warranty = d.id_product ','LEFT');
        $db->join('gastron_model e','a.model_warranty = e.id_model ','LEFT');
        $db->where('a.id_warranty',$id);
		$db->where('a.active',1);
		$q = $db->get()->result();
		return $q;
        
		/*pre($q);
        exit();*/
		return $q;
    }
    
     function limited_fixed($id,$csv_array)
	{
         
        $db = $this->db;
		$db->select('a.*,b.*,c.*,d.*,e.*');
        $db->from($this->table.' a');
        $db->join('gastron_client b','a.client_warranty = b.id_client ','LEFT');
        $db->join('gastron_technician c','a.technician_warranty = c.id_technician ','LEFT');
        $db->join('gastron_product d','a.product_warranty = d.id_product ','LEFT');
        $db->join('gastron_model e','a.model_warranty = e.id_model ','LEFT');
        $db->where_in('a.serial_no_warranty',$csv_array);
         $db->where('a.id_warranty',$id);
		$db->where('a.active',1);
		$q = $db->get()->result();
		return $q;
        
		/*pre($q);
        exit();*/
		return $q;
    }
    
    function update_status($id)
	{
         $data = array(
				
		"status"=>1,
        
       
             
     	);
        
		//$q = $this->db->insert($this->table,$data);
        $q = $this->db->where('id_warranty',$id)->update($this->table,$data);
		/*pre($q);
        exit();*/
		return $q;
	}
        
     
    
}
?>