<?php
/**
 * User: dmitriy
 * Date: 9/26/19
 * Time: 6:52 PM
 */

namespace App\Validator;


class Validator
{
    public const STATUS_VALIDATED = 'VALIDATED';
    public const STATUS_ERROR = 'ERROR';

    /**
     * Validator constructor.
     * @param array $rules
     * @param array $request
     * @return array
     */
    public static function run(array $rules, array $request)
    {
        $validator = new static();
        $result = [
            'status' => self::STATUS_VALIDATED,
            'fields' => [],
        ];

        foreach ($rules as $fieldName => $ruleString) {
            if (!empty($check = $validator->checkRule($fieldName, $ruleString, $request))) {
                $result['status'] = self::STATUS_ERROR;
                $result['fields'][$fieldName] = $check;
            }
        }

        return $result;
    }

    /**
     * @param string $fieldName
     * @param string $ruleString
     * @param array $request
     * @return array
     */
    private function checkRule(string $fieldName, string $ruleString, array $request): array
    {
        $rules = explode('|', $ruleString);
        $result = [];

        foreach ($rules as $rule) {
            $additional = null;
            if (strpos($rule, ':')) {
                [$rule, $additional] = explode(':', $rule);
            }

            $classPath = '\App\Validator\Validators\Validate' . $rule;

            if (!class_exists($classPath)) {
                var_dump($rule);
                throw new \RuntimeException('Класс валидации не найден! ' . $classPath);
            }

            if (true !== $status = (new $classPath)($fieldName, $request, $additional)) {
                $result[] = $status;
            }
        }

        return $result;
    }
}