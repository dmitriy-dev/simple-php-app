<?php
/**
 * User: dmitriy
 * Date: 9/27/19
 * Time: 10:08 PM
 */

namespace App\Controllers\Auth;


use App\Controllers\Controller;
use App\Core\Auth;

class CabinetController extends Controller
{
    public function index()
    {
        $user = Auth::gi()->user();
        $this->view('cabinet', compact('user'));
    }
}