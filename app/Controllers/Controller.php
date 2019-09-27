<?php
/**
 * User: dmitriy
 * Date: 9/25/19
 * Time: 9:34 PM
 */

namespace App\Controllers;


class Controller
{
    protected function view(string $view, array $data = null)
    {
        $view = $view . '.view.php';
        $dir = dirname(dirname(__DIR__)) . '/views/';

        if (!file_exists($dir . $view)) {
            throw new \DomainException('Error: view file was not found');
        }

        if (!empty($data)) {
            extract($data);
        }

        include dirname(dirname(__DIR__)) . '/views/layout.view.php';
    }
}