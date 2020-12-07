<?php

namespace Flextype;

flextype()->get('/' . flextype('registry')->get('plugins.sitemap.settings.route'), 'SitemapController:index')->setName('sitemap.index');
