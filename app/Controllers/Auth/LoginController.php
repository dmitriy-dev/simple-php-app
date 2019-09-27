<?php
/**
 * User: dmitriy
 * Date: 9/25/19
 * Time: 9:58 PM
 */

namespace App\Controllers\Auth;


use App\Controllers\Controller;
use App\Core\Auth;
use App\Models\User;
use App\Validator\Validator;

class LoginController extends Controller
{
    public function index()
    {
        $data = null;
        if ('POST' == $_SERVER['REQUEST_METHOD']) {
            $validated = $this->login();

            if (true === $validated) {
                return;
            }

            $data = ['errors' => $validated];
        }

        $this->view('login', $data);
    }

    public function login()
    {
        $validator = Validator::run([
            'email' => 'email|required',
        ], $_POST);

        if (Validator::STATUS_VALIDATED !== $validator['status']) {
            return $validator['fields'];
        }

        $user = User::findByEmail($_POST['email']);
        if (null === $user || !$user->comparePasswords($_POST['password'])) {
            $res['email'][]['error'] = 'Email или пароль указаны не верно!';
            return $res;
        }

        Auth::gi()->login($user);
        return true;
    }

    public function logout()
    {
        Auth::gi()->logout();
    }
}