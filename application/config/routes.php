<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'start';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/*=====================================================================

                    Start

=======================================================================*/


$route['login'] 			= 'start/login';
$route['go-login'] 			= 'start/login_submit';
$route['logout'] 			= 'start/logout';


 /*=====================================================================

                    dashbord

=======================================================================*/


$route['dashboard'] 		= 'dashboard/index';



 /*=====================================================================

                     warranty

=======================================================================*/

$route['model'] 			  = 'warranty/model';
$route['insert_warranty']     = 'warranty/insert_warranty';
$route['product'] 			  = 'warranty/product';
$route['warranty'] 			  = 'warranty/warranty';
$route['warranty_tech'] 	  = 'warranty/warranty_id';
$route['services'] 			  = 'warranty/services';
$route['services_tech'] 	  = 'warranty/services_id';
$route['select_model'] 		  = 'warranty/select_model';
$route['portable'] 		  = 'warranty/services_portable';
$route['domestic'] 		  = 'warranty/services_domestic';
$route['fixed'] 		  = 'warranty/services_fixed';


/*=====================================================================

                     technician

======================================================================*/

$route['technician'] 			= 'technician/index';
$route['insert_technician']     = 'technician/insert_technician';
$route['update_technician']     = 'technician/update_technician';
$route['profile']               = 'technician/profile';
$route['self_update']           = 'technician/self_update';
$route['change_password']           = 'technician/change_password';
$route['password']           = 'technician/change_passwords';
$route['delete_technician']     = 'technician/delete_technician';

/*=====================================================================

                        client

=======================================================================*/

$route['client'] 			= 'client/index';
$route['insert_client']     = 'client/insert_client';
$route['update_client']     = 'client/update_client';
$route['delete_client']     = 'client/delete_client';

/*=====================================================================

                        product

=======================================================================*/

$route['product'] 			 = 'product/index';
$route['insert_product']     = 'product/insert_product';
$route['update_product']     = 'product/update_product';
$route['delete_product']     = 'product/delete_product';


/*=====================================================================

                        model

=======================================================================*/

$route['model'] 			= 'model/index';
$route['insert_model']      = 'model/insert_model';
$route['update_model']      = 'model/update_model';
$route['delete_model']     = 'model/delete_model';
/*=====================================================================

                        portable

=======================================================================*/

$route['insert_portable'] 			= 'portable/insert_portable';
$route['update_portable'] 		  = 'portable/services_portable';
$route['upd_portable'] 		  = 'portable/update_portable';

/*=====================================================================

                        domestic

=======================================================================*/

$route['insert_domestic'] 			= 'domestic/insert_domestic';
$route['update_domestic'] 		  = 'domestic/services_domestic';
$route['upd_domestic'] 		  = 'domestic/update_domestic';

/*=====================================================================

                        fixed

=======================================================================*/

$route['insert_fixed'] 			= 'fixed/insert_fixed';
$route['update_fixed'] 		  = 'fixed/services_fixed';
$route['upd_fixed'] 		  = 'fixed/update_fixed';

