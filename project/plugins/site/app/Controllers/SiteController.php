<?php

declare(strict_types=1);

/**
 * @link https://flextype.org
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Flextype\Plugin\Site\Controllers;

use Slim\Http\Environment;
use Slim\Http\Uri;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use function ltrim;
use Flextype\Component\Filesystem\Filesystem;

class SiteController
{
    /**
     * Index page
     *
     * @param Request  $request  PSR7 request
     * @param Response $response PSR7 response
     * @param array    $args     Args
     */
    public function index(Request $request, Response $response, array $args) : Response
    {
        // Get Query Params
        $query = $request->getQueryParams();

        // Get uri
        $uri = $args['uri'];

        // Is JSON Format
        $isJson = isset($query['format']) && $query['format'] === 'json';

        // If uri is empty then it is main entry else use entry uri
        if ($uri === '/') {
            $entry_uri = flextype('registry')->get('plugins.site.settings.entries.main');
        } else {
            $entry_uri = ltrim($uri, '/');
        }

        // Get entry body
        $entry_body = flextype('entries')->fetch($entry_uri)->toArray();

        // is entry not found
        $isEntryNotFound = false;

        // If entry body is not false
        if (is_array($entry_body) and count($entry_body) > 0) {
            // Get 404 page if entry visibility is draft or hidden and if routable is false
            if ((isset($entry_body['visibility']) && ($entry_body['visibility'] === 'draft' || $entry_body['visibility'] === 'hidden')) ||
                (isset($entry_body['routable']) && ($entry_body['routable'] === false))) {
                $entry              = $this->error404();
                $isEntryNotFound = true;
            } else {
                $entry = $entry_body;
            }
        } else {
            $entry           = $this->error404();
            $isEntryNotFound = true;
        }

        // Return in JSON Format
        if ($isJson) {
            if ($isEntryNotFound) {
                return $response->withJson($entry, 404);
            }

            return $response->withJson($entry);
        }

        // ========== custom code here ==========
        if ($uri === '/') {
            return $response->withRedirect('https://flextype.org/en');
        }
        // ========== custom code here ==========

        $themeBootstrapPath = PATH['project']. '/themes/' . flextype('registry')->get('plugins.site.settings.theme') . '/theme.php';
        filesystem()->file($themeBootstrapPath)->exists() and include_once $themeBootstrapPath;

        // Set template path for current entry
        $path = 'themes/' . flextype('registry')->get('plugins.site.settings.theme') . '/' . (empty($entry['template']) ? 'templates/default' : 'templates/' . $entry['template']) . '.html';

        if (! Filesystem::has(PATH['project'] . '/' . $path)) {
            return $response->write("Template {$entry['template']} not found");
        }

        $data = ['entry'   => $entry,
                 'args'    => $args,
                 'request' => $request];

        if ($isEntryNotFound) {
            return flextype('twig')->render($response->withStatus(404), $path, $data);
        }

        return flextype('twig')->render($response, $path, $data);
    }

    /**
     * Error404 page
     *
     * @return array The 404 error entry array data.
     *
     * @access public
     */
    public function error404() : array
    {
        return [
            'title'       => flextype('registry')->get('plugins.site.settings.entries.error404.title'),
            'description' => flextype('registry')->get('plugins.site.settings.entries.error404.description'),
            'content'     => flextype('registry')->get('plugins.site.settings.entries.error404.content'),
            'template'    => flextype('registry')->get('plugins.site.settings.entries.error404.template'),
        ];
    }
}
