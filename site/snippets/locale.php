<?php

namespace Flextype;
use Flextype\Component\{Http\Http, Registry\Registry};

$locale = Http::getUriSegments()[0];

echo $locale;
