<?php
/**
 * User: dmitriy
 * Date: 9/27/19
 * Time: 8:37 AM
 */

namespace App\Validator\Validators;


use App\Helpers\Lang;

class ValidateConfirmed implements ValidateInterface
{

    /**
     * @param string $field
     * @param array $request
     * @param $additional
     * @return mixed
     */
    public function __invoke(string $field, array $request, $additional = null)
    {
        if (key_exists($field, $request) && key_exists($field . '_confirmed', $request) && $request[$field] === $request[$field . '_confirmed']) {
            return true;
        }

        return [
            'error' => Lang::get('validator_error_confirmed'),
        ];
    }
}