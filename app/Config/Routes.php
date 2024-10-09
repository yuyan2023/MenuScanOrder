<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


 $routes->get('/', 'MenuController::index');

 
 // Routes for admin
 $routes->group('admin', ['filter' => 'admin'], function($routes) {
    $routes->get('/', 'MenuController::admin');
    $routes->match(['GET', 'POST'], 'addedit', 'MenuController::addedit');
    $routes->match( ['GET', 'POST'], 'addedit/(:num)', 'MenuController::addedit/$1');
    $routes->get('delete/(:num)', 'MenuController::delete/$1');

    $routes->get('orders', 'OrderController::index');
    // View specific order details
    $routes->get('orders/orderdetail/(:num)', 'OrderController::orderdetail/$1'); 
    // Delete an order
    $routes->get('orders/delete/(:num)', 'OrderController::delete/$1');

    $routes->get('qr', 'Home::qr_code'); 

    
    $routes->get('/order-details', 'OrderController::showOrderDetails');

     // Food management routes
    $routes->match(['GET', 'POST'], 'menu/add_menu', 'FoodController::add_menu'); // Add new food item form and processing
     $routes->match(['GET', 'POST'], 'menu/add_menu/(:num)', 'FoodController::add_menu/$1'); // Edit food item form and processing
     $routes->get('menu/delete/(:num)', 'FoodController::delete/$1'); // Delete a food item

});


     $routes->get('menu', 'FoodController::index'); // List all food items
     $routes->get('feedback', 'Home::feedback'); 
     $routes->get('thank_you', 'Home::thankYou'); 

     $routes->post('/submit_feedback', 'Home::submit');

     $routes->get('addToCart/(:num)', 'FoodController::addToCart/$1'); // Handle AJAX request to add item to cart

     $routes->get('removeFromCart/(:num)', 'FoodController::removeFromCart/$1');
     $routes->get('displayCart', 'FoodController::displayCart');
     $routes->post('checkout', 'FoodController::checkout');
    



 // RESTFul Routes Education Model to expose add, edit and delete as an API
 $routes->resource('food');
 
 // Routes for Auth
 $routes->get('/login', 'Auth::google_login');  // Route to initiate Google login
 $routes->get('/login/callback', 'Auth::google_callback');  // Callback route after Google auth
 $routes->get('/logout', 'Auth::logout');