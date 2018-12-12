<?php
namespace Flextype;
use Flextype\Component\{Registry\Registry, Http\Http, Form\Form, Token\Token};
use function Flextype\Component\I18n\__;
?>

<?php
    Themes::view('admin/views/partials/head')->display();
    Themes::view('admin/views/partials/navbar')
        ->assign('links', [
                                'pages'     => [
                                                    'link'  => Http::getBaseUrl() . '/admin/pages',
                                                    'title' => __('admin_pages_heading'),
                                                    'attributes' => ['class' => 'navbar-item']
                                                ],
                                'pages_move' => [
                                                    'link' => Http::getBaseUrl() . '/admin/pages/move',
                                                    'title' => __('admin_pages_move'),
                                                    'attributes' => ['class' => 'navbar-item active']
                                                ]
                         ])
        ->assign('page', $page)
        ->display();
    Themes::view('admin/views/partials/content-start')->display();
?>

<div class="row">
    <div class="col-md-6">

        <?php echo Form::open(); ?>
        <?php echo Form::hidden('token', Token::generate()); ?>
        <?php echo Form::hidden('page_path_current', $page_path_current); ?>
        <?php echo Form::hidden('page_parent_current', $page_parent); ?>
        <?php echo Form::hidden('name_current', $name_current); ?>

        <div class="form-group">
           <?php
               echo (
                   Form::label('parent_page', __('admin_pages_parent_page')).
                   Form::select('parent_page', $pages_list, $page_parent, array('class' => 'form-control'))
               );
           ?>
         </div>

         <?php echo Form::submit('move_page', __('admin_save'), ['class' => 'btn btn-black btn-fill btn-wd']); ?>
     <?php echo Form::close(); ?>

 </div>
</div>

<?php
    Themes::view('admin/views/partials/content-end')->display();
    Themes::view('admin/views/partials/footer')->display();
?>
