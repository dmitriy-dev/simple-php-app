<?php
/**
 * User: dmitriy
 * Date: 9/25/19
 * Time: 9:54 PM
 */

namespace App\Controllers;


use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        $this->view('home');
    }
}