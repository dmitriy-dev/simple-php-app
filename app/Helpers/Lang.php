<?php
/**
 * User: dmitriy
 * Date: 9/30/19
 * Time: 9:12 PM
 */

namespace App\Helpers;


use App\Core\Localization;

class Lang
{
    /**
     * @param string $key
     * @param array|null $names
     * @return null|string
     */
    public static function get(string $key, array $names = null): ?string
    {
        return Localization::gi()->get($key, $names);
    }

    /**
     * @return string
     */
    public static function current(): string
    {
        return Localization::gi()->getCurrentLanguage();
    }
}