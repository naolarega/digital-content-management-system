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
$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['user'] = 'user';
$route['user/(:any)/(:any)'] = 'user/$1/$2';
$route['creator'] = 'creator';
$route['creator/(:any)/(:any)'] = 'creator/$1/$2';
$route['admin'] = 'admin';
$route['admin/(:any)/(:any)'] = 'admin/$1/$2';
$route['video/(:any)'] = 'home/video/$1/';
$route['video/(:any)/(:any)'] = 'home/video/$1/$2';
$route['music/(:any)'] = 'home/music/$1';
$route['music/(:any)/(:any)'] = 'home/music/$1/$2';
$route['image/(:any)'] = 'home/image/$1';
$route['image/(:any)/(:any)'] = 'home/image/$1/$2';
$route['app/(:any)'] = 'home/app/$1';
$route['app/(:any)/(:any)'] = 'home/app/$1/$2';
$route['book/(:any)'] = 'home/book/$1';
$route['book/(:any)/(:any)'] = 'home/book/$1/$2';
$route['view_creator/(:any)'] = 'home/view_creator/$1';
$route['sign_up/(:any)'] = 'home/sign_up/$1';
$route['log_in/(:any)'] = 'home/log_in/$1';
$route['(:any)'] = 'home/$1';
