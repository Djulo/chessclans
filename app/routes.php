<?php

$router->get('chessclans', 'PagesController@index');
$router->get('chessclans/about', 'PagesController@about');
$router->get('chessclans/contact', 'PagesController@contact');
$router->get('chessclans/signin', 'PagesController@signin');
$router->get('chessclans/signup', 'PagesController@signup');

$router->post('chessclans/signup', 'UsersController@signup');
$router->post('chessclans/signin', 'UsersController@signin');

?>