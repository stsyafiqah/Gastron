 <?php if(!empty($this->session->type_technician == "Admin")){ ?>
<!-- Sidebar scroll-->
<div class="scroll-sidebar">
    <!-- Sidebar navigation-->
    <nav class="sidebar-nav">
        <ul id="sidebarnav">
            <!--<li>
                <a href="<?=site_url('dashboard')?>" class="waves-effect"><i class="fa fa-clock-o m-r-10" aria-hidden="true"></i>Dashboard</a>
            </li>-->
            <li>
                <a href="<?=site_url('warranty')?>" class="waves-effect"><i class="fa fa-shield m-r-10" aria-hidden="true"></i>Warranty</a>
            </li>
            <li>
                <a href="<?=site_url('services')?>" class="waves-effect"><i class="fa fa-headphones m-r-10" aria-hidden="true"></i>Services</a>
            </li>
            <li>
                <a href="<?=site_url('client')?>" class="waves-effect"><i class="fa fa-users m-r-10" aria-hidden="true"></i> Client</a>
            </li>
            <li class="dropdown">
                <a href="javascript: void(0);" aria-expanded="false" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cog" ></i> Setup <span class="caret"></span></a>
                <ul class="dropdown">
                   <!-- <li>
                        <a href="<?=site_url('client')?>" class="waves-effect"><i class="fa fa-users m-r-10" aria-hidden="true"></i> Client</a>
                    </li>-->
                    <li>
                        <a href="<?=site_url('technician')?>" class="waves-effect"><i class="fa fa-user m-r-10" aria-hidden="true"></i> Technician</a>
                    </li>
                    <li>
                        <a href="<?=site_url('product')?>" class="waves-effect"><i class="fa fa-cube m-r-10" aria-hidden="true"></i> Product</a>
                    </li>
                    <li>
                        <a href="<?=site_url('model')?>" class="waves-effect"><i class="fa fa-th-large m-r-10" aria-hidden="true"></i> Model</a>
                    </li>

                </ul>
            </li>


        </ul>

    </nav>
    <!-- End Sidebar navigation -->
</div>
            <!-- End Sidebar scroll-->
 <?php }else{ ?>

<!-- Sidebar scroll-->
<div class="scroll-sidebar">
    <!-- Sidebar navigation-->
    <nav class="sidebar-nav">
        <ul id="sidebarnav">
            <!--<li>
                <a href="<?=site_url('dashboard')?>" class="waves-effect"><i class="fa fa-clock-o m-r-10" aria-hidden="true"></i>Dashboard</a>
            </li>-->
            <li>
                <a href="<?=site_url('warranty_tech')?>" class="waves-effect"><i class="fa fa-shield m-r-10" aria-hidden="true"></i>Warranty</a>
            </li>
            <li>
                <a href="<?=site_url('services_tech')?>" class="waves-effect"><i class="fa fa-headphones m-r-10" aria-hidden="true"></i>Services</a>
            </li>

        </ul>

    </nav>
    <!-- End Sidebar navigation -->
</div>
            <!-- End Sidebar scroll-->

<?php } ?>