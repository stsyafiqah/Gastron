<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email extends MY_Controller {

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
        
    public function send_email()
	{
         $data = array();
		 $data['all_product'] = $this->Gastron_product->listing_all();
         $data['all_client'] = $this->Gastron_client->listing_all();
         $data['all_technician'] = $this->Gastron_technician->listing_all();
         $data['all_warranty'] = $this->Gastron_warranty->listing_service();
         //$q = $this->Gastron_warranty->listing_email();
        $q = $this->Gastron_warranty->list_email();
        
       foreach($q as $f)
       {
           $id_technician = $f->technician_warranty;
          
        $w = $this->Gastron_warranty->listing_id($id_technician); 
        foreach($w as $z)
         {
              
            $serial = $z->serial_no_warranty;
            $serial_no = json_decode($serial,TRUE);
            $ser_count = count($serial_no);
            
            
        $a = '';
        $count_pc = 1;    
		for ( $x = 0; $x < $ser_count; $x++ )
		{
		    
            $serial_no_warranty     = ( isset( $serial_no[$x] ) ? $serial_no[$x] : "" );
            
              $a .= '<tr><td height="50">'.$count_pc.')'.$serial_no_warranty.'</td></tr>              
                   ';
              $count_pc++; 
        } 
            
            
         $from_email      = "Noreply@gastron.com.my"; 
         $to_email        = $f->email_technician;
         $to_email_client = $f->email_client;
        
         //Load email library 
         $this->load->library('email'); 
   
        $config = array();
		$config['protocol'] = 'smtp';
		$config['smtp_host'] = 'mail.cloone.com.my';
		$config['smtp_user'] = 'ticketing@cloone.com.my';
		$config['smtp_pass'] = '@abc1234';
		$config['smtp_port'] = 587;
		$config['newline'] = "\r\n"; 
		$this->email->initialize($config);
		$this->email->set_mailtype("html");    
          
        $message = '<html><body>';
	$message .= '<style type="text/css">

	body {

		margin:0;
		padding:0;
		color:#4d4d4d;
		font-family:arial;
		font-size:16px;
	}

	a{
		color:#4d4d4d;
		text-decoration:none;	
		
	}

	p{
		margin:0;
		padding:0;	
		
	}

	</style>';
	
	$message .= '<table width="900" border="0" cellspacing="0" cellpadding="0">';
    
    $message .= '<tr><td height="50">Dear '.$z->name_technician.',</td></tr>';
	
    $message .= '<tr><td height="50">Your Next Service is </td></tr>';
    
	$message .= '<tr><td height="50">Client Name : '.$z->name_client.'</td></tr>';
            
    $message .= '<tr><td height="50">Address : '.$z->address_client.' </td></tr>';
            
    $message .= '<tr><td height="50">Location : '.$z->location_warranty.'</td></tr>';
    
    $message .= '<tr><td height="50">Product : '.$z->code_product.'</td></tr>';
        
    $message .= '<tr><td height="50">Model : '.$z->code_model.'</td></tr>'; 
    
    $message .= '<tr><td height="50">Serial Number :</td></tr>'; 
            
    $message .= ''.$a.''; 
            
    $message .= '<tr><td height="50">Date : '.date("d/m/Y ", strtotime($z->next_service_warranty)).'</td></tr>';        
            
    $message .= '<tr><td height="50">Regards,</td></tr>';
    
    $message .= '<tr><td height="5">Gastron Sdn Bhd</td></tr>';
	
	$message .= '</table>';
	
	$message .= '</body></html>';    
            
         $this->email->from($from_email, 'Noreply@gastron.com.my'); 
         $this->email->to($to_email);
         $this->email->subject('Customer Service'); 
         $this->email->message($message); 
         }
         //Send mail 
         if($this->email->send()) 
         $this->session->set_flashdata("email_sent","Email sent successfully."); 
         else 
         $this->session->set_flashdata("email_sent","Error in sending Email."); 
         
        
       }
         $this->data = $data;
		 $this->middle = 'email';
    	 $this->layout();
	}
}
