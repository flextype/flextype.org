<?php

declare(strict_types=1);

use Atomastic\Filesystem\Filesystem;

if (! function_exists('filesystem')) {
    /**
     * Create a Filesystem instance.
     */
    function filesystem(): Filesystem
    {
        return new Filesystem();
    }
}
