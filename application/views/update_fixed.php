<?php
$noCount = 1;
$id = $this->input->get('id');
$listing_fixed = $this->Gastron_fixed->listing($id);
foreach($listing_fixed as $f)
{
    

    $sensor_date = $f->sensor_date;
    $serial = $f->serial_no_warranty;
    $batt_voltage = $f->batt_voltage;
    $detector = $f->detector;
    $receiver = $f->receiver;
    $cal_gas = $f->cal_gas;
    $density_lel = $f->density_lel;
    $full_range = $f->full_range;
    $before_zero = $f->zero_before;
    $after_zero = $f->zero_after;
    $before_span = $f->span_before;
    $after_span = $f->span_after;
    $one_alarm = $f->one_alarm;
    $two_alarm = $f->two_alarm;
    $three_alarm = $f->three_alarm;
    $sensor_grade = $f->sensor_grade;
    $remarks = $f->remark;
    
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
    $remarks_tech = json_decode($remarks,TRUE);
    $ser_count = count($serial_no);
    ;
    
    
    //$ser_count = count($serial_no);
    //pre($ser_count);
    $total_product_component = 10;
			
        $a = '';
        $count_pc = 1;    
		for ( $x = 0; $x < $ser_count; $x++ )
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
                <td style="" align="center"> '.$count_pc.'</td>
                <td style="" align="center"><input type="date" id="form34" class="form-control validate" name="sensor_date[]" value="'.$sensor.'" style="width: 200px;"></td>
                <td style="" align="center"><input type="text" id="form34" class="form-control validate" name="detector_serial_no[]" value="'.$serial_no_warranty.'" style="width: 150px;"></td>
                <td style="" align="center"><input type="text" id="form34" class="form-control validate" name="bat_voltage[]" value="'.$batt.'" style="width: 100px;"></td>
                <td style="" align="center"><input type="text" id="form34" class="form-control validate" name="detector[]" value="'.$det.'" style="width: 150px;"></td>
                <td style="" align="center"><input type="text" id="form34" class="form-control validate" name="receiver[]" value="'.$rec.'" style="width: 100px;"></td>
                <td style="" align="center"><input type="text" id="form34" class="form-control validate" name="cal_gas[]" value="'.$cal.'" style="width: 100px;"></td>
                <td style="" align="center"><input type="text" id="form34" class="form-control validate" name="density_lel[]" value="'.$density.'" style="width: 100px;"></td>
                <td style=""><input type="text" id="form34" class="form-control validate" name="full_range[]" value="'.$full.'" style="width: 100px;"></td>
                <td style="" align="center"><input type="text" id="form34" class="form-control validate" name="before_zero[]" value="'.$bef_zeros.'" style="width: 100px;"></td>
                <td style="" align="center"><input type="text" id="form34" class="form-control validate" name="after_zero[]" value="'.$aft_zeros.'" style="width: 100px;"></td>
                <td style="" align="center"><input type="text" id="form34" class="form-control validate" name="before_span[]" value="'.$bef_spans.'" style="width: 100px;"></td>
                <td style="" align="center"><input type="text" id="form34" class="form-control validate" name="after_span[]" value="'.$aft_spans.'" style="width: 100px;"></td>
                <td style="" align="center"><input type="text" id="form34" class="form-control validate" name="1st_alarm[]" value="'.$o_alarms.'" style="width: 100px;"></td>
                <td style="" align="center"><input type="text" id="form34" class="form-control validate" name="2nd_alarm[]" value="'.$t_alarms.'" style="width: 100px;"></td>
                <td style="" align="center"><input type="text" id="form34" class="form-control validate" name="3rd_alarm[]" value="'.$th_alarms.'" style="width: 100px;"></td>
                <td style="" align="center"><input type="text" id="form34" class="form-control validate" name="sensor_grade[]" value="'.$senr_grades.'" style="width: 100px;"></td>
         
           </tr> ';
              $count_pc++; 
        }      
    
    $b = '';
        //$count_pc = 1;    
		for ( $x = 0; $x < 6; $x++ )
		{
		     $remarks_technician     = ( isset( $remarks_tech[$x] ) ? $remarks_tech[$x] : "" );
             /* $pro_desc     = ( isset( $product_component[$x]['component_desc'] ) ? $product_component[$x]['component_desc'] : "" );
              $pro_qty	    = ( isset( $product_component[$x]['component_qty'] ) ? $product_component[$x]['component_qty'] : "" );
              $pro_unit	    = ( isset( $product_component[$x]['component_unitcost'] ) ? $product_component[$x]['component_unitcost'] : "" );
              $pro_amount	= ( isset( $product_component[$x]['component_amount'] ) ? $product_component[$x]['component_amount'] : "" );*/
            
              $b .= '
               <tr><td style="width:100%;height:50px" colspan="17"><input type="text" id="form34" class="form-control validate" name="remark[]" value="'.$remarks_technician.'"></td></tr>';
              //$count_pc++; 
        }   
}
?>



<style>

    input[type=text] {
    background-color: lightgray;
    color: black;
    border-bottom: 1px solid #000000;
    }
    input[value] {
    background: lightgoldenrodyellow;
    border-bottom: 1px solid #000000;
    color: black;
    }
    
    input[value][type=date]{
    background-color: lightgoldenrodyellow;
    border-bottom: 1px solid #000000;
    color: black;
    }
    
    input[type=date] {
    background: lightgray;
    color: black;
    border-bottom: 1px solid #000000;
    }
    
    input[readonly]  {
    background: grey;
    border: none;
    color: black;
    }
    
  /*  td  {
    background: #E0E0E0;
    border: 1px solid #000000;
    color: black;
    }*/
    
    
</style>
<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Fixed</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Gastron</a></li>
                <li class="breadcrumb-item active">Services</li>
                <li class="breadcrumb-item active">Fixed</li>
            </ol>
        </div>
        <!-- <div class="col-md-6 col-4 align-self-center">
<a href="https://wrappixel.com/templates/monsteradmin/" class="btn pull-right hidden-sm-down btn-success"> Add</a>
</div>-->
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->

    <!-- Row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-block">
                    <form id="wizard-clickable" class="frm_wizard frm_wizard_check" method="POST" action="<?=site_url('upd_fixed?id='.$f->id_fixed)?>" enctype="multipart/form-data"  novalidate>
                       <!-- <div class="modal-body mx-3">-->
                                <div class="table-responsive">
                                <table id ="1" cellspacing="1" cellpadding="1" border="1">
         <tr>
                <td colspan="17" align="center">Customer Service Report</td>
               
                
         </tr>
          <tr>
                <td style="width:10%">CSR NO. </td>
                <td style="width:40%" colspan="10"><input type="text" id="form34" class="form-control validate" name="cal_date" value="<?php echo $f->csr_no ?>" readonly></td>
                <td style="width:10%" colspan="2">CAL.DATE</td>
                <td style="width:40%" colspan="4"><input type="date" id="form34" class="form-control validate" name="cal_date" value="<?php echo $f->cal_date ?>"></td>
         </tr>
         
          <tr>
                <td style="width:20%" colspan="2">CUSTOMER NAME </td>
                <td style="width:30%" colspan="9"><input type="text" id="form34" class="form-control validate" name="cal_date" value="<?php echo $f->name_client ?>" readonly></td>
                <td style="width:20%" colspan="2">DUE DATE</td>
                <td style="width:30%" colspan="4"><input type="date" id="form34" class="form-control validate" name="due_date" value="<?php echo $f->due_date ?>"></td>
         </tr>
         
         <tr>
                <td style="width:10%">Address </td>
                <td style="width:90%" colspan="16"><input type="text" id="form34" class="form-control validate" name="cal_date" value="<?php echo $f->address_client ?>" readonly></td>
                
         </tr>
         
           <tr>
                <td style="width:10%">City </td>
                <td style="width:15%" colspan="2"><input type="text" id="form34" class="form-control validate" name="cal_date" value="<?php echo $f->city_client ?>" readonly></td>
                <td style="width:10%">State</td>
                <td style="width:20%" colspan="4"><input type="text" id="form34" class="form-control validate" name="cal_date" value="<?php echo $f->state_client ?>" readonly></td>
                <td style="width:10%">Zip Code </td>
                <td style="width:10%" colspan="4"><input type="text" id="form34" class="form-control validate" name="cal_date" value="<?php echo $f->zip_code_client ?>" readonly></td>
                <td style="width:10%">Tel</td>
                <td style="width:15%" colspan="3"><input type="text" id="form34" class="form-control validate" name="cal_date" value="<?php echo $f->phone_client ?>" readonly></td>
         </tr>
          <tr>
                <td style="width:40%" colspan="6" rowspan="2">Status of Call: RP, OTS, MS, CP or Others</td>
                <td style="width:30%" colspan="2">Instruction From Mr</td>
                <td style="width:30%" colspan="9"><input type="text" id="form34" class="form-control validate" name="instruction_form" value="<?php echo $f->instruction_from ?>"></td>
                
         </tr>
         
          <tr>
                <td style="width:30%" colspan="2">On </td>
                <td style="width:30%" colspan="9"><input type="text" id="form34" class="form-control validate" name="instruction_on" value="<?php echo $f->instruction_on ?>"></td>
                
         </tr>
         
           <tr>
                <td style="width:40%" colspan="5">SERVICE DETAILS :<input type="text" id="form34" class="form-control validate" name="service_details" value="<?php echo $f->service_details ?>"></td>
                <td style="width:30%" colspan="6">LOCATION :<input type="text" id="form34" class="form-control validate" name="location" value="<?php echo $f->location ?>"></td>
                <td style="width:30%" colspan="6">GAS TYPE :<input type="text" id="form34" class="form-control validate" name="gas_type" value="gas_type"></td>
                
         </tr>
         
           <tr>
                <td style="width:50px;height:50px" rowspan="2" align="center">No</td>
                <td style="width:100px;height:50px" rowspan="2" align="center">Sensor Date</td>
                <td style="width:80px;height:50px" rowspan="2" align="center">Detector Serial. No</td>
                <td style="width:60px;height:50px" rowspan="2" align="center">Batt Voltage</td>
                <td style="width:140px;height:50px" colspan="2" align="center">Model</td>
                <td style="width:55px;height:50px" rowspan="2" align="center">Cal Gas</td>
                <td style="width:60px;height:50px" rowspan="2" align="center">Density Lel %</td>
                <td style="width:60px;height:50px" rowspan="2" align="center">Full Range Lel %</td>
                <td style="width:100px;height:50px" colspan="2" align="center">Zero</td>
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
           <?php echo $a ?>
       <!--<tr>
          
                <td style=""><?php echo $noCount++ ?></td>
                <td style=""><input type="text" id="form34" class="form-control validate" name="sensore_date"></td>
                <td style=""><?php echo $f->serial_no_warranty ?></td>
                <td style=""><input type="text" id="form34" class="form-control validate" name="bat_voltage"></td>
                <td style=""><?php echo $f->code_model ?></td>
                <td style=""><input type="text" id="form34" class="form-control validate" name="receiver"></td>
                <td style=""><input type="text" id="form34" class="form-control validate" name="cal_gas"></td>
                <td style=""><input type="text" id="form34" class="form-control validate" name="density_lel"></td>
                <td style=""><input type="text" id="form34" class="form-control validate" name="full_range"></td>
                <td style=""><input type="text" id="form34" class="form-control validate" name="before_zero"></td>
                <td style=""><input type="text" id="form34" class="form-control validate" name="after_zero"></td>
                <td style=""><input type="text" id="form34" class="form-control validate" name="before_span"></td>
                <td style=""><input type="text" id="form34" class="form-control validate" name="after_span"></td>
                <td style=""><input type="text" id="form34" class="form-control validate" name="1st_alarm"></td>
                <td style=""><input type="text" id="form34" class="form-control validate" name="2nd_alarm"></td>
                <td style=""><input type="text" id="form34" class="form-control validate" name="3rd_alarm"></td>
                <td style=""><input type="text" id="form34" class="form-control validate" name="sensor_grade"></td>
         
           </tr> -->
                
         <tr>
                
             <td style="width:100%;height:50px" colspan="17">*Remark :<input type="text" id="form34" class="form-control validate" name="remark" value="<?php echo $f->remark ?>"></td>
                
         </tr>
                                    
         
          <tr>
                <td style="width:70%" colspan="10" rowspan="2">* SENSOR GRADE DIVISION <br>A GRADE : Best condition of sensitibity<br>B GRADE : Need to do sensitiVity adjustment and management <br>C GRADE : Sensor hunting or faulty will be expected,because of low sensitibity,sensor replacement required on next service <br>D GRADE: Measurment is not possible,need to replace sensor immediately</td>
                <td style="width:15%" colspan="3">SERVICED BY :</td>
                <td style="width:15%;height:50px" colspan="4">ZUL HAZEEM</td>
         </tr>
         
           <tr>
                
                <td style="width:100%" colspan="3">CERTIFY BY :</td>
                <td style="width:100%;height:50px" colspan="4"></td>
                
         </tr>
         
         </table>
                                    <br><br>
                                    
                                    <table id ="1" cellspacing="1" cellpadding="1" border="1">
                                <tr>
                                <td style="width:40%;height:50px" align="centre">Last Service Date</td>
                                <td style="width:40%;height:50px" align="centre">Next Service Date</td>
                                </tr>
                                <tr>
                                <td style="width:40%;height:50px" align="centre"><input type="date" class="form-control validate" name="last_service" value="<?php echo $f->last_service_warranty ?>"></td>
                                <td style="width:40%;height:50px" align="centre"><input type="date" class="form-control validate" name="next_service" value="<?php echo $f->next_service_warranty ?>"></td>
                                </tr>
                            </table>
                                    <br><br>
                        </div>
                        <input type="hidden" id="form34" class="form-control validate" name="idw_fixed" value="<?php echo $f->id_warranty ?>" placeholder="Years">

                            <div class="modal-footer d-flex justify-content-center">
                                <button class="btn btn-success">Update</button>
                            </div>
                            </form>
                        </div>
                </div>
            </div> 
        </div>
        <!-- Row -->
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
    </div>



                                               