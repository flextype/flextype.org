<?php

namespace Flextype;

use Flextype\Component\Http\Http;

class DashboardManager
{
    public static function getDashboard()
    {
        Http::redirect(Http::getBaseUrl().'/admin/pages');
    }
}
