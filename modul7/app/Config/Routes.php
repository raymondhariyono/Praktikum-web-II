<?php

$routes->get('/', function () {
    return redirect()->to('/login');
});

$routes->get('/login', 'AuthController::login');
$routes->post('/login/process', 'AuthController::loginProcess'); // Pastikan ini POST!
$routes->get('/logout', 'AuthController::logout');

$routes->group('buku', ['filter' => 'auth'], function ($routes) {
    $routes->get('/', 'BukuController::index');
    $routes->get('create', 'BukuController::create');
    $routes->post('store', 'BukuController::store');
    $routes->get('edit/(:num)', 'BukuController::edit/$1');
    $routes->post('update/(:num)', 'BukuController::update/$1');
    $routes->post('delete/(:num)', 'BukuController::delete/$1');
});