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

namespace Flextype\Component\Notification;

class Notification
{
    /**
     * Notifications session key
     *
     * @var string
     */
    const SESSION_KEY = 'notifications';

    /**
     * Notifications array
     *
     * @var array
     */
    private static $notifications = [];

    /**
     * Returns a specific variable from the Notifications array.
     *
     * echo Notification::get('success');
     * echo Notification::get('errors');
     *
     * @param  string $key Variable name
     * @return mixed
     */
    public static function get(string $key)
    {
        return isset(Notification::$notifications[$key]) ? Notification::$notifications[$key] : null;
    }

    /**
     * Adds specific variable to the Notifications array.
     *
     * Notification::set('success', 'Data has been saved with success!');
     * Notification::set('errors', 'Data not saved!');
     *
     * @param string $key   Variable name
     * @param mixed  $value Variable value
     */
    public static function set(string $key, $value) : void
    {
        $_SESSION[Notification::SESSION_KEY][$key] = $value;
    }

    /**
     * Adds specific variable to the Notifications array for current page.
     *
     * Notification::setNow('success', 'Success!');
     *
     * @param string $var   Variable name
     * @param mixed  $value Variable value
     */
    public static function setNow(string $key, $value) : void
    {
        Notification::$notifications[$key] = $value;
    }

    /**
     * Clears the Notifications array.
     *
     * Notification::clean();
     *
     * Data that previous pages stored will not be deleted, just the data that
     * this page stored itself.
     */
    public static function clean() : void
    {
        $_SESSION[Notification::SESSION_KEY] = [];
    }

    /**
     * Initializes the Notification service.
     *
     * Notification::init();
     *
     * This will read notification/flash data from the $_SESSION variable and load it into
     * the $this->previous array.
     */
    public static function init() : void
    {
        if ( ! empty($_SESSION[Notification::SESSION_KEY]) && is_array($_SESSION[Notification::SESSION_KEY])) {
            Notification::$notifications = $_SESSION[Notification::SESSION_KEY];
        }

        $_SESSION[Notification::SESSION_KEY] = [];
    }
}
