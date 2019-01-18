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

namespace Flextype\Component\Event;

class Event
{
    /**
     * The registered listeners.
     *
     * @var array
     * @access protected
     */
    private static $listeners = [];

    /**
     * Add new listener
     *
     * Event::addListener('event_name', function() { echo 'Test Event 1'; }, 1);
     * Event::addListener('event_name', function() { echo 'Test Event 2'; }, 2);
     *
     * @access public
     * @param  string  $event     Event name
     * @param  mixed   $function  Function to add
     * @param  integer $priority  Priority. Default is 10
     * @param  array   $args      Function aguments
     * @return void
     */
    public static function addListener(string $event, $function, int $priority = 10, array $args = null) : void
    {
        Event::$listeners[$event][$priority][] = [
            'function'  => $function,
            'args'      => $args
        ];
    }

    /**
     * Get listeners array
     *
     * $listeners = Event::getListeners();
     *
     * @access public
     * @return array
     */
    public static function getListeners() : array
    {
        return Event::$listeners;
    }

    /**
     * Remove all listeners for current event.
     *
     * Event::removeAllListeners('event_name');
     *
     * @access public
     * @param  string  $event Event name
     * @return void
     */
    public static function removeAllListeners(string $event) : void
    {
        if (Event::hasListeners($event)) {
            unset(Event::$listeners[$event]);
        }
    }

    /**
     * Check is listeners exists for current event.
     *
     * if (Event::hasListeners('event_name')) {
     *     // do something...
     * }
     *
     * @access public
     * @param  string  $event       Event name
     * @return bool    $return      Return data or not. Default is false
     */
    public static function hasListeners(string $event) : bool
    {
        if (! isset(Event::$listeners[$event]) || count(Event::$listeners[$event]) === 0) {
            return false;
        }

        return true;
    }

    /**
     * Dispatch all listeners of the given event.
     *
     * Event::dispatch('event_name');
     *
     * @access public
     * @param  string  $event       Event name
     * @param  array   $args        Arguments
     * @param  bool    $return      Return data or not. Default is false
     * @return mixed
     */
    public static function dispatch(string $event, array $args = [], bool $return = false)
    {
        // is there some registered $listeners ?
        if (isset(Event::$listeners[$event]) && count(Event::$listeners[$event]) > 0) {

            // Get all listeners for given event.
            $listeners = Event::$listeners[$event];

            // Sort by priority
            krsort($listeners);

            // Loop through $listeners array
            foreach ($listeners as $listener) {

                // Loop through $_listener array
                foreach ($listener as $_listener) {

                    // Return or Render specific $_listener results ?
                    if ($return) {
                        return call_user_func_array($_listener['function'], (isset($args) ? $args : $_listener['args']));
                    } else {
                        call_user_func_array($_listener['function'], (isset($args) ? $args : $_listener['args']));
                    }
                }
            }
        }
    }
}
