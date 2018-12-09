<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Portable extends MY_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('gastron_client');
        $this->load->model('gastron_technician');
        $this->load->model('gastron_warranty');
        $this->load->model('gastron_product');
        $this->load->model('gastron_model');
         $this->load->model('gastron_portable');
        $this->load->library("Pdf2");
	}

    function generate_pdf()
    {
        //Include the main TCPDF library (search for installation path).
        //require_once('tcpdf_include.php');
        $this->load->library('Pdf2');

        // create new PDF document
        $pdf = new Pdf2('P', 'mm', 'A4', true, 'UTF-8', false);
        
       
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
        //$pdf->SetFooterData(PDF_FOOTER_LOGO, PDF_FOOTER_LOGO_WIDTH, PDF_FOOTER_TITLE, PDF_FOOTER_STRING);
        
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
        
         $id = $this->input->get('id');
        $listing_portable = $this->gastron_portable->listing($id);
        foreach($listing_portable as $lp)
        {
            
            $sign_tech = $lp->sign_technician;
            
            $a='';
            
            if($sign_tech > 0){

             $a .='<tr>
                <td>CALIBRATED BY</td>   
                
            </tr>
            <tr><td style="font-family:times;font-size:15px;"><img height="100px"src="http://localhost/Gastron/asset_signature/signature/'.$lp->id_technician.'.png"></td></tr>
            <tr><td style="font-family:times;font-size:15px;">_______________________________</td></tr>';
            
            }else{
                
                 $a .='<tr>
                <td>CALIBRATED BY</td>
                
                
            </tr>
            <tr><td style="font-family:times;font-size:15px;"></td></tr>
            <tr><td style="font-family:times;font-size:15px;">_______________________________</td></tr>';
                
            }
            
            
            
        //first page
        $pdf->AddPage('P', 'A4');
        $pdf->SetFont('times', '', 10);
        
        $html_title = '<b align="centre">CERTIFICATE OF CALIBRATION</b>
        <hr>';
        
        $html_customer ='<table id ="1" cellspacing="1" cellpadding="1" border="0">
        <tr>
           <td style="width:20%;height:50px">CUSTOMER :</td>
           <td style="width:80%;height:80px"><p style="width:30px;border:1px solid #000000;" align="left">'.$lp->name_client.' <br> '.$lp->address_client.'</p></td>
        </tr>
        
        </table>
        
        ';
        
         $html_image1 = '<table id ="1" cellspacing="1" cellpadding="1" border="1">
         <tr>
              
                <td style="width:30%;height:50px" align="centre">MODEL</td>
                <td style="width:40%;height:50px" align="centre">NEXT CALIBRATE</td>
                <td style="width:30%;height:50px" align="centre">SERIAL NUMBER</td>
               
                
         </tr>
          <tr>
                <td style="width:30%;height:50px" align="centre">'.$lp->code_model.'</td>
                <td style="width:40%;height:50px" align="centre">'.$lp->next_service_warranty.'</td>
                <td style="width:30%;height:50px" align="centre">'.$lp->serial_no_warranty.'</td>
         </tr>
         
       
         
         </table>';
        
            $html_image = '<table id ="1" cellspacing="1" cellpadding="1" border="1">
            
            <tr>
              
                <td style="width:100%;height:50px" align="centre" colspan="6">CALIBRATION GAS(SDS NO: 50018)</td>
               
               
                
         </tr>
            
         <tr>
              
                <td style="width:30%;height:50px" align="centre">COMPONENTS</td>
                <td style="width:10%;height:50px" align="centre">'.$lp->comp_1.'</td>
                <td style="width:10%;height:50px" align="centre">'.$lp->comp_2.'</td>
                <td style="width:10%;height:50px" align="centre">'.$lp->comp_3.'</td>
                <td style="width:10%;height:50px" align="centre">'.$lp->comp_4.'</td>
                <td style="width:10%;height:50px" align="centre">'.$lp->comp_5.'</td>
                <td style="width:10%;height:50px" align="centre">'.$lp->comp_6.'</td>
                <td style="width:10%;height:50px" align="centre">'.$lp->comp_7.'</td>
               
                
         </tr>
          <tr>
                <td style="width:30%;height:50px" align="centre">CONCENTRATION</td>
                <td style="width:10%;height:50px" align="centre">'.$lp->conc_1.'</td>
                <td style="width:10%;height:50px" align="centre">'.$lp->conc_2.'</td>
                <td style="width:10%;height:50px" align="centre">'.$lp->conc_3.'</td>
                <td style="width:10%;height:50px" align="centre">'.$lp->conc_4.'</td>
                <td style="width:10%;height:50px" align="centre">'.$lp->conc_5.'</td>
                <td style="width:10%;height:50px" align="centre">'.$lp->conc_6.'</td>
                <td style="width:10%;height:50px" align="centre">'.$lp->conc_7.'</td>
         </tr>
         
         <tr>
                <td style="width:30%;height:50px" align="centre">MOLE %</td>
                <td style="width:10%;height:50px" align="centre">'.$lp->mole_1.'</td>
                <td style="width:10%;height:50px" align="centre">'.$lp->mole_2.'</td>
                <td style="width:10%;height:50px" align="centre">'.$lp->mole_3.'</td>
                <td style="width:10%;height:50px" align="centre">'.$lp->mole_4.'</td>
                <td style="width:10%;height:50px" align="centre">'.$lp->mole_5.'</td>
                <td style="width:10%;height:50px" align="centre">'.$lp->mole_6.'</td>
                <td style="width:10%;height:50px" align="centre">'.$lp->mole_7.'</td>
         </tr>
         
       
         
         </table>';
        
        $html_i = '<table id ="1" cellspacing="1" cellpadding="1" border="1">
            
            
         <tr>
              
                <td style="width:30%;height:20px" align="centre"></td>
                <td style="width:20%;height:20px" align="centre">'.$lp->gas_1.'</td>
                <td style="width:20%;height:20px" align="centre">'.$lp->gas_2.'</td>
                <td style="width:10%;height:20px" align="centre">'.$lp->gas_3.'</td>
                <td style="width:10%;height:20px" align="centre">'.$lp->gas_4.'</td>
               
               
                
         </tr>
          <tr>
                <td style="width:30%;height:20px" align="centre">HIGH</td>
                <td style="width:20%;height:20px" align="centre">'.$lp->high_1.'</td>
                <td style="width:20%;height:20px" align="centre">'.$lp->high_2.'</td>
                <td style="width:10%;height:20px" align="centre">'.$lp->high_3.'</td>
                <td style="width:10%;height:20px" align="centre">'.$lp->high_4.'</td>
               
         </tr>
         
         <tr>
                <td style="width:30%;height:20px" align="centre">LOW</td>
                <td style="width:20%;height:20px" align="centre">'.$lp->low_1.'</td>
                <td style="width:20%;height:20px" align="centre">'.$lp->low_2.'</td>
                <td style="width:10%;height:20px" align="centre">'.$lp->low_3.'</td>
                <td style="width:10%;height:20px" align="centre">'.$lp->low_4.'</td>
                
         </tr>
         
        <tr>
                <td style="width:30%;height:20px" align="centre">TWA</td>
                <td style="width:20%;height:20px" align="centre">'.$lp->twa_1.'</td>
                <td style="width:20%;height:20px" align="centre">'.$lp->twa_2.'</td>
                <td style="width:10%;height:20px" align="centre">'.$lp->twa_3.'</td>
                <td style="width:10%;height:20px" align="centre">'.$lp->twa_4.'</td>
                
         </tr>
         
          <tr>
                <td style="width:30%;height:20px" align="centre">STEL</td>
                <td style="width:20%;height:20px" align="centre">'.$lp->stel_1.'</td>
                <td style="width:20%;height:20px" align="centre">'.$lp->stel_2.'</td>
                <td style="width:10%;height:20px" align="centre">'.$lp->stel_3.'</td>
                <td style="width:10%;height:20px" align="centre">'.$lp->stel_4.'</td>
                
         </tr>
         
         </table>';
        
        $html_a = '<p>THIS PRODUCT HAS BEEN CALIBRATED WITH TRAINED SERVICE PROFESSIONAL USING NIST-TRACEABLE CALIBATION GASES. </p>';
        
         /*$html_b = '<p>CALIBRATE BY</p>
         <br><br>
         '.$a.'
         <p>______________________________</p>';*/
            
        $html_b='<table id ="1" cellspacing="0" cellpadding="0" border="0">
        
            '.$a.'
            </table';

        $pdf->Ln(20);
        $pdf->writeHTMLCell(0,0,'','',$html_title,0,1,0,true,'J',true);
        $pdf->Ln(5);
        $pdf->writeHTMLCell(0,0,'','',$html_customer,0,1,0,true,'J',true);
         $pdf->Ln(10);
        $pdf->writeHTMLCell(0,0,'','',$html_image1,0,1,0,true,'J',true);
        $pdf->Ln(10);
        $pdf->writeHTMLCell(0,0,'','',$html_image,0,1,0,true,'J',true);
        $pdf->Ln(5);
        $pdf->writeHTMLCell(0,0,'','',$html_i,0,1,0,true,'J',true);
         $pdf->Ln(5);
        $pdf->writeHTMLCell(0,0,'','',$html_a,0,1,0,true,'J',true);
         $pdf->Ln(10);
        $pdf->writeHTMLCell(0,0,'','',$html_b,0,1,0,true,'J',true);
        }
        
       
            
       //$pdf->AddPage();
        
        
        $pdf->SetTitle('Portable Report');
        $pdf->SetHeaderMargin(30);
        $pdf->SetTopMargin(20);
        $pdf->setFooterMargin(20);
        $pdf->SetAutoPageBreak(true);
        $pdf->SetAuthor('Author');
        $pdf->SetDisplayMode('real', 'default');
        
         
        $pdf->Output('Portable Report.pdf', 'I');
        //============================================================+
    }
    
    public function insert_portable()
    {
        
         $id = $this->input->get('id');
        $this->gastron_portable->id_warrantys = $this->input->post('idw_portable');
        $this->gastron_portable->comp_1 = $this->input->post('comp_1');
        $this->gastron_portable->comp_2 = $this->input->post('comp_2');
        $this->gastron_portable->comp_3 = $this->input->post('comp_3');
        $this->gastron_portable->comp_4 = $this->input->post('comp_4');
        $this->gastron_portable->comp_5 = $this->input->post('comp_5');
        $this->gastron_portable->comp_6 = $this->input->post('comp_6');
        $this->gastron_portable->comp_7 = $this->input->post('comp_7');
        $this->gastron_portable->con_1 = $this->input->post('con_1');
        $this->gastron_portable->con_2 = $this->input->post('con_2');
        $this->gastron_portable->con_3 = $this->input->post('con_3');
        $this->gastron_portable->con_4 = $this->input->post('con_4');
        $this->gastron_portable->con_5 = $this->input->post('con_5');
        $this->gastron_portable->con_6 = $this->input->post('con_6');
        $this->gastron_portable->con_7 = $this->input->post('con_7');
        $this->gastron_portable->mole_1 = $this->input->post('mole_1');
        $this->gastron_portable->mole_2 = $this->input->post('mole_2');
        $this->gastron_portable->mole_3 = $this->input->post('mole_3');
        $this->gastron_portable->mole_4 = $this->input->post('mole_4');
        $this->gastron_portable->mole_5 = $this->input->post('mole_5');
        $this->gastron_portable->mole_6 = $this->input->post('mole_6');
        $this->gastron_portable->mole_7 = $this->input->post('mole_7');
        $this->gastron_portable->gas_1 = $this->input->post('gas_1');
        $this->gastron_portable->gas_2 = $this->input->post('gas_2');
        $this->gastron_portable->gas_3 = $this->input->post('gas_3');
        $this->gastron_portable->gas_4 = $this->input->post('gas_4');
        $this->gastron_portable->high_1 = $this->input->post('h_1');
        $this->gastron_portable->high_2 = $this->input->post('h_2');
        $this->gastron_portable->high_3 = $this->input->post('h_3');
        $this->gastron_portable->high_4 = $this->input->post('h_4');
        $this->gastron_portable->low_1 = $this->input->post('l_1');
        $this->gastron_portable->low_2 = $this->input->post('l_2');
        $this->gastron_portable->low_3 = $this->input->post('l_3');
        $this->gastron_portable->low_4 = $this->input->post('l_4');
        $this->gastron_portable->twa_1 = $this->input->post('t_1');
        $this->gastron_portable->twa_2 = $this->input->post('t_2');
        $this->gastron_portable->twa_3 = $this->input->post('t_3');
        $this->gastron_portable->twa_4 = $this->input->post('t_4');
        $this->gastron_portable->stel_1 = $this->input->post('s_1');
        $this->gastron_portable->stel_2 = $this->input->post('s_2');
        $this->gastron_portable->stel_3 = $this->input->post('s_3');
        $this->gastron_portable->stel_4 = $this->input->post('s_4');
        
        
        	$q = $this->gastron_portable->insert_portable();
             $q = $this->gastron_warranty->update_status($id);
        redirect('services');

    }
    
    public function services_portable()
	{
		  $data = array();
         $id = $this->input->get('id');

         $data['listing_portable'] = $this->gastron_portable->listing($id);
		 $data['all_product'] = $this->gastron_product->listing_all();
         $data['all_client'] = $this->gastron_client->listing_all();
         $data['all_technician'] = $this->gastron_technician->listing_all();
         $data['portable'] = $this->gastron_warranty->limited($id);
    

         $this->data = $data;
		 $this->middle = 'update_portable';
    	 $this->layout();
	}
    
    public function update_portable()
    {
        
         $id = $this->input->get('id');
        
        $this->gastron_portable->id_warrantys = $this->input->post('idw_portable');
        $this->gastron_portable->comp_1 = $this->input->post('comp_1');
        $this->gastron_portable->comp_2 = $this->input->post('comp_2');
        $this->gastron_portable->comp_3 = $this->input->post('comp_3');
        $this->gastron_portable->comp_4 = $this->input->post('comp_4');
        $this->gastron_portable->comp_5 = $this->input->post('comp_5');
        $this->gastron_portable->comp_6 = $this->input->post('comp_6');
        $this->gastron_portable->comp_7 = $this->input->post('comp_7');
        $this->gastron_portable->con_1 = $this->input->post('con_1');
        $this->gastron_portable->con_2 = $this->input->post('con_2');
        $this->gastron_portable->con_3 = $this->input->post('con_3');
        $this->gastron_portable->con_4 = $this->input->post('con_4');
        $this->gastron_portable->con_5 = $this->input->post('con_5');
        $this->gastron_portable->con_6 = $this->input->post('con_6');
        $this->gastron_portable->con_7 = $this->input->post('con_7');
        $this->gastron_portable->mole_1 = $this->input->post('mole_1');
        $this->gastron_portable->mole_2 = $this->input->post('mole_2');
        $this->gastron_portable->mole_3 = $this->input->post('mole_3');
        $this->gastron_portable->mole_4 = $this->input->post('mole_4');
        $this->gastron_portable->mole_5 = $this->input->post('mole_5');
        $this->gastron_portable->mole_6 = $this->input->post('mole_6');
        $this->gastron_portable->mole_7 = $this->input->post('mole_7');
        $this->gastron_portable->gas_1 = $this->input->post('gas_1');
        $this->gastron_portable->gas_2 = $this->input->post('gas_2');
        $this->gastron_portable->gas_3 = $this->input->post('gas_3');
        $this->gastron_portable->gas_4 = $this->input->post('gas_4');
        $this->gastron_portable->high_1 = $this->input->post('h_1');
        $this->gastron_portable->high_2 = $this->input->post('h_2');
        $this->gastron_portable->high_3 = $this->input->post('h_3');
        $this->gastron_portable->high_4 = $this->input->post('h_4');
        $this->gastron_portable->low_1 = $this->input->post('l_1');
        $this->gastron_portable->low_2 = $this->input->post('l_2');
        $this->gastron_portable->low_3 = $this->input->post('l_3');
        $this->gastron_portable->low_4 = $this->input->post('l_4');
        $this->gastron_portable->twa_1 = $this->input->post('t_1');
        $this->gastron_portable->twa_2 = $this->input->post('t_2');
        $this->gastron_portable->twa_3 = $this->input->post('t_3');
        $this->gastron_portable->twa_4 = $this->input->post('t_4');
        $this->gastron_portable->stel_1 = $this->input->post('s_1');
        $this->gastron_portable->stel_2 = $this->input->post('s_2');
        $this->gastron_portable->stel_3 = $this->input->post('s_3');
        $this->gastron_portable->stel_4 = $this->input->post('s_4');
        
        
        	$q = $this->gastron_portable->update_portable($id);

        redirect('services');

    }
}