<?php
/**
 * User: dmitriy
 * Date: 9/27/19
 * Time: 8:36 AM
 */

namespace App\Validator\Validators;


use App\Helpers\Lang;

class ValidateInt implements ValidateInterface
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

        if (is_int($request[$field])) {
            return true;
        }

        return [
            'error' => Lang::get('validator_error_int'),
        ];
    }
}