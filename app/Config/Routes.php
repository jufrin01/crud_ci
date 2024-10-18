<?php

namespace Config;

$routes = Services::routes();

$routes->group("", ["namespace" => "App\Controllers"], function ($routes) {
    $routes->get('/home', 'Admin::index');
    $routes->get('/input', 'Admin::input');
    $routes->post('/insert', 'Admin::insertData');
    $routes->get('/data', 'Admin::lihatData');
    $routes->post('/edit/(:enum)', 'Admin::editData/$1');
    $routes->post('/edit/(:enum)' , 'Admin::editData/$1');
//    $routes->get('delete/(:num)', 'Admin::deleteData/$1');
    $routes->post('/delete/(:num)', 'Admin::deleteData/$1');
    $routes->get('/edit/(:num)', 'Admin::edit/$1');
    $routes->post('/update/(:num)', 'Admin::update/$1');


});


