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
$route['default_controller'] = 'Login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['login'] 				= 'Login/proses';
$route['logout'] 				= 'Login/logout';
$route['dashboard']				= 'Dashboard';

//admin
$route['user'] 				    = 'User';
$route['tambah-user'] 	        = 'User/tambah';
$route['tambah-user-modal'] 	= 'User/tambah_modal';
$route['edit-user/(:any)'] 	    = 'User/edit/$1';
$route['hapus-user/(:any)']     = 'User/hapus/$1';
$route['setting']			    = 'User/setting';

$route['barang'] 				= 'Barang';
$route['tambah-barang'] 		= 'Barang/tambah';
$route['edit-barang/(:any)'] 	= 'Barang/edit/$1';
$route['hapus-barang/(:any)']   = 'Barang/hapus/$1';

$route['cash'] 				= 'Cash';
$route['tambah-cash'] 			= 'Cash/tambah';
$route['edit-cash/(:any)'] 	= 'Cash/edit/$1';
$route['hapus-cash/(:any)']   = 'Cash/hapus/$1';

$route['barang-masuk'] 			= 'Barang/data_barang_masuk';
$route['tambah-barang-masuk'] 	= 'Barang/tambah_barang_masuk';
$route['edit-barang-masuk/(:any)']	= 'Barang/edit_barang_masuk/$1';
$route['hapus-barang-masuk/(:any)'] = 'Barang/hapus_barang_masuk/$1';

$route['barang-keluar'] 			= 'Barang/data_barang_keluar';
$route['tambah-barang-keluar'] 		= 'Barang/tambah_barang_keluar';
$route['edit-barang-keluar/(:any)']	= 'Barang/edit_barang_keluar/$1';
$route['hapus-barang-keluar/(:any)']= 'Barang/hapus_barang_keluar/$1';
$route['cancel-barang-keluar/(:any)']= 'Barang/cancel_barang_keluar/$1';

$route['detail-barang-keluar/(:any)'] 			= 'Barang/detail_barang_keluar/$1';
$route['tambah-detail-barang-keluar/(:any)'] = 'Barang/tambah_detail_barang_keluar/$1';
$route['edit-detail-barang-keluar/(:any)/(:any)'] = 'Barang/edit_detail_barang_keluar/$1/$2';
$route['hapus-detail-barang-keluar/(:any)/(:any)'] = 'Barang/hapus_detail_barang_keluar/$1/$2';
$route['cetak-barang-keluar/(:any)'] 			= 'Barang/print/$1';

$route['laporan-barang-masuk'] 		= 'Laporan/data_barang_masuk';
$route['laporan-barang-keluar'] 	= 'Laporan/data_barang_keluar';
$route['laporan-transaksi'] 		= 'Laporan/transaksi';
$route['cetak-transaksi'] 			= 'Laporan/cetak_transaksi';