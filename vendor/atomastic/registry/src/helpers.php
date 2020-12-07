<?php

declare(strict_types=1);

use Atomastic\Registry\Registry;

if (! function_exists('registry')) {
    /**
     * Gets the instance via lazy initialization (created on first usage)
     */
    function registry(): Registry
    {
        return Registry::getInstance();
    }
}
