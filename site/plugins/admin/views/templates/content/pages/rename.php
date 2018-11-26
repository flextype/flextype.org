<?php
namespace Flextype;
use Flextype\Component\{Registry\Registry, Http\Http, Form\Form, Token\Token};
use function Flextype\Component\I18n\__;
?>

<?php
    Themes::view('admin/views/partials/head')->display();
    Themes::view('admin/views/partials/navbar')
        ->assign('links', ['pages' => ['url' => Http::getBaseUrl() . '/admin/pages', 'title' => __('admin_pages_heading', Registry::get('system.locale'))],
                                      ['url' => '#', 'title' => __('admin_pages_rename_page', Registry::get('system.locale'))]])
        ->display();
    Themes::view('admin/views/partials/content-start')->display();
?>

<div class="card card-400">
    <div class="card-body">

        <?php echo Form::open(); ?>
        <?php echo Form::hidden('token', Token::generate()); ?>
        <?php echo Form::hidden('page_path_current', $page_path_current); ?>
        <?php echo Form::hidden('page_name_current', $page_name); ?>

        <div class="form-group">
            <?php
                echo (
                    Form::label('title', __('admin_pages_title', Registry::get('system.locale')), ['for' => 'pageTitle']).
                    Form::input('title', $page_title, ['class' => 'form-control', 'id' => 'pageTitle', 'required'])
                );
            ?>
        </div>
        <div class="form-group">
            <?php
                echo (
                    Form::label('name', __('admin_pages_name', Registry::get('system.locale')), ['for' => 'pageName']).
                    Form::input('name', $page_name, ['class' => 'form-control', 'id' => 'pageName', 'required'])
                );
            ?>
        </div>
        <div class="form-group">
           <?php
               echo (
                   Form::label('parent_page', __('admin_pages_parent_page', Registry::get('system.locale'))).
                   Form::select('parent_page', $pages_list, $page_parent, array('class' => 'form-control'))
               );
           ?>
         </div>
     </div>
     <div class="card-footer text-center">
         <?php echo Form::submit('rename_page', __('admin_save', Registry::get('system.locale')), ['class' => 'btn btn-black btn-fill btn-wd']); ?>
     </div>
     <?php echo Form::close(); ?>
 </div>


<?php
    Themes::view('admin/views/partials/content-end')->display();
    Themes::view('admin/views/partials/footer')->display();
?>
