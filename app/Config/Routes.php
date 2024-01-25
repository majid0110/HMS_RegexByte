<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/login', 'LoginController::show');
$routes->post("/loginSave",'LoginController::loginSave');
$routes->get('/dashboard', 'LoginController::dashboard');
$routes->get('/logout', 'LoginController::logout');
$routes->get('/user_form', 'LoginController::user_form');
$routes->get('/business_table', 'LoginController::business_table');
$routes->post('/store', 'LoginController::store');
$routes->get('/role_form', 'LoginController::role_form');
$routes->post('/save_role', 'LoginController::save_role');
$routes->get('/user_form2', 'LoginController::user_form2');
$routes->post('/save_user', 'LoginController::save_user');

$routes->get('/doctors_form', 'DoctorController::doctors_form');
$routes->get('/doctors_table', 'DoctorController::doctors_table');
$routes->get('/user_form1', 'LoginController::user_form1');
$routes->post('/saveDoctorProfile', 'DoctorController::saveDoctorProfile');
$routes->get('/doctors_fee', 'DoctorController::doctors_fee');

$routes->post('/Savedoctorsfee', 'DoctorController::Savedoctorsfee');

// $routes->get('/editDoctor', 'DoctorController::editDoctor');
// $routes->get('/deleteDoctor', 'DoctorController::deleteDoctor');
$routes->get('/editDoctor/(:num)', 'DoctorController::editDoctor/$1');
$routes->get('/deleteDoctor/(:num)', 'DoctorController::deleteDoctor/$1');

$routes->get('/appointments_form', 'DoctorController::appointments_form');

//-----------------------------------------------------------------clients Routes
$routes->get('/clients_form', 'ClientController::clients_form');
$routes->get('/clients_table', 'ClientController::clients_table');
$routes->post('/saveClientProfile', 'ClientController::saveClientProfile');
$routes->get('/deleteClient/(:num)', 'ClientController::deleteClient/$1');
$routes->get('/editClient/(:num)', 'ClientController::editClient/$1');
$routes->post('/Savedoctorsfee', 'DoctorController::Savedoctorsfee');

//-------------------------------------------------------------------Appointments Routes
$routes->get('/appointments_form', 'ClientController::appointments_form');
$routes->post('/saveAppointment', 'AppointmentController::saveAppointment');
$routes->get('/appointments_table', 'AppointmentController::appointments_table');
$routes->get('/deleteAppointment/(:num)', 'AppointmentController::deleteAppointment/$1');


$routes->group('appointment', ['namespace' => 'App\Controllers'], function ($routes) {
    $routes->get('fetchDoctorFee/(:num)/(:num)', 'AppointmentController::fetchDoctorFee/$1/$2');
});


$routes->get('/editDoctor/(:num)', 'DoctorController::editDoctor/$1');
$routes->get('/deleteDoctor/(:num)', 'DoctorController::deleteDoctor/$1');

$routes->get('/edit_fee/(:num)', 'DoctorController::editDoctorFee/$1');
$routes->get('/edit_fee/(:num)', 'DoctorController::editDoctorFee/$1');
$routes->post('/updateDoctorFee/(:num)', 'DoctorController::updateDoctorFee/$1');


$routes->get('/configure', 'ConfigureController::configure');
$routes->get('/config_form/(:num)', 'ConfigureController::config_form/$1');
$routes->post('/update/(:num)', 'ConfigureController::update/$1');



