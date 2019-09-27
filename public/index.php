<?php
/**
 * User: dmitriy
 * Date: 9/25/19
 * Time: 7:49 PM
 */

session_start();

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

include dirname(__DIR__) . '/vendor/autoload.php';

$router = new \Bramus\Router\Router();

$router->setNamespace('\App\Controllers');
$router->get('/', 'HomeController@index');
$router->get('/auth/register', 'Auth\RegistrationController@index');
$router->post('/auth/register', 'Auth\RegistrationController@index');
$router->get('/auth/login', 'Auth\LoginController@index');
$router->get('/auth/logout', 'Auth\LoginController@logout');
$router->post('/auth/login', 'Auth\LoginController@index');
$router->get('/cabinet', 'Auth\CabinetController@index');
$router->before('GET', '/cabinet', function() {
    if (null === \App\Core\Auth::gi()->user()) {
        header('location: /login');
        die();
    }
});
$router->before('GET|POST', '/auth/login|/auth/register', function() {
    if (null !== \App\Core\Auth::gi()->user()) {
        header('location: /cabinet');
        die();
    }
});
$app = new \App\Core\Application($router);
$app->run();