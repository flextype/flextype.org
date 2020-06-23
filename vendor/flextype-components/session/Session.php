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

namespace Flextype\Component\Session;

use Flextype\Component\Arr\Arr;

class Session
{
    /**
     * Starts the session.
     *
     * Session::start();
     */
    public static function start()
    {
        // Is session already started?
        if (! session_id()) {

            // Start the session
            return @session_start();
        }

        // If already started
        return true;
    }

    /**
     * Deletes one or more session variables.
     *
     * Session::delete('user');
     */
    public static function delete()
    {
        // Loop all arguments
        foreach (func_get_args() as $argument) {

            // Array element
            if (is_array($argument)) {

                // Loop the keys
                foreach ($argument as $key) {

                    // Unset session key
                    unset($_SESSION[(string) $key]);
                }
            } else {

                // Remove from array
                unset($_SESSION[(string) $argument]);
            }
        }
    }

    /**
     * Destroys the session.
     *
     * Session::destroy();
     */
    public static function destroy()
    {
        // Destroy
        if (session_id()) {
            session_unset();
            session_destroy();
            $_SESSION = array();
        }
    }

    /**
     * Checks if a session variable exists.
     *
     * if (Session::exists('user')) {
     *     // Do something...
     * }
     *
     * @return bool
     */
    public static function exists() : bool
    {
        // Start session if needed
        if (! session_id()) {
            Session::start();
        }

        // Loop all arguments
        foreach (func_get_args() as $argument) {

            // Array element
            if (is_array($argument)) {

                // Loop the keys
                foreach ($argument as $key) {

                    // Does NOT exist
                    if (! isset($_SESSION[(string) $key])) {
                        return false;
                    }
                }
            } else {

                // Does NOT exist
                if (! isset($_SESSION[(string) $argument])) {
                    return false;
                }
            }
        }

        return true;
    }

    /**
     * Gets a variable that was stored in the session.
     *
     * echo Session::get('user');
     *
     * @param  string $key The key of the variable to get.
     * @return mixed
     */
    public static function get(string $key)
    {
        // Start session if needed
        if (! session_id()) {
            self::start();
        }

        // Fetch key
        if (Session::exists((string) $key)) {
            return $_SESSION[(string) $key];
        }

        // Key doesn't exist
        return null;
    }


    /**
     * Returns the sessionID.
     *
     * echo Session::getSessionId();
     *
     * @return string
     */
    public static function getSessionId() : string
    {
        if (! session_id()) {
            Session::start();
        }

        return session_id();
    }


    /**
     * Stores a variable in the session.
     *
     * Session::set('user', 'Awilum');
     *
     * @param string $key   The key for the variable.
     * @param mixed  $value The value to store.
     */
    public static function set(string $key, $value)
    {
        // Start session if needed
        if (! session_id()) {
            self::start();
        }

        // Set key
        $_SESSION[(string) $key] = $value;
    }
}
