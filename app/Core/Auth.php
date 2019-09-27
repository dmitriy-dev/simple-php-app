<?php
/**
 * User: dmitriy
 * Date: 9/26/19
 * Time: 8:41 PM
 */

namespace App\Core;


use App\Models\User;

class Auth
{
    private static $instance;

    /** @var User */
    private $user;

    public static function gi(): self
    {
        if (static::$instance === null) {
            static::$instance = new static();
        }

        return static::$instance;
    }

    private function __construct()
    {
    }

    private function __clone()
    {
    }

    /**
     * @return User|null
     */
    public function user(): ?User
    {
        if (!isset($_SESSION['user'])) {
            return null;
        }

        if ($this->user instanceof User) {
            return $this->user;
        }

        $user = User::findByToken($_SESSION['user']);

        if (null !== $user) {
            $this->user = $user;
        }

        return $this->user;
    }

    /**
     * @param User $user
     */
    public function login(User $user)
    {
        $_SESSION['user'] = $user->token;
        header('location: ' . Config::gi()->getConfig()['main_page'] . '/cabinet');
    }

    public function logout()
    {
        unset($_SESSION['user']);
        header('location: ' . Config::gi()->getConfig()['main_page'] . '');
    }
}