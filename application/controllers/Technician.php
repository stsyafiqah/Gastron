<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Technician extends MY_Controller {

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
		
        $data['all_technician'] = $this->Gastron_technician->listing_all();
    
        $this->data = $data;
		$this->middle = 'technician';
    	$this->layout();
	}
    
     public function insert_technician()
    {
    
        $this->Gastron_technician->name_technician = $this->input->post('name_technician');
        $this->Gastron_technician->email_technician = $this->input->post('email_technician');
        $this->Gastron_technician->phone_technician = $this->input->post('phone_technician');
          //$this->gastron_technician->password_technician = $this->input->post('password_technician');
      
		$q = $this->Gastron_technician->insert_technician();

        redirect('technician');

        
    }
    
     public function update_technician()
    {
       $id_technician = $this->input->post('id_technician');
       $this->gastron_technician->name_technician = $this->input->post('name_technician');
        $this->gastron_technician->email_technician = $this->input->post('email_technician');
        $this->gastron_technician->phone_technician = $this->input->post('phone_technician');
      
		$q = $this->gastron_technician->update_technician($id_technician);

        redirect('technician');

        
    }
    
    
      public function profile()
	{
        $data = array();
		$id_technician = $this->session->id_technician;
    
        $data['profile'] = $this->Gastron_technician->select_id($id_technician);
    
        $this->data = $data;
		$this->middle = 'profile';
    	$this->layout();
	}
    
    public function change_password()
	{
        $data = array();
		$id_technician = $this->session->id_technician;
        $data['profile'] = $this->Gastron_technician->listing_all($id_technician);
    
        $this->data = $data;
		$this->middle = 'change_password';
    	$this->layout();
	}
    
    
    public function change_passwords()
	{
        $data = array();
		$id_technician = $this->session->id_technician;
        //$id_technician = $this->input->post('id_technician');
        $old_password= $this->input->post('old_password');
        $this->Gastron_technician->email_technician = $this->input->post('new_password');
        
        $change = $this->Gastron_technician->listing_password($id_technician,$old_password);
        /*pre(count($change));
        die();*/
       if(count($change) > 0){
            
        $q = $this->Gastron_technician->update_password($id_technician);
           
         $text = '<div class="alert alert-info">
                         <button class="close" data-close="alert"></button>
                         <span> Success Change Password </span>
                     </div>';
             $this->session->set_flashdata('login_res', $text);   
           echo "<script>
alert('Successfully change the password');
window.location.href='profile';
</script>";
           
        //redirect('profile'); 
        
         
         

        }else{
            
           echo "<script>
alert('failed change the password');
window.location.href='change_password';
</script>";
           
         //redirect('change_password');

        }
    
      /*  $this->data = $data;
		$this->middle = 'change_password';
    	$this->layout();*/
	}
    
    
    public function self_update()
    {
        $data = array();

        $id_technician = $this->input->post('id_technician');
        $this->Gastron_technician->name_technician = $this->input->post('name_technician');
        $this->Gastron_technician->email_technician = $this->input->post('email_technician');
        $this->Gastron_technician->phone_technician = $this->input->post('phone_technician');
        $signature_image = $this->input->post('signature_image');
        $this->Gastron_technician->sign_technician =  ''.$id_technician.'.png';
        
        $sign_value = $_REQUEST['signature_image'];

        if ( !empty($sign_value) )
        {
        $signature_image_temp = explode(",", $sign_value);
        if ( !empty($signature_image_temp[1]) )
        {
        /*if (!file_exists(storage_path('app/public').'/signature/'.$sales_id))
        {
        mkdir(storage_path('app/public').'/signature/'.$sales_id, 0777, true);
        }*/

        $signature_image = base64_decode($signature_image_temp[1]);
        //$filename = 'signature_purchaser_'.$key;
        //Location to where you want to created sign image
             $result = array();
        //Location to where you want to created sign image
        $filelocation = './asset_signature/signature/'.$id_technician.'.png';
        //$filelocation = 'http://localhost/Gastron/asset_signature/signature/'.$id_technician.'.png';
        if ( !file_exists($filelocation) )
        {
        //generate image file to selected location
        file_put_contents($filelocation, $signature_image);
        }
        else
        {
        //rename file first for those existing image in selected location
        //$filelocation_rename = 'http://localhost://Gastron/asset_signature/signature/'.$id_technician.'_'.date("YmdHis").'.png';
        $filelocation_rename = './asset_signature/signature/'.$id_technician.'.png';
        if ( rename($filelocation, $filelocation_rename) )
        {
        //successful rename
        }
        else
        {
        //unsuccessful rename
        }
        //generate image file to selected location
        file_put_contents($filelocation, $signature_image);
        }
        }
        }
        
         
        
		$q = $this->Gastron_technician->self_update($id_technician);
        $data['profile'] = $this->Gastron_technician->select_id($id_technician);
        $this->data = $data;
		$this->middle = 'profile';
    	$this->layout();    
        
    }
    
    public function delete_technician()
    {
       $id_technician = $this->input->post('id_technician');
         
		$q = $this->Gastron_technician->delete_technician($id_technician);

        redirect('technician');

        
    }
    
    public function sign_update()
    {
        $data = array();
        $id_technician = $this->session->id_technician;
        //$id_technician = $this->input->post('id_technician');
        $signature_image = $this->input->post('signature_image');
        $this->Gastron_technician->sign_technician =  ''.$id_technician.'.png';
        
        $sign_value = $_REQUEST['signature_image'];

        if ( !empty($sign_value) )
        {
        $signature_image_temp = explode(",", $sign_value);
        if ( !empty($signature_image_temp[1]) )
        {
        /*if (!file_exists(storage_path('app/public').'/signature/'.$sales_id))
        {
        mkdir(storage_path('app/public').'/signature/'.$sales_id, 0777, true);
        }*/

        $signature_image = base64_decode($signature_image_temp[1]);
        //$filename = 'signature_purchaser_'.$key;
        //Location to where you want to created sign image
             $result = array();
        //Location to where you want to created sign image
        $filelocation = './asset_signature/signature/'.$id_technician.'.png';
        //$filelocation = 'http://localhost/Gastron/asset_signature/signature/'.$id_technician.'.png';
        if ( !file_exists($filelocation) )
        {
        //generate image file to selected location
        file_put_contents($filelocation, $signature_image);
        }
        else
        {
        //rename file first for those existing image in selected location
        //$filelocation_rename = 'http://localhost://Gastron/asset_signature/signature/'.$id_technician.'_'.date("YmdHis").'.png';
        $filelocation_rename = './asset_signature/signature/'.$id_technician.'.png';
        if ( rename($filelocation, $filelocation_rename) )
        {
        //successful rename
        }
        else
        {
        //unsuccessful rename
        }
        //generate image file to selected location
        file_put_contents($filelocation, $signature_image);
        }
        }
        }
        
         
        
		$q = $this->Gastron_technician->sign_update($id_technician);
        $data['profile'] = $this->Gastron_technician->select_id($id_technician);
        $this->data = $data;
		$this->middle = 'profile';
    	$this->layout();    
        
    }
    
     public function signature_update()
    {
        $data = array();
        $id_technician = $this->session->id_technician;
    
        $data['profile'] = $this->Gastron_technician->select_id($id_technician);
        $this->data = $data;
		$this->middle = 'change_signature';
    	$this->layout();    
        
    }
}
