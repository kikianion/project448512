<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'login';
$route['login'] = 'login';
$route['login/authenticate'] = 'login/authenticate';
$route['logout'] = 'login/logout';
// $route['dashboard'] = 'dashboard';

$route['admsistem'] = 'cAdmSistem';

// $route['admsistem/users'] = 'admsistem/users';
// $route['admsistem/users/create'] = 'admsistem/create_user';
// $route['admsistem/users/edit/(:num)'] = 'admsistem/edit_user/$1';
// $route['admsistem/users/delete/(:num)'] = 'admsistem/delete_user/$1';
// $route['admsistem/settings'] = 'admsistem/settings';
// $route['admsistem/logs'] = 'admsistem/logs';

// Route for saving visi from the Master Visi form
$route['admsistem/save_visi'] = 'admSistem/save_visi';
$route['admsistem/visiById/(:num)'] = 'admSistem/visiById/$1';
$route['admsistem/setStatus_visi/(:num)'] = 'admSistem/setStatus_visi/$1';

// Master misi CRUD
$route['admsistem/save_misi'] = 'admSistem/save_misi';
$route['admsistem/misiById/(:num)'] = 'admSistem/misiById/$1';
$route['admsistem/setStatus_misi/(:num)'] = 'admSistem/setStatus_misi/$1';

// Master periode CRUD
$route['admsistem/save_periode'] = 'admSistem/save_periode';
$route['admsistem/periodeById/(:num)'] = 'admSistem/periodeById/$1';
$route['admsistem/setStatus_periode/(:num)'] = 'admSistem/setStatus_periode/$1';

// Master grouping periode CRUD
$route['admsistem/save_grouping_periode'] = 'admSistem/save_grouping_periode';
$route['admsistem/groupingPeriodeById/(:num)'] = 'admSistem/groupingPeriodeById/$1';
$route['admsistem/setStatus_grouping_periode/(:num)'] = 'admSistem/setStatus_grouping_periode/$1';

// Master user CRUD (table `user`)
$route['admsistem/user/save'] = 'cMasterUser/save';
$route['admsistem/user/edit/(:any)'] = 'cMasterUser/edit/$1';
$route['admsistem/user/delete/(:any)'] = 'cMasterUser/delete/$1';
$route['admsistem/user/userById/(:num)'] = 'cMasterUser/userById/$1';
$route['admsistem/user/setstatus/(:num)'] = 'cMasterUser/setStatus/$1';
$route['admsistem/user/resetpassword'] = 'cMasterUser/resetpassword';

// Master mitra CRUD (table `mitra`)
$route['admsistem/mitra/save'] = 'cMasterMitra/save';
$route['admsistem/mitra/edit/(:num)'] = 'cMasterMitra/edit/$1';
$route['admsistem/mitra/delete/(:num)/(:any)'] = 'cMasterMitra/delete/$1/$2';
$route['admsistem/mitra/mitraById/(:num)'] = 'cMasterMitra/mitraById/$1';
$route['admsistem/mitra/setStatus/(:num)'] = 'cMasterMitra/setStatus/$1';
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
// $route['admdata/dashboard'] = 'admdata/dashboard';
// $route['admdata/import'] = 'admdata/import';
// $route['admdata/export'] = 'admdata/export';
// $route['admdata/backup'] = 'admdata/backup';
// $route['admdata/restore'] = 'admdata/restore';
// $route['admdata/cleanup'] = 'admdata/cleanup';
// $route['admdata/statistics'] = 'admdata/statistics';

// Master Fungsi CRUD routes
$route['admdata/save_master_fungsi'] = 'admData/save_master_fungsi';
$route['admdata/fungsiById/(:num)'] = 'admData/fungsiById/$1';
$route['admdata/setStatus_fungsi/(:num)'] = 'admData/setStatus_fungsi/$1';
$route['admdata/delete_fungsi/(:num)'] = 'admData/delete_fungsi/$1';

// Master Urusan CRUD routes
$route['admdata/save_master_urusan'] = 'admData/save_master_urusan';
$route['admdata/urusanById/(:num)'] = 'admData/urusanById/$1';
$route['admdata/setStatus_urusan/(:num)'] = 'admData/setStatus_urusan/$1';
$route['admdata/delete_urusan/(:num)'] = 'admData/delete_urusan/$1';

// Master Program CRUD routes
$route['admdata/save_master_program'] = 'admData/save_master_program';
$route['admdata/programById/(:num)'] = 'admData/programById/$1';
$route['admdata/setStatus_program/(:num)'] = 'admData/setStatus_program/$1';
$route['admdata/delete_program/(:num)'] = 'admData/delete_program/$1';

// Periode RPJMD CRUD routes
$route['admdata/save_periode_rpjmd'] = 'admData/save_periode_rpjmd';
$route['admdata/periodeRPJMDById/(:num)'] = 'admData/periodeRPJMDById/$1';
$route['admdata/setStatus_periode_rpjmd/(:num)'] = 'admData/setStatus_periode_rpjmd/$1';
$route['admdata/delete_periode_rpjmd/(:num)'] = 'admData/delete_periode_rpjmd/$1';

// Tujuan RPJMD CRUD routes
$route['admdata/save_tujuan_rpjmd'] = 'admData/save_tujuan_rpjmd';
$route['admdata/tujuanRPJMDById/(:num)'] = 'admData/tujuanRPJMDById/$1';
$route['admdata/setStatus_tujuan_rpjmd/(:num)'] = 'admData/setStatus_tujuan_rpjmd/$1';
$route['admdata/delete_tujuan_rpjmd/(:num)'] = 'admData/delete_tujuan_rpjmd/$1';

// Sasaran RPJMD CRUD routes
$route['admdata/save_sasaran_rpjmd'] = 'admData/save_sasaran_rpjmd';
$route['admdata/sasaranRPJMDById/(:num)'] = 'admData/sasaranRPJMDById/$1';
$route['admdata/setStatus_sasaran_rpjmd/(:num)'] = 'admData/setStatus_sasaran_rpjmd/$1';
$route['admdata/delete_sasaran_rpjmd/(:num)'] = 'admData/delete_sasaran_rpjmd/$1';

// Indikator Tujuan RPJMD CRUD routes
$route['admdata/save_indikator_tujuan_rpjmd'] = 'admData/save_indikator_tujuan_rpjmd';
$route['admdata/indikatorTujuanById/(:num)'] = 'admData/indikatorTujuanById/$1';
$route['admdata/setStatus_indikator_tujuan/(:num)'] = 'admData/setStatus_indikator_tujuan/$1';
$route['admdata/delete_indikator_tujuan/(:num)'] = 'admData/delete_indikator_tujuan/$1';

// Indikator Sasaran RPJMD CRUD routes
$route['admdata/save_indikator_sasaran_rpjmd'] = 'admData/save_indikator_sasaran_rpjmd';
$route['admdata/indikatorSasaranById/(:num)'] = 'admData/indikatorSasaranById/$1';
$route['admdata/setStatus_indikator_sasaran/(:num)'] = 'admData/setStatus_indikator_sasaran/$1';
$route['admdata/delete_indikator_sasaran/(:num)'] = 'admData/delete_indikator_sasaran/$1';

// Master Periode Anggaran CRUD routes
$route['admdata/save_master_periode_anggaran'] = 'admData/save_master_periode_anggaran';
$route['admdata/periodeAnggaranById/(:num)'] = 'admData/periodeAnggaranById/$1';
$route['admdata/setStatus_periode_anggaran/(:num)'] = 'admData/setStatus_periode_anggaran/$1';
$route['admdata/delete_periode_anggaran/(:num)'] = 'admData/delete_periode_anggaran/$1';

// Master Grouping Periode CRUD routes
$route['admdata/save_master_grouping_periode'] = 'admData/save_master_grouping_periode';
$route['admdata/groupingPeriodeById/(:num)'] = 'admData/groupingPeriodeById/$1';
$route['admdata/setStatus_grouping_periode/(:num)'] = 'admData/setStatus_grouping_periode/$1';
$route['admdata/delete_grouping_periode/(:num)'] = 'admData/delete_grouping_periode/$1';

// Master Branding CRUD routes
$route['admdata/save_branding_nama'] = 'admData/save_branding_nama';
$route['admdata/save_branding_subnote'] = 'admData/save_branding_subnote';
$route['admdata/save_branding_background'] = 'admData/save_branding_background';
$route['admdata/save_branding_logo'] = 'admData/save_branding_logo';
$route['admdata/save_branding_favicon'] = 'admData/save_branding_favicon';

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
