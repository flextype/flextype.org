<?php

namespace Flextype\Plugin\Sitemap\Controllers;

use Flextype\Component\Arrays\Arrays;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class SitemapController
{
    /**
     * Current $sitemap data array
     *
     * @var array
     * @access public
     */
    public $sitemap = [];

    /**
     * Constructor
     *
     * @access public
     */
    public function __construct()
    {

    }

    /**
     * Index page
     *
     * @param Request  $request  PSR7 request
     * @param Response $response PSR7 response
     * @return Response
     */
    public function index(Request $request, Response $response) : Response
    {
        $sitemap  = [];

        $entries = flextype('entries')
                        ->fetch('', ['collection' => true, 'find' => ['depth' => '> 0']])
                        ->sortBy('modified_at', 'asc')
                        ->all();

        foreach ($entries as $entry) {

            // Check entry visibility field
            if (isset($entry['visibility']) && ($entry['visibility'] === 'draft' || $entry['visibility'] === 'hidden')) {
                continue;
            }

            // Check entry routable field
            if (isset($entry['routable']) && ($entry['routable'] === false)) {
                continue;
            }

            // Check entry sitemap.ignore field
            if (isset($entry['sitemap']['ignore']) && ($entry['sitemap']['ignore'] === true)) {
                continue;
            }

            // Check entry changefreq field
            if (isset($entry['sitemap']['changefreq'])) {
                $entry['changefreq'] = $entry['sitemap']['changefreq'];
            } else {
                $entry['changefreq'] = flextype('registry')->get('plugins.sitemap.settings.default.changefreq');
            }

            // Check entry priority field
            if (isset($entry['sitemap']['priority'])) {
                $entry['priority'] = $entry['sitemap']['priority'];
            } else {
                $entry['priority'] = flextype('registry')->get('plugins.sitemap.settings.default.priority');
            }

            // Check ignore list
            if (in_array($entry['id'], (array) flextype('registry')->get('plugins.sitemap.settings.ignore'))) {
                continue;
            }

            // Prepare data
            $entry_to_add['loc']        = $entry['id'];
            $entry_to_add['lastmod']    = $entry['modified_at'];
            $entry_to_add['changefreq'] = $entry['changefreq'];
            $entry_to_add['priority']   = $entry['priority'];

            // Add entry to sitemap
            $sitemap[] = $entry_to_add;
        }

        // Additions
        $additions = (array) flextype('registry')->get('plugins.sitemap.settings.additions');
        foreach ($additions as $addition) {
            $sitemap[] = $addition;
        }

        // Set entry to the SitemapController class property $sitemap
        $this->sitemap = $sitemap;

        // Run event onSitemapAfterInitialized
        flextype('emitter')->emit('onSitemapAfterInitialized');

        // Set response header
        $response = $response->withHeader('Content-Type', 'application/xml');

        return flextype('twig')->render(
            $response,
            'plugins/sitemap/templates/index.html',
            [
                'sitemap' => $this->sitemap
            ]);
    }
}
