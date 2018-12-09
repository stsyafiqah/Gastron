<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Domestic extends MY_Controller 
{
	public function __construct()
	{
		parent::__construct();
        $this->load->model('Gastron_client');
        $this->load->model('Gastron_technician');
        $this->load->model('Gastron_warranty');
        $this->load->model('Gastron_product');
        $this->load->model('Gastron_model');         
        $this->load->model('Gastron_domestic');
        $this->load->library("Pdf4");
	}

    function generate_pdf()
    {
        
        
        //Include the main TCPDF library (search for installation path).
        //require_once('tcpdf_include.php');
        $this->load->library('Pdf4');

        // create new PDF document
        $pdf = new Pdf4('P', 'mm', 'A4', true, 'UTF-8', false);
        
       
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
        //$pdf->SetFooterData(PDF_FOOTER_LOGO, PDF_FOOTER_LOGO_WIDTH, PDF_FOOTER_TITLE, PDF_FOOTER_STRING);
        
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
        
        
         $id = $this->input->get('id');
        $listing_domestic = $this->Gastron_domestic->listing($id);
        foreach($listing_domestic as $ld)
        {
            
            
            $sign_tech = $ld->sign_technician;
            
            $a='';
            
            if($sign_tech > 0){

            $a .='<td style="font-family:times;font-size:15px;"><img src="http://cloone.my/demo/Gastron/asset_signature/signature/'.$ld->id_technician.'.png"></td>';
            
            }else{
                
                 $a .='<td style="font-family:times;font-size:15px;"></td>';
                
            }
            

        //first page
        $pdf->AddPage('P', 'A4');
       $pdf->SetFont('times', '', 10);
         $html_1 = '<table id ="1" cellspacing="1" cellpadding="1" border="1">
            <tr>
            
                <td colspan="4"> CUSTOMER : '.$ld->name_client.'</td>
            
            </tr>
             <tr>
            
                <td colspan="4"> Project Name</td>
            
            </tr>
            <tr>
            
                <td> Inspection No</td>
                <td> '.$ld->inspection_no.'</td>
                <td> Date</td>
                <td> '.date("d/m/Y ", strtotime($ld->date_service)).'</td>
            
            </tr>
            <tr>
            
                <td> Measuring Gas</td>
                <td> '.$ld->measuring_gas.'</td>
                <td> Model No</td>
                <td> '.$ld->code_model.'</td>
            
            </tr>
         </table>';
        
         $html_2 = '<table id ="1" cellspacing="1" cellpadding="1" border="1">
            <tr>
            
                <td colspan="3"> Functioning Test</td>
            
            </tr>
             <tr>
            
                <td> Item</td>
                <td> Specification</td>
                <td> Result</td>
              
            </tr>
            <tr>
            
                <td> TEST GAS</td>
                <td> CH4 50% LEL	</td>
                <td> '.$ld->test_gas.'</td>
            
            </tr>
            <tr>
            
                <td> Alarm Response Time	</td>
                <td> &lt;= 15 seconds</td>
                <td> '.$ld->alarm_response_time.'</td>
            
            </tr>
             <tr>
            
                <td> Alarm Signal Output</td>
                <td> Dry contact	</td>
                <td> '.$ld->alarm_signal_output.'</td>
            
            </tr>
             <tr>
            
                <td> Power Test </td>
                <td> 230V AC ±10%</td>
                <td> '.$ld->power_test.'</td>
            
            </tr>
         </table>';

        
        $html_3 = '<table id ="1" cellspacing="1" cellpadding="1" border="1">
            
             <tr>
            
                <td> GASTRONICS (M`SIA) SDN. BHD.</td>
                <td> PREPARE</td>
                <td> VERIFY</td>
              
            </tr>
            <tr>
            
                <td> No. 6, Jln PJU 1A/13 Taman Perindustrian Jaya<br>Ara Damansara, 47200 Petaling Jaya, Selangor Malaysia
<br>Tel: 03 7840 0199, Fax: 03 7840 0411
</td>
                '.$a.'
                <td></td>
            
            </tr>
            
         </table>';
     
        $pdf->Ln(20);
        $pdf->writeHTMLCell(0,0,'','',$html_1,0,1,0,true,'J',true);
        $pdf->Ln(5);
        $pdf->writeHTMLCell(0,0,'','',$html_2,0,1,0,true,'J',true);
        $pdf->Ln(5);
        $pdf->writeHTMLCell(0,0,'','',$html_3,0,1,0,true,'J',true);
        
        }
            
       //$pdf->AddPage();
        
        
        $pdf->SetTitle('Domestic Report');
        $pdf->SetHeaderMargin(30);
        $pdf->SetTopMargin(20);
        $pdf->setFooterMargin(20);
        $pdf->SetAutoPageBreak(true);
        $pdf->SetAuthor('Author');
        $pdf->SetDisplayMode('real', 'default');
        
         
        $pdf->Output('Domestic Report.pdf', 'I');
        //============================================================+
    }
    
     public function insert_domestic()
    {
        
                 $id = $this->input->get('id');

        $this->Gastron_domestic->id_warr = $this->input->post('id_war');
        $this->Gastron_domestic->inspection_no = $this->input->post('inspection_domestic');
        $this->Gastron_domestic->date_service = $this->input->post('date_domestic');
        $this->Gastron_domestic->measuring_gas = $this->input->post('measuring_domestic');
        $this->Gastron_domestic->test_gas = $this->input->post('test_gas');
        $this->Gastron_domestic->alarm_response_time = $this->input->post('alarm_response');
        $this->Gastron_domestic->alarm_signal_output = $this->input->post('alarm_signal');
        $this->Gastron_domestic->power_test = $this->input->post('power_test');        
        
        $q = $this->Gastron_domestic->insert_domestic();
        $q = $this->Gastron_warranty->update_status($id);

        redirect('services');

    }
    
    
    public function update_domestic()
    {
        
         $id = $this->input->get('id');
        $this->Gastron_domestic->id_warr = $this->input->post('id_war');
        $this->Gastron_domestic->inspection_no = $this->input->post('inspection_domestic');
        $this->Gastron_domestic->date_service = $this->input->post('date_domestic');
        $this->Gastron_domestic->measuring_gas = $this->input->post('measuring_domestic');
        $this->Gastron_domestic->test_gas = $this->input->post('test_gas');
        $this->Gastron_domestic->alarm_response_time = $this->input->post('alarm_response');
        $this->Gastron_domestic->alarm_signal_output = $this->input->post('alarm_signal');
        $this->Gastron_domestic->power_test = $this->input->post('power_test');        
        
        $q = $this->Gastron_domestic->update_domestic($id);

        redirect('services');

    }
    
    public function services_domestic()
	{
		  $data = array();
         $id = $this->input->get('id');

         $data['listing_domestic'] = $this->Gastron_domestic->listing($id);
		 $data['all_product'] = $this->Gastron_product->listing_all();
         $data['all_client'] = $this->Gastron_client->listing_all();
         $data['all_technician'] = $this->Gastron_technician->listing_all();
         $data['domestic'] = $this->Gastron_warranty->limited($id);
    

         $this->data = $data;
		 $this->middle = 'update_domestic';
    	 $this->layout();
	}
}