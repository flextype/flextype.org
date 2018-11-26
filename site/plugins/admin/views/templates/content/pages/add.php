<?php
namespace Flextype;
use Flextype\Component\{Registry\Registry, Http\Http, Form\Form, Html\Html, Token\Token};
use function Flextype\Component\I18n\__;
?>

<?php
    Themes::view('admin/views/partials/head')->display();
    Themes::view('admin/views/partials/navbar')
        ->assign('links', ['pages' => ['url' => Http::getBaseUrl() . '/admin/pages', 'title' => __('admin_pages_heading', Registry::get('system.locale'))],
                                      ['url' => '#', 'title' => __('admin_pages_create_new', Registry::get('system.locale'))]])
        ->display();
    Themes::view('admin/views/partials/content-start')->display();
?>

<div class="card card-400">
    <div class="card-body">

        <?php echo Form::open(); ?>
        <?php echo Form::hidden('token', Token::generate()); ?>

        <div class="form-group">
          <label for="formGroupPageTitleInput"><?php echo __('admin_pages_title', Registry::get('system.locale')); ?></label>
          <input type="text" name="title" class="form-control" id="formGroupPageTitleInput" placeholder="" required>
        </div>
        <div class="form-group">
          <label for="formGroupPageTitleInput"><?php echo __('admin_pages_name', Registry::get('system.locale')); ?></label>
          <input type="text" name="slug" class="form-control" id="formGroupPageTitleInput" placeholder="" required>
        </div>
        <div class="form-group">
           <label for="formGroupParentPageInput"><?php echo __('admin_pages_parent_page', Registry::get('system.locale')); ?></label>
           <select class="form-control" id="formGroupParentPageInput" name="parent_page">
             <option value="">/</option>
             <?php foreach($pages_list as $page) { ?>
             <option value="<?php if ($page['slug'] != '') echo $page['slug']; else echo Registry::get('system.pages.main'); ?>"><?php if ($page['slug'] != '') echo $page['slug']; else echo Registry::get('system.pages.main'); ?></option>
             <?php } ?>
           </select>
         </div>

     </div>
     <div class="card-footer text-center">
         <?php echo Form::submit('create_page', __('admin_create', Registry::get('system.locale')), ['class' => 'btn btn-black']); ?>
     </div>
     <?php echo Form::close(); ?>
 </div>

<?php
    Themes::view('admin/views/partials/content-end')->display();
    Themes::view('admin/views/partials/footer')->display();
?>
