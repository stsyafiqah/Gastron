<style>

.signature-pad {
  position: relative;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
      -ms-flex-direction: column;
          flex-direction: column;
  font-size: 10px;
  width: 100%;
  height: 100%;
  max-width: 700px;
  max-height: 460px;
  border: 1px solid #e8e8e8;
  background-color: #fff;
  box-shadow: 0 1px 4px rgba(0, 0, 0, 0.27), 0 0 40px rgba(0, 0, 0, 0.08) inset;
  border-radius: 4px;
  padding: 16px;
     border: 1px;
}

.signature-pad::before,
.signature-pad::after {
  position: absolute;
  z-index: -1;
  content: "";
  width: 40%;
  height: 10px;
  bottom: 10px;
  background: transparent;
  box-shadow: 0 8px 12px rgba(0, 0, 0, 0.4);
}

.signature-pad::before {
  left: 20px;
  -webkit-transform: skew(-3deg) rotate(-3deg);
          transform: skew(-3deg) rotate(-3deg);
}

.signature-pad::after {
  right: 20px;
  -webkit-transform: skew(3deg) rotate(3deg);
          transform: skew(3deg) rotate(3deg);
}

.signature-pad--body {
  position: relative;
  -webkit-box-flex: 1;
      -ms-flex: 1;
          flex: 1;
  border: 1px solid #f4f4f4;
}

.signature-pad--body
canvas {
  position: top;
  left: 0;
  top: 0;
  width: 50%;
  height: 200px;
  border-radius: 4px;
  box-shadow: 0 0 5px rgba(0, 0, 0, 0.02) inset;
}

.signature-pad--footer {
  color: #C3C3C3;
  text-align: center;
  font-size: 1.2em;
  margin-top: 8px;
   
}

.signature-pad--actions {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-pack: justify;
      -ms-flex-pack: justify;
          justify-content: space-between;
  margin-top: 8px;
}

#github img {
  border: 0;
}

@media (max-width: 940px) {
  #github img {
    width: 90px;
    height: 90px;
  }
}


</style>

<?php


foreach($profile as $p){
    //pre($profile);
    //die();
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
                        <h3 class="text-themecolor m-b-0 m-t-0">Profile</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Gastron</a></li>
                            <li class="breadcrumb-item active">Profile</li>
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
                                 <form id="wizard-clickable" class="frm_wizard frm_wizard_check" method="POST" action="<?=site_url('self_update?id='.$id_technician)?>" enctype="multipart/form-data"  novalidate>
                                    <div class="form-group">
                                        <label class="col-md-12">Full Name</label>
                                        <div class="col-md-12">
                                            <input type="text" value="<?php echo $name_technician ?>" name="name_technician" class="form-control form-control-line">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-email" class="col-md-12">Email</label>
                                        <div class="col-md-12">
                                            <input type="email" value="<?php echo $email_technician ?>" name="email_technician"  class="form-control form-control-line" name="example-email" id="example-email">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-12">Phone No</label>
                                        <div class="col-md-12">
                                            <input type="text" value="<?php echo $phone_technician ?>" name="phone_technician"  class="form-control form-control-line">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Signature</label>
                                        <?php if ($p->sign_technician == ''){ ?>
                                        <div class="col-md-12">
                                           <div id="signature-pad" class="signature-pad">
                                        <div class="signature-pad--body">
                                         <textarea name="signature_image" id="signature_image" style="display:none;"></textarea>
                                          <canvas class="signature-pad--body canvas"></canvas>
                                        </div>
                                        <div class="signature-pad--footer">
                                          <div class="description">Sign above</div>

                                          <div class="signature-pad--actions">
                                            <div>
                                              <button type="button" class="button clear" data-action="clear">Clear</button>
                                              <!--<button type="button" class="button" data-action="change-color">Change color</button>-->
                                              <!--<button type="button" class="button" data-action="undo">Undo</button>-->

                                            </div>
                                            <div>
                                              <!--<button type="button" class="button save" data-action="save-png">Save as PNG</button>-->
                                              <!--<button type="button" class="button save" data-action="save-jpg">Save as JPG</button>-->
                                              <!--<button type="button" class="button save" data-action="save-svg">Save as SVG</button>-->
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                        </div>
                                        <?php }else{ ?>
                                       <img src="http://cloone.my/demo/Gastron/asset_signature/signature/<?php echo $id_technician ?>.png">
                                         <a href="<?=site_url('change_signature')?>" class="nav-link text-muted waves-effect waves-dark">        <button type="button" class="btn btn-info button-submit">Change Signature</button></a>
                                        <?php } ?>
                                       
                                    </div>
                                     
                                   <input type="hidden" name="id_technician" value="<?php echo $id_technician ?>">
                                     <input type="hidden" name="signature_image" value="<?php echo $p->sign_technician ?>">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            
                                             
                                            <button class="btn btn-success button-submit">Update Profile</button>
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
            