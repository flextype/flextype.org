<?php
namespace Flextype;
use Flextype\Component\{Http\Http, Registry\Registry, Filesystem\Filesystem, Token\Token};
use function Flextype\Component\I18n\__;
?>

<?php
    Themes::view('admin/views/partials/head')->display();
    Themes::view('admin/views/partials/navbar')
        ->assign('links',   ['information' => ['url' => Http::getBaseUrl() . '/admin/information', 'title' => __('admin_information_heading', Registry::get('system.locale'))]])
        ->display();
    Themes::view('admin/views/partials/content-start')->display();
?>

<div class="card">
    <div class="card-header">
        <?php echo __('admin_system', Registry::get('system.locale')); ?>
    </div>
    <div class="card-body no-padding">
        <table class="table no-margin">
            <tbody>
                <tr>
                    <td><?php echo __('admin_flextype_version', Registry::get('system.locale')); ?></td>
                    <td><?php echo Flextype::VERSION; ?></td>
                </tr>
                <tr>
                    <td><?php echo __('admin_debugging', Registry::get('system.locale')); ?></td>
                    <td><?php if (Registry::get('system.errors.display')) echo __('admin_on', Registry::get('system.locale')); else echo __('admin_off', Registry::get('system.locale')); ?></td>
                </tr>
                <tr>
                    <td><?php echo __('admin_cache', Registry::get('system.locale')); ?></td>
                    <td><?php if (Registry::get('system.cache.enabled')) echo __('admin_on', Registry::get('system.locale')); else echo __('admin_off', Registry::get('system.locale')); ?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <?php echo __('admin_server', Registry::get('system.locale')); ?>
    </div>
    <div class="card-body no-padding">
        <table class="table no-margin">
            <tbody>
                <tr>
                    <td><?php echo __('admin_php_version', Registry::get('system.locale')); ?></td>
                    <td><?php echo PHP_VERSION; ?></td>
                </tr>
                <tr>
                    <td><?php echo __('admin_php_built_on', Registry::get('system.locale')); ?></td>
                    <td><?php echo php_uname(); ?></td>
                </tr>
                <tr>
                    <td><?php echo __('admin_web_server', Registry::get('system.locale')); ?></td>
                    <td><?php echo (isset($_SERVER['SERVER_SOFTWARE'])) ? $_SERVER['SERVER_SOFTWARE'] : @getenv('SERVER_SOFTWARE'); ?></td>
                </tr>
                <tr>
                    <td><?php echo __('admin_web_server_php_interface', Registry::get('system.locale')); ?></td>
                    <td><?php echo php_sapi_name(); ?></td>
                </tr>
                <?php
                    if (function_exists('apache_get_modules')) {
                        if ( ! in_array('mod_rewrite',apache_get_modules())) {
                            echo '<tr><td>'.'Apache Mod Rewrite'.'</td><td>'.__('admin_not_installed', Registry::get('system.locale')).'</td></tr>';
                        } else {
                            echo '<tr><td>'.'Apache Mod Rewrite'.'</td><td>'.__('admin_installed', Registry::get('system.locale')).'</td></tr>';
                        }
                    } else {
                        echo '<tr><td>'.'Apache Mod Rewrite'.'</td><td>'.__('admin_installed', Registry::get('system.locale')).'</td></tr>';
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php if (Filesystem::isFileWritable(ROOT_DIR . '/.htaccess') or
          Filesystem::isFileWritable(ROOT_DIR . '/index.php') or
          Registry::get('system.errors.display') === true) { ?>
<div class="card">
    <div class="card-header">
        <?php echo __('admin_security_check_results', Registry::get('system.locale')); ?>
    </div>
    <div class="card-body no-padding">
        <table class="table no-margin">
            <tbody>
                <?php if (Filesystem::isFileWritable(ROOT_DIR . '/.htaccess')) { ?>
                <tr>
                    <td><?php echo __('admin_security_check_results_htaccess', Registry::get('system.locale'), [':path' => ROOT_DIR . '/.htaccess']); ?></td>
                </tr>
                <?php } ?>
                <?php if (Filesystem::isFileWritable(ROOT_DIR . '/index.php')) { ?>
                <tr>
                    <td><?php echo __('admin_security_check_results_index', Registry::get('system.locale'), [':path' => ROOT_DIR . '/index.php']); ?></td>
                </tr>
                <?php } ?>
                <?php if (Registry::get('system.errors.display') === true) { ?>
                <tr>
                    <td><?php echo __('admin_security_check_results_debug', Registry::get('system.locale')); ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<?php } ?>

<?php
    Themes::view('admin/views/partials/content-end')->display();
    Themes::view('admin/views/partials/footer')->display();
?>
