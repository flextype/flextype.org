<?php

declare(strict_types=1);

namespace Flextype\Themes\Noir;

use Slim\Http\Environment;
use Slim\Http\Uri;

$scriptPath = PATH['project'] . '/themes/' . flextype('registry')->get('plugins.site.settings.theme') . '/scripts';

include_once $scriptPath . '/locale.php';
include_once $scriptPath . '/tokens.php';
include_once $scriptPath . '/blog.php';
