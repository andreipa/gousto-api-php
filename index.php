<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';

$app = new \Slim\App;

//db
require_once 'inc/inc.db.php';

//routers
require_once 'routers/recipes.php';

$app->run();

?>