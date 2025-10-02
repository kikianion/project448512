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
|	https://codeigniter.com/userguide3/general/routing.html
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
$route['login'] = 'login';
$route['login/authenticate'] = 'login/authenticate';
$route['logout'] = 'login/logout';
$route['dashboard'] = 'dashboard';

$route['admsistem'] = 'admSistem';
$route['admsistem/users'] = 'admsistem/users';
$route['admsistem/users/create'] = 'admsistem/create_user';
$route['admsistem/users/edit/(:num)'] = 'admsistem/edit_user/$1';
$route['admsistem/users/delete/(:num)'] = 'admsistem/delete_user/$1';
$route['admsistem/settings'] = 'admsistem/settings';
$route['admsistem/logs'] = 'admsistem/logs';
// Route for saving visi from the Master Visi form
$route['admsistem/save_visi'] = 'admSistem/save_visi';
$route['admsistem/visiById/(:num)'] = 'admSistem/visiById/$1';
$route['admsistem/setStatus_visi/(:num)'] = 'admSistem/setStatus_visi/$1';

// Master misi CRUD
$route['admsistem/save_misi'] = 'admSistem/save_misi';
$route['admsistem/misiById/(:num)'] = 'admSistem/misiById/$1';
$route['admsistem/setStatus_misi/(:num)'] = 'admSistem/setStatus_misi/$1';

// Master user CRUD (table `user`)
$route['admsistem/save_master_user'] = 'admSistem/save_master_user';
$route['admsistem/edit_master_user/(:any)'] = 'admSistem/edit_master_user/$1';
$route['admsistem/delete_master_user/(:any)'] = 'admSistem/delete_master_user/$1';
$route['admsistem/userById/(:num)'] = 'admSistem/userById/$1';
$route['admsistem/setStatus_user/(:num)'] = 'admSistem/setStatus_user/$1';
$route['admsistem/reset_password'] = 'admSistem/reset_password';

// Master mitra CRUD (table `mitra`)
$route['admsistem/save_master_mitra'] = 'admSistem/save_master_mitra';
$route['admsistem/edit_master_mitra/(:num)'] = 'admSistem/edit_master_mitra/$1';
$route['admsistem/delete_master_mitra/(:num)/(:any)'] = 'admSistem/delete_master_mitra/$1/$2';
$route['admsistem/mitraById/(:num)'] = 'admSistem/mitraById/$1';
$route['admsistem/setStatus_mitra/(:num)'] = 'admSistem/setStatus_mitra/$1';
// Master opd CRUD 
$route['admsistem/save_master_opd'] = 'admSistem/save_master_opd';
$route['admsistem/edit_master_opd/(:num)'] = 'admSistem/edit_master_opd/$1';
$route['admsistem/delete_master_opd/(:num)/(:any)'] = 'admSistem/delete_master_opd/$1/$2';
$route['admsistem/opdById/(:num)'] = 'admSistem/opdById/$1';
$route['admsistem/setStatus_opd/(:num)'] = 'admSistem/setStatus_opd/$1';
// Branding CRUD
$route['admsistem/save_branding'] = 'admSistem/save_branding';
$route['admsistem/delete_branding/(:any)'] = 'admSistem/delete_branding/$1';

$route['admdata'] = 'admData';
$route['admdata/dashboard'] = 'admdata/dashboard';
$route['admdata/import'] = 'admdata/import';
$route['admdata/export'] = 'admdata/export';
$route['admdata/backup'] = 'admdata/backup';
$route['admdata/restore'] = 'admdata/restore';
$route['admdata/cleanup'] = 'admdata/cleanup';
$route['admdata/statistics'] = 'admdata/statistics';

$route['oprmaster'] = 'oprMaster';
$route['oprmaster/users'] = 'oprmaster/users';
$route['oprmaster/users/create'] = 'oprmaster/create_user';
$route['oprmaster/users/edit/(:num)'] = 'oprmaster/edit_user/$1';
$route['oprmaster/users/delete/(:num)'] = 'oprmaster/delete_user/$1';

$route['oprinputdata'] = 'oprInputData';

$route['mitravermaster'] = 'mitraVerMaster';
$route['mitraverdata'] = 'mitraVerData';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
