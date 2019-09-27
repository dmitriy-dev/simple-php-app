<?php
/**
 * User: dmitriy
 * Date: 9/27/19
 * Time: 8:56 AM
 */

namespace App\Validator\Validators;


class ValidateEmail implements ValidateInterface
{

    /**
     * @param string $field
     * @param array $request
     * @param $additional
     * @return mixed
     */
    public function __invoke(string $field, array $request, $additional = null)
    {
        if (!key_exists($field, $request)) {
            return true;
        }

        if (filter_var($request[$field], FILTER_VALIDATE_EMAIL)) {
            return true;
        }

        return [
            'error' => 'Email указан не верно!',
        ];
    }
}