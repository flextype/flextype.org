<?php
namespace Flextype;
use Flextype\Component\{Registry\Registry, Html\Html, Form\Form, Http\Http, Token\Token};
use function Flextype\Component\I18n\__;
?>

<?php
    Themes::view('admin/views/partials/head')->display();
    Themes::view('admin/views/partials/navbar')
        ->assign('links',   ['pages' => ['url' => Http::getBaseUrl() . '/admin/pages/edit?page=' . $page_name, 'title' => __('admin_pages_edit_page', Registry::get('system.locale'))]])
        ->assign('buttons', ['pages' =>
                                        ['url' => Http::getBaseUrl() . '/admin/pages/edit?page=' . $page_name, 'title' => __('admin_pages_switch_back_to_editor_mode', Registry::get('system.locale'))]])
        ->display();
    Themes::view('admin/views/partials/content-start')->display();
?>

<div class="card">
    <div class="card-header">
        <?php echo __('admin_pages_page', Registry::get('system.locale')); ?>
    </div>
    <div class="card-body">
        <?php echo Form::open(); ?>
            <?php echo Form::hidden('token', Token::generate()); ?>
            <?php echo Form::hidden('page_name', $page_name); ?>
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <?php
                            echo (
                                Form::textarea('page_content', $page_content, ['class' => 'form-control', 'style' => 'height:400px;', 'id' => 'pageContent'])
                            );
                        ?>
                    </div>
                </div>
            </div>
    </div>
    <div class="card-footer text-right">
        <?php echo Form::submit('page_save_expert', __('admin_save', Registry::get('system.locale')), ['class' => 'btn btn-black']); ?>
        <?php echo Form::close(); ?>
    </div>
</div>

<?php
    Themes::view('admin/views/templates/content/pages/filesmanager')->display();
    Themes::view('admin/views/partials/content-end')->display();
    Themes::view('admin/views/partials/footer')->display();
?>
