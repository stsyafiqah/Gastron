<?php
class gastron_domestic extends CI_Model 
{
	public $table = 'gastron_domestic';
	public $primary_key = 'id_domestic';

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
    
    function insert_domestic()
	{
         $data = array(
				
		"id_warr"=>$this->id_warr,
        "inspection_no"=>$this->inspection_no,
        "date_service"=>$this->date_service,
        "measuring_gas"=>$this->measuring_gas,
        "test_gas"=>$this->test_gas,
        "alarm_response_time"=>$this->alarm_response_time,
        "alarm_signal_output"=>$this->alarm_signal_output,
        "power_test"=>$this->power_test,
       
             
     	);
        
		$q = $this->db->insert($this->table,$data);
		/*pre($q);
        exit();*/
		return $q;
	}
    
   
      function listing($id)
	{
         
        $db = $this->db;
		$db->select('a.*,b.*,c.*,d.*,e.*');
        $db->from($this->table.' a');
        $db->join('gastron_warranty b','a.id_warr = b.id_warranty ','LEFT');
        $db->join('gastron_technician c','b.technician_warranty = c.id_technician ','RIGHT');
        $db->join('gastron_client d','b.client_warranty = d.id_client ','RIGHT');
        $db->join('gastron_model e','b.model_warranty = e.id_model ','RIGHT');
         $db->where('a.id_warr',$id);
		//$db->where('a.active',1);
		$q = $db->get()->result();
		return $q;
        
		/*pre($q);
        exit();*/
		//return $q;
	}
    
    function update_domestic($id)
	{
         $data = array(
				
		"id_warr"=>$this->id_warr,
        "inspection_no"=>$this->inspection_no,
        "date_service"=>$this->date_service,
        "measuring_gas"=>$this->measuring_gas,
        "test_gas"=>$this->test_gas,
        "alarm_response_time"=>$this->alarm_response_time,
        "alarm_signal_output"=>$this->alarm_signal_output,
        "power_test"=>$this->power_test,
       
             
     	);
        
		//$q = $this->db->insert($this->table,$data);
        $q = $this->db->where('id_domestic',$id)->update($this->table,$data);
		/*pre($q);
        exit();*/
		return $q;
	}
    
}
?>