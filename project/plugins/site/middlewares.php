<?php

declare(strict_types=1);

/**
 * Flextype (https://flextype.org)
 * Founded by Sergey Romanenko and maintained by Flextype Community.
 */

namespace Flextype\Plugin\Site;

use Middlewares\TrailingSlash;

/**
 * Add middleware TrailingSlash for all routes
 */
flextype()->add((new TrailingSlash(false))->redirect(true));
