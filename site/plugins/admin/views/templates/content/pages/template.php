<?php
namespace Flextype;
use Flextype\Component\{Registry\Registry, Html\Html, Form\Form, Http\Http, Token\Token};
use function Flextype\Component\I18n\__;
?>

<?php
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
                                                            'attributes' => ['class' => 'navbar-item']
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
                                                               'attributes' => ['class' => 'navbar-item active']
                                                            ],
                                    'edit_page_source'           => [
                                                                'link'       => Http::getBaseUrl() . '/admin/pages/edit?page=' . $page_name . '&source=true',
                                                                'title'      => __('admin_pages_editor_source'),
                                                                'attributes' => ['class' => 'navbar-item']
                                                             ]
                            ])
        ->assign('buttons', [
                                'save' => [
                                                    'link'       => 'javascript:;',
                                                    'title'      => __('admin_save'),
                                                    'attributes' => ['class' => 'js-save-form-submit float-right btn']
                                                ]
                            ])
        ->assign('page', $page)
        ->display();
    Themes::view('admin/views/partials/content-start')->display();
?>

<?php echo Form::open(null, ['id' => 'form']); ?>
<?php echo Form::hidden('token', Token::generate()); ?>
<?php echo Form::hidden('action', 'save-form'); ?>
<?php echo Form::hidden('page_name', $page_name); ?>
<div class="row">
    <div class="col-12">
        <div class="form-group">
            <label><?php echo __('admin_pages_template'); ?>: <code><?php echo $page['template']; ?></code></label>
            <?php
                echo (
                    Form::textarea('template', $template, ['class' => 'form-control', 'style' => 'min-height:500px;', 'id' => 'codeMirrorEditor'])
                );
            ?>
        </div>
    </div>
</div>
<?php echo Form::close(); ?>

<?php
    Themes::view('admin/views/partials/content-end')->display();
    Themes::view('admin/views/partials/footer')->display();
?>
