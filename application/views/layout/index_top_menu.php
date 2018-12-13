<nav class="navbar top-navbar navbar-toggleable-sm navbar-light">
    <!-- ============================================================== -->
    <!-- Logo -->
    <!-- ============================================================== -->
    <div class="navbar-header">
       <!-- <a class="navbar-brand" href="<?=site_url('dashboard')?>">-->
            <!-- Logo icon -->
            <b>
                <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                <!-- Dark Logo icon -->
                <img src="<?php echo base_url(); ?>asset/assets/images/gastron.png" alt="homepage" class="dark-logo" />

            </b>
            <!--End Logo icon -->
            <!-- Logo text -->
            <!-- <span>
dark Logo text 
<img src="<?php echo base_url(); ?>asset/assets/images/logo-text.png" alt="homepage" class="dark-logo" />
</span>-->
        <!--</a>-->
        <hr>
    </div>
    <hr>
    <!-- ============================================================== -->
    <!-- End Logo -->
    <!-- ============================================================== -->
    <div class="navbar-collapse">

        <!-- ============================================================== -->
        <!-- toggle and nav items -->
        <!-- ============================================================== -->



        <ul class="navbar-nav mr-auto mt-md-0 ">
            <!-- This is  -->
            <!--<li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
<li class="nav-item hidden-sm-down">
<form class="app-search p-l-20">
<input type="text" class="form-control" placeholder="Search for..."> <a class="srh-btn"><i class="ti-search"></i></a>
</form>
</li>-->
        </ul>
        <!-- ============================================================== -->
        <!-- User profile and search -->
        <!-- ============================================================== -->

        <ul class="navbar-nav my-lg-0">
            <li class="nav-item dropdown">
                <a href="" class="nav-link dropdown-toggle text-muted waves-effect waves-dark" data-toggle="dropdown" aria-expanded="true">
                    <span style="color: white;"><?=$this->session->name_technician?></span>
                    <i class="fa fa-user m-r-10" aria-hidden="true"></i>&nbsp;&nbsp;
                </a>

                <ul class="dropdown-menu dropdown-menu-right arrow-dropdown-menu arrow-menu-right user-list notify-list">
                    <li><a href="<?=site_url('profile')?>" class="nav-link text-muted waves-effect waves-dark"> Profile</a></li>
                    <li><a href="<?=site_url('change_password')?>" class="nav-link text-muted waves-effect waves-dark"> Change Password</a></li>
                     <!--<li><a href="<?=site_url('change_signature')?>" class="nav-link text-muted waves-effect waves-dark"> Change Signature</a></li>-->
                    <div class="dropdown-divider"></div>
                    <li><a href="<?=site_url('logout')?>" class="nav-link text-muted waves-effect waves-dark"> Logout</a></li>
                </ul>
               <!-- <div class="dropdown-menu dropdown-menu-right arrow-dropdown-menu arrow-menu-right user-list notify-list">
                    <a href="<?=site_url('profile')?>"> Profile</a>
                    <a href="<?=site_url('change-password')?>"> Setting</a>
                    <a href="<?=site_url('change-password')?>"> Help</a>
                    <div class="dropdown-divider"></div>
                    <a href="<?=site_url('logout')?>"> Logout</a>
                </div>-->



            </li>

        </ul>

    </div>
</nav>
        