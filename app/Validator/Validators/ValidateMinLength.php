<?php
/**
 * User: dmitriy
 * Date: 9/27/19
 * Time: 8:35 AM
 */

namespace App\Validator\Validators;


class ValidateMinLength implements ValidateInterface
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

        if (is_string($request[$field]) && strlen($request[$field]) >= $additional) {
            return true;
        }

        return [
            'error' => 'Длина строки должна быть не меньше ' . $additional . ' символов',
        ];
    }
}