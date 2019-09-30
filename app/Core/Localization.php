<?php
/**
 * User: dmitriy
 * Date: 9/30/19
 * Time: 6:20 PM
 */

namespace App\Core;


class Localization
{
    private static $instance;
    private $messages;
    private $currentLanguage;

    public const DEFAULT_LANGUAGE = 'ru';

    public static function gi(): self
    {
        if (static::$instance === null) {
            static::$instance = new static();
        }

        return static::$instance;
    }

    private function __construct()
    {
    }

    private function __clone()
    {
    }

    /**
     * @param string $language
     * @return bool
     */
    public function setLanguage(string $language): bool
    {
        if (!file_exists(dirname($_SERVER['DOCUMENT_ROOT']) . '/resources/languages/' . $language . '/messages.php')) {
            return false;
        }

        $_SESSION['language'] = $language;
        $this->currentLanguage = $language;

        return true;
    }

    /**
     * @return string
     */
    public function getCurrentLanguage(): string
    {
        if (null === $this->currentLanguage) {
            if (empty($_SESSION['language'])) {
                return $this->currentLanguage = static::DEFAULT_LANGUAGE;
            }

            $language = $_SESSION['language'];

            if (!file_exists(dirname($_SERVER['DOCUMENT_ROOT']) . '/resources/languages/' . $language . '/messages.php')) {
                return $this->currentLanguage = static::DEFAULT_LANGUAGE;
            }

            $this->currentLanguage = $language;
        }

        return $this->currentLanguage;
    }

    /**
     * @param string $key
     * @param array|null $names
     * @return null|string
     */
    public function get(string $key, array $names = null): ?string
    {
        if (null === $this->messages) {
            $this->messages = include dirname($_SERVER['DOCUMENT_ROOT']) . '/resources/languages/' . $this->getCurrentLanguage() . '/messages.php';
        }

        if (!key_exists($key, $this->messages)) {
            return null;
        }

        if (null === $names) {
            return $this->messages[$key];
        }

        foreach ($names as $k => $value) {
            $this->messages[$key] = str_replace(':' . $k, $value, $this->messages[$key]);
        }

        return $this->messages[$key];
    }
}