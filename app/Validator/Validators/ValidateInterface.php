<?php
/**
 * User: dmitriy
 * Date: 9/27/19
 * Time: 8:31 AM
 */

namespace App\Validator\Validators;


interface ValidateInterface
{
    /**
     * @param string $field
     * @param array $request
     * @param $additional
     * @return mixed
     */
    public function __invoke(string $field, array $request, $additional = null);
}