<?php

<<<<<<< HEAD
$router->get('chessclans', 'PagesController@index');
$router->get('chessclans/about', 'PagesController@about');
$router->get('chessclans/contact', 'PagesController@contact');
$router->get('chessclans/signin', 'PagesController@signin');
$router->get('chessclans/signup', 'PagesController@signup');

$router->post('chessclans/signup', 'UsersController@signup');
$router->post('chessclans/signin', 'UsersController@signin');
=======
$router->get('', 'PagesController@index');
$router->get('about', 'PagesController@about');
$router->get('contact', 'PagesController@contact');
$router->get('signin', 'PagesController@signin');
$router->get('signup', 'PagesController@signup');

$router->post('signup', 'UsersController@signup');
$router->post('signin', 'UsersController@signin');
>>>>>>> 1d111519b1118ce2dc6a5d416337a2935bdc7004
