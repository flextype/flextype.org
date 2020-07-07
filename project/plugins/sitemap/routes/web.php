<?php

namespace Flextype;

$app->get('/sitemap.xml', 'SitemapController:index')->setName('sitemap.index');
