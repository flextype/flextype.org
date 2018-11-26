<?php
namespace Flextype;
use Flextype\Component\{Registry\Registry, Html\Html, Form\Form, Http\Http, Token\Token};
use function Flextype\Component\I18n\__;
?>

<div class="card filesmanager">
    <div class="card-header">
        <div class="row">
            <div class="col-sm-3">
                <?php echo __('admin_pages_files', Registry::get('system.locale')); ?>
            </div>
            <div class="col-sm-9">
                <?php
                    echo (
                        Form::open(null, array('enctype' => 'multipart/form-data', 'class' => 'form-inline form-upload')).
                        Form::hidden('token', Token::generate())
                    );
                ?>
                <input type="file" name="file">
                <?php
                    echo (
                        Form::submit('upload_file', __('admin_pages_files_upload', Registry::get('system.locale')), array('class' => '')).
                        Form::close()
                    )
                ?>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <?php foreach ($files as $file) { ?>
                <div class="col-sm-2 item">
                    <a href="javascript:;"
                       style="background-image: url('<?php echo Http::getBaseUrl() . '/site/pages/' . Http::get('page') . '/' . basename($file); ?>')"
                       class="img-item js-pages-image-preview"
                       data-image-delete-url="<?php echo Http::getBaseUrl(); ?>/admin/pages/edit?page=<?php echo Http::get('page'); ?>&delete_file=<?php echo basename($file); ?>&token=<?php echo Token::generate(); ?>"
                       data-image-url="<?php echo Http::getBaseUrl() . '/site/pages/' . Http::get('page') . '/' . basename($file); ?>">
                    </a>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<div class="modal fade" id="pagesImagePreview" tabindex="-1" role="dialog" aria-labelledby="pagesImagePreviewLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="pagesImagePreviewLabel"><?php echo __('admin_pages_image_preview', Registry::get('system.locale')); ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <img src="" alt="" class="js-page-image-preview-placeholder img-fluid">
        <br><br>
        <div class="alert alert-dark js-page-image-url-placeholder" role="alert"></div>
      </div>
      <div class="modal-footer">
          <a href="#" class="js-page-image-delete-url-placeholder btn btn-primary">Delete</a>
      </div>
    </div>
  </div>
</div>
