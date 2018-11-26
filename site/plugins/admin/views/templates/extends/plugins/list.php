<?php
namespace Flextype;
use Flextype\Component\{Http\Http, Registry\Registry, Token\Token};
use function Flextype\Component\I18n\__;
?>

<?php
    Themes::view('admin/views/partials/head')->display();
    Themes::view('admin/views/partials/navbar')
        ->assign('links',   ['pages' => ['url' => Http::getBaseUrl() . '/admin/plugins', 'title' => __('admin_plugins_heading', Registry::get('system.locale'))]])
        ->display();
    Themes::view('admin/views/partials/content-start')->display();
?>

<form>
    <input type="hidden" name="url" value="<?php echo Http::getBaseUrl() . '/admin/plugins'; ?>">
</form>

<div class="card">
    <div class="card-body no-padding">
        <table class="table no-margin">
            <thead>
                <tr>
                    <th><?php echo __('admin_plugins_name', Registry::get('system.locale')); ?></th>
                    <th></th>
                    <th width="90" class="text-right"><?php echo __('admin_plugins_status', Registry::get('system.locale')); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($plugins_list as $key => $plugin) { ?>
                <tr>
                    <td><?php echo $plugin['name']; ?></td>
                    <td class="text-right">
                        <a href="javascript:;" class="btn js-plugins-info" data-toggle="modal" data-target="#pluginInfoModal"
                            data-name="<?php echo $plugin['name']?>"
                            data-version="<?php echo $plugin['version']?>"
                            data-description="<?php echo $plugin['description']?>"
                            data-author-name="<?php echo $plugin['author']['name']; ?>"
                            data-author-email="<?php echo $plugin['author']['email']; ?>"
                            data-author-url="<?php echo $plugin['author']['url']; ?>"
                            data-homepage="<?php echo $plugin['homepage']; ?>"
                            data-bugs="<?php echo $plugin['bugs']; ?>"
                            data-license="<?php echo $plugin['license']; ?>"
                            ><?php echo __('admin_plugins_info', Registry::get('system.locale')); ?></a>
                    </td>
                    <td class="text-right">
                        <?php if ($key !== 'admin') { ?>
                            <div class="form-group no-margin">
                              <span class="switch switch-sm">
                                <input id="switch-sm-<?php echo $plugin['name']; ?>" type="checkbox" class="switch js-switch" data-plugin="<?php echo $key; ?>" data-token="<?php echo Token::generate(); ?>" <?php if ($plugin['enabled'] == 'true') echo 'checked'; else echo ''; ?> >
                                <label for="switch-sm-<?php echo $plugin['name']; ?>"></label>
                              </span>
                            </div>
                        <?php } ?>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="pluginInfoModal" tabindex="-1" role="dialog" aria-labelledby="pluginInfoModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="pluginInfoModalLabel"><?php echo __('admin_plugins_info', Registry::get('system.locale')); ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <p><b><?php echo __('admin_plugins_name', Registry::get('system.locale')); ?>: </b><span class="js-plugin-name-placeholder"></span></p>
          <p><b><?php echo __('admin_plugins_version', Registry::get('system.locale')); ?>: </b><span class="js-plugin-version-placeholder"></span></p>
          <p><b><?php echo __('admin_plugins_description', Registry::get('system.locale')); ?>: </b><span class="js-plugin-description-placeholder"></span></p>
          <p><b><?php echo __('admin_plugins_author_name', Registry::get('system.locale')); ?>: </b><span class="js-plugin-author-name-placeholder"></span></p>
          <p><b><?php echo __('admin_plugins_author_email', Registry::get('system.locale')); ?>: </b><span class="js-plugin-author-email-placeholder"></span></p>
          <p><b><?php echo __('admin_plugins_author_url', Registry::get('system.locale')); ?>: </b><span class="js-plugin-author-url-placeholder"></span></p>
          <p><b><?php echo __('admin_plugins_homepage', Registry::get('system.locale')); ?>: </b><span class="js-plugin-homepage-placeholder"></span></p>
          <p><b><?php echo __('admin_plugins_bugs', Registry::get('system.locale')); ?>: </b><span class="js-plugin-bugs-placeholder"></span></p>
          <p><b><?php echo __('admin_plugins_license', Registry::get('system.locale')); ?>: </b><span class="js-plugin-license-placeholder"></span></p>
      </div>
    </div>
  </div>
</div>

<?php
    Themes::view('admin/views/partials/content-end')->display();
    Themes::view('admin/views/partials/footer')->display();
?>
