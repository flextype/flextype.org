<?php

/**
 * @package Flextype Components
 *
 * @author Sergey Romanenko <awilum@yandex.ru>
 * @link http://components.flextype.org
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Flextype\Component\I18n;

class I18n
{
    /**
     * Dictionary
     *
     * @var array
     */
    private static $dictionary = [];

    /**
     * Default locale
     *
     * @var string
     */
    public static $locale = 'en';

    /**
     * Add translation keys
     *
     * I18n::add(['auth_login' => 'Login', 'auth_password' => 'Password'], 'ru');
     *
     * @param  string $translates Translation keys and values to add
     * @param  string $locale     Locale
     * @return void
     */
    public static function add(array $translates, string $locale = null) : void
    {
        $locale = ($locale === null) ? I18n::$locale : $locale;

        if (isset(I18n::$dictionary[$locale])) {
            I18n::$dictionary[$locale] += $translates;
        } else {
            I18n::$dictionary[$locale] = $translates;
        }
    }

    /**
     * Returns translation of a string. If no translation exists, the original
     * string will be returned. No parameters are replaced.
     *
     * $translated_string = I18n::find('auth_login', 'ru');
     *
     * @param  string $translate Translate to find
     * @param  string $locale    Locale
     * @param  array  $values    Values to replace in the translated text
     * @return string
     */
    public static function find(string $translate, string $locale = null, array $values = []) : string
    {
        $locale = ($locale === null) ? I18n::$locale : $locale;

        // Search current string to translate in the Dictionary
        if (isset(I18n::$dictionary[$locale][$translate])) {
            $translate = I18n::$dictionary[$locale][$translate];
            $translate = empty($values) ? $translate : strtr($translate, $values);
        } else {
            $translate = $translate;
        }

        // Return translation of a string
        return $translate;
    }
}

if ( ! function_exists('__')) {
    /**
     * Global Translation/Internationalization function.
     * Accepts an translation key and returns its translation for selected language.
     * If the given translation key is not available in the current dictionary the
     * translation key will be returned.
     *
     * // Display a translated message
     * echo __('auth_login', 'auth', 'ru');
     *
     * // With parameter replacement
     * echo __('auth_welcome_message', 'ru', [':username' => $username]);
     *
     * @param  string $translate Translate to find
     * @param  string $locale    Locale
     * @param  array  $values    Values to replace in the translated text
     * @return string
     */
    function __(string $translate, string $locale = null, array $values = []) : string
    {
        return I18n::find($translate, $locale, $values);
    }
}
