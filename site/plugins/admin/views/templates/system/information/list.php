<?php
namespace Flextype;
use Flextype\Component\{Http\Http, Registry\Registry, I18n\I18n, Token\Token};
?>

<?php
    Themes::view('admin/views/partials/head')->display();
    Themes::view('admin/views/partials/navbar')
        ->assign('links',   ['information' => ['url' => Http::getBaseUrl() . '/admin/information', 'title' => I18n::find('admin_information_heading', Registry::get('system.locale'))]])
        ->display();
    Themes::view('admin/views/partials/content-start')->display();
?>

<div class="card">
    <div class="card-header">
        System
    </div>
    <div class="card-body no-padding">
        <table class="table no-margin">
            <tbody>
                <tr>
                    <td>Flextype Version</td>
                    <td><?php echo Flextype::VERSION; ?></td>
                </tr>
                <tr>
                    <td>Debugging</td>
                    <td><?php if (Registry::get('system.errors.display')) echo 'on'; else echo 'off'; ?></td>
                </tr>
                <tr>
                    <td>Cache</td>
                    <td><?php if (Registry::get('system.cache.enabled')) echo 'on'; else echo 'off'; ?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<div class="card">
    <div class="card-header">
        Server
    </div>
    <div class="card-body no-padding">
        <table class="table no-margin">
            <tbody>
                <tr>
                    <td>PHP version</td>
                    <td><?php echo PHP_VERSION; ?></td>
                </tr>
                <tr>
                    <td>PHP Built On</td>
                    <td><?php echo php_uname(); ?></td>
                </tr>
                <tr>
                    <td>Web Server</td>
                    <td><?php echo (isset($_SERVER['SERVER_SOFTWARE'])) ? $_SERVER['SERVER_SOFTWARE'] : @getenv('SERVER_SOFTWARE'); ?></td>
                </tr>
                <tr>
                    <td>WebServer to PHP Interface</td>
                    <td><?php echo php_sapi_name(); ?></td>
                </tr>
                <?php
                    if (function_exists('apache_get_modules')) {
                        if ( ! in_array('mod_rewrite',apache_get_modules())) {
                            echo '<tr><td>'.'Apache Mod Rewrite'.'</td><td>'.'Not Installed'.'</td></tr>';
                        } else {
                            echo '<tr><td>'.'Apache Mod Rewrite'.'</td><td>'.'Installed'.'</td></tr>';
                        }
                    } else {
                        echo '<tr><td>'.'Apache Mod Rewrite'.'</td><td>'.'Installed'.'</td></tr>';
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>


<?php
    Themes::view('admin/views/partials/content-end')->display();
    Themes::view('admin/views/partials/footer')->display();
?>
