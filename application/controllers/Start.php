<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//use Picqer\Barcode\BarcodeGeneratorHTML;
class Start extends MY_Controller 
{
	public function __construct()
	{
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

		$this->data = $data;
		$this->middle = 'dashboard';
    	$this->layout();
	}

	function login()
	{
		$array_items = array('email_technician','name_technician');
		$this->session->unset_userdata($array_items);
		// echo encryptor('encrypt','1234');
		// die();
		$this->load->view('login');
	}

	function logout()
	{
		//$this->Opqs_counter->check_out_counter($this->session->counter_id);
		
		
		$array_items = array('email_technician','name_technician');
		$this->session->unset_userdata($array_items);
		// echo encryptor('encrypt','1234');
		// die();
		$this->load->view('login');
	}

	function login_submit()
    {
		// pre($_POST);
		// exit();
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		

		if(!empty($email) && !empty($password))
		{
			$login = $this->Gastron_technician->login($email,$password);
           /* print_r($login);
            die();*/
			if(!empty($login))
			{
				if(!empty($login->id_technician))
				{
					$data = array(
						'from'			=> 'Gastron_technician',

					    'id_technician'  			=> $login->id_technician,
					    'email_technician'			=> $login->email_technician,
					    'name_technician'		=> $login->name_technician,
                        'phone_technician'    => $login->phone_technician,
                        'type_technician'    => $login->type_technician,
					   
					);
				}
                
                $this->session->set_userdata($data);
                 /*pre($data);
				 exit();*/
                if(!empty($this->session->type_technician == "Admin")){
                    
                    redirect('warranty');
                    
                }else{
                    
                     redirect('warranty_tech');
                    
                }
				

			}
			else
			{
				$text = '<div class="alert alert-danger">
		                    <button class="close" data-close="alert"></button>
		                    <span> Invalid Username or Password </span>
		                </div>';
				$this->session->set_flashdata('login_res', $text);
				redirect('login');
			}
		}
		else 
		{
			$text = '<div class="alert alert-danger">
	                    <button class="close" data-close="alert"></button>
	                    <span> Enter Username and Password. </span>
	                </div>';
			$this->session->set_flashdata('login_res', $text);
			redirect('login');
		}
	}

	
}
