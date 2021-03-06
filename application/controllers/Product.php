<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends MY_Controller {

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
        $this->load->model('Gastron_client');
        $this->load->model('Gastron_technician');
        $this->load->model('Gastron_warranty');
        $this->load->model('Gastron_product');
        $this->load->model('Gastron_model');
    }
    
	public function index()
	{
        $data = array();
		
        $data['all_product'] = $this->Gastron_product->listing_all();
    
        $this->data = $data;
		$this->middle = 'product';
    	$this->layout();
	}
    
     public function insert_product()
    {
    
        $this->Gastron_product->code_product = $this->input->post('code_product');
        $this->Gastron_product->desc_product = $this->input->post('desc_product');
       
      
      
		$q = $this->Gastron_product->insert_product();

        redirect('product');

        
    }
    
     public function update_product()
    {
       $id_product = $this->input->post('id_product');
        $this->Gastron_product->code_product = $this->input->post('code_product');
        $this->Gastron_product->desc_product = $this->input->post('desc_product');
       
		$q = $this->Gastron_product->update_product($id_product);

        redirect('product');

        
    }
    
         public function delete_product()
    {
       $id_product = $this->input->post('id_product');
         
		$q = $this->Gastron_product->delete_product($id_product);
        $r = $this->Gastron_model->delete_product($id_product);     

        redirect('product');

        
    }

    
}
