<?php
foreach($portable as $p)
{

    $serial = $p->serial_no_warranty;
    
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
            
              $a .= ''.$serial_no_warranty.'';
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
            <h3 class="text-themecolor m-b-0 m-t-0">Portable</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Gastron</a></li>
                <li class="breadcrumb-item active">Services</li>
                <li class="breadcrumb-item active">Portable</li>
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
        <div class="col-sm-12">
            <div class="card">
                <div class="card-block">
                    <form id="wizard-clickable" class="frm_wizard frm_wizard_check" method="POST" action="<?=site_url('insert_portable?id='.$p->id_warranty)?>" enctype="multipart/form-data"  novalidate>
                        <div class="modal-body mx-3">

                                <div class="col-6 col-md-4">
                                    <!--<i class="fa fa-pencil prefix grey-text"></i>-->
                                    <label data-error="wrong" data-success="right" for="form8">Customer</label>
                                    <input type="text" id="form34" class="form-control validate" name="model_portable" value="<?php echo $p->name_client ?>" placeholder="Years">
                                    <br>
                                      <textarea class="form-control" rows="5" id="comment"><?php echo $p->address_client ?></textarea>
                                    <input type="hidden" id="form34" class="form-control validate" name="idw_portable" value="<?php echo $p->id_warranty ?>" placeholder="Years">
                                </div>
                                

                            <br><br>
                            
                            <table id ="1" cellspacing="1" cellpadding="1" border="1">
                                <tr>

                                    <td style="width:30%;height:50px" align="centre">MODEL</td>
                                    <td style="width:40%;height:50px" align="centre">NEXT CALIBRATE</td>
                                    <td style="width:30%;height:50px" align="centre">SERIAL NUMBER</td>


                                </tr>
                                <tr>
                                    <td style="width:30%;height:50px" align="centre"><input type="text" id="form34" class="form-control validate" name="model_portable" value="<?php echo $p->code_model ?>" placeholder="Years"></td>
                                    <td style="width:40%;height:50px" align="centre"><input type="text" class="form-control validate" name="next_cali_portable" value="<?php echo $p->next_service_warranty ?>" placeholder="Serial number"></td>
                                    <td style="width:30%;height:50px" align="centre"><input type="text" class="form-control validate" name="serial_num_portable" value="<?php echo $serial_no_warranty ?>" placeholder="Serial number"></td>
                                </tr>



                            </table>

                            
                            <br><br>
                            
                            <table id ="1" cellspacing="1" cellpadding="1" border="1">

                                <tr>

                                    <td style="width:100%;height:50px" align="centre" colspan="8">CALIBRATION GAS(SDS NO: 50018)</td>

                                </tr>

                                <tr>

                                    <td style="width:30%;height:50px" align="centre">COMPONENTS</td>
                                    <td style="width:10%;height:50px" align="centre"><input type="text" class="form-control validate" name="comp_1" ></td>
                                    <td style="width:10%;height:50px" align="centre"><input type="text" class="form-control validate" name="comp_2"></td>
                                    <td style="width:10%;height:50px" align="centre"><input type="text" class="form-control validate" name="comp_3"></td>
                                    <td style="width:10%;height:50px" align="centre"><input type="text" class="form-control validate" name="comp_4"></td>
                                    <td style="width:10%;height:50px" align="centre"><input type="text" class="form-control validate" name="comp_5"></td>
                                    <td style="width:10%;height:50px" align="centre"><input type="text" class="form-control validate" name="comp_6"></td>
                                    <td style="width:10%;height:50px" align="centre"><input type="text" class="form-control validate" name="comp_7"></td>


                                </tr>
                                <tr>
                                    <td style="width:30%;height:50px" align="centre">CONCENTRATION</td>
                                    <td style="width:10%;height:50px" align="centre"><input type="text" class="form-control validate" name="con_1" ></td>
                                    <td style="width:10%;height:50px" align="centre"><input type="text" class="form-control validate" name="con_2"></td>
                                    <td style="width:10%;height:50px" align="centre"><input type="text" class="form-control validate" name="con_3"></td>
                                    <td style="width:10%;height:50px" align="centre"><input type="text" class="form-control validate" name="con_4"></td>
                                    <td style="width:10%;height:50px" align="centre"><input type="text" class="form-control validate" name="con_5"></td>
                                    <td style="width:10%;height:50px" align="centre"><input type="text" class="form-control validate" name="con_6"></td>
                                    <td style="width:10%;height:50px" align="centre"><input type="text" class="form-control validate" name="con_7"></td>
                                </tr>

                                <tr>
                                    <td style="width:30%;height:50px" align="centre">MOLE %</td>
                                    <td style="width:10%;height:50px" align="centre"><input type="text" class="form-control validate" name="mole_1" ></td>
                                    <td style="width:10%;height:50px" align="centre"><input type="text" class="form-control validate" name="mole_2"></td>
                                    <td style="width:10%;height:50px" align="centre"><input type="text" class="form-control validate" name="mole_3"></td>
                                    <td style="width:10%;height:50px" align="centre"><input type="text" class="form-control validate" name="mole_4"></td>
                                    <td style="width:10%;height:50px" align="centre"><input type="text" class="form-control validate" name="mole_5"></td>
                                    <td style="width:10%;height:50px" align="centre"><input type="text" class="form-control validate" name="mole_6"></td>
                                    <td style="width:10%;height:50px" align="centre"><input type="text" class="form-control validate" name="mole_7"></td>
                                </tr>



                            </table>
                            <br><br>
                            <table id ="1" cellspacing="1" cellpadding="1" border="1">


                                <tr>

                                    <td style="width:30%;height:50px" align="centre"></td>
                                    <td style="width:20%;height:50px" align="centre"><input type="text" class="form-control validate" name="gas_1"></td>
                                    <td style="width:20%;height:50px" align="centre"><input type="text" class="form-control validate" name="gas_2"></td>
                                    <td style="width:10%;height:50px" align="centre"><input type="text" class="form-control validate" name="gas_3"></td>
                                    <td style="width:10%;height:50px" align="centre"><input type="text" class="form-control validate" name="gas_4"></td>



                                </tr>
                                <tr>
                                    <td style="width:30%;height:50px" align="centre">HIGH</td>
                                    <td style="width:20%;height:50px" align="centre"><input type="text" class="form-control validate" name="h_1" ></td>
                                    <td style="width:20%;height:50px" align="centre"><input type="text" class="form-control validate" name="h_2"></td>
                                    <td style="width:10%;height:50px" align="centre"><input type="text" class="form-control validate" name="h_3"></td>
                                    <td style="width:10%;height:50px" align="centre"><input type="text" class="form-control validate" name="h_4"></td>

                                </tr>

                                <tr>
                                    <td style="width:30%;height:50px" align="centre">LOW</td>
                                   <td style="width:20%;height:50px" align="centre"><input type="text" class="form-control validate" name="l_1" ></td>
                                    <td style="width:20%;height:50px" align="centre"><input type="text" class="form-control validate" name="l_2" ></td>
                                    <td style="width:10%;height:50px" align="centre"><input type="text" class="form-control validate" name="l_3" ></td>
                                    <td style="width:10%;height:50px" align="centre"><input type="text" class="form-control validate" name="l_4" ></td>

                                </tr>

                                <tr>
                                    <td style="width:30%;height:50px" align="centre">TWA</td>
                                   <td style="width:20%;height:50px" align="centre"><input type="text" class="form-control validate" name="t_1" ></td>
                                    <td style="width:20%;height:50px" align="centre"><input type="text" class="form-control validate" name="t_2"></td>
                                    <td style="width:10%;height:50px" align="centre"><input type="text" class="form-control validate" name="t_3"></td>
                                    <td style="width:10%;height:50px" align="centre"><input type="text" class="form-control validate" name="t_4"></td>

                                </tr>

                                <tr>
                                    <td style="width:30%;height:50px" align="centre">STEL</td>
                                   <td style="width:20%;height:50px" align="centre"><input type="text" class="form-control validate" name="s_1"></td>
                                    <td style="width:20%;height:50px" align="centre"><input type="text" class="form-control validate" name="s_2"></td>
                                    <td style="width:10%;height:50px" align="centre"><input type="text" class="form-control validate" name="s_3"></td>
                                    <td style="width:10%;height:50px" align="centre"><input type="text" class="form-control validate" name="s_4" ></td>

                                </tr>

                            </table>
                        </div>

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



                                               