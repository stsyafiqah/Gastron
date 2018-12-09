<?php
/*foreach($domestic as $d)
{

}*/

 $id = $this->input->get('id');
        $listing_domestic = $this->Gastron_domestic->listing($id);
        foreach($listing_domestic as $d)
        {
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
            <h3 class="text-themecolor m-b-0 m-t-0">Domestic</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Gastron</a></li>
                <li class="breadcrumb-item active">Services</li>
                <li class="breadcrumb-item active">Domestic</li>
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
                    <form id="wizard-clickable" class="frm_wizard frm_wizard_check" method="POST" action="<?=site_url('upd_domestic?id='.$d->id_domestic)?>" enctype="multipart/form-data"  novalidate>
                        <div class="modal-body mx-3">

                                <table id ="1" cellspacing="1" cellpadding="1" border="1">
                                    <tr>

                                        <td colspan="4">CUSTOMER : <?php echo $d->name_client ?></td>

                                    </tr>
                                    <tr>

                                        <td colspan="4">Project Name</td>

                                    </tr>
                                    <tr>

                                        <td>Inspection No</td>
                                        <td><input type="text" id="form34" class="form-control validate" name="inspection_domestic" value="<?php echo $d->inspection_no ?>"></td>
                                        <td>Date</td>
                                        <td><input type="date" id="form34" class="form-control validate" name="date_domestic" value="<?php echo $d->date_service ?>"></td>

                                    </tr>
                                    <tr>

                                        <td>Measuring Gas</td>
                                        <td><input type="text" id="form34" class="form-control validate" name="measuring_domestic" value="<?php echo $d->measuring_gas ?>"></td>
                                        <td>Model No</td>
                                        <td><?php echo $d->code_model ?></td>

                                    </tr>
                                </table>
                               <br><br>
                                <table id ="1" cellspacing="1" cellpadding="1" border="1">
                                <tr>

                                    <td colspan="3">Functioning Test</td>

                                </tr>
                                 <tr>

                                    <td>Item</td>
                                    <td>Specification</td>
                                    <td>Result</td>

                                </tr>
                                <tr>

                                    <td>TEST GAS</td>
                                    <td>CH4 50% LEL	</td>
                                    <td><input type="text" id="form34" class="form-control validate" name="test_gas" value="<?php echo $d->test_gas ?>"></td>

                                </tr>
                                <tr>

                                    <td>Alarm Response Time	</td>
                                    <td>≤15 seconds</td>
                                    <td><input type="text" id="form34" class="form-control validate" name="alarm_response" value="<?php echo $d->alarm_response_time ?>"></td>

                                </tr>
                                 <tr>

                                    <td>Alarm Signal Output</td>
                                    <td>Dry contact	</td>
                                    <td><input type="text" id="form34" class="form-control validate" name="alarm_signal" value="<?php echo $d->alarm_signal_output ?>"></td>

                                </tr>
                                 <tr>

                                    <td>Power Test </td>
                                    <td>230V AC ±10%</td>
                                    <td><input type="text" id="form34" class="form-control validate" name="power_test" value="<?php echo $d->power_test ?>"></td>

                                </tr>
                             </table>
                            <br><br>
                            <!--<table id ="1" cellspacing="1" cellpadding="1" border="1">
            
                             <tr>

                                <td>GASTRONICS (M`SIA) SDN. BHD.</td>
                                <td>PREPARE</td>
                                <td>VERIFY</td>

                            </tr>
                            <tr>

                                <td>No. 6, Jln PJU 1A/13 Taman Perindustrian Jaya<br>Ara Damansara, 47200 Petaling Jaya, Selangor Malaysia
                <br>Tel: 03 7840 0199, Fax: 03 7840 0411
                </td>
                                <td>	</td>
                                <td></td>

                            </tr>

                         </table>-->
                        </div>
                            <input type="hidden" id="form34" class="form-control validate" name="id_war" value="<?php echo $d->id_warranty ?>">
                            <input type="hidden" id="form34" class="form-control validate" name="id_domestic" value="<?php echo $d->id_domestic ?>">
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



                                               