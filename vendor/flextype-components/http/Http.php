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

namespace Flextype\Component\Http;

use Flextype\Component\Arr\Arr;

class Http
{
    /**
     * HTTP status codes and messages
     *
     * @var array
     */
    public static $http_status_messages = [
        100 => 'Continue',
        101 => 'Switching Protocols',
        102 => 'Processing',            // RFC2518
        200 => 'OK',
        201 => 'Created',
        202 => 'Accepted',
        203 => 'Non-Authoritative Information',
        204 => 'No Content',
        205 => 'Reset Content',
        206 => 'Partial Content',
        207 => 'Multi-Status',          // RFC4918
        208 => 'Already Reported',      // RFC5842
        226 => 'IM Used',               // RFC3229
        300 => 'Multiple Choices',
        301 => 'Moved Permanently',
        302 => 'Found',
        303 => 'See Other',
        304 => 'Not Modified',
        305 => 'Use Proxy',
        306 => 'Reserved',
        307 => 'Temporary Redirect',
        308 => 'Permanent Redirect',    // RFC-reschke-http-status-308-07
        400 => 'Bad Request',
        401 => 'Unauthorized',
        402 => 'Payment Required',
        403 => 'Forbidden',
        404 => 'Not Found',
        405 => 'Method Not Allowed',
        406 => 'Not Acceptable',
        407 => 'Proxy Authentication Required',
        408 => 'Request Timeout',
        409 => 'Conflict',
        410 => 'Gone',
        411 => 'Length Required',
        412 => 'Precondition Failed',
        413 => 'Request Entity Too Large',
        414 => 'Request-URI Too Long',
        415 => 'Unsupported Media Type',
        416 => 'Requested Range Not Satisfiable',
        417 => 'Expectation Failed',
        418 => 'I\'m a teapot',                                               // RFC2324
        422 => 'Unprocessable Entity',                                        // RFC4918
        423 => 'Locked',                                                      // RFC4918
        424 => 'Failed Dependency',                                           // RFC4918
        425 => 'Reserved for WebDAV advanced collections expired proposal',   // RFC2817
        426 => 'Upgrade Required',                                            // RFC2817
        428 => 'Precondition Required',                                       // RFC6585
        429 => 'Too Many Requests',                                           // RFC6585
        431 => 'Request Header Fields Too Large',                             // RFC6585
        500 => 'Internal Server Error',
        501 => 'Not Implemented',
        502 => 'Bad Gateway',
        503 => 'Service Unavailable',
        504 => 'Gateway Timeout',
        505 => 'HTTP Version Not Supported',
        506 => 'Variant Also Negotiates (Experimental)',                      // RFC2295
        507 => 'Insufficient Storage',                                        // RFC4918
        508 => 'Loop Detected',                                               // RFC5842
        510 => 'Not Extended',                                                // RFC2774
        511 => 'Network Authentication Required',                             // RFC6585
    ];

    /**
     * Set response header status
     *
     * Http::setResponseStatus(404);
     *
     * @param integer $status Status code
     * @return void
     */
    public static function setResponseStatus(int $status) : void
    {
        if (array_key_exists($status, Http::$http_status_messages)) {
            header('HTTP/1.1 ' . $status . ' ' . Http::$http_status_messages[$status]);
        }
    }

    /**
     * Redirects the browser to a page specified by the $url argument.
     *
     * Http::redirect('test');
     *
     * @param string  $url    The URL
     * @param integer $status Status
     * @param integer $delay  Delay
     */
    public static function redirect(string $url, int $status = 302, int $delay = null)
    {
        // Status codes
        $messages = [];
        $messages[301] = '301 Moved Permanently';
        $messages[302] = '302 Found';

        // Is Headers sent ?
        if (headers_sent()) {
            echo "<script>document.location.href='" . $url . "';</script>\n";
        } else {

            // Redirect headers
            Http::setRequestHeaders('HTTP/1.1 ' . $status . ' ' . Arr::get($messages, $status, 302));

            // Delay execution
            if ($delay !== null) {
                sleep((int) $delay);
            }

            // Redirect
            Http::setRequestHeaders("Location: $url");

            // Shutdown request
            Http::requestShutdown();
        }
    }

    /**
     * Set one or multiple headers.
     *
     * Http::setRequestHeaders('Location: http://site.com/');
     *
     * @param mixed $headers String or array with headers to send.
     */
    public static function setRequestHeaders($headers)
    {
        // Loop elements
        foreach ((array) $headers as $header) {

            // Set header
            header((string) $header);
        }
    }

    /**
     * Get
     *
     * $action = Http::get('action');
     *
     * @param string $key Key
     * @param mixed
     */
    public static function get(string $key)
    {
        return Arr::get($_GET, $key);
    }

    /**
     * Post
     *
     * $login = Http::post('login');
     *
     * @param string $key Key
     * @param mixed
     */
    public static function post(string $key)
    {
        return Arr::get($_POST, $key);
    }

    /**
     * Gets the base URL
     *
     * echo Http::getBaseUrl();
     *
     * @return string
     */
    public static function getBaseUrl() : string
    {
        $https = (isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) == 'on') ? 'https://' : 'http://';

        return $https . rtrim(rtrim($_SERVER['HTTP_HOST'], '\\/') . dirname($_SERVER['PHP_SELF']), '\\/');
    }

    /**
     * Gets current URL
     *
     * echo Http::getCurrentUrl();
     *
     * @return string
     */
    public static function getCurrentUrl() : string
    {
        return (!empty($_SERVER['HTTPS'])) ? "https://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'] : "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
    }

    /**
     * Get Uri String
     *
     * $uri_string = Http::getUriString();
     *
     * @access  public
     * @return string
     */
    public static function getUriString() : string
    {
        // Get request url and script url
        $url = '';
        $request_url = (isset($_SERVER['REQUEST_URI'])) ? $_SERVER['REQUEST_URI'] : '';
        $script_url  = (isset($_SERVER['PHP_SELF'])) ? $_SERVER['PHP_SELF'] : '';

        // Get our url path and trim the / of the left and the right
        if ($request_url != $script_url) {
            $url = trim(preg_replace('/'. str_replace('/', '\/', str_replace('index.php', '', $script_url)) .'/', '', $request_url, 1), '/');
        }

        $url = preg_replace('/\?.*/', '', $url); // Strip query string

        return $url;
    }

    /**
     * Get Uri Segments
     *
     * $uri_segments = Http::getUriSegments();
     *
     * @access  public
     * @return array
     */
    public static function getUriSegments() : array
    {
        return explode('/', self::getUriString());
    }

    /**
     * Get Uri Segment
     *
     * $uri_segment = Http::getUriSegment(1);
     *
     * @access  public
     * @param int $segment segment
     * @return string
     */
    public static function getUriSegment(int $segment)
    {
        $segments = self::getUriSegments();
        return isset($segments[$segment]) ? $segments[$segment] : null;
    }

    /**
     * Returns whether this is an ajax request or not
     *
     * if (Http::isAjaxRequest()) {
     *   // do something...
     * }
     *
     * @return boolean
     */
    public static function isAjaxRequest() : bool
    {
        return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest';
    }

    /**
     * Terminate request
     *
     *  Http::requestShutdown();
     *
     */
    public static function requestShutdown()
    {
        exit(0);
    }

}
