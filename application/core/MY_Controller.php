<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller 
{ 
    //set the class variable.
    var $template  = array();
    var $data      = array();
    //var $data_menu = array();

    public function __construct()
    {
        parent::__construct();
        //$this->load->model('Users');
    }

    //Load layout    
    public function layout() 
    {
         if(empty($this->session->id_technician) || $this->session->id_technician == '')
         {
             $text = '<div class="alert alert-info">
                         <button class="close" data-close="alert"></button>
                         <span> Please login. </span>
                     </div>';
             $this->session->set_flashdata('login_res', $text);
             redirect('login');
             die();
         }

        //check user is login or not
        //$this->Users->is_login();

        // making temlate and send data to view.
        $this->template['index_header']   = $this->load->view('layout/index_header', $this->data, true);
        $this->template['index_top_menu']   = $this->load->view('layout/index_top_menu', $this->data, true);
        $this->template['index_left_menu']   = $this->load->view('layout/index_left_menu', $this->data, true);
        $this->template['middle'] = $this->load->view($this->middle, $this->data, true);
        $this->load->view('layout/index', $this->template);
    }
}

?>