<?php
/**
 * User: dmitriy
 * Date: 9/27/19
 * Time: 8:33 AM
 */

namespace App\Validator\Validators;


class ValidateString implements ValidateInterface
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

        if (is_string($request[$field])) {
            return true;
        }

        return [
            'error' => 'Поле должно быть строкой!',
        ];
    }
}