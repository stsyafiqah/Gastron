<style>

    input[type=text] {
    background: transparent;
    border: none;
    border-bottom: 1px solid #000000;
    }
    select {
    background: transparent;
    border: none;
    border-bottom: 1px solid #000000;
}

    
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
                        <h3 class="text-themecolor m-b-0 m-t-0">Warranty</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Gastron</a></li>
                            <li class="breadcrumb-item active">Warranty</li>
                        </ol>
                    </div>
                    <div class="col-md-6 col-4 align-self-center">
                       
                        <button type="button" class="btn pull-right btn-success btn_add" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"> Add New Warranty</i></button>
                    </div>
                </div>
                
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header text-center">
                                <h4 class="modal-title w-100 font-weight-bold">Add New Warranty</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                             <form id="wizard-clickable" class="frm_wizard frm_wizard_check" method="POST" action="<?=site_url('insert_warranty')?>" enctype="multipart/form-data">
                            <div class="modal-body mx-3">
                                <div class="table-responsive">
						<table class="table table-bordered" id="dynamic_field">
							<tr>
								<td colspan="2"><div class="md-form mb-3">
                                    <!--<i class="fa fa-user prefix grey-text"></i>-->
                                    <label data-error="wrong" data-success="right" for="form34">Year : </label>
                                    <input type="text" id="form34" class="form-control validate" name="war_year" placeholder="Years">
                                    
                                </div>
                                </td>
							</tr>
                            <tr>
								<td colspan="2"> 
                                    <div class="md-form mb-3">
                                    <!--<i class="fa fa-envelope prefix grey-text"></i>-->
                                    <label data-error="wrong" data-success="right" for="form29">Product : </label>
                                    <select class="form-control validate" name="war_product" id="war_product" placeholder="Product">
                                      <option value="">Product</option>
                                        <?php
                                        foreach($all_product as $ap)
                                            {	
                                        
                                              $id_product          = $ap->id_product;
                                              $code_product        = $ap->code_product;
                                              $desc_product       = $ap->desc_product;
                                              
                                              ?>
                                      <option value="<?php echo $id_product ?>"><?php echo $code_product ?></option>
                                     <?php } ?>
                                    </select>
                                </div>
                                </td>
							</tr>
                            <tr>
								<td colspan="2"> 
                                    <div class="md-form mb-3">
                                    <!--<i class="fa fa-tag prefix grey-text"></i>-->
                                     <label data-error="wrong" data-success="right" for="form32">Model : </label>
                                    <select class="form-control validate" name="war_model" id="war_model" placeholder="model" disabled="">
                                       <!-- <option value="">Select Model</option>-->
                                        
                                    </select>
                                    </div>
                                </td>
							</tr>
                            <tr>
								<td colspan="2">
                                    <div class="md-form mb-3">
                                    <!--<i class="fa fa-pencil prefix grey-text"></i>-->
                                    <label data-error="wrong" data-success="right" for="form8">Client : </label>
                                    <select class="form-control validate" name="war_client" placeholder="Client">
                                      <option value="">Select Client</option>
                                        <?php
                                        foreach($all_client as $ac)
                                            {	
                                        
                                              $id_client              = $ac->id_client;
                                              $name_client            = $ac->name_client;
                                              $phone_client           = $ac->phone_client;
                                              $email_client          = $ac->email_client;
                                              ?>
                                      <option value="<?php echo $id_client ?>"><?php echo $name_client ?></option>
                                     <?php } ?>
                                    </select>
                                </div>
                                </td>
							</tr>
                            <tr>
								<td colspan="2">  
                                    <div class="md-form mb-3">
                                    <!--<i class="fa fa-pencil prefix grey-text"></i>-->
                                    <label data-error="wrong" data-success="right" for="form8">Tecnician : </label>
                                    <select class="form-control validate" name="war_technician" placeholder="Technician">
                                      <option value="">Select Technician</option>
                                        <?php
                                        foreach($all_technician as $at)
                                            {	
                                        
                                              $id_technician          = $at->id_technician;
                                              $name_technician        = $at->name_technician;
                                              $phone_technician       = $at->phone_technician;
                                              $email_technician       = $at->email_technician;
                                              ?>
                                      <option value="<?php echo $id_technician ?>"><?php echo $name_technician ?></option>
                                     <?php } ?>
                                    </select>
                                </div>
                                </td>
							</tr>
                            <tr>
								<td colspan="2"> 
                                    <div class="md-form mb-3">
                                    <!--<i class="fa fa-pencil prefix grey-text"></i>-->
                                    <label data-error="wrong" data-success="right" for="form8">Location : </label>
                                    <input type="text" id="form8" class="form-control validate" name="war_location" placeholder="Location">
                                </div>
                                </td>
							</tr>
                            <tr>
								<td colspan="2"><div class="md-form mb-3">
                                    <!--<i class="fa fa-pencil prefix grey-text"></i>-->
                                     <label data-error="wrong" data-success="right" for="form8">Start Service Date : </label>
                                    <input type="date" id="date_picker" class="form-control" name="war_start_date" placeholder="Next Service Date">
                                   
                                </div>
                                </td>
							</tr>
                            <tr>
								<td colspan="2">
                                    <div class="md-form mb-3">
                                    <!--<i class="fa fa-pencil prefix grey-text"></i>-->
                                     <label data-error="wrong" data-success="right" for="form8">Next Service Date : </label>
                                    <input type="date" id="date_picker" class="form-control" name="war_date" placeholder="Next Service Date">
                                   
                                </div>
                                </td>
							</tr>
                            <tr>
								<td colspan="2">
                                    <div class="md-form mb-3">
                                    <!--<i class="fa fa-pencil prefix grey-text"></i>-->
                                    <label data-error="wrong" data-success="right" for="form8">Type : </label>
                                    <select class="form-control validate" name="war_type" id="war_type" placeholder="Technician">
                                      <option value="">Select Type</option>
                                       
                                      <option value="Domestic" id="Domestic">Domestic</option>
                                      <option value="Fixed" id="Fixed">Fixed</option>
                                      <option value="Portable" id="Portable">Portable</option>
                                        
                                    </select>
                                </div>
                                </td>
							</tr>
                            <tr>
								<td><div class="md-form mb-3">
                                    <!--<i class="fa fa-pencil prefix grey-text"></i>-->
                                     <label data-error="wrong" data-success="right" for="form8">Serial Number : </label>
                                    <input type="text" class="form-control validate" name="war_ser[]" placeholder="Serial number">
                                </div></td>
								<td>
                                    <div class="md-form mb-3">
                                    <!--<i class="fa fa-pencil prefix grey-text"></i>
                                     <label data-error="wrong" data-success="right" for="form8">Next Service Date</label>-->
                                   <!--<button type="button" name="add" id="add" class="btn btn-success">Add More</button>-->
                                   <button type="button" id="add" class="btn btn-success">Add More</button>
                                </div>
                                  </td>  
							</tr>
						</table>
						<div class="modal-footer d-flex justify-content-center">
                                <button class="btn btn-success">Submit</button>
                            </div>
					</div>

                            </div>
                            
                            </form>
                        </div>
                    </div>
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
                               <!-- <h4 class="card-title">Basic Table</h4>
                                <h6 class="card-subtitle">Add class <code>.table</code></h6>-->
                                <div class="table-responsive">
                                   <table width="100%" class="table table-bordered table-hover" id="dataTables">
                                        <thead>
                                            <tr>
                                                <th width="5%">Csr No</th>
                                                <th>Years</th>
                                                <th>Client</th>
                                                <th>Location</th>
                                                <th>Product</th>
                                                <th>Model</th>
                                                <th>Technician</th>
                                                <th>Next Service Date</th>
                                                <th>Doc Warranty</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                             $key=0;
                                            foreach($all_warranty as $aw)
                                            {	
                                              $key++;    
                                              $id_warranty              = $aw->id_warranty;
                                              $year_warranty            = $aw->year_warranty;
                                              $product_warranty         = $aw->product_warranty;
                                              $code_product             = $aw->code_product;
                                              $model_warranty           = $aw->model_warranty;
                                              $client_warranty          = $aw->client_warranty;
                                              $location_warranty        = $aw->location_warranty;
                                              $next_service_warranty    = $aw->next_service_warranty;
                                              $name_client              = $aw->name_client;
                                              $name_technician          = $aw->name_technician;
                                             
                                              ?>
                                            <tr>
                                                <td><?php echo $aw->csr_no?></td>
                                                <td><?php echo $year_warranty?></td>
                                                <td><?php echo $name_client?></td>
                                                <td><?php echo $location_warranty?></td>
                                                <td><?php echo $code_product?></td>
                                                <td><?php echo $aw->code_model?></td>
                                                <td><?php echo $name_technician?></td>
                                                <td><?php echo date("d/m/Y ", strtotime($aw->start_date_warranty)) ?></td>
                                                <td><a href="<?=site_url('limited/generate_pdf?id='.$id_warranty)?>" title="warranty" ><i class="fa fa-eye"></i></a></td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Row -->
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
            </div>

