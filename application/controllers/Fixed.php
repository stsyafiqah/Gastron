<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fixed extends MY_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Gastron_client');
        $this->load->model('Gastron_technician');
        $this->load->model('Gastron_warranty');
        $this->load->model('Gastron_product');
        $this->load->model('Gastron_model');
        $this->load->model('Gastron_fixed');
        $this->load->library("Pdf");
	}

    function generate_pdf()
    {
        //Include the main TCPDF library (search for installation path).
        //require_once('tcpdf_include.php');
        $this->load->library('Pdf');

        // create new PDF document
        $pdf = new Pdf('L', 'mm', 'A4', true, 'UTF-8', false);
        
       
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
        //$pdf->SetFooterData(PDF_FOOTER_LOGO, PDF_FOOTER_LOGO_WIDTH, PDF_FOOTER_TITLE, PDF_FOOTER_STRING);
        
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
        
        
         $id = $this->input->get('id');
        $listing_fixed = $this->Gastron_fixed->listing($id);
        foreach($listing_fixed as $lf)
        {
            
            
            $sign_tech = $lf->sign_technician;
            
            $b='';
            
            if($sign_tech > 0){

            $b .='<img src="http://localhost/Gastron/asset_signature/signature/'.$lf->id_technician.'.png">';
            
            }else{
                
                 $b .='';
                
            }
             

    $sensor_date = $lf->sensor_date;
    $serial = $lf->serial_no_warranty;
    $batt_voltage = $lf->batt_voltage;
    $detector = $lf->detector;
    $receiver = $lf->receiver;
    $cal_gas = $lf->cal_gas;
    $density_lel = $lf->density_lel;
    $full_range = $lf->full_range;
    $before_zero = $lf->zero_before;
    $after_zero = $lf->zero_after;
    $before_span = $lf->span_before;
    $after_span = $lf->span_after;
    $one_alarm = $lf->one_alarm;
    $two_alarm = $lf->two_alarm;
    $three_alarm = $lf->three_alarm;
    $sensor_grade = $lf->sensor_grade;
    
     $sensor_dates = json_decode($sensor_date,TRUE);
     $serial_no = json_decode($serial,TRUE);
     $batt_voltages = json_decode($batt_voltage,TRUE);
     $detectors = json_decode($detector,TRUE);
     $receivers = json_decode($receiver,TRUE);
     $cal_gass = json_decode($cal_gas,TRUE);
     $density_lels = json_decode($density_lel,TRUE);
     $full_ranges = json_decode($full_range,TRUE);
     $before_zeros = json_decode($before_zero,TRUE);
     $after_zeros = json_decode($after_zero,TRUE);
     $before_spans = json_decode($before_span,TRUE);
     $after_spans = json_decode($after_span,TRUE);
     $one_alarms = json_decode($one_alarm,TRUE);
     $two_alarms = json_decode($two_alarm,TRUE);
     $three_alarms = json_decode($three_alarm,TRUE);
     $sensor_grades = json_decode($sensor_grade,TRUE);
    
    
    
    //$ser_count = count($serial_no);
    //pre($ser_count);
    $total_product_component = 10;
			
        $a = '';
        $count_pc = 1;    
		for ( $x = 0; $x < $total_product_component; $x++ )
		{
		    $sensor                 = ( isset( $sensor_dates[$x] ) ? $sensor_dates[$x] : "" );
            $serial_no_warranty     = ( isset( $serial_no[$x] ) ? $serial_no[$x] : "" );
            $batt                   = ( isset( $batt_voltages[$x] ) ? $batt_voltages[$x] : "" );
            $det                    = ( isset( $detectors[$x] ) ? $detectors[$x] : "" );
            $rec                    = ( isset( $receivers[$x] ) ? $receivers[$x] : "" );
            $cal                    = ( isset( $cal_gass[$x] ) ? $cal_gass[$x] : "" );
            $density                = ( isset( $density_lels[$x] ) ? $density_lels[$x] : "" );
            $full                   = ( isset( $full_ranges[$x] ) ? $full_ranges[$x] : "" );
            $bef_zeros              = ( isset( $before_zeros[$x] ) ? $before_zeros[$x] : "" );
            $aft_zeros              = ( isset( $after_zeros[$x] ) ? $after_zeros[$x] : "" );
            $bef_spans              = ( isset( $before_spans[$x] ) ? $before_spans[$x] : "" );
            $aft_spans              = ( isset( $after_spans[$x] ) ? $after_spans[$x] : "" );
            $o_alarms               = ( isset( $one_alarms[$x] ) ? $one_alarms[$x] : "" );
            $t_alarms               = ( isset( $two_alarms[$x] ) ? $two_alarms[$x] : "" );
            $th_alarms              = ( isset( $three_alarms[$x] ) ? $three_alarms[$x] : "" );
            $senr_grades            = ( isset( $sensor_grades[$x] ) ? $sensor_grades[$x] : "" );
            
              $a .= '<tr>
                <td style=""> '.$count_pc.'</td>
                <td style="">'.$sensor.'</td>
                <td style="">'.$serial_no_warranty.'</td>
                <td style="">'.$batt.'</td>
                <td style="">'.$det.'</td>
                <td style="">'.$rec.'</td>
                <td style="">'.$cal.'</td>
                <td style="">'.$density.'</td>
                <td style="">'.$full.'</td>
                <td style="">'.$bef_zeros.'</td>
                <td style="">'.$aft_zeros.'</td>
                <td style="">'.$bef_spans.'</td>
                <td style="">'.$aft_spans.'</td>
                <td style="">'.$o_alarms.'</td>
                <td style="">'.$t_alarms.'</td>
                <td style="">'.$th_alarms.'</td>
                <td style="">'.$senr_grades.'</td>
         
           </tr> ';
              $count_pc++; 
        }  
        
        //first page
        $pdf->AddPage('L', 'A4');
       $pdf->SetFont('times', '', 10);
         $html_image = '<table id ="1" cellspacing="1" cellpadding="1" border="1">
         <tr>
                <td colspan="17" align="center">Customer Service Report</td>
               
                
         </tr>
          <tr>
                <td style="width:10%"> CSR NO. </td>
                <td style="width:40%" colspan="10"> '.$lf->csr_no.'</td>
                <td style="width:10%" colspan="2"> CAL.DATE</td>
                <td style="width:40%" colspan="4"> '.$lf->cal_date.'</td>
         </tr>
         
          <tr>
                <td style="width:20%" colspan="2"> CUSTOMER NAME </td>
                <td style="width:30%" colspan="9"> '.$lf->name_client.'</td>
                <td style="width:20%" colspan="2"> DUE DATE</td>
                <td style="width:30%" colspan="4"> '.$lf->due_date.'</td>
         </tr>
         
         <tr>
                <td style="width:10%"> Address </td>
                <td style="width:90%" colspan="16"> '.$lf->address_client.'</td>
                
         </tr>
         
           <tr>
                <td style="width:10%"> City </td>
                <td style="width:15%" colspan="2"> '.$lf->city_client.'</td>
                <td style="width:10%"> State</td>
                <td style="width:20%" colspan="4"> '.$lf->state_client.'</td>
                <td style="width:10%"> Zip Code </td>
                <td style="width:10%" colspan="4"> '.$lf->zip_code_client.'</td>
                <td style="width:10%"> Tel</td>
                <td style="width:15%" colspan="3"> '.$lf->phone_client.'</td>
         </tr>
          <tr>
                <td style="width:40%" colspan="6" rowspan="2"> Status of Call: RP, OTS, MS, CP or Others</td>
                <td style="width:30%" colspan="2"> Instruction From Mr</td>
                <td style="width:30%" colspan="9"> '.$lf->instruction_from.'</td>
                
         </tr>
         
          <tr>
                <td style="width:30%" colspan="2"> On </td>
                <td style="width:30%" colspan="9"> '.$lf->instruction_on.'</td>
                
         </tr>
         
           <tr>
                <td style="width:40%" colspan="5"> SERVICE DETAILS : '.$lf->service_details.'</td>
                <td style="width:30%" colspan="6"> LOCATION : '.$lf->location.'</td>
                <td style="width:30%" colspan="6"> GAS TYPE : '.$lf->gas_type.'</td>
                
         </tr>
         
          <tr>
                <td style="width:50px;height:50px" rowspan="2" align="center">No</td>
                <td style="width:100px;height:50px" rowspan="2" align="center">Sensor Date</td>
                <td style="width:80px;height:50px" rowspan="2" align="center">Detector Serial. No</td>
                <td style="width:60px;height:50px" rowspan="2" align="center">Batt Voltage</td>
                <td style="width:140px;height:50px" colspan="2" align="center">Model</td>
                <td style="width:55px;height:50px" rowspan="2" align="center">Cal Gas</td>
                <td style="width:60px;height:50px" rowspan="2" align="center">Density Lel %</td>
                <td style="width:70px;height:50px" rowspan="2" align="center">Full Range Lel %</td>
                <td style="width:90px;height:50px" colspan="2" align="center">Zero</td>
                <td style="width:100px;height:50px" colspan="2" align="center">Span</td>
                <td style="width:100px;height:50px" colspan="3" align="center">Alarm Setting</td>
                <td style="width:52px;height:50px" rowspan="2" align="center">Sensor Grade</td>
              
             
                
         </tr>
         
           <tr>
               <td style="">Detector</td>
                <td style="">Receiver</td>
                <td style="">Before</td>
                <td style="">After</td>
                <td style="">Before</td>
                <td style="">After</td>
                <td style="">1th</td>
                <td style="">2nd</td>
                <td style="">3rd</td>
                
         </tr>
      '.$a.'
         
         <tr>
                
                <td style="width:100%;height:20px" colspan="17"> *Remark : '.$lf->remark.'</td>
                
         </tr>
         
          <tr>
                <td style="width:70%" colspan="10" rowspan="2">* SENSOR GRADE DIVISION <br>A GRADE : Best condition of sensitibity<br>B GRADE : Need to do sensitiVity adjustment and management <br>C GRADE : Sensor hunting or faulty will be expected,because of low sensitibity,sensor replacement required on next service <br>D GRADE: Measurment is not possible,need to replace sensor immediately</td>
                <td style="width:15%" colspan="3"> SERVICED BY :<br> '.$b.'</td>
                <td style="width:15%;height:50px" colspan="4"> '.$lf->name_technician.'</td>
         </tr>
         
           <tr>
                
                <td style="width:15%" colspan="3"> CERTIFY BY :</td>
                <td style="width:15%;height:50px" colspan="4"> </td>
                
         </tr>
         
         </table>';

     
        $pdf->Ln(20);
        $pdf->writeHTMLCell(0,0,'','',$html_image,0,1,0,true,'J',true);
        
        }
       
            
       //$pdf->AddPage();
        
        
        $pdf->SetTitle('Fixed Report');
        $pdf->SetHeaderMargin(30);
        $pdf->SetTopMargin(20);
        $pdf->setFooterMargin(20);
        $pdf->SetAutoPageBreak(true);
        $pdf->SetAuthor('Author');
        $pdf->SetDisplayMode('real', 'default');
        
         
        $pdf->Output('Fixed Report.pdf', 'I');
        //============================================================+
    }
    
    public function insert_fixed()
    {
        
         $id = $this->input->get('id');
        $this->Gastron_fixed->id_warrs = $this->input->post('idw_fixed');
        $this->Gastron_fixed->cal_date = $this->input->post('cal_date');
        $this->Gastron_fixed->due_date = $this->input->post('due_date');
        $this->Gastron_fixed->instruction_from = $this->input->post('instruction_form');
        $this->Gastron_fixed->instruction_on = $this->input->post('instruction_on');
        $this->Gastron_fixed->service_details = $this->input->post('service_details');
        $this->Gastron_fixed->location = $this->input->post('location');
        $this->Gastron_fixed->gas_type = $this->input->post('gas_type');
        $this->Gastron_fixed->sensor_date = $this->input->post('sensor_date');
        $this->Gastron_fixed->detector_serial_no = $this->input->post('detector_serial_no');
        $this->Gastron_fixed->batt_voltage = $this->input->post('bat_voltage');
        $this->Gastron_fixed->detector = $this->input->post('detector');
        $this->Gastron_fixed->receiver = $this->input->post('receiver');
        $this->Gastron_fixed->cal_gas = $this->input->post('cal_gas');
        $this->Gastron_fixed->density_lel = $this->input->post('density_lel');
        $this->Gastron_fixed->full_range = $this->input->post('full_range');
        $this->Gastron_fixed->zero_before = $this->input->post('before_zero');
        $this->Gastron_fixed->zero_after = $this->input->post('after_zero');
        $this->Gastron_fixed->span_before = $this->input->post('before_span');
        $this->Gastron_fixed->span_after = $this->input->post('after_span');
        $this->Gastron_fixed->one_alarm = $this->input->post('1st_alarm');
        $this->Gastron_fixed->two_alarm = $this->input->post('2nd_alarm');
        $this->Gastron_fixed->three_alarm = $this->input->post('3rd_alarm');
        $this->Gastron_fixed->sensor_grade = $this->input->post('sensor_grade');
        $this->Gastron_fixed->remark = $this->input->post('remark');
        
        $q = $this->Gastron_fixed->insert_fixed();
        $q = $this->Gastron_warranty->update_status($id);
        redirect('services');

    }
    
    public function services_fixed()
	{
		  $data = array();
         $id = $this->input->get('id');

         $data['listing_fixed'] = $this->Gastron_fixed->listing($id);
		 $data['all_product'] = $this->Gastron_product->listing_all();
         $data['all_client'] = $this->Gastron_client->listing_all();
         $data['all_technician'] = $this->Gastron_technician->listing_all();
         $data['portable'] = $this->Gastron_warranty->limited($id);
    

         $this->data = $data;
		 $this->middle = 'update_fixed';
    	 $this->layout();
	}
    
    public function update_fixed()
    {
        
          $id = $this->input->get('id');
        $this->Gastron_fixed->id_warrs = $this->input->post('idw_fixed');
        $this->Gastron_fixed->cal_date = $this->input->post('cal_date');
        $this->Gastron_fixed->due_date = $this->input->post('due_date');
        $this->Gastron_fixed->instruction_from = $this->input->post('instruction_form');
        $this->Gastron_fixed->instruction_on = $this->input->post('instruction_on');
        $this->Gastron_fixed->service_details = $this->input->post('service_details');
        $this->Gastron_fixed->location = $this->input->post('location');
        $this->Gastron_fixed->gas_type = $this->input->post('gas_type');
        $this->Gastron_fixed->sensor_date = $this->input->post('sensor_date');
        $this->Gastron_fixed->detector_serial_no = $this->input->post('detector_serial_no');
        $this->Gastron_fixed->batt_voltage = $this->input->post('bat_voltage');
        $this->Gastron_fixed->detector = $this->input->post('detector');
        $this->Gastron_fixed->receiver = $this->input->post('receiver');
        $this->Gastron_fixed->cal_gas = $this->input->post('cal_gas');
        $this->Gastron_fixed->density_lel = $this->input->post('density_lel');
        $this->Gastron_fixed->full_range = $this->input->post('full_range');
        $this->Gastron_fixed->zero_before = $this->input->post('before_zero');
        $this->Gastron_fixed->zero_after = $this->input->post('after_zero');
        $this->Gastron_fixed->span_before = $this->input->post('before_span');
        $this->Gastron_fixed->span_after = $this->input->post('after_span');
        $this->Gastron_fixed->one_alarm = $this->input->post('1st_alarm');
        $this->Gastron_fixed->two_alarm = $this->input->post('2nd_alarm');
        $this->Gastron_fixed->three_alarm = $this->input->post('3rd_alarm');
        $this->Gastron_fixed->sensor_grade = $this->input->post('sensor_grade');
        $this->Gastron_fixed->remark = $this->input->post('remark');
        
        	
        
        	$q = $this->Gastron_fixed->update_fixed($id);

        redirect('services');

    }
    
}