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
                        <h3 class="text-themecolor m-b-0 m-t-0">Services</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Gastron</a></li>
                            <li class="breadcrumb-item active">Services</li>
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
                                                <th>Last Service Date</th>
                                                <th>Next Service Date</th>
                                                <th>Type</th>
                                                <th>Doc</th>
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
                                              $code_product         = $aw->code_product;
                                              $model_warranty           = $aw->model_warranty;
                                              $client_warranty          = $aw->client_warranty;
                                              $location_warranty        = $aw->location_warranty;
                                              $next_service_warranty    = $aw->next_service_warranty;
                                              $name_client    = $aw->name_client;
                                              $type_warranty    = $aw->type_warranty;
                                              $status    = $aw->status;
                                             
                                              ?>
                                             <?php if($status == '0'){ ?>
                                            <tr>
                                                <?php if($type_warranty == 'Fixed'){ ?>
                                                <td><a href="<?=site_url('fixed?id='.$id_warranty)?>"><?php echo $aw->csr_no?></a></td>
                                                <td><a href="<?=site_url('fixed?id='.$id_warranty)?>"><?php echo $year_warranty?></a></td>
                                                <td><a href="<?=site_url('fixed?id='.$id_warranty)?>"><?php echo $name_client?></a></td>
                                                <td><a href="<?=site_url('fixed?id='.$id_warranty)?>"><?php echo $location_warranty?></a></td>
                                                <td><a href="<?=site_url('fixed?id='.$id_warranty)?>"><?php echo $code_product?></a></td>
                                                <td><a href="<?=site_url('fixed?id='.$id_warranty)?>"><?php echo $model_warranty?></a></td>
                                                <td><a href="<?=site_url('fixed?id='.$id_warranty)?>"><?php echo date("d/m/Y ", strtotime($next_service_warranty)) ?></a></td>
                                                <td><a href="<?=site_url('fixed?id='.$id_warranty)?>"><?php echo date("d/m/Y ", strtotime($aw->start_date_warranty)) ?></a></td>
                                                <td><a href="<?=site_url('fixed?id='.$id_warranty)?>"><?php echo $type_warranty ?></a></td>
                                                <td><a href="<?=site_url('fixed/generate_pdf?id='.$id_warranty.'&type='.$type_warranty)?>" title="fixed" ><i class="fa fa-eye"></i></a>
                                                </td>
                                                <?php } else if($type_warranty == 'Portable') { ?>
                                                <td><a href="<?=site_url('portable?id='.$id_warranty)?>"><?php echo $aw->csr_no?></a></td>
                                                <td><a href="<?=site_url('portable?id='.$id_warranty)?>"><?php echo $year_warranty?></a></td>
                                                <td><a href="<?=site_url('portable?id='.$id_warranty)?>"><?php echo $name_client?></a></td>
                                                <td><a href="<?=site_url('portable?id='.$id_warranty)?>"><?php echo $location_warranty?></a></td>
                                                <td><a href="<?=site_url('portable?id='.$id_warranty)?>"><?php echo $code_product?></a></td>
                                                <td><a href="<?=site_url('portable?id='.$id_warranty)?>"><?php echo $model_warranty?></a></td>
                                                <td><a href="<?=site_url('portable?id='.$id_warranty)?>"><?php echo date("d/m/Y ", strtotime($next_service_warranty)) ?></a></td>
                                                <td><a href="<?=site_url('portable?id='.$id_warranty)?>"><?php echo date("d/m/Y ", strtotime($aw->start_date_warranty)) ?></a></td>
                                                <td><a href="<?=site_url('portable?id='.$id_warranty)?>"><?php echo $type_warranty ?></a></td>
                                                <td> <a href="<?=site_url('portable/generate_pdf?id='.$id_warranty.'&type='.$type_warranty)?>" title="portable" ><i class="fa fa-eye"></i></a>
                                                </td
                                                <?php } else if($type_warranty == 'Domestic') { ?> 
                                                <td><a href="<?=site_url('domestic?id='.$id_warranty)?>"><?php echo $aw->csr_no?></a></td>
                                                <td><a href="<?=site_url('domestic?id='.$id_warranty)?>"><?php echo $year_warranty?></a></td>
                                                <td><a href="<?=site_url('domestic?id='.$id_warranty)?>"><?php echo $name_client?></a></td>
                                                <td><a href="<?=site_url('domestic?id='.$id_warranty)?>"><?php echo $location_warranty?></a></td>
                                                <td><a href="<?=site_url('domestic?id='.$id_warranty)?>"><?php echo $code_product?></a></td>
                                                <td><a href="<?=site_url('domestic?id='.$id_warranty)?>"><?php echo $model_warranty?></a></td>
                                                <td><a href="<?=site_url('domestic?id='.$id_warranty)?>"><?php echo date("d/m/Y ", strtotime($next_service_warranty)) ?></a></td>
                                                <td><a href="<?=site_url('domestic?id='.$id_warranty)?>"><?php echo date("d/m/Y ", strtotime($aw->start_date_warranty)) ?></a></td>
                                                <td><a href="<?=site_url('domestic?id='.$id_warranty)?>"><?php echo $type_warranty ?></a></td>
                                                <td><a href="<?=site_url('domestic/generate_pdf?id='.$id_warranty.'&type='.$type_warranty)?>" title="domestic" ><i class="fa fa-eye"></i></a>
                                                </td
                                                 <?php }else {} ?>
                                             </tr>
                                                <?php }else if($status == '1'){?> 
                                                    
                                                     <tr>
                                                <?php if($type_warranty == 'Fixed'){ ?>
                                                <td><a href="<?=site_url('update_fixed?id='.$id_warranty)?>"><?php echo $aw->csr_no?></a></td>
                                                <td><a href="<?=site_url('update_fixed?id='.$id_warranty)?>"><?php echo $year_warranty?></a></td>
                                                <td><a href="<?=site_url('update_fixed?id='.$id_warranty)?>"><?php echo $name_client?></a></td>
                                                <td><a href="<?=site_url('update_fixed?id='.$id_warranty)?>"><?php echo $location_warranty?></a></td>
                                                <td><a href="<?=site_url('update_fixed?id='.$id_warranty)?>"><?php echo $code_product?></a></td>
                                                <td><a href="<?=site_url('update_fixed?id='.$id_warranty)?>"><?php echo $model_warranty?></a></td>
                                                <td><a href="<?=site_url('update_fixed?id='.$id_warranty)?>"><?php echo date("d/m/Y ", strtotime($next_service_warranty)) ?></a></td>
                                                <td><a href="<?=site_url('update_fixed?id='.$id_warranty)?>"><?php echo date("d/m/Y ", strtotime($aw->start_date_warranty)) ?></a></td>
                                                <td><a href="<?=site_url('update_fixed?id='.$id_warranty)?>"><?php echo $type_warranty ?></a></td>
                                                <td><a href="<?=site_url('fixed/generate_pdf?id='.$id_warranty.'&type='.$type_warranty)?>" title="fixed" ><i class="fa fa-eye"></i></a>
                                                </td>
                                                <?php } else if($type_warranty == 'Portable') { ?>
                                                <td><a href="<?=site_url('update_portable?id='.$id_warranty)?>"><?php echo $aw->csr_no?></a></td>
                                                <td><a href="<?=site_url('update_portable?id='.$id_warranty)?>"><?php echo $year_warranty?></a></td>
                                                <td><a href="<?=site_url('update_portable?id='.$id_warranty)?>"><?php echo $name_client?></a></td>
                                                <td><a href="<?=site_url('update_portable?id='.$id_warranty)?>"><?php echo $location_warranty?></a></td>
                                                <td><a href="<?=site_url('update_portable?id='.$id_warranty)?>"><?php echo $code_product?></a></td>
                                                <td><a href="<?=site_url('update_portable?id='.$id_warranty)?>"><?php echo $model_warranty?></a></td>
                                                <td><a href="<?=site_url('update_portable?id='.$id_warranty)?>"><?php echo date("d/m/Y ", strtotime($next_service_warranty)) ?></a></td>
                                                <td><a href="<?=site_url('update_portable?id='.$id_warranty)?>"><?php echo date("d/m/Y ", strtotime($aw->start_date_warranty)) ?></a></td>
                                                <td><a href="<?=site_url('update_portable?id='.$id_warranty)?>"><?php echo $type_warranty ?></a></td>
                                                <td> <a href="<?=site_url('portable/generate_pdf?id='.$id_warranty.'&type='.$type_warranty)?>" title="portable" ><i class="fa fa-eye"></i></a>
                                                </td
                                                <?php } else if($type_warranty == 'Domestic') { ?> 
                                                <td><a href="<?=site_url('update_domestic?id='.$id_warranty)?>"><?php echo $aw->csr_no?></a></td>
                                                <td><a href="<?=site_url('update_domestic?id='.$id_warranty)?>"><?php echo $year_warranty?></a></td>
                                                <td><a href="<?=site_url('update_domestic?id='.$id_warranty)?>"><?php echo $name_client?></a></td>
                                                <td><a href="<?=site_url('update_domestic?id='.$id_warranty)?>"><?php echo $location_warranty?></a></td>
                                                <td><a href="<?=site_url('update_domestic?id='.$id_warranty)?>"><?php echo $code_product?></a></td>
                                                <td><a href="<?=site_url('update_domestic?id='.$id_warranty)?>"><?php echo $model_warranty?></a></td>
                                                <td><a href="<?=site_url('update_domestic?id='.$id_warranty)?>"><?php echo date("d/m/Y ", strtotime($next_service_warranty)) ?></a></td>
                                                <td><a href="<?=site_url('update_domestic?id='.$id_warranty)?>"><?php echo date("d/m/Y ", strtotime($aw->start_date_warranty)) ?></a></td>
                                                <td><a href="<?=site_url('update_domestic?id='.$id_warranty)?>"><?php echo $type_warranty ?></a></td>
                                                <td><a href="<?=site_url('domestic/generate_pdf?id='.$id_warranty.'&type='.$type_warranty)?>" title="domestic" ><i class="fa fa-eye"></i></a>
                                                </td
                                                 <?php }else {} ?>
                                             </tr>
                                                    
                                            <?php } } ?>
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
            
                                               
                                    
                                               