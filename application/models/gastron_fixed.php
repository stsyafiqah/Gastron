<?php
class Gastron_fixed extends CI_Model 
{
	public $table = 'gastron_fixed';
	public $primary_key = 'id_fixed';

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
    
    function insert_fixed()
	{
         $data = array(
		
        "id_warrs"=>$this->id_warrs,
        "cal_date"=>$this->cal_date,
        "due_date"=>$this->due_date,
        "instruction_from"=>$this->instruction_from,
        "instruction_on"=>$this->instruction_on,
        "service_details"=>$this->service_details,
        "location"=>$this->location,
        "gas_type"=>$this->gas_type,
        "sensor_date"=>json_encode($this->sensor_date),
        "detector_serial_no"=>json_encode($this->detector_serial_no),
        "batt_voltage"=>json_encode($this->batt_voltage),
        "detector"=>json_encode($this->detector),
        "receiver"=>json_encode($this->receiver),
        "cal_gas"=>json_encode($this->cal_gas),
        "density_lel"=>json_encode($this->density_lel),
        "full_range"=>json_encode($this->full_range),
        "zero_before"=>json_encode($this->zero_before),
        "zero_after"=>json_encode($this->zero_after),
        "span_before"=>json_encode($this->span_before),
        "span_after"=>json_encode($this->span_after),
        "one_alarm"=>json_encode($this->one_alarm),
        "two_alarm"=>json_encode($this->two_alarm),
        "three_alarm"=>json_encode($this->three_alarm),
        "sensor_grade"=>json_encode($this->sensor_grade),
        "remark"=>$this->remark,
             
     	);
        
		$q = $this->db->insert($this->table,$data);
		
		return $q;
	}
    
   
      function listing($id)
	{
         
        $db = $this->db;
		$db->select('a.*,b.*,c.*,d.*,e.*');
        $db->from($this->table.' a');
        $db->join('gastron_warranty b','a.id_warrs = b.id_warranty ','LEFT');
        $db->join('gastron_technician c','b.technician_warranty = c.id_technician ','RIGHT');
        $db->join('gastron_client d','b.client_warranty = d.id_client ','RIGHT');
        $db->join('gastron_model e','b.model_warranty = e.id_model ','RIGHT');
         $db->where('a.id_warrs',$id);
		//$db->where('a.active',1);
		$q = $db->get()->result();
		return $q;
        
		/*pre($q);
        exit();*/
		//return $q;
	}
    
     function update_fixed($id)
	{
         $data = array(
		
        "id_warrs"=>$this->id_warrs,
        "cal_date"=>$this->cal_date,
        "due_date"=>$this->due_date,
        "instruction_from"=>$this->instruction_from,
        "instruction_on"=>$this->instruction_on,
        "service_details"=>$this->service_details,
        "location"=>$this->location,
        "gas_type"=>$this->gas_type,
        "sensor_date"=>json_encode($this->sensor_date),
        "detector_serial_no"=>json_encode($this->detector_serial_no),
        "batt_voltage"=>json_encode($this->batt_voltage),
        "detector"=>json_encode($this->detector),
        "receiver"=>json_encode($this->receiver),
        "cal_gas"=>json_encode($this->cal_gas),
        "density_lel"=>json_encode($this->density_lel),
        "full_range"=>json_encode($this->full_range),
        "zero_before"=>json_encode($this->zero_before),
        "zero_after"=>json_encode($this->zero_after),
        "span_before"=>json_encode($this->span_before),
        "span_after"=>json_encode($this->span_after),
        "one_alarm"=>json_encode($this->one_alarm),
        "two_alarm"=>json_encode($this->two_alarm),
        "three_alarm"=>json_encode($this->three_alarm),
        "sensor_grade"=>json_encode($this->sensor_grade),
        "remark"=>$this->remark,
             
     	);
		//$q = $this->db->insert($this->table,$data);
        $q = $this->db->where('id_fixed',$id)->update($this->table,$data);
		/*pre($q);
        exit();*/
		return $q;
	}
    
}
?>