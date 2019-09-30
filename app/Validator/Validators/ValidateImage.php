<?php
/**
 * User: dmitriy
 * Date: 9/27/19
 * Time: 9:11 AM
 */

namespace App\Validator\Validators;


use App\Helpers\Lang;

class ValidateImage implements ValidateInterface
{

    /**
     * @param string $field
     * @param array $request
     * @param $additional
     * @return mixed
     */
    public function __invoke(string $field, array $request, $additional = null)
    {
        if (!key_exists($field, $request) || !is_array($request[$field]) || empty($request['tmp_name'])) {
            return true;
        }

        if (in_array($request[$field]['type'], ['image/jpeg', 'image/png', 'image/gif'])) {
            return true;
        }

        return [
            'error' => Lang::get('validator_error_image'),
        ];
    }
}