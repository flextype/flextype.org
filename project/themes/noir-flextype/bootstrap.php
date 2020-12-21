<?php

declare(strict_types=1);

namespace Flextype\Themes\Noir;

use Slim\Http\Environment;
use Slim\Http\Uri;

include_once PATH['project']. '/themes/' . flextype('registry')->get('plugins.site.settings.theme') . '/scripts/locale.php';
include_once PATH['project']. '/themes/' . flextype('registry')->get('plugins.site.settings.theme') . '/scripts/tokens.php';
