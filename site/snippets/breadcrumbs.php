<?php

namespace Flextype;
use Flextype\Component\{Http\Http, Registry\Registry};

$uri = Http::getUriSegments();

array_shift($uri);

array_pop($uri);

//var_dump($uri);

$locale = Snippets::get('locale');
$s = '';
$entry = [];
foreach ($uri as $segment) {
    $s .= $segment . '/';
    $entry[$segment]['title'] = Entries::getEntry($locale. '/' . $s)['title'];
    $entry[$segment]['slug'] = Entries::getEntry($locale. '/' . $s)['slug'];
    $entry[$segment]['url'] = Entries::getEntry($locale. '/' . $s)['url'];
}

$i = 0;
foreach ($entry as $e) {
    $i++;
    echo '<a href="'. $e['url'] .'">'. $e['title'] .'</a>' . (($i !== count($entry)) ? ' / ' : '');
;}
