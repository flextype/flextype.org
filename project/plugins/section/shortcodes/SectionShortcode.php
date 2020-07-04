<?php

namespace Flextype;

use Thunder\Shortcode\ShortcodeFacade;
use Thunder\Shortcode\Shortcode\ShortcodeInterface;

// Shortcode: [section_create id=section-uid]Section content here[/section_create]
$flextype['shortcodes']->addHandler('section_create', function (ShortcodeInterface $s) use ($flextype) {
    $flextype->registry->set('sections.' . $s->getParameter('id'), $s->getContent());
});

// Shortcode: [section_fetch id=section-uid]
$flextype['shortcodes']->addHandler('section_fetch', function (ShortcodeInterface $s) use ($flextype) {
    return $flextype->registry->get('sections.' . $s->getParameter('id'));
});
