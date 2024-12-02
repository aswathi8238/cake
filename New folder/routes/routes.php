<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['logout'] = 'login/logout';
$route['change-password'] = 'login/change_password';

$route['employee-list'] = 'employee';
$route['employee-list/(:any)'] = 'employee/supplier_employee_list/$1';
$route['own-employee-add'] = 'employee/add_own';
$route['own-employee-edit/(:any)'] = 'employee/edit_own/$1';
$route['employee-view/(:any)'] = 'employee/view/$1';
$route['outsourced-employee-add'] = 'employee/add_outsourced';
$route['outsourced-employee-edit/(:any)'] = 'employee/edit_outsourced/$1';
$route['employee-mobilize/(:any)'] = 'employee/mobilize/$1';
$route['employee-mobilize'] = 'employee/mobilize';
$route['employee-abscond/(:any)'] = 'employee/abscond/$1';
$route['employee-abscond'] = 'employee/abscond';
$route['employee-vacation/(:any)'] = 'employee/vacation/$1';
$route['employee-vacation'] = 'employee/vacation';
$route['employee-cancel/(:any)'] = 'employee/cancel/$1';
$route['employee-cancel'] = 'employee/cancel';
$route['employee-documents/(:any)'] = 'employee/documents/$1';
$route['employee-history/(:any)'] = 'employee/history/$1';
$route['employee-history'] = 'employee/history';
$route['employee-manage'] = 'employee/manage';
$route['crew-list/(:any)'] = 'employee/crew_list/$1';
$route['crew-list'] = 'employee/crew_list';
$route['employee-list-for-supplier/(:any)'] = 'employee/supplier_employee_list/$1';
$route['employee-list-for-supplier'] = 'employee/supplier_employee_list';
$route['employee-list-on-passport-expiry/(:any)'] = 'employee/passport_expiry_employee_list/$1';
$route['employee-list-on-passport-expiry'] = 'employee/passport_expiry_employee_list';

$route['client-trn/(:any)'] = 'client/trn/$1';

$route['site-add'] = 'site/add';
$route['site-edit/(:any)'] = 'site/edit/$1';

$route['employee-list-on-passport-expiry'] = 'employee/passport_expiry_employee_lists';
$route['employee-vaccination/(:any)'] = 'employee/vaccination/$1';
$route['employee-vaccination'] = 'employee/vaccination';
$route['employee-settings'] = 'employee/settings';

$route['employee-group-insurance-not-initiated'] = 'employee/group_insurance_not_initiated_employees';
$route['employee-group-insurance-pending'] = 'employee/group_insurance_pending_employees';

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
$route['default_controller'] = 'login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
