<?php
/**
 * User: dmitriy
 * Date: 9/25/19
 * Time: 7:50 PM
 */

namespace App\Core;


use Bramus\Router\Router;

class Application
{
    /** @var Router */
    private $router;

    public function __construct(Router $router)
    {
        $this->router = $router;
    }

    public function run()
    {
        $this->router->run();
    }
}