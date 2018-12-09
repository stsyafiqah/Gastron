<!DOCTYPE html>
<html>
    <head>
        <?php if($index_header) echo $index_header ;?>
    </head>

   <body class="fix-header fix-sidebar card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
                <!-- ########## START: HEAD PANEL ########## -->
                <?php if($index_top_menu) echo $index_top_menu ;?>
                <!-- ########## END: HEAD PANEL ########## -->
        </header>
            <!-- Top Bar End -->

        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
                <!-- ########## START: LEFT PANEL ########## -->
                <?php if($index_left_menu) echo $index_left_menu ;?>
                <!-- ########## END: LEFT PANEL ########## -->
           <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->


            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
             <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">

             <?php //flash_output('notis'); ?>
             <?php if($middle) echo $middle ;?>
            
                <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
                © 2018 Gastron
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
    
    <script src="<?php echo base_url(); ?>asset_signature/docs/js/signature_pad.umd.js"></script>
    <script src="<?php echo base_url(); ?>asset_signature/docs/js/app.js"></script>   
       
    <script src="<?php echo base_url(); ?>dist/sweetalert-dev.js"></script>
    <script src="<?php echo base_url(); ?>dist/sweetalert.min.js"></script>   
       
       
    <script src="<?php echo base_url(); ?>asset/assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo base_url(); ?>asset/assets/plugins/bootstrap/js/tether.min.js"></script>
    <script src="<?php echo base_url(); ?>asset/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?php echo base_url(); ?>asset/js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="<?php echo base_url(); ?>asset/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="<?php echo base_url(); ?>asset/js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="<?php echo base_url(); ?>asset/assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!--Custom JavaScript -->
    <script src="<?php echo base_url(); ?>asset/js/custom.min.js"></script>
       
     
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!-- Flot Charts JavaScript -->
    <script src="<?php echo base_url(); ?>asset/assets/plugins/flot/jquery.flot.js"></script>
    <script src="<?php echo base_url(); ?>asset/assets/plugins/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
    <script src="<?php echo base_url(); ?>asset/js/flot-data.js"></script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="<?php echo base_url(); ?>asset/assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
       
    <!-- DataTables JavaScript -->
    <script src="<?php echo base_url(); ?>vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables').DataTable({
            responsive: true
        });
    });
    </script>
       
        <script type="text/javascript">
        $(document).ready(function(){
           $('#war_product').on('change', function(){
                var product_id = $(this).val();
                var dataString = "product_id="+product_id;
               console.log(product_id);
 
                if(product_id == '')
                {
                    $('#war_model').prop('disabled', true);
                }
                else
                {
                    
                    $('#war_model').prop('disabled', false);
                    $.ajax({
                        type: "POST",
                        url:"<?=site_url('warranty/select_model')?>",
                        data: dataString,
                        //dataType: 'json',
                        cache   : false,
                        success: function(model){
                           $('#war_model').html(model);
                           // console.log(model);
//                              $.each(model, function(value, key) {
//                $("#war_model").append("<option value="+value.id_model+">"+value.code_model+"</option>");
//            })
                        },
                        error: function(){
                            alert('Error occur...!!');
                        
                        }
                    });
                }
           }); 
        });
    </script>
      
       <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />-->
		
<!--<script>
    $(document).ready(function(){
        
	var i=1;
	$('#add').click(function(){
		i++;
		$('#dynamic_field').append('<tr id="row'+i+'"><td><div class="md-form mb-3"><input type="text" class="form-control validate" name="war_ser[]" placeholder="Serial number"></div></td><td><div class="md-form mb-3"><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></div></td></tr>');
       
	});
	
	$(document).on('click', '.btn_remove', function(){
		var button_id = $(this).attr("id"); 
		$('#row'+button_id+'').remove();
	});
	
});
</script>-->
       
<script>
    $(document).ready(function(){
    $('#war_type').on('change', function(){
        var product_type =  $(this).val();
        var dataString = "product_type="+product_type;
        console.log(product_type);
                
        if(product_type == ''){
                    
                $('#add').prop('disabled', true);
        }
        else if(product_type == 'Domestic')
        {
                $('#add').prop('disabled', true);
        }
        else if(product_type == 'Portable'){
                    
                $('#add').prop('disabled', true);
                    
        }
        else
        {
                $('#add').prop('disabled', false);
                    
                var i=1;
                $('#add').click(function(){
                i++; 
                $('#dynamic_field').append('<tr id="row'+i+'"><td><div class="md-form mb-3"><input type="text" class="form-control validate" name="war_ser[]" placeholder="Serial number"></div></td><td><div class="md-form mb-3"><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></div></td></tr>');
                   
                 /*$('#dynamic_field').append('<tr id="row"><td><div class="md-form mb-3"><input type="text" class="form-control validate" name="war_ser[]" placeholder="Serial number"></div></td><td><div class="md-form mb-3"><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></div></td></tr>');*/

                });
                
                $(document).on('click', '.btn_remove', function(){
                    var button_id = $(this).attr("id"); 
                    $('#row'+button_id+'').remove();
                    //$('#row').remove();
                });
	
        };
        });
        });
</script>
   
       
       <script>

jQuery(document).ready(function($) {
    $(".clickable-row").click(function() {
        window.location = $(this).data("href");
    });
});


</script>
       
</body>

</html>
