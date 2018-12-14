<?php
namespace Flextype;

use Flextype\Component\Registry\Registry;
use Flextype\Component\Html\Html;
use Flextype\Component\Form\Form;
use Flextype\Component\Http\Http;
use Flextype\Component\Token\Token;
use function Flextype\Component\I18n\__;

Themes::view('admin/views/partials/head')->display();
Themes::view('admin/views/partials/navbar')
    ->assign('links', [
                            'pages'               => [
                                                        'link'       => Http::getBaseUrl() . '/admin/pages',
                                                        'title'      => __('admin_pages_heading'),
                                                        'attributes' => ['class' => 'navbar-item']
                                                     ],
                            'edit_page'           => [
                                                        'link'       => Http::getBaseUrl() . '/admin/pages/edit?page=' . $page_name,
                                                        'title'      => __('admin_pages_editor'),
                                                        'attributes' => ['class' => 'navbar-item active']
                                                     ],
                            'edit_page_media'     => [
                                                        'link'       => Http::getBaseUrl() . '/admin/pages/edit?page=' . $page_name . '&media=true',
                                                        'title'      => __('admin_pages_edit_media'),
                                                        'attributes' => ['class' => 'navbar-item']
                                                    ],
                              'edit_page_blueprint'       => [
                                                          'link'       => Http::getBaseUrl() . '/admin/pages/edit?page=' . $page_name . '&blueprint=true',
                                                          'title'      => __('admin_pages_editor_blueprint'),
                                                          'attributes' => ['class' => 'navbar-item']
                                                       ],
                               'edit_page_template'       => [
                                                           'link'       => Http::getBaseUrl() . '/admin/pages/edit?page=' . $page_name . '&template=true',
                                                           'title'      => __('admin_pages_editor_template'),
                                                           'attributes' => ['class' => 'navbar-item']
                                                        ],
                                'edit_page_source'           => [
                                                            'link'       => Http::getBaseUrl() . '/admin/pages/edit?page=' . $page_name . '&source=true',
                                                            'title'      => __('admin_pages_editor_source'),
                                                            'attributes' => ['class' => 'navbar-item']
                                                         ]
                        ])
    ->assign('buttons', [
                            'save_page' => [
                                                'link'       => 'javascript:;',
                                                'title'      => __('admin_save'),
                                                'attributes' => ['class' => 'js-save-form-submit float-right btn']
                                            ]
                        ])
    ->assign('page', $page)
    ->display();
Themes::view('admin/views/partials/content-start')->display();

PagesManager::displayPageForm($blueprint['fields'], $page, $page['content']);

Themes::view('admin/views/partials/content-end')->display();
Themes::view('admin/views/partials/footer')->display();
?>
