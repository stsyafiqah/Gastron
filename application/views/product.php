<style>

    input[type=text] {
    background: transparent;
    border: none;
    border-bottom: 1px solid #000000;
}
     input[type=email] {
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
                        <h3 class="text-themecolor m-b-0 m-t-0">Product</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Gastron</a></li>
                            <li class="breadcrumb-item active">Setup</li>
                            <li class="breadcrumb-item active">Product</li>
                        </ol>
                    </div>
                   <div class="col-md-6 col-4 align-self-center">
                       
                        <button type="button" class="btn pull-right btn-success btn_add" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"> Add New Product</i></button>
                    </div>
                </div>
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header text-center">
                                <h4 class="modal-title w-100 font-weight-bold">Add New Product</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                             <form id="wizard-clickable" class="frm_wizard frm_wizard_check" method="POST" action="<?=site_url('insert_product')?>" enctype="multipart/form-data"  novalidate>
                            <div class="modal-body mx-3">
                                <div class="md-form mb-3">
                                  <!--  <i class="fa fa-user prefix grey-text"></i>-->
                                    <label data-error="wrong" data-success="right" for="form34">Product</label>
                                    <input type="text" id="form34" class="form-control validate" name="code_product" placeholder="Product Code">
                                    
                                </div>

                                <div class="md-form mb-3">
                                   <!-- <i class="fa fa-envelope prefix grey-text"></i>-->
                                    <label data-error="wrong" data-success="right" for="form29">Description</label>
                                    <input type="email" id="form8" class="form-control validate" name="desc_product" placeholder="Product Description">
                                </div>

                                
                            </div>
                            <div class="modal-footer d-flex justify-content-center">
                                <button class="btn btn-success" name="add_client">Add Product</button>
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
                                                <th>No</th>
                                                <th>Product Code</th>
                                                <th>Product Description</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                <?php 		
                            
                            $key=0;
							foreach($all_product as $ap)
                            {	
                              $key++;    
                              $id_product          = $ap->id_product;
                              $code_product        = $ap->code_product;
                              $desc_product       = $ap->desc_product;
                              
                              ?>
                                            <tr>
                                                <td><?php echo $key ?></td>
                                                <td><?php echo $code_product ?></td>
                                                <td><?php echo $desc_product ?></td>
                                                    <td><a href="javascript:void(0)" ids="<?php echo $id_product ?>" title="delete the appraisal form" data-toggle="modal" data-target="#edit_product<?php echo $id_product ?>"><i class="fa fa-pencil"></i></a> 
                                                <div class="modal fade" id="edit_product<?php echo $id_product ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header text-center">
                                                            <h4 class="modal-title w-100 font-weight-bold">Update Product</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                         <form id="wizard-clickable" class="frm_wizard frm_wizard_check" method="POST" action="<?=site_url('update_product?id='.$id_product)?>" enctype="multipart/form-data"  novalidate>
                                                        <div class="modal-body mx-3">
                                                            <div class="form-group md-form mb-3">
                                                               <!-- <i class="fa fa-user prefix grey-text"></i>-->
                                                                <label data-error="wrong" data-success="right" for="form34">Product</label>
                                                                <input type="text" id="form34" class="form-control validate" name="code_product" placeholder="Name" value="<?php echo $code_product ?>">

                                                            </div>

                                                            <div class="form-group md-form mb-3">
                                                               <!-- <i class="fa fa-envelope prefix grey-text"></i>-->
                                                                <label data-error="wrong" data-success="right" for="form29">Description</label>
                                                                <input type="text" id="form8" class="form-control validate" name="desc_product" placeholder="Email" value="<?php echo $desc_product ?>">
                                                            </div>

                                                             <input type="hidden" id="form8" class="form-control validate" name="id_product" value="<?php echo $id_product ?>">
                                                        </div>
                                                        <div class="modal-footer d-flex justify-content-center">
                                                            <button class="btn btn-success" name="add_client">Update Product</button>
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                                <a href="javascript:void(0)" ids="<?php echo $id_product ?>" title="Delete Product" data-toggle="modal" data-target="#delete_product<?php echo $id_product ?>"><i class="fa fa-trash text-danger"></i></a>
                                                <div class="modal fade" id="delete_product<?php echo $id_product ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header text-center">
                                                            <h4 class="modal-title w-100 font-weight-bold">Delete Product</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                         <form id="wizard-clickable" class="frm_wizard frm_wizard_check" method="POST" action="<?=site_url('delete_product?id='.$id_product)?>" enctype="multipart/form-data"  novalidate>
                                                        <div class="modal-body mx-10">
                                                            
                                                            
                                                            <b>Are you sure to delete this product <?php echo $code_product ?> ?</b>
                                                            
                                                             
                                                            <input type="hidden" id="form8" class="form-control validate" name="id_product" value="<?php echo $id_product ?>">
                                                        </div>
                                                        <div class="modal-footer d-flex justify-content-center">
                                                            <button class="btn btn-success">Delete Product</button>
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                                
                                                </td>
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
            