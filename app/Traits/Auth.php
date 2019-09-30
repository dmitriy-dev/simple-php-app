<?php
/**
 * User: dmitriy
 * Date: 9/26/19
 * Time: 8:43 PM
 */

namespace App\Traits;


use App\Core\DB;

trait Auth
{
    /**
     * @param string $token
     * @return Auth|null
     */
    public static function findByToken(string $token)
    {
        if (empty(static::$table)) {
            throw new \DomainException('Attribute "$table" was not set');
        }

        $rows = DB::gi()->query('SELECT * FROM `' . static::$table . '` WHERE `token`=:token LIMIT 1', ['token' => $token]);

        foreach ($rows as $row) {
            return new static($row);
        }

        return null;
    }

    /**
     * @param string $password
     * @return bool
     */
    public function comparePasswords(string $password): bool
    {
        return password_verify($password, $this->password);
    }
}