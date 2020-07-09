<?php

namespace Flextype;

use Flextype\Component\Arr\Arr;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

/**
 * @property Twig $twig
 * @property Entries $entries
 */
class SitemapController extends Container {

    /**
     * Current $sitemap data array
     *
     * @var array
     * @access public
     */
    public $sitemap = [];

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
        $entries = $this->entries->fetch('', ['recursive' => true,
                                              'order_by' => ['field' => 'modified_at',
                                                             'direction' => 'desc']]);

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
                $entry['changefreq'] = $this->registry->get('plugins.sitemap.settings.default.changefreq');
            }

            // Check entry priority field
            if (isset($entry['sitemap']['priority'])) {
                $entry['priority'] = $entry['sitemap']['priority'];
            } else {
                $entry['priority'] = $this->registry->get('plugins.sitemap.settings.default.priority');
            }

            // Check ignore list
            if (in_array($entry['slug'], (array) $this->registry->get('plugins.sitemap.settings.ignore'))) {
                continue;
            }

            // Prepare data
            $entry_to_add['loc']        = $entry['slug'];
            $entry_to_add['lastmod']    = $entry['modified_at'];
            $entry_to_add['changefreq'] = $entry['changefreq'];
            $entry_to_add['priority']   = $entry['priority'];

            // Add entry to sitemap
            $sitemap[] = $entry_to_add;
        }

        // Additions
        $additions = (array) $this->registry->get('plugins.sitemap.settings.additions');
        foreach ($additions as $addition) {
            $sitemap[] = $addition;
        }

        // Set entry to the SitemapController class property $sitemap
        $this->sitemap = $sitemap;

        // Run event onSitemapAfterInitialized
        $this->emitter->emit('onSitemapAfterInitialized');

        // Set response header
        $response = $response->withHeader('Content-Type', 'application/xml');

        return $this->twig->render(
            $response,
            'plugins/sitemap/templates/index.html',
            [
                'sitemap' => $this->sitemap
            ]);
    }
}
