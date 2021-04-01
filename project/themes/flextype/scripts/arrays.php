<?php

declare(strict_types=1);

namespace Flextype\Themes\Noir\Scripts;

use Atomastic\Arrays\Arrays;
use Atomastic\Macroable\Macroable;

Arrays::macro('onlyFromCollection', function(array $keys) {
    $result = [];

    foreach ($this->toArray() as $key => $value) {
        $result[$key] = arrays($value)->only($keys)->toArray();
    }

    return arrays($result);
});

Arrays::macro('exceptFromCollection', function(array $keys) {
    $result = [];

    foreach ($this->toArray() as $key => $value) {
        $result[$key] = arrays($value)->except($keys)->toArray();
    }

    return arrays($result);
});
