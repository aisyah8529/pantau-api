<?php

// $router->group(
//     [
//         'prefix' => 'api',
//         'middleware' => ['localization']
//     ],
//     function () use ($router) {
//         $router->post('register', ['uses' => 'Auth\RegisterController@index']);
//         $router->post('login', ['uses' => 'Auth\LoginController@index']);
//         $router->post('logout', ['uses' => 'Auth\LogoutController@index']);

//         $router->group(['prefix' => 'product'], function () use ($router) {
//             $router->post('list', ['uses' => 'Product\ProductController@index']);
//             $router->post('detail/{id}', ['uses' => 'Product\ProductController@show']);
//         });

//         $router->group(['prefix' => 'deposit'], function () use ($router) {
//             $router->post('outstanding/status', ['uses' => 'Deposit\DepositController@outstanding_deposit_status']);
//             $router->post('outstanding/payment', ['uses' => 'Deposit\DepositController@outstanding_deposit_payment']);
//             $router->post('outstanding/order', ['uses' => 'Deposit\DepositController@outstanding_deposit_order']);
//         });
//     }
// );