<?php
/**
 * User: dmitriy
 * Date: 9/26/19
 * Time: 9:39 AM
 */

namespace App\Controllers;


class NotFoundController extends Controller
{
    public function index()
    {
        header('HTTP/1.1 404 Not Found');
        $this->view('404');
    }
}