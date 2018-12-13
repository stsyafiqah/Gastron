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
input[type=password] {
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
                        <h3 class="text-themecolor m-b-0 m-t-0">Technician</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Gastron</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Setup</a></li>
                            <li class="breadcrumb-item active">Technician</li>
                        </ol>
                    </div>
                    <div class="col-md-6 col-4 align-self-center">
                       
                        <button type="button" class="btn pull-right btn-success btn_add" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"> Add New Technician</i></button>
                    </div>
                </div>
                
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header text-center">
                                <h4 class="modal-title w-100 font-weight-bold">Add New Technician</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                             <form id="wizard-clickable" class="frm_wizard frm_wizard_check" method="POST" action="<?=site_url('insert_technician')?>" enctype="multipart/form-data"  novalidate>
                            <div class="modal-body mx-3">
                                <div class="md-form mb-3">
                                    <!--<i class="fa fa-user prefix grey-text"></i>-->
                                    <label data-error="wrong" data-success="right" for="form34">Name</label>
                                    <input type="text" id="form34" class="form-control validate" name="name_technician" placeholder="Name">
                                    
                                </div>

                                <div class="md-form mb-3">
                                   <!-- <i class="fa fa-envelope prefix grey-text"></i>-->
                                    <label data-error="wrong" data-success="right" for="form29">Email</label>
                                    <input type="email" id="form8" class="form-control validate" name="email_technician" placeholder="Email">
                                </div>

                                <div class="md-form mb-3">
                                    <!--<i class="fa fa-tag prefix grey-text"></i>-->
                                     <label data-error="wrong" data-success="right" for="form32">Phone</label>
                                    <input type="text" id="form8" class="form-control validate" name="phone_technician" placeholder="Phone">
                                </div>
                            
                            </div>
                            <div class="modal-footer d-flex justify-content-center">
                                <button class="btn btn-success" name="add_technician">Add Technician</button>
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
                                <!--<div class="table-responsive">-->
                                   <table width="100%" class="table table-bordered table-hover" id="dataTables">
                                        <thead>
                                            <tr>
                                                <th width="5%">No</th>
                                                <th>Name</th>
                                                <th>Phone</th>
                                                <th>Email</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 		

                                                $key=0;
                                                foreach($all_technician as $ac)
                                                {	
                                                  $key++;    
                                                  $id_technician          = $ac->id_technician;
                                                  $name_technician        = $ac->name_technician;
                                                  $phone_technician       = $ac->phone_technician;
                                                  $email_technician       = $ac->email_technician;
                                            ?>
                                            <tr>
                                                <td><?php echo $key?></td>
                                                <td><?php echo $name_technician ?></td>
                                                <td><?php echo $phone_technician ?></td>
                                                <td><?php echo $email_technician ?></td>
                                                <td><a href="javascript:void(0)" ids="<?php echo $id_technician ?>" title="delete the appraisal form" data-toggle="modal" data-target="#edit_client<?php echo $id_technician ?>"><i class="fa fa-pencil"></i></a> 
                                                <div class="modal fade" id="edit_client<?php echo $id_technician ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header text-center">
                                                            <h4 class="modal-title w-100 font-weight-bold">Update Client</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                         <form id="wizard-clickable" class="frm_wizard frm_wizard_check" method="POST" action="<?=site_url('update_technician?id='.$id_technician)?>" enctype="multipart/form-data"  novalidate>
                                                        <div class="modal-body mx-3">
                                                            <div class="form-group md-form mb-3">
                                                               <!-- <i class="fa fa-user prefix grey-text"></i>-->
                                                                <label data-error="wrong" data-success="right" for="form34">Name : </label>
                                                                <input type="text" id="form34" class="form-control validate" name="name_technician" placeholder="Name" value="<?php echo $name_technician ?>">

                                                            </div>

                                                            <div class="form-group md-form mb-3">
                                                                <!--<i class="fa fa-envelope prefix grey-text"></i>-->
                                                                <label data-error="wrong" data-success="right" for="form34">Email : </label>
                                                                <input type="email" id="form34" class="form-control validate" name="email_technician" placeholder="Email" value="<?php echo $email_technician ?>">
                                                            </div>

                                                            <div class="form-group md-form mb-3">
                                                                <!--<i class="fa fa-tag prefix grey-text"></i>-->
                                                                 <label data-error="wrong" data-success="right" for="form34">Model : </label>
                                                                <input type="text" id="form34" class="form-control validate" name="phone_technician" placeholder="Phone" value="<?php echo $phone_technician ?>">
                                                            </div>
                                                            <input type="hidden" id="form8" class="form-control validate" name="id_technician" value="<?php echo $id_technician ?>">
                                                        </div>
                                                        <div class="modal-footer d-flex justify-content-center">
                                                            <button class="btn btn-success" name="add_client">Update Client</button>
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                                <a href="javascript:void(0)" ids="<?php echo $id_technician ?>" title="Delete Technician" data-toggle="modal" data-target="#delete_tech<?php echo $id_technician ?>"><i class="fa fa-trash text-danger"></i></a> 
                                                <div class="modal fade" id="delete_tech<?php echo $id_technician ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header text-center">
                                                            <h4 class="modal-title w-100 font-weight-bold">Delete Technician</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                         <form id="wizard-clickable" class="frm_wizard frm_wizard_check" method="POST" action="<?=site_url('delete_technician?id='.$id_technician)?>" enctype="multipart/form-data"  novalidate>
                                                        <div class="modal-body mx-10">
                                                            
                                                            
                                                            <b>Are you sure to delete this Teachnician <?php echo $name_technician ?> ?</b>
                                                            
                                                             
                                                            <input type="hidden" id="form8" class="form-control validate" name="id_technician" value="<?php echo $id_technician ?>">
                                                        </div>
                                                        <div class="modal-footer d-flex justify-content-center">
                                                            <button class="btn btn-success">Delete Technician</button>
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
                               <!-- </div>-->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Row -->
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
            </div>
 <script type="text/javascript">

$(function(){
	
	
   $('.btn_del').on('click',function(){
		loading_on();
		var ids = $(this).attr('ids');
		console.log(ids);
		swal({
            title: 'Are you sure?',
            text: "",
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, Remove!',
            cancelButtonText: 'Cancel',
            confirmButtonClass: 'btn-danger',
            cancelButtonClass: 'btn-default',
            // buttonsStyling: false
        }).then(function () {
            var dataString = "ids="+ids;
            console.log(dataString);
		    $.ajax({
		        type    : "POST",
		        url     : "<?php echo site_url('td_con/program/program_remove')?>",
		        data    : dataString,
		        dataType: 'json',
		        cache   : false,
		        success : function(data)
		        {
		        	//alert(data);
		        	console.log("remove",data);
		        	
		        	swal({
	                    title: "Removed!",
	                    text: "",
	                    type: "success"
	                }).then(function() {
	                	loading_off();
	                    location.href = "<?=site_url('program')?>";
	                });
		        }
		    });
        }, function (dismiss) {
            // dismiss can be 'cancel', 'overlay',
            // 'close', and 'timer'
            // if (dismiss === 'cancel') {
            //     loading_off();
            // }
            loading_off();
        });
	});

});


</script>