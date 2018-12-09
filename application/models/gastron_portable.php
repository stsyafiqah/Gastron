<?php
class Gastron_portable extends CI_Model 
{
	public $table = 'gastron_portable';
	public $primary_key = 'id_portable';

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
    
    function insert_portable()
	{
         $data = array(
				
		"id_warrantys"=>$this->id_warrantys,
        "comp_1"=>$this->comp_1,
        "comp_2"=>$this->comp_2,
        "comp_3"=>$this->comp_3,
        "comp_4"=>$this->comp_4,
        "comp_5"=>$this->comp_5,
        "comp_6"=>$this->comp_6,
        "comp_7"=>$this->comp_7,
        "conc_1"=>$this->con_1,
        "conc_2"=>$this->con_2,
        "conc_3"=>$this->con_3,
        "conc_4"=>$this->con_4,
        "conc_5"=>$this->con_5,
        "conc_6"=>$this->con_6,
        "conc_7"=>$this->con_7,
        "mole_1"=>$this->mole_1,
        "mole_2"=>$this->mole_2,
        "mole_3"=>$this->mole_3,
        "mole_4"=>$this->mole_4,
        "mole_5"=>$this->mole_5,
        "mole_6"=>$this->mole_6,
        "mole_7"=>$this->mole_7,
        "gas_1"=>$this->gas_1,    
        "gas_2"=>$this->gas_2,         
        "gas_3"=>$this->gas_3,         
        "gas_4"=>$this->gas_4, 
        "high_1"=>$this->high_1,
        "high_2"=>$this->high_2,
        "high_3"=>$this->high_3,
        "high_4"=>$this->high_4,
        "low_1"=>$this->low_1,
        "low_2"=>$this->low_2,
        "low_3"=>$this->low_3,
        "low_4"=>$this->low_4,
        "twa_1"=>$this->twa_1,
        "twa_2"=>$this->twa_2,
        "twa_3"=>$this->twa_3,
        "twa_4"=>$this->twa_4,
        "stel_1"=>$this->stel_1,
        "stel_2"=>$this->stel_2,
        "stel_3"=>$this->stel_3,
        "stel_4"=>$this->stel_4,
             
     	);
        
		$q = $this->db->insert($this->table,$data);
        //$q = $this->db->where('id_domestic',$id)->update($this->table,$data);
		/*pre($q);
        exit();*/
		return $q;
	}
    
    function update_portable($id)
	{
         $data = array(
				
		"id_warrantys"=>$this->id_warrantys,
        "comp_1"=>$this->comp_1,
        "comp_2"=>$this->comp_2,
        "comp_3"=>$this->comp_3,
        "comp_4"=>$this->comp_4,
        "comp_5"=>$this->comp_5,
        "comp_6"=>$this->comp_6,
        "comp_7"=>$this->comp_7,
        "conc_1"=>$this->con_1,
        "conc_2"=>$this->con_2,
        "conc_3"=>$this->con_3,
        "conc_4"=>$this->con_4,
        "conc_5"=>$this->con_5,
        "conc_6"=>$this->con_6,
        "conc_7"=>$this->con_7,
        "mole_1"=>$this->mole_1,
        "mole_2"=>$this->mole_2,
        "mole_3"=>$this->mole_3,
        "mole_4"=>$this->mole_4,
        "mole_5"=>$this->mole_5,
        "mole_6"=>$this->mole_6,
        "mole_7"=>$this->mole_7,
        "gas_1"=>$this->gas_1,    
        "gas_2"=>$this->gas_2,         
        "gas_3"=>$this->gas_3,         
        "gas_4"=>$this->gas_4, 
        "high_1"=>$this->high_1,
        "high_2"=>$this->high_2,
        "high_3"=>$this->high_3,
        "high_4"=>$this->high_4,
        "low_1"=>$this->low_1,
        "low_2"=>$this->low_2,
        "low_3"=>$this->low_3,
        "low_4"=>$this->low_4,
        "twa_1"=>$this->twa_1,
        "twa_2"=>$this->twa_2,
        "twa_3"=>$this->twa_3,
        "twa_4"=>$this->twa_4,
        "stel_1"=>$this->stel_1,
        "stel_2"=>$this->stel_2,
        "stel_3"=>$this->stel_3,
        "stel_4"=>$this->stel_4,
             
     	);
        
		//$q = $this->db->insert($this->table,$data);
        $q = $this->db->where('id_portable',$id)->update($this->table,$data);
		/*pre($q);
        exit();*/
		return $q;
	}
    
    
    
      function listing($id)
	{
         
        $db = $this->db;
		$db->select('a.*,b.*,c.*,d.*,e.*');
        $db->from($this->table.' a');
        $db->join('gastron_warranty b','a.id_warrantys = b.id_warranty ','LEFT');
        $db->join('gastron_technician c','b.technician_warranty = c.id_technician ','RIGHT');
        $db->join('gastron_client d','b.client_warranty = d.id_client ','RIGHT');
        $db->join('gastron_model e','b.model_warranty = e.id_model ','RIGHT');
         $db->where('a.id_warrantys',$id);
		//$db->where('a.active',1);
		$q = $db->get()->result();
		return $q;
        
		/*pre($q);
        exit();*/
		//return $q;
	}
    
}
?>