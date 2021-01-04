<?php

namespace Flextype;

use Flextype\Plugin\Sitemap\Controllers\SitemapController;

flextype()->get('/' . flextype('registry')->get('plugins.sitemap.settings.route'), SitemapController::class . ':index')->setName('sitemap.index');
