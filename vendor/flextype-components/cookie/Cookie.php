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

namespace Flextype\Component\Cookie;

class Cookie
{

    /**
     * @var  string  Magic salt to add to the cookie
     */
    public static $salt = NULL;

    /**
     * @var  integer  Number of seconds before the cookie expires
     */
     public static $expiration = 0;

    /**
     * @var  string  Restrict the path that the cookie is available to
     */
    public static $path = '/';

    /**
     * @var  string  Restrict the domain that the cookie is available to
     */
    public static $domain = NULL;

    /**
     * @var  boolean  Only transmit cookies over secure connections
     */
    public static $secure = FALSE;

    /**
     * @var  boolean  Only transmit cookies over HTTP, disabling Javascript access
     */
    public static $httponly = FALSE;

    /**
     * Set a cookie
     *
     * Cookie::set('username', 'Awilum');
     *
     * @param  string  $key      A name for the cookie.
     * @param  string  $value    The value to be stored. Keep in mind that they will be serialized.
     * @param  int     $lifetime The number of seconds that this cookie will be available.
     * @return bool
     */
    public static function set(string $key, string $value, int $lifetime = NULL) : bool
    {

        if ($lifetime === NULL) {
            // Use the default expiration
            $lifetime = Cookie::$expiration;
        }

        if ($lifetime !== 0) {
            // The expiration is expected to be a UNIX timestamp
            $lifetime += static::_time();
        }

        // Add the salt to the cookie value
        $value = Cookie::salt($name, $value).'~'.$value;

        return static::_setcookie($name, $value, $lifetime, Cookie::$path, Cookie::$domain, Cookie::$secure, Cookie::$httponly);
    }

    /**
     * Get a cookie
     *
     * $username = Cookie::get('username');
     *
     * @param  string $key The name of the cookie that should be retrieved.
     * @return mixed
     */
     public static function get($key, $default = NULL) {

        if ( ! isset($_COOKIE[$key])) {

            // The cookie does not exist
            return $default;
        }

        // Get the cookie value
        $cookie = $_COOKIE[$key];

        // Find the position of the split between salt and contents
        $split = strlen(Cookie::salt($key, NULL));

        if (isset($cookie[$split]) AND $cookie[$split] === '~') {

            // Separate the salt and the value
            list ($hash, $value) = explode('~', $cookie, 2);

            function slow_equals($a, $b)
            {
                $diff = strlen($a) ^ strlen($b);

                for($i = 0; $i < strlen($a) AND $i < strlen($b); $i++) {
                    $diff |= ord($a[$i]) ^ ord($b[$i]);
                }

                return $diff === 0;
            }

            if (slow_equals(Cookie::salt($key, $value), $hash)) {

                // Cookie signature is valid
                return $value;
            }

            // The cookie signature is invalid, delete it
            static::delete($key);
        }

        return $default;
 	}

    /**
     * Deletes a cookie by making the value NULL and expiring it.
     *
     *     Cookie::delete('theme');
     *
     * @param   string  $name   cookie name
     * @return  boolean
     */
    public static function delete($name)
    {
        // Remove the cookie
        unset($_COOKIE[$name]);

        // Nullify the cookie and make it expire
        return static::_setcookie($name, NULL, -86400, Cookie::$path, Cookie::$domain, Cookie::$secure, Cookie::$httponly);
    }

    /**
     * Generates a salt string for a cookie based on the name and value.
     *
     * $salt = Cookie::salt('theme', 'red');
     *
     * @param   string $name name of cookie
     * @param   string $value value of cookie
     * @return  string
     */
    public static function salt($name, $value)
    {
        // Require a valid salt
        if ( ! Cookie::$salt) {
            throw new \RuntimeException('A valid cookie salt is required.');
        }

        // Determine the user agent
        $agent = isset($_SERVER['HTTP_USER_AGENT']) ? strtolower($_SERVER['HTTP_USER_AGENT']) : 'unknown';
        return hash_hmac('sha1', $agent.$name.$value.Cookie::$salt, Cookie::$salt);
    }

    /**
     * Proxy for the native setcookie function
     *
     * @param string  $name
     * @param string  $value
     * @param integer $expire
     * @param string  $path
     * @param string  $domain
     * @param boolean $secure
     * @param boolean $httponly
     *
     * @return bool
     * @see setcookie
     */
    protected static function _setcookie($name, $value, $expire, $path, $domain, $secure, $httponly)
    {
        return setcookie($name, $value, $expire, $path, $domain, $secure, $httponly);
    }

    /**
     * Proxy for the native time function
     *
     * @return int
     */
    protected static function _time()
    {
        return time();
    }
}
