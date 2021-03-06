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
// $route['default_controller'] = 'welcome';
$route['default_controller'] = 'UserFrontend';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/* *===* Backend Routes Start *===* */

$route['admin'] = 'LoginBackend';
$route['logedIn'] = 'LoginBackend/logedIn';
$route['logout'] = 'LoginBackend/logout';


$route['admin/dashboard'] = 'UserBackend';
$route['admin/add_new_product'] = 'UserBackend/add_new_product';
$route['admin/save_new_product'] = 'UserBackend/save_new_product';
$route['admin/remove_product_details'] = 'UserBackend/remove_product_details';
$route['admin/remove_product_size'] = 'UserBackend/remove_product_size';
$route['admin/edit_product'] = 'UserBackend/edit_product';
$route['admin/deselect_image'] = 'UserBackend/deselect_image';
$route['admin/update_product'] = 'UserBackend/update_product';
$route['admin/product_list'] = 'UserBackend/get_product_list';
$route['admin/delete_product'] = 'UserBackend/delete_product';

$route['admin/add_new_category'] = 'UserBackend/add_new_category';
$route['admin/save_new_category'] = 'UserBackend/save_new_category';
$route['admin/category_list'] = 'UserBackend/get_category_list';
$route['admin/edit_category'] = 'UserBackend/edit_category_view';
$route['admin/update_category'] = 'UserBackend/update_category';
$route['admin/delete_category'] = 'UserBackend/delete_category';
$route['admin/all-tickets'] = 'UserBackend/displayAllTickets';
$route['admin/all-rejectedTickets'] = 'UserBackend/displayAllRejectedTickets';
$route['admin/check_active_tickets'] = 'UserBackend/check_active_tickets';
/* *===* Backend Routes End *===* */


/* *===* Frontend Routes Start *===* */
$route['get_category_products'] = 'UserFrontend/get_category_products';
$route['category'] = 'UserFrontend/displayCategory';
$route['products'] = 'UserFrontend/displayProducts';
$route['productsDetails'] = 'UserFrontend/displayProductDetails';
$route['get_product_imgs_by_color'] = 'UserFrontend/get_product_imgs_by_color';
/* *===* Frontend Routes End *===* */