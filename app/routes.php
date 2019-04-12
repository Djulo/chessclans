<?php

$router->get('', 'PagesController@index');
$router->get('about', 'PagesController@about');
$router->get('contact', 'PagesController@contact');
$router->get('signin', 'PagesController@signin');
$router->get('signup', 'PagesController@signup');

$router->post('signup', 'UsersController@signup');
$router->post('signin', 'UsersController@signin');