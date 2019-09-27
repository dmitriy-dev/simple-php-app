<?php
/**
 * User: dmitriy
 * Date: 9/27/19
 * Time: 8:37 AM
 */

namespace App\Validator\Validators;


class ValidateRequired implements ValidateInterface
{

    /**
     * @param string $field
     * @param array $request
     * @param $additional
     * @return mixed
     */
    public function __invoke(string $field, array $request, $additional = null)
    {
        if (key_exists($field, $request) && !empty($request[$field])) {
            return true;
        }

        return [
            'error' => 'Поле обязательно к заполнению!',
        ];
    }
}