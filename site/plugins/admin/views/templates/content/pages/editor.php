<?php
namespace Flextype;
use Flextype\Component\{I18n\I18n, Registry\Registry, Html\Html, Form\Form, Http\Http, Token\Token};
?>

<?php
    Themes::view('admin/views/partials/head')->display();
    Themes::view('admin/views/partials/navbar')
        ->assign('links',   ['pages' => ['url' => Http::getBaseUrl() . '/admin/pages/edit?page=' . $page_name, 'title' => I18n::find('admin_pages_edit_page', Registry::get('system.locale'))]])
        ->assign('buttons', ['pages' =>
                                        ['url' => Http::getBaseUrl() . '/admin/pages/edit?page=' . $page_name . '&expert=true', 'title' => I18n::find('admin_pages_switch_to_expert_mode', Registry::get('system.locale'))]])
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
                        Form::label('page_title', I18n::find('admin_pages_title', Registry::get('system.locale')), ['for' => 'pageTitle']).
                        Form::input('page_title', $page_title, ['class' => 'form-control', 'id' => 'pageTitle', 'required'])
                    );
                ?>
            </div>
            <div class="form-group">
                <?php
                    echo (
                        Form::label('page_content', I18n::find('admin_pages_content', Registry::get('system.locale')), ['for' => 'pageTitle']).
                        Form::textarea('page_content', $page_content, ['class' => 'form-control margin-hard-bottom', 'style' => 'height:400px;', 'id' => 'pageContent'])
                    );
                ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-4">
            <div class="form-group">
                <?php
                    echo (
                        Form::label('page_visibility', I18n::find('admin_pages_visibility', Registry::get('system.locale')),  ['for' => 'pageTitle']).
                        Form::select('page_visibility', ['visible' => 'visible', 'draft' => 'draft'], $page_visibility, ['class' => 'form-control', 'id' => 'pageTitle'])
                    );
                ?>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <?php
                    echo (
                        Form::label('page_template', I18n::find('admin_pages_template', Registry::get('system.locale')),  ['for' => 'pageTemplate']).
                        Form::select('page_template', $templates, $page_template, ['class' => 'form-control', 'id' => 'pageTemplate'])
                    );
                ?>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <?php
                    echo (
                        Form::label('page_date', I18n::find('admin_pages_date', Registry::get('system.locale')), ['for' => 'pageDate']).
                        Form::input('page_date', $page_date, ['class' => 'form-control', 'id' => 'pageDate'])
                    );
                ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <?php echo Form::submit('page_save', I18n::find('admin_save', Registry::get('system.locale')), ['class' => 'btn btn-black']); ?>
        </div>
    </div>
<?php echo Form::close(); ?>

<br><br>


<div class="card">
    <div class="card-body no-padding">
        <table class="table no-margin">
            <thead>
                <tr>
                    <th><?php echo I18n::find('admin_pages_files', Registry::get('system.locale')); ?></th>
                    <th class="text-right">
                        <?php
                            echo (
                                Form::open(null, array('enctype' => 'multipart/form-data', 'class' => 'form-inline form-upload')).
                                Form::hidden('token', Token::generate())
                            );
                        ?>
                        <input type="file" name="file">
                        <?php
                            echo (
                                Form::submit('upload_file', I18n::find('admin_pages_files_upload', Registry::get('system.locale')), array('class' => '')).
                                Form::close()
                            )
                        ?>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($files as $file) { ?>
                <tr>
                    <td><a href="javascript:;" class="js-pages-image-preview" data-image-url="<?php echo Http::getBaseUrl() . '/site/pages/' . Http::get('page') . '/' . basename($file); ?>"><?php echo basename($file); ?></a></td>
                    <td class="text-right">
                        <a href="<?php echo Http::getBaseUrl(); ?>/admin/pages/edit?page=<?php echo Http::get('page'); ?>&delete_file=<?php echo basename($file); ?>&token=<?php echo Token::generate(); ?>"><?php echo I18n::find('admin_pages_delete', Registry::get('system.locale')); ?></a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="pagesImagePreview" tabindex="-1" role="dialog" aria-labelledby="pagesImagePreviewLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="pagesImagePreviewLabel"><?php echo I18n::find('admin_pages_image_preview', Registry::get('system.locale')); ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <img src="" alt="" class="js-page-image-preview-placeholder img-fluid">
        <br><br>
        <div class="alert alert-dark js-page-image-url-placeholder" role="alert"></div>
      </div>
    </div>
  </div>
</div>

<?php
  Themes::view('admin/views/partials/content-end')->display();
  Themes::view('admin/views/partials/footer')->display();
?>
