<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client extends MY_Controller {

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
		
        $data['all_client'] = $this->Gastron_client->listing_all();
    
        $this->data = $data;
		$this->middle = 'client';
    	$this->layout();
	}
    
     public function insert_client()
    {
    
        $csr_no = $this->input->post('csr_client');
        $this->Gastron_client->csr_no = $this->input->post('csr_client');
        $this->Gastron_client->name_client = $this->input->post('name_client');
        $this->Gastron_client->email_client = $this->input->post('email_client');
        $this->Gastron_client->phone_client = $this->input->post('phone_client');
        $this->Gastron_client->address_client = $this->input->post('address_client');
        $this->Gastron_client->city_client = $this->input->post('city_client');
        $this->Gastron_client->state_client = $this->input->post('state_client');
        $this->Gastron_client->zip_code_client = $this->input->post('zip_code_client');
        
       	$q = $this->Gastron_client->listing_client($csr_no);
       
         if(count($q) == 0){
         
		$s = $this->Gastron_client->insert_client();
              redirect('client');
         }else
         {
            echo "<script>
            alert('csr no already exist, please insert new csr no !');
            window.location.href='client';
            </script>";
         }

       

        
    }
    
     public function update_client()
    {
       $id_client = $this->input->post('id_client');
         $this->Gastron_client->csr_no = $this->input->post('csr_client');
        $this->Gastron_client->name_client = $this->input->post('name_client');
        $this->Gastron_client->email_client = $this->input->post('email_client');
        $this->Gastron_client->phone_client = $this->input->post('phone_client');
        $this->Gastron_client->address_client = $this->input->post('address_client');
        $this->Gastron_client->city_client = $this->input->post('city_client');
        $this->Gastron_client->state_client = $this->input->post('state_client');
        $this->Gastron_client->zip_code_client = $this->input->post('zip_code_client');
		$q = $this->Gastron_client->update_client($id_client);

        redirect('client');

        
    }
    
     public function delete_client()
    {
       $id_client = $this->input->post('id_client');
         
		$q = $this->Gastron_client->delete_client($id_client);

        redirect('client');

        
    }
    
}
