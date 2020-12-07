<?php

declare(strict_types=1);

namespace Atomastic\Session;

use RuntimeException as SessionException;

use function filter_var;
use function headers_sent;
use function ini_get;
use function ini_get_all;
use function ini_set;
use function session_destroy;
use function session_get_cookie_params;
use function session_id;
use function session_name;
use function session_regenerate_id;
use function session_set_cookie_params;
use function session_start;
use function session_status;
use function session_unset;
use function session_write_close;
use function setcookie;
use function sprintf;
use function substr;
use function time;

use const FILTER_VALIDATE_BOOLEAN;
use const PHP_SESSION_ACTIVE;

final class Session
{
    /**
     * Session options.
     * https://www.php.net/manual/en/session.configuration.php
     */
    private $options = [];

    /**
     * Create the session object.
     *
     * @param array $options Session options.
     *                       https://www.php.net/manual/en/session.configuration.php
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    /**
     * Starts the session.
     *
     * @throws SessionException On error.
     */
    public function start(): void
    {
        if ($this->isStarted()) {
            throw new SessionException('Failed to start the session: Already started.');
        }

        if (headers_sent($file, $line) && filter_var(ini_get('session.use_cookies'), FILTER_VALIDATE_BOOLEAN)) {
            throw new SessionException(
                sprintf(
                    'Failed to start the session because headers have already been sent by "%s" at line %d.',
                    $file,
                    $line
                )
            );
        }

        if (! session_start($this->options)) {
            throw new SessionException('Failed to start the session.');
        }
    }

    /**
     * Checks if the session was started.
     *
     * @return bool Session status.
     */
    public function isStarted(): bool
    {
        return (bool) (session_status() === PHP_SESSION_ACTIVE);
    }

    /**
     * Regenerates the session ID
     *
     * Migrates the current session to a new session id while maintaining all session attributes.
     *
     * @throws SessionException On error.
     */
    public function regenerateId(): void
    {
        if (! $this->isStarted()) {
            throw new SessionException('Cannot regenerate the session ID for non-active sessions.');
        }

        if (headers_sent()) {
            throw new SessionException('Headers have already been sent.');
        }

        if (! session_regenerate_id(true)) {
            throw new SessionException('The session ID could not be regenerated.');
        }
    }

    /**
     * Invalidates the current session.
     * Clears all session data and regenerates session ID.
     *
     * @throws SessionException On error.
     */
    public function destroy(): void
    {
        // Cannot regenerate the session ID for non-active sessions.
        if (! $this->isStarted()) {
            return;
        }

        $this->flush();

        if (ini_get('session.use_cookies')) {
            $params = session_get_cookie_params();
            setcookie(
                $this->getName(),
                '',
                time() - 42000,
                $params['path'],
                $params['domain'],
                $params['secure'],
                $params['httponly']
            );
        }

        if (session_unset() === false) {
            throw new SessionException('The session could not be unset.');
        }

        if (session_destroy() === false) {
            throw new SessionException('The session could not be destroyed.');
        }
    }

    /**
     * Returns the session ID.
     *
     * @return string The session ID.
     */
    public function getId(): string
    {
        return session_id() ?? '';
    }

    /**
     * Sets the session ID.
     *
     * @param string $id The session id.
     *
     * @throws SessionException On error.
     */
    public function setId(string $id): void
    {
        if ($this->isStarted()) {
            throw new SessionException('Cannot change session id when session is active');
        }

        session_id($id);
    }

    /**
     * Returns the session name.
     *
     * @return string The session name.
     */
    public function getName(): string
    {
        return session_name();
    }

    /**
     * Sets the session name.
     *
     * @param string $name The session name.
     *
     * @throws SessionException On error.
     */
    public function setName(string $name): void
    {
        if ($this->isStarted()) {
            throw new SessionException('Cannot change session name when session is active');
        }

        session_name($name);
    }

    /**
     * Returns true if the key exists.
     *
     * @param string $key The key.
     *
     * @return bool true if the key is defined, false otherwise.
     */
    public function has(string $key): bool
    {
        if (empty($_SESSION)) {
            return false;
        }

        return isset($_SESSION[$key]);
    }

    /**
     * Gets an attribute by key.
     *
     * @param string $key The key name.
     *
     * @return mixed|null Should return null if the key is not found.
     */
    public function get(string $key)
    {
        return $this->has($key) ? $_SESSION[$key] : null;
    }

    /**
     * Sets an session attribute by key.
     *
     * @param string $key   The key of the element to set.
     * @param mixed  $value The data to set.
     */
    public function set(string $key, $value): void
    {
        $_SESSION[$key] = $value;
    }

    /**
     * Deletes an attribute by key.
     *
     * @param string $key The key to remove.
     */
    public function delete(string $key): void
    {
        unset($_SESSION[$key]);
    }

    /**
     * Gets an session attribute by key and remove it.
     *
     * @param string $key The key name.
     *
     * @return mixed|null Should return null if the key is not found.
     */
    public function pull(string $key)
    {
        $value = $this->has($key) ? $_SESSION[$key] : null;
        $this->delete($key);

        return $value;
    }

    /**
     * Flush all session data.
     */
    public function flush(): void
    {
        $_SESSION = [];
    }

    /**
     * Gets all session values as array.
     *
     * @return array The session values
     */
    public function all(): array
    {
        return (array) $_SESSION;
    }

    /**
     * Force the session to be saved and closed.
     *
     * Session data is usually stored after your script terminated without the need
     * to call close(), but as session data is locked to prevent concurrent
     * writes only one script may operate on a session at any time. When using
     * framesets together with sessions you will experience the frames loading one
     * by one due to this locking. You can reduce the time needed to load all the
     * frames by ending the session as soon as all changes to session variables are
     * done.
     */
    public function close(): void
    {
        session_write_close();
    }

    /**
     * Set session runtime configuration.
     *
     * @see http://php.net/manual/en/session.configuration.php
     *
     * @param array $config The session options.
     */
    public function setOptions(array $options): void
    {
        foreach ($options as $key => $value) {
            ini_set('session.' . $key, (string) $value);
        }
    }

    /**
     * Get session runtime configuration.
     *
     * @return array The options
     */
    public function getOptions(): array
    {
        $options = [];

        foreach ((array) ini_get_all('session') as $key => $value) {
            $options[substr($key, 8)] = $value['local_value'];
        }

        return $options;
    }

    /**
     * Set cookie parameters.
     *
     * @see http://php.net/manual/en/function.session-set-cookie-params.php
     *
     * @param int         $lifetime The lifetime of the cookie in seconds
     * @param string|null $path     The path where information is stored
     * @param string|null $domain   The domain of the cookie
     * @param bool        $secure   The cookie should only be sent over secure connections
     * @param bool        $httpOnly The cookie can only be accessed through the HTTP protocol
     */
    public function setCookieParams(
        int $lifetime,
        ?string $path = null,
        ?string $domain = null,
        bool $secure = false,
        bool $httpOnly = false
    ): void {
        session_set_cookie_params($lifetime, $path ?? '/', $domain, $secure, $httpOnly);
    }

    /**
     * Get cookie parameters.
     *
     * @see http://php.net/manual/en/function.session-get-cookie-params.php
     *
     * @return array The cookie parameters
     */
    public function getCookieParams(): array
    {
        return session_get_cookie_params();
    }
}
