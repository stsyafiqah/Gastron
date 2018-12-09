<?php


foreach($profile as $p){
    
     $id_technician = $p->id_technician;
    $name_technician = $p->name_technician;
    $phone_technician = $p->phone_technician;
    $email_technician = $p->email_technician;
    
}

?>
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-6 col-8 align-self-center">
                        <h3 class="text-themecolor m-b-0 m-t-0">Change Password</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Gastron</a></li>
                            <li class="breadcrumb-item active">Change Password</li>
                        </ol>
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
                   
                </div>  <div class="row">
                    <!-- Column -->
                   <!-- <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card">
                            <div class="card-block">
                                <center class="m-t-30"> <img src="<?php echo base_url(); ?>asset/assets/images/profile.png" class="img-circle" width="150" />
                                    <h4 class="card-title m-t-10">Hanna Gover</h4>
                                    <h6 class="card-subtitle">Accoubts Manager Amix corp</h6>
                                    <div class="row text-center justify-content-md-center">
                                        <div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-people"></i> <font class="font-medium">254</font></a></div>
                                        <div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-picture"></i> <font class="font-medium">54</font></a></div>
                                    </div>
                                </center>
                            </div>
                        </div>
                    </div>-->
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                            <div class="card-block">
                                 <form id="wizard-clickable" class="frm_wizard frm_wizard_check" method="POST" action="<?=site_url('password?id='.$id_technician)?>" enctype="multipart/form-data"  novalidate>
                                    <div class="form-group">
                                        <label class="col-md-12">Old Password</label>
                                        <div class="col-md-12">
                                            <input type="password" name="old_password" class="form-control form-control-line">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-email" class="col-md-12">New Password</label>
                                        <div class="col-md-12">
                                            <input type="password" name="new_password"  class="form-control form-control-line" name="example-email" id="example-email">
                                        </div>
                                    </div>                           
                                     
                                   <input type="hidden" name="id_technician" value="<?php echo $id_technician ?>">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button class="btn btn-success">Change Password</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
                <!-- Row -->
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
            </div>
            
  