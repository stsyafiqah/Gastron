<?php
$noCount = 1;
foreach($fixed as $f)
{
//pre($fixed);
    $serial = $f->serial_no_warranty;
    
    $serial_no = json_decode($serial,TRUE);
    $ser_count = count($serial_no);
    //pre($ser_count);
    $total_product_component = 10;
			
        $a = '';
        $count_pc = 1;    
		for ( $x = 0; $x < $ser_count; $x++ )
		{
		      $serial_no_warranty     = ( isset( $serial_no[$x] ) ? $serial_no[$x] : "" );
             /* $pro_desc     = ( isset( $product_component[$x]['component_desc'] ) ? $product_component[$x]['component_desc'] : "" );
              $pro_qty	    = ( isset( $product_component[$x]['component_qty'] ) ? $product_component[$x]['component_qty'] : "" );
              $pro_unit	    = ( isset( $product_component[$x]['component_unitcost'] ) ? $product_component[$x]['component_unitcost'] : "" );
              $pro_amount	= ( isset( $product_component[$x]['component_amount'] ) ? $product_component[$x]['component_amount'] : "" );*/
            
              $a .= '
                <td style="">'.$count_pc.'</td>
                <td style=""><input type="date" id="form34" class="form-control validate" name="sensor_date[]"></td>
                <td style=""><input type="text" id="form34" class="form-control validate" name="detector_serial_no[]" value="'.$serial_no_warranty.'"></td>
                <td style=""><input type="text" id="form34" class="form-control validate" name="bat_voltage[]"></td>
                <td style=""><input type="text" id="form34" class="form-control validate" name="detector[]" value="'.$f->code_model.'"></td>
                <td style=""><input type="text" id="form34" class="form-control validate" name="receiver[]"></td>
                <td style=""><input type="text" id="form34" class="form-control validate" name="cal_gas[]"></td>
                <td style=""><input type="text" id="form34" class="form-control validate" name="density_lel[]"></td>
                <td style=""><input type="text" id="form34" class="form-control validate" name="full_range[]"></td>
                <td style=""><input type="text" id="form34" class="form-control validate" name="before_zero[]"></td>
                <td style=""><input type="text" id="form34" class="form-control validate" name="after_zero[]"></td>
                <td style=""><input type="text" id="form34" class="form-control validate" name="before_span[]"></td>
                <td style=""><input type="text" id="form34" class="form-control validate" name="after_span[]"></td>
                <td style=""><input type="text" id="form34" class="form-control validate" name="1st_alarm[]"></td>
                <td style=""><input type="text" id="form34" class="form-control validate" name="2nd_alarm[]"></td>
                <td style=""><input type="text" id="form34" class="form-control validate" name="3rd_alarm[]"></td>
                <td style=""><input type="text" id="form34" class="form-control validate" name="sensor_grade[]"></td>
         
           </tr> ';
              $count_pc++; 
        }       
}
?>


<style>

    /*tbody tr:hover { background: red; }
    td a { 
    display: block; 
    border: 1px solid black;
    padding: 16px; 
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
                    <form id="wizard-clickable" class="frm_wizard frm_wizard_check" method="POST" action="<?=site_url('insert_fixed?id='.$f->id_warranty)?>" enctype="multipart/form-data"  novalidate>
                       <!-- <div class="modal-body mx-3">-->
                                <div class="table-responsive">
                                <table id ="1" cellspacing="1" cellpadding="1" border="1">
         <tr>
                <td colspan="17" align="center">Customer Service Report</td>
               
                
         </tr>
          <tr>
                <td style="width:10%">CSR NO. </td>
                <td style="width:40%" colspan="10"><?php echo $f->csr_no ?></td>
                <td style="width:10%" colspan="2">CAL.DATE</td>
                <td style="width:40%" colspan="4"><input type="date" id="form34" class="form-control validate" name="cal_date"></td>
         </tr>
         
          <tr>
                <td style="width:20%" colspan="2">CUSTOMER NAME </td>
                <td style="width:30%" colspan="9"><?php echo $f->name_client ?></td>
                <td style="width:20%" colspan="2">DUE DATE</td>
                <td style="width:30%" colspan="4"><input type="date" id="form34" class="form-control validate" name="due_date"></td>
         </tr>
         
         <tr>
                <td style="width:10%">Address </td>
                <td style="width:90%" colspan="16"><?php echo $f->address_client ?></td>
                
         </tr>
         
           <tr>
                <td style="width:10%">City </td>
                <td style="width:15%" colspan="2"><?php echo $f->city_client ?></td>
                <td style="width:10%">State</td>
                <td style="width:20%" colspan="4"><?php echo $f->state_client ?></td>
                <td style="width:10%">Zip Code </td>
                <td style="width:10%" colspan="4"><?php echo $f->zip_code_client ?></td>
                <td style="width:10%">Tel</td>
                <td style="width:15%" colspan="3"><?php echo $f->phone_client ?></td>
         </tr>
          <tr>
                <td style="width:40%" colspan="6" rowspan="2">Status of Call: RP, OTS, MS, CP or Others</td>
                <td style="width:30%" colspan="2">Instruction From Mr</td>
                <td style="width:30%" colspan="9"><input type="text" id="form34" class="form-control validate" name="instruction_form"></td>
                
         </tr>
         
          <tr>
                <td style="width:30%" colspan="2">On </td>
                <td style="width:30%" colspan="9"><input type="text" id="form34" class="form-control validate" name="instruction_on"></td>
                
         </tr>
         
           <tr>
                <td style="width:40%" colspan="5">SERVICE DETAILS :<input type="text" id="form34" class="form-control validate" name="service_details"></td>
                <td style="width:30%" colspan="6">LOCATION :<input type="text" id="form34" class="form-control validate" name="location"></td>
                <td style="width:30%" colspan="6">GAS TYPE :<input type="text" id="form34" class="form-control validate" name="gas_type"></td>
                
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
                
                <td style="width:100%;height:50px" colspan="17">*Remark :<input type="text" id="form34" class="form-control validate" name="remark"></td>
                
         </tr>
         
          <tr>
                <td style="width:70%" colspan="10" rowspan="2">* SENSOR GRADE DIVISION <br>A GRADE : Best condition of sensitibity<br>B GRADE : Need to do sensitiVity adjustment and management <br>C GRADE : Sensor hunting or faulty will be expected,because of low sensitibity,sensor replacement required on next service <br>D GRADE: Measurment is not possible,need to replace sensor immediately</td>
                <td style="width:15%" colspan="3">SERVICED BY :</td>
                <td style="width:15%;height:50px" colspan="4">ZUL HAZEEM</td>
         </tr>
         
           <tr>
                
                <td style="width:15%" colspan="3">CERTIFY BY :</td>
                <td style="width:15.5%;height:50px" colspan="4"></td>
                
         </tr>
         
         </table>
                        </div>
                        <input type="hidden" id="form34" class="form-control validate" name="idw_fixed" value="<?php echo $f->id_warranty ?>" placeholder="Years">

                            <div class="modal-footer d-flex justify-content-center">
                                <button class="btn btn-success">Submit</button>
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



                                               