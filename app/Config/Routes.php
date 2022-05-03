<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Admin_controller');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Admin_controller::index');



#Resrful Api Routes
// user Api or Patient api
$routes->post('insert', 'Userapi_controller::insert');
$routes->post('login', 'Userapi_controller::login');
$routes->post('readUser', 'Userapi_controller::readUser');
$routes->get('readAllUser', 'Userapi_controller::readAllUser');
$routes->get('getuser', 'Userapi_controller::getuser');
$routes->post('update', 'Userapi_controller::update');
$routes->post('delete', 'Userapi_controller::delete');


$routes->post('insertdoc', 'Doctorapi_controller::insertdoc');
$routes->get('login', 'Doctorapi_controller::login');
$routes->get('readdoc', 'Doctorapi_controller::readdoc');
$routes->get('readAlldoc', 'Doctorapi_controller::readAlldoc');
$routes->get('getdoc', 'Doctorapi_controller::getdoc');

$routes->get('slot_list', 'Doctorapi_controller::slot_list');

$routes->get('slot_by_doc_id', 'Doctorapi_controller::slot_by_doc_id');

$routes->get('insertarticles', 'Articles_api_controller::insertarticles');
$routes->get('AllArticles', 'Articles_api_controller::AllArticles');

// $routes->resource('restapi',['controller'=>'Api']);

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
