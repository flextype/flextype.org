<?php

declare(strict_types=1);

/**
 * Flextype (https://flextype.org)
 * Founded by Sergey Romanenko and maintained by Flextype Community.
 */

namespace Flextype\Plugin\Twig\Twig;

use Twig\Extension\AbstractExtension;
use Slim\Http\Environment;
use Slim\Http\Uri;

class UrlTwigExtension extends AbstractExtension
{
    /**
     * @var \Slim\Interfaces\RouterInterface
     */
    private $router;

    /**
     * @var string|\Slim\Http\Uri
     */
    private $uri;

    public function __construct()
    {
        $this->router = flextype('router');
        $this->uri = Uri::createFromEnvironment(new Environment($_SERVER));
    }

    public function getName()
    {
        return 'slim';
    }

    public function getFunctions()
    {
        return [
            new \Twig\TwigFunction('url', array($this, 'getUrl')),
            new \Twig\TwigFunction('urlFor', array($this, 'urlFor')),
            new \Twig\TwigFunction('fullUrlFor', array($this, 'fullUrlFor')),
            new \Twig\TwigFunction('baseUrl', array($this, 'getBaseUrl')),
            new \Twig\TwigFunction('isCurrentUrl', array($this, 'isCurrentUrl')),
            new \Twig\TwigFunction('currentUrl', array($this, 'getCurrentUrl')),
        ];
    }

    public function urlFor($name, $data = [], $queryParams = [], $appName = 'default')
    {
        return $this->router->pathFor($name, $data, $queryParams);
    }

    /**
     * Similar to pathFor but returns a fully qualified URL
     *
     * @param string $name The name of the route
     * @param array $data Route placeholders
     * @param array $queryParams
     * @param string $appName
     * @return string fully qualified URL
     */
    public function fullUrlFor($name, $data = [], $queryParams = [], $appName = 'default')
    {
        $path = $this->urlFor($name, $data, $queryParams, $appName);

        /** @var Uri $uri */
        if (is_string($this->uri)) {
            $uri = Uri::createFromString($this->uri);
        } else {
            $uri = $this->uri;
        }

        $scheme = $uri->getScheme();
        $authority = $uri->getAuthority();

        $host = ($scheme ? $scheme . ':' : '')
            . ($authority ? '//' . $authority : '');

        return $host.$path;
    }

    public function isCurrentUrl($name, $data = [])
    {
        return $this->router->pathFor($name, $data) === $this->uri->getBasePath() . '/' . ltrim($this->uri->getPath(), '/');
    }

    /**
     * Returns current path on given URI.
     *
     * @param bool $withQueryString
     * @return string
     */
    public function getCurrentUrl($withQueryString = false)
    {
        if (is_string($this->uri)) {
            return $this->uri;
        }

        $path = $this->uri->getBasePath() . '/' . ltrim($this->uri->getPath(), '/');

        if ($withQueryString && '' !== $query = $this->uri->getQuery()) {
            $path .= '?' . $query;
        }

        return $path;
    }

    public function getBaseUrl()
    {
        if (is_string($this->uri)) {
            return $this->uri;
        }
        if (method_exists($this->uri, 'getBaseUrl')) {
            return $this->uri->getBaseUrl();
        }
    }

    /**
     * Set the base url
     *
     * @param string|Slim\Http\Uri $baseUrl
     * @return void
     */
    public function setBaseUrl($baseUrl)
    {
        $this->uri = $baseUrl;
    }

    /**
     * Get Application URL
     */
    public function getUrl() : string
    {
        if (flextype('registry')->has('flextype.settings.url') && flextype('registry')->get('flextype.settings.url') != '') {
            return flextype('registry')->get('flextype.settings.url');
        } else {
            return Uri::createFromEnvironment(new Environment($_SERVER))->getBaseUrl();
        }
    }
}
