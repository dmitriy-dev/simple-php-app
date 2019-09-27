<?php
/**
 * User: dmitriy
 * Date: 9/25/19
 * Time: 9:57 PM
 */

namespace App\Controllers\Auth;


use App\Controllers\Controller;
use App\Core\Auth;
use App\Models\User;
use App\Validator\Validator;
use Intervention\Image\ImageManager;
use Ramsey\Uuid\Uuid;

class RegistrationController extends Controller
{
    public function index()
    {
        $data = null;
        if ('POST' == $_SERVER['REQUEST_METHOD']) {
            $validated = $this->store();

            if (true === $validated) {
                return;
            }

            $data = ['errors' => $validated['fields']];
        }

        $this->view('register', $data);
    }

    public function store()
    {
        $validator = Validator::run([
            'name' => 'string|required',
            'email' => 'email|required',
            'password' => 'string|required|minLength:6|confirmed',
            'avatar' => 'image',
        ], array_merge($_POST, $_FILES));

        if (Validator::STATUS_VALIDATED !== $validator['status']) {
            return $validator;
        }

        $user = new User();

        if (isset($_FILES['avatar']) && $_FILES['avatar']['size'] > 0) {
            $manager = new ImageManager(array('driver' => 'imagick'));
            $image = $manager->make($_FILES['avatar']['tmp_name'])->resize(300, 200);
            $mime = explode('/', $image->mime);
            $extension = $mime[1];
            $path = 'storage/' . Uuid::uuid4()->toString() . '.' . $extension;
            $image->save($_SERVER['DOCUMENT_ROOT'] . '/' . $path);
            $user->image = $path;
        }

        $user->name = $_POST['name'];
        $user->email = $_POST['email'];
        $user->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $user->token = md5($user->name . $user->email . mt_rand(1, 100000));

        $user->save();
        Auth::gi()->login($user);
        return true;
    }
}