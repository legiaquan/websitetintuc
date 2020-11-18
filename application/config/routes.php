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
$route['default_controller'] = 'Home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/////////////////////////////////////////////////////////////////////////////////////////
////					FrontEnd Route												////
///////////////////////////////////////////////////////////////////////////////////////
$route['index'] = 'Home/index';
$route['(:any)-post(:num)\.html'] = 'Home/baiviet/$1/$2';
$route['(:any)\.html'] = 'Home/category/$1';
$route['about'] = 'Home/about';
$route['contact'] = "Home/contact";
$route['search'] = "Home/Search";
$route['login'] = "Home/loginAjax";

/////////////////////////////////////////////////////////////////////////////////////////
////					Admin Route 												////
///////////////////////////////////////////////////////////////////////////////////////
//News Route
$route['Admin/news'] = 'Admin/getListNews';
$route['Admin/news/add'] = 'Admin/addNews';
$route['Admin/news/edit/(:num)'] = 'Admin/updateNews/$1';
$route['Admin/news/remove/(:num)'] = 'Admin/removeNews/$1';
//News-Group Route
$route['Admin/news-group'] = 'Admin/getListGroupNews';
$route['Admin/news-group/add'] = 'Admin/addGroupNews';
$route['Admin/news-group/edit/(:num)'] = 'Admin/updateGroupNews/$1';
$route['Admin/news-group/remove/(:num)'] = 'Admin/removeGroupNews/$1';
//Categories Route
$route['Admin/cat'] = 'Admin/getListCategories';
$route['Admin/cat/add'] = 'Admin/addCategories';
$route['Admin/cat/edit/(:any)'] = 'Admin/updateCategories/$1';
$route['Admin/cat/remove/(:any)'] = 'Admin/removeCategories/$1';
//UserManager Route
$route['Admin/users'] = 'Admin/getListUsers';
$route['Admin/users/deactivate/(:num)'] = 'Auth/deactivate/$1';
$route['Admin/users/activate/(:num)'] = 'Auth/activate/$1';
$route['Admin/users/edit/(:num)'] = 'Auth/edit_user/$1';
$route['Admin/users/add'] = 'Auth/create_user';
$route['Admin/group/edit/(:num)'] = 'Auth/edit_group/$1';

/////////////////////////////////////////////////////////////////////////////////////
////					Ajax Route												////
///////////////////////////////////////////////////////////////////////////////////
$route['ajax/getLoaiTin/(:num)'] = 'Admin/ajaxLoaiTin/$1';
$route['ajax/updateHot'] = 'Admin/ajaxUpdateHotNews';
$route['ajax/updateStatus'] = 'Admin/ajaxUpdateStatusNews';