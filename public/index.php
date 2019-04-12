<?php

error_reporting(E_ALL);
ini_set("display_errors","On");

require '../vendor/autoload.php';
require '../app/bootstrap.php';
use App\Core\{Request,Router};

Router::load('../app/routes.php')->direct(Request::uri(), Request::method());

?>