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

//echo BASEPATH;
//require_once BASEPATH."application/config/database.php";

require_once( BASEPATH .'database/DB.php' );
$db =& DB();
$query = $db->get('pages');
$result = $query->result();
foreach( $result as $row )
{
    if(!empty($row->slug)){
         $route[ $row->slug ]   = $row->url;
         $route["cn/".$row->slug ]   = $row->url;
    }
   
    //$route[ $row->slug.'/:any' ]            = $row->controller;
    //$route[ $row->controller ]           = 'error404';
    //$route[ $row->controller.'/:any' ]   = 'error404';
}

$query = $db->get('app_routes');
$result = $query->result();
foreach( $result as $row )
{
    $route[ $row->slug ]  = $row->controller;
    $route["cn/".$row->slug ]   = $row->controller;
    
    //$route[ $row->slug.'/:any' ]            = $row->controller;
    //$route[ $row->controller ]           = 'error404';
    //$route[ $row->controller.'/:any' ]   = 'error404';
}


$route['default_controller'] = 'main';
$route['cn'] = 'main';
$route['cn/(:any)'] = '$1';
$route['cn/product/inquiry']='product/inquiry';
$route['cn/product/(:any)'] = 'product/index/$1';
$route['cn/(:any)/(:any)'] = '$1/$2';
$route['product/inquiry'] = 'product/inquiry';
$route['product/(:any)'] = 'product/index/$1';
$route['404_override'] = 'main/not_found';
$route['translate_uri_dashes'] = FALSE;


// $route['shop'] = 'accessories/all';
// $route['eyelash-extensions-hong-kong'] = 'eyelash_extensions';
// $route['about-us-3-2'] = 'aboutus';
// $route['contact-us'] = 'contact_us';


//$route['404_override'] = 'main';
