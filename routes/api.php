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

        $router->group(['prefix' => 'student'], function () use ($router) {
            $router->post('list', ['uses' => 'Student\StudentController@index']);
            $router->post('statistic', ['uses' => 'Student\StudentController@statistic']);
            $router->post('list/suspend', ['uses' => 'Student\StudentController@suspendList']);
            $router->post('update/suspend', ['uses' => 'Student\StudentController@suspendUpdate']);
        });
    }
);
