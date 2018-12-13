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
                                                            'attributes' => ['class' => 'navbar-item active']
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
        ->assign('page', $page)
        ->display();
    Themes::view('admin/views/partials/content-start')->display();
?>


<?php
    echo (
        Form::open(null, array('enctype' => 'multipart/form-data', 'class' => 'form-inline form-upload')).
        Form::hidden('token', Token::generate())
    );
?>
<input type="file" name="file">
<?php
    echo (
        Form::submit('upload_file', __('admin_pages_files_upload'), array('class' => '')).
        Form::close()
    )
?>
<br>

<div class="media-manager">
    <div class="row">
        <?php foreach ($files as $file) { ?>
            <div class="col-sm-2">
                <div class="item">
                    <a href="javascript:;"
                       style="background-image: url('<?php echo Http::getBaseUrl() . '/site/pages/' . Http::get('page') . '/' . basename($file); ?>')"
                       class="img-item js-pages-image-preview"
                       data-image-delete-url="<?php echo Http::getBaseUrl(); ?>/admin/pages/edit?page=<?php echo Http::get('page'); ?>&delete_file=<?php echo basename($file); ?>&media=true&token=<?php echo Token::generate(); ?>"
                       data-image-url="<?php echo Http::getBaseUrl() . '/site/pages/' . Http::get('page') . '/' . basename($file); ?>">
                       <i class="fas fa-eye"></i>
                    </a>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<div class="modal animated fadeIn faster image-preview-modal" id="pagesImagePreview" tabindex="-1" role="dialog" aria-labelledby="pagesImagePreviewLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="pagesImagePreviewLabel"><?php echo __('admin_pages_image_preview'); ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body js-page-image-preview-placeholder image-preview">
      </div>
      <div class="modal-footer">
          <input type="text" name="" class="form-control js-page-image-url-placeholder" value="">
          <a href="#" class="js-page-image-delete-url-placeholder btn btn-primary"><?php echo __('admin_pages_files_delete'); ?></a>
      </div>
    </div>
  </div>
</div>

<?php
    Themes::view('admin/views/partials/content-end')->display();
    Themes::view('admin/views/partials/footer')->display();
?>
