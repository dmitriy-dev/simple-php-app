<?php
/**
 * User: dmitriy
 * Date: 9/26/19
 * Time: 7:54 AM
 */

namespace App\Models;


use App\Core\AbstractModel;
use App\Core\DB;
use App\Traits\Auth;

/**
 * Class User
 * @package App\Models
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $image
 * @property string $password
 * @property string $token
 * @property string $created_at
 * @property string $updated_at
 */
class User extends AbstractModel
{
    use Auth;

    protected static $table = 'users';
    protected $attributes = [
        'name',
        'email',
        'password',
        'image',
        'token',
        'created_at',
        'updated_at',
    ];

    public static function findByEmail(string $email)
    {
        if (empty(static::$table)) {
            throw new \DomainException('Attribute "email" was not set');
        }

        $rows = DB::gi()->query('SELECT * FROM `' . static::$table . '` WHERE `email`=:email LIMIT 1', ['email' => $email]);

        foreach ($rows as $row) {
            return new static($row);
        }

        return null;
    }
}