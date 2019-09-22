# PSR-15 Middleware support for Slim Framework v3

## Installation

It's recommended that you use [Composer](https://getcomposer.org/).

```bash
$ composer require bnf/slim3-psr15 "^1.1"
```

## Usage

Create an index.php file with the following contents:

```php
<?php
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Server\MiddlewareInterface as Middleware;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;

require 'vendor/autoload.php';

$app = new \Slim\App();

$container = $app->getContainer();
/* Supply a custom callable resolver, which resolves PSR-15 middlewares. */
$container['callableResolver'] = function ($container) {
    return new \Bnf\Slim3Psr15\CallableResolver($container);
};

/* Add a PSR-15 middleware */
$app->add(new class implements Middleware {
    public function process(Request $request, RequestHandler $handler): Response
    {
        $request = $request->withAttribute('msg', 'Hello');
        return $handler->handle($request);
    }
});

$app->get('/hello/{name}', new class implements RequestHandler {
    public function handle(Request $request): Response {
        $name = $request->getAttribute('name');
        $msg = $request->getAttribute('msg');
        $response = new \Slim\Http\Response;
        $response->getBody()->write("$msg, $name");

        return $response;
    }
});
$app->run();
```

You may quickly test this using the built-in PHP server:
```bash
$ php -S localhost:8000
```

Going to http://localhost:8000/hello/world will now display "Hello, world".
