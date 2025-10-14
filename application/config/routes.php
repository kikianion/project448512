<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = 'login';
$route['login'] = 'login';
$route['login/authenticate'] = 'login/authenticate';
$route['logout'] = 'login/logout';
// $route['dashboard'] = 'dashboard';

$route['admsistem'] = 'cAdmSistem';

$objs = ['Visi', 'Misi', 'User', 'Mitra', 'Opd', 'Periode', 'Groupperiode'];
foreach ($objs as $obj) {
	$lobj = strtolower($obj);
	$route["admsistem/$lobj/save"] = "cMaster$obj/save";
	$route["admsistem/$lobj/byId/(:num)"] = "cMaster$obj/byId/$1";
	$route["admsistem/$lobj/setStatus/(:num)"] = "cMaster$obj/setStatus/$1";
}

$route['admsistem/user/resetpassword'] = 'cMasterUser/resetpassword';

// Branding CRUD
$route['admsistem/branding/save'] = 'CMasterBranding/save';

// Master periode CRUD
$route['admsistem/save_periode'] = 'admSistem/save_periode';
$route['admsistem/periodeById/(:num)'] = 'admSistem/periodeById/$1';
$route['admsistem/setStatus_periode/(:num)'] = 'admSistem/setStatus_periode/$1';

// Master grouping periode CRUD
$route['admsistem/save_grouping_periode'] = 'admSistem/save_grouping_periode';
$route['admsistem/groupingPeriodeById/(:num)'] = 'admSistem/groupingPeriodeById/$1';
$route['admsistem/setStatus_grouping_periode/(:num)'] = 'admSistem/setStatus_grouping_periode/$1';

$route['admdata'] = 'cAdmData';

$objs = ['Fungsi', 'Urusan', 'Program'];
foreach ($objs as $obj) {
	$lobj = strtolower($obj);
	$route["admdata/$lobj/save"] = "cMaster$obj/save";
	$route["admdata/$lobj/byId/(:num)"] = "cMaster$obj/byId/$1";
	$route["admdata/$lobj/setStatus/(:num)"] = "cMaster$obj/setStatus/$1";
}


// Periode RPJMD CRUD routes
// $route['admdata/save_periode_rpjmd'] = 'admData/save_periode_rpjmd';
// $route['admdata/periodeRPJMDById/(:num)'] = 'admData/periodeRPJMDById/$1';
// $route['admdata/setStatus_periode_rpjmd/(:num)'] = 'admData/setStatus_periode_rpjmd/$1';
// $route['admdata/delete_periode_rpjmd/(:num)'] = 'admData/delete_periode_rpjmd/$1';

$objs = ['periode', 'tujuan', 'sasaran', 'indikatortujuan', 'indikatorsasaran'];
foreach ($objs as $obj) {
	$route["admdata/rpjmd$obj/save"] = "crpjmd$obj/save";
	$route["admdata/rpjmd$obj/byId/(:num)"] = "crpjmd$obj/byId/$1";
	$route["admdata/rpjmd$obj/setStatus/(:num)"] = "crpjmd$obj/setStatus/$1";
}


// Tujuan RPJMD CRUD routes
// $route['admdata/save_tujuan_rpjmd'] = 'admData/save_tujuan_rpjmd';
// $route['admdata/tujuanRPJMDById/(:num)'] = 'admData/tujuanRPJMDById/$1';
// $route['admdata/setStatus_tujuan_rpjmd/(:num)'] = 'admData/setStatus_tujuan_rpjmd/$1';
// $route['admdata/delete_tujuan_rpjmd/(:num)'] = 'admData/delete_tujuan_rpjmd/$1';

// Sasaran RPJMD CRUD routes
// $route['admdata/save_sasaran_rpjmd'] = 'admData/save_sasaran_rpjmd';
// $route['admdata/sasaranRPJMDById/(:num)'] = 'admData/sasaranRPJMDById/$1';
// $route['admdata/setStatus_sasaran_rpjmd/(:num)'] = 'admData/setStatus_sasaran_rpjmd/$1';
// $route['admdata/delete_sasaran_rpjmd/(:num)'] = 'admData/delete_sasaran_rpjmd/$1';

// Indikator Tujuan RPJMD CRUD routes
// $route['admdata/save_indikator_tujuan_rpjmd'] = 'admData/save_indikator_tujuan_rpjmd';
// $route['admdata/indikatorTujuanById/(:num)'] = 'admData/indikatorTujuanById/$1';
// $route['admdata/setStatus_indikator_tujuan/(:num)'] = 'admData/setStatus_indikator_tujuan/$1';
// $route['admdata/delete_indikator_tujuan/(:num)'] = 'admData/delete_indikator_tujuan/$1';

// Indikator Sasaran RPJMD CRUD routes
// $route['admdata/save_indikator_sasaran_rpjmd'] = 'admData/save_indikator_sasaran_rpjmd';
// $route['admdata/indikatorSasaranById/(:num)'] = 'admData/indikatorSasaranById/$1';
// $route['admdata/setStatus_indikator_sasaran/(:num)'] = 'admData/setStatus_indikator_sasaran/$1';
// $route['admdata/delete_indikator_sasaran/(:num)'] = 'admData/delete_indikator_sasaran/$1';

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
$route['admdata/branding/save_nama'] = 'cBranding/save_branding_nama';
$route['admdata/branding/save_subnote'] = 'cBranding/save_branding_subnote';
$route['admdata/branding/save_background'] = 'cBranding/save_branding_background';
$route['admdata/branding/save_logo'] = 'cBranding/save_branding_logo';
$route['admdata/branding/save_favicon'] = 'cBranding/save_branding_favicon';

$route['oprmaster'] = 'cOprMaster';
$route['oprmaster/users'] = 'oprmaster/users';
$route['oprmaster/users/create'] = 'oprmaster/create_user';
$route['oprmaster/users/edit/(:num)'] = 'oprmaster/edit_user/$1';
$route['oprmaster/users/delete/(:num)'] = 'oprmaster/delete_user/$1';

$route['oprinputdata'] = 'oprInputData';

$route['mitravermaster'] = 'mitraVerMaster';
$route['mitraverdata'] = 'mitraVerData';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['test1'] = 'test/hi';
$route['__listtables'] = 'CTools/list_tables';

$route['handler/save/(:any)'] = 'CHandler/save/$1';
$route['handler/by_id/(:any)/(:any)'] = 'CHandler/by_id/$1/$2';
$route['handler/set_status/(:any)/(:any)'] = 'CHandler/set_status/$1/$2';
$route['handler/columns/(:any)'] = 'CHandler/columns/$1';
// $route['handler/columns/(:any)'] = 'CHandler/card1';
$route['card1'] = 'CHandler/card1';


define("DEBUG1", 1);
function ___($s)
{
	if (DEBUG1 == 1)
		return $s . ": ";

	return "";
}



