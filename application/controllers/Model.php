<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model extends MY_Controller {

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
    
    
    public function index(){
        
        
        $data = array();
		
        $data['all_product'] = $this->gastron_product->listing_all();
        $data['all_model'] = $this->gastron_model->listing_all();
        
         $this->data = $data;
		$this->middle = 'model';
    	$this->layout();
        
    }
    
    
     public function insert_model()
    {
    
        $this->gastron_model->id_products = $this->input->post('id_product');
         $this->gastron_model->code_model = $this->input->post('code_model');
        $this->gastron_model->desc_model = $this->input->post('desc_model');
       
      
      
		$q = $this->gastron_model->insert_model();

        redirect('model');

        
    }
    
     public function update_model()
    {
       $id_model = $this->input->post('id_model');
         $this->gastron_model->id_products = $this->input->post('id_product');
         $this->gastron_model->code_model = $this->input->post('code_model');
        $this->gastron_model->desc_model = $this->input->post('desc_model');
       
		$q = $this->gastron_model->update_model($id_model);

        redirect('model');

        
    }
    
    
}
