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
$route['default_controller'] = 'site/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


// Routes for User 
$route['Login'] = 'site/login';
$route['confirmLogin'] = 'site/confirmLogin';
$route['Home'] = 'site/home';




// Routes for Admin Dashboard
$route['Admin/Home'] = 'admin/home';
$route['Admin/Dashboard'] = 'admin/home';
$route['Admin/Partners'] = 'admin/getPartners';

$route['Admin/Games'] = 'admin/getPartnersGames';
$route['Admin/NewGame'] = 'admin/addNewPartnerGame';
$route['Admin/UpdateGame/(:any)'] = 'admin/updateNewPartnerGame/$1';
$route['Admin/ManageImages/(:any)'] = 'admin/manageGamesImages/$1';


$route['Admin/Tournaments'] = 'admin/getPartnersTournaments';
$route['Admin/NewTournament'] = 'admin/addNewTournament';
$route['Admin/AddTournament'] = 'admin/processTournament';
$route['Admin/AddTournament/(:any)'] = 'admin/processTournament/$1';
$route['Admin/UpdateTournament/(:any)'] = 'admin/updateTournament/$1';
$route['Admin/ManageTournamentImages/(:any)'] = 'admin/manageTournamentImages/$1';

$route['Admin/deleteTournament/(:any)'] = 'admin/deleteTournament/$1';


$route['BattleInfo'] = 'user/battleInfo';
$route['BattleInfo/(:any)'] = 'user/battleInfo/$1';
$route['BattleInfo/(:any)/(:any)'] = 'user/battleInfo/$1/$2';

// Manage ads
$route['Admin/Advertisements'] = 'admin/getAdvertisements';
$route['Admin/editAdvertisement/(:any)'] = 'admin/editAdvertisement/$1';
$route['Admin/saveAdvertisement'] = 'admin/saveAdvertisement';
$route['Admin/ManageAdvertisementImages/(:any)'] = 'admin/manageAdvertisementImages/$1';

/*
| -------------------------------------------------------------------------
| Sample REST API /Routes
| -------------------------------------------------------------------------
*/
//$route['api/example/users/(:num)'] = 'api/example/users/id/$1'; // Example 4
//$route['api/example/users/(:num)(\.)([a-zA-Z0-9_-]+)(.*)'] = 'api/example/users/id/$1/format/$3$4'; // Example 8
