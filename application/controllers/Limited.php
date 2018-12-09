<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Limited extends MY_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('gastron_client');
        $this->load->model('gastron_technician');
        $this->load->model('gastron_warranty');
        $this->load->model('gastron_product');
        $this->load->model('gastron_model');
        $this->load->library("Pdf3");
	}

    function generate_pdf()
    {
        //Include the main TCPDF library (search for installation path).
        //require_once('tcpdf_include.php');
        $this->load->library('Pdf3');

        // create new PDF document
        $pdf = new Pdf3('P', 'mm', 'A4', true, 'UTF-8', false);
        
       
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
        //$pdf->SetFooterData(PDF_FOOTER_LOGO, PDF_FOOTER_LOGO_WIDTH, PDF_FOOTER_TITLE, PDF_FOOTER_STRING);
        
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
        
        $id = $this->input->get('id');
        $limited_warranty = $this->gastron_warranty->limited($id);
        
        foreach($limited_warranty as $lm)
        {
            $sign_tech = $lm->sign_technician;
            
            $a='';
            
            if($sign_tech > 0){

            $a .='<tr>
            
                <td style="font-family:times;font-size:15px;"><img src="http://localhost/Gastron/asset_signature/signature/'.$lm->id_technician.'.png"></td>
                <td style="font-family:times;font-size:15px;"></td>
            </tr>';
            
            }else{
                
                 $a .='<tr>
            
                <td style="font-family:times;font-size:15px;"></td>
                <td style="font-family:times;font-size:15px;"></td>
            </tr>';
                
            }
            
        //first page
        $pdf->AddPage('P', 'A4');
       $pdf->SetFont('times', '', 25);
         $html_1 = '<p style="width:30px;border:1px solid #000000;" align="centre"><img src="http://localhost/Gastron/asset/assets/images/gastron.png"> '.$lm->year_warranty.' YEARS LIMITED WARRANTY</p>';

         //$pdf->SetFont('times', '', 15);
         $html_2 = '<p style="font-family:times;font-size:15px;">Important : Evidence of original purchase and installation is required for warranty services</p>';
        
        $html_3 = '<p style="font-family:times;font-size:15px;font-weight:bold;" align="centre">WARRANTOR : GASTRONICS (M`sia) SDN. BHD.</p>';
        $html_4 = '<p style="font-family:times;font-size:15px;" align="centre">THE OBJECT OF WARRANTY :<b> '.$lm->code_product.' </b> FOR</p>';
        $html_5 = '<p style="font-family:times;font-size:15px;font-weight:bold;" align="centre">MODEL '.$lm->code_model.'</p>';
        $html_6 = '<p style="font-family:times;font-size:15px;font-weight:bold;" align="centre">'.$lm->location_warranty.'</p>';
        
        $html_7 = '<p style="font-family:times;font-size:15px;" align="left"><b>ELEMENTS OF WARRANTY :</b> Gastronics (M`sia) Sdn. Bhd. warrants for '.$lm->year_warranty.' years of the original owner, this product to be free of defects craftsmanship with only the limitations or exclusions set our below.</p>';
        
        $html_8 = '<p style="font-family:times;font-size:15px;" align="left"><b>WARRANTY DURATION :</b> This warranty to the original user shall last for only '.$lm->year_warranty.' years. The warranty is invalid if the Product is <b>(a)</b> damaged or not maintained as reasonable or necessary, <b>(b)</b> modified or altered in a configuration not sold by Gastronics (M`sia) Sdn. Bhd. <b>(c)</b> serviced or</p>';
        
         $html_9 = '<p style="font-family:times;font-size:15px;" align="left"><b>STATEMENT OF REMEDY :</b> In the event that the product does not confirm to this warranty at any time while this warranty is in effect, warrantor will repair the defect and return it to you without charge for parts, service or any other cost incurred by warrantor in connection with the performance of this warranty.<br><b>THE FIVE YEAR WARRANTY SET FORTH ABOVE IS THE SOLE AND ENTIRE WARRANTY PERTAINING TO THE PRODUCT AND IS IN LIEW OF AND EXCLUDED ALL OTHER OPERATION OF LAW,INCLUDING BUT NOT LIMITED TO ANY IMPLIED WARRANTIES OF MECHANTABILITY OR FITNESS FOR A PARTICULAR PURPOSE. THIS WARRANTY DOES NOT COVER OR PROVIDE FOR THE REIMBURSEMENT OR PAYMENT OF PROCEDURE FOR OBTAINING PERFORMANCE OR WARRANTY :</b> If you are certain that the product is defective, you must contact us and inform us No. of delivery Order to request sevices.Our service team may request a note from you explaining the defect</p>';
        
        
         $html_10 = '<p style="font-family:times;font-size:15px;" align="left"><b>Warranty will be void it original owner tall to meet requirement of service & calibration schedule set by Gastronics (M`sia) Sdn Bhd. Service and Calibration for every 6 months</b></p>';
        
        $html_11 ='<table id ="1" cellspacing="0" cellpadding="0" border="0">
        
            '.$a.'
            <tr>
            
                <td style="font-family:times;font-size:15px;">-----------------------------------</td>
                <td style="font-family:times;font-size:15px;">-----------------------------------</td>
            </tr>
             <tr>
            
                <td style="font-family:times;font-size:15px;">Authorised By : '.$lm->name_technician.'</td>
                <td style="font-family:times;font-size:15px;">Date : '.date("d/m/Y ", strtotime($lm->start_date_warranty)).'</td>
            </tr>
            </table';
         /*$html_11 = '<p style="font-family:times;font-size:15px;" align="left">------------------------------------------&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;--------------------------------------------</p>';
        $html_12 = '<p style="font-family:times;font-size:15px;" align="left">Authorised By :<b>'.$lm->name_technician.'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Date :'.$lm->start_date_warranty.'</p>';*/
        
        $pdf->Ln(20);
        $pdf->writeHTMLCell(0,0,'','',$html_1,0,1,0,true,'J',true);
        $pdf->Ln(0);
        $pdf->writeHTMLCell(0,0,'','',$html_2,0,1,0,true,'J',true);
        $pdf->Ln(5);
        $pdf->writeHTMLCell(0,0,'','',$html_3,0,1,0,true,'J',true);
        $pdf->Ln(5);
        $pdf->writeHTMLCell(0,0,'','',$html_4,0,1,0,true,'J',true);
        $pdf->Ln(5);
        $pdf->writeHTMLCell(0,0,'','',$html_5,0,1,0,true,'J',true);
        $pdf->Ln(5);
        $pdf->writeHTMLCell(0,0,'','',$html_6,0,1,0,true,'J',true);
        $pdf->Ln(5);
        $pdf->writeHTMLCell(0,0,'','',$html_7,0,1,0,true,'J',true);
        $pdf->Ln(5);
        $pdf->writeHTMLCell(0,0,'','',$html_8,0,1,0,true,'J',true);
        $pdf->Ln(5);
        $pdf->writeHTMLCell(0,0,'','',$html_9,0,1,0,true,'J',true); 
        $pdf->Ln(2);
        $pdf->writeHTMLCell(0,0,'','',$html_10,0,1,0,true,'J',true); 
        $pdf->Ln(0);
        $pdf->writeHTMLCell(0,0,'','',$html_11,0,1,0,true,'J',true); 
//         /$pdf->Ln(5);
        //$pdf->writeHTMLCell(0,0,'','',$html_12,0,1,0,true,'J',true); 
       //$pdf->AddPage();
        
        }
        $pdf->SetTitle('Limited Warranty');
        $pdf->SetHeaderMargin(30);
        $pdf->SetTopMargin(20);
        $pdf->setFooterMargin(20);
        $pdf->SetAutoPageBreak(true);
        $pdf->SetAuthor('Author');
        $pdf->SetDisplayMode('real', 'default');
        
         
        $pdf->Output('Limited Warranty.pdf', 'I');
        //============================================================+
    }
}