<?php

$router->group(
    [
        'prefix' => 'api',
        'middleware' => ['localization']
    ],
    function () use ($router) {
        $router->post('login', ['uses' => 'Auth\LoginController@index']);
        $router->post('logout', ['uses' => 'Auth\LogoutController@index']);

        $router->post('dashboard', ['uses' => 'Dashboard\DashboardController@index']);
    }
);