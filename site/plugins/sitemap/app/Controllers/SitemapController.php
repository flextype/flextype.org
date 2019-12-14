<?php

namespace Flextype;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

/**
 * @property View $view
 * @property Entries $entries
 */
class SitemapController extends Controller {

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
        $entries = $this->entries->fetch('', ['recursive' => true, 'order_by' => ['field' => 'published_at', 'direction' => 'desc']]);

        foreach ($entries as $entry) {

            if (!((isset($entry['visibility']) && ($entry['visibility'] === 'draft' || $entry['visibility'] === 'hidden')) ||
                (isset($entry['routable']) && ($entry['routable'] === false)))) {
                    $sitemap[] = $entry;
            }
        }

        $response = $response->withHeader('Content-Type', 'application/xml');

        return $this->view->render(
            $response,
            'plugins/sitemap/views/templates/index.html',
            [
                'sitemap' => $sitemap
            ]);
    }
}
