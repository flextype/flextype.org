<?php
namespace Flextype;
use Flextype\Component\{I18n\I18n, Registry\Registry, Html\Html, Form\Form, Http\Http, Token\Token};
?>

<?php
    Themes::view('admin/views/partials/head')->display();
    Themes::view('admin/views/partials/navbar')
        ->assign('links',   ['pages' => ['url' => Http::getBaseUrl() . '/admin/pages/edit?page=' . $page_name, 'title' => I18n::find('admin_pages_edit_page', Registry::get('system.locale'))]])
        ->assign('buttons', ['pages' =>
                                        ['url' => Http::getBaseUrl() . '/admin/pages/edit?page=' . $page_name, 'title' => I18n::find('admin_pages_switch_back_to_editor_mode', Registry::get('system.locale'))]])
        ->display();
    Themes::view('admin/views/partials/content-start')->display();
?>

<?php echo Form::open(); ?>
    <?php echo Form::hidden('token', Token::generate()); ?>
    <?php echo Form::hidden('page_name', $page_name); ?>
    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <?php
                    echo (
                        Form::label('page_content', I18n::find('admin_pages_page', Registry::get('system.locale')), ['for' => 'pageTitle']).
                        Form::textarea('page_content', $page_content, ['class' => 'form-control', 'style' => 'height:400px;', 'id' => 'pageContent'])
                    );
                ?>
            </div>
            <?php echo Form::submit('page_save_expert', I18n::find('admin_save', Registry::get('system.locale')), ['class' => 'btn btn-black']); ?>
        </div>
    </div>
<?php echo Form::close(); ?>

<?php
    Themes::view('admin/views/partials/content-end')->display();
    Themes::view('admin/views/partials/footer')->display();
?>
