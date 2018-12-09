<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Warranty extends MY_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
    
    public function __construct(){
        
         parent ::__construct();
        $this->load->model('gastron_client');
        $this->load->model('gastron_technician');
        $this->load->model('gastron_warranty');
        $this->load->model('gastron_product');
        $this->load->model('gastron_model');
    
    }
    
    
    public function warranty()
	{
         $data = array();
		 $data['all_product'] = $this->gastron_product->listing_all();
         $data['all_client'] = $this->gastron_client->listing_all();
         $data['all_technician'] = $this->gastron_technician->listing_all();
         $data['all_warranty'] = $this->gastron_warranty->listing_all();
        
         $this->data = $data;
		 $this->middle = 'warranty';
    	 $this->layout();
	}
    
    public function select_model()
	{
         $data = array();
		
        $id_product = $this->input->post('product_id');
		$model      =  $this->gastron_model->select_model($id_product);
       
			$pro_select_box = '';
		if(count($model)>0)
		{
			$pro_select_box .= '<option value="">Select Model</option>';
			foreach ($model as $models) {
				$pro_select_box .='<option value="'.$models->id_model.'">'.$models->code_model.'</option>';
			}
			//echo json_encode($pro_select_box);
             //echo json_encode(array('res'=>1,));
		}
        echo $pro_select_box;
        // echo(json_encode($model));
        
        

         
	}
    
     public function insert_warranty()
    {
        
       /* $number = $this->input->post(count('war_ser'));
        $war_serial = $this->input->post('war_ser');
        
       if($number > 1){
         for($i=0; $i<$number; $i++)
            {
                if(trim($war_serial[$i] != ''))
                {*/
                    
                       $this->gastron_warranty->year_warranty = $this->input->post('war_year');
        $this->gastron_warranty->product_warranty = $this->input->post('war_product');
        $this->gastron_warranty->model_warranty = $this->input->post('war_model');
        $this->gastron_warranty->client_warranty = $this->input->post('war_client');
        $this->gastron_warranty->location_warranty = $this->input->post('war_location');
        $this->gastron_warranty->next_service_warranty = $this->input->post('war_date');
        $this->gastron_warranty->start_date_warranty = $this->input->post('war_start_date');
        $this->gastron_warranty->technician_warranty = $this->input->post('war_technician');
        $this->gastron_warranty->type_warranty = $this->input->post('war_type');
        $this->gastron_warranty->serial_no_warranty = $this->input->post('war_ser');
                 
                    $q = $this->gastron_warranty->insert_warranty();
              /*  }
            }
         
     }*/
        /* pre($_POST);
         die();*/
        redirect('warranty');

        
    }
    
    
    public function model()
	{
		$this->middle = 'model';
    	$this->layout();
	}
    
    public function services()
	{
		  $data = array();
		 $data['all_product'] = $this->gastron_product->listing_all();
         $data['all_client'] = $this->gastron_client->listing_all();
         $data['all_technician'] = $this->gastron_technician->listing_all();
         $data['all_warranty'] = $this->gastron_warranty->listing_all();
    

         $this->data = $data;
		 $this->middle = 'services';
    	 $this->layout();
	}
    
    public function product()
	{
		$this->middle = 'product';
    	$this->layout();
	}
    
    
     public function warranty_id()
	{
         $data = array();
         
         $id_technician = $this->session->id_technician;
         
		 $data['all_product'] = $this->gastron_product->listing_all();
         $data['all_client'] = $this->gastron_client->listing_all();
         $data['all_technician'] = $this->gastron_technician->listing_all();
         $data['all_warranty'] = $this->gastron_warranty->listing_id($id_technician);
        
        //$id_product = $this->input->post('product_id');
		//$data['all_model']      =  $this->gastron_model->select_model($id_product);
       
		/*if(count($model)>0)
		{
			$pro_select_box = '';
			$pro_select_box .= '<option value="">Select Model</option>';
			foreach ($model as $models) {
				$pro_select_box .='<option value="'.$models->id_model.'">'.$models->code_model.'</option>';
			}
			//echo json_encode($pro_select_box);
             echo json_encode(array('res'=>1,));
		}*/
        
        //echo json_encode($data['all_model']);

         $this->data = $data;
		 $this->middle = 'warranty_tech';
    	 $this->layout();
	}
    
     public function services_id()
	{
		  $data = array();
         $id_technician = $this->session->id_technician;
		 $data['all_product'] = $this->gastron_product->listing_all();
         $data['all_client'] = $this->gastron_client->listing_all();
         $data['all_technician'] = $this->gastron_technician->listing_all();
         $data['all_warranty'] = $this->gastron_warranty->listing_id($id_technician);
    

         $this->data = $data;
		 $this->middle = 'services_tech';
    	 $this->layout();
	}
    
         public function services_portable()
	{
		  $data = array();
         $id = $this->input->get('id');
		 $data['all_product'] = $this->gastron_product->listing_all();
         $data['all_client'] = $this->gastron_client->listing_all();
         $data['all_technician'] = $this->gastron_technician->listing_all();
         $data['portable'] = $this->gastron_warranty->limited($id);
    

         $this->data = $data;
		 $this->middle = 'portable';
    	 $this->layout();
	}
    
     public function services_domestic()
	{
		  $data = array();
         $id = $this->input->get('id');
		 $data['all_product'] = $this->gastron_product->listing_all();
         $data['all_client'] = $this->gastron_client->listing_all();
         $data['all_technician'] = $this->gastron_technician->listing_all();
         $data['domestic'] = $this->gastron_warranty->limited($id);
    

         $this->data = $data;
		 $this->middle = 'domestic';
    	 $this->layout();
	}
    
    public function services_fixed()
	{
        $data = array();
         $id = $this->input->get('id');
		 $data['all_product'] = $this->gastron_product->listing_all();
         $data['all_client'] = $this->gastron_client->listing_all();
         $data['all_technician'] = $this->gastron_technician->listing_all();
         $data['fixed'] = $this->gastron_warranty->limited($id);
    
        $csv_json = $this->gastron_warranty->field($id,'serial_no_warranty');
        $csv_array = json_decode($csv_json,TRUE);
        /*pre($csv_array);
        die();*/
        $data['fixeds'] = $this->gastron_warranty->limited_fixed($id,$csv_array);
        
		//$data = array();
        

         $this->data = $data;
		 $this->middle = 'fixed';
    	 $this->layout();
	}
}
