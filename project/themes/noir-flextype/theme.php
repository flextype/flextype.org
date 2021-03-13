<?php

declare(strict_types=1);

namespace Flextype\Themes\Noir;

use Slim\Http\Environment;
use Slim\Http\Uri;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

$scriptPath = PATH['project'] . '/themes/' . flextype('registry')->get('plugins.site.settings.theme') . '/scripts';

include_once $scriptPath . '/tokens.php';
include_once $scriptPath . '/blog.php';
include_once $scriptPath . '/dump.php';
include_once $scriptPath . '/arrays.php';

// Redirects for old urls with SEO 301
flextype()->get('/en/{uri:.+}', function(Request $request, Response $response, $args) {
    return $response->withRedirect('/' . $args['uri'], 301);
});

flextype()->get('/ru/{uri:.+}', function(Request $request, Response $response, $args) {
    return $response->withRedirect('/' . $args['uri'], 301);
});
//---------

// Redirect from home page to root
flextype()->get('/home', function(Request $request, Response $response, $args) {
    return $response->withRedirect('/' . $args['uri'], 301);
});
