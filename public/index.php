<?php
/**
 * User: dmitriy
 * Date: 9/25/19
 * Time: 7:49 PM
 */

include dirname(__DIR__) . '/vendor/autoload.php';

$router = new \Bramus\Router\Router();

$router->setNamespace('\App\Controllers');
$router->get('/', 'HomeController@index');
$router->get('/register', 'HomeController@index');

$app = new \App\Core\Application($router);
$app->run();