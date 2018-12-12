<?php
namespace Flextype;
use Flextype\Component\{Http\Http, Registry\Registry, Filesystem\Filesystem, Token\Token, Number\Number};
use Flextype\Component\Session\Session;
use function Flextype\Component\I18n\__;

Themes::view('admin/views/partials/head')->display();
Themes::view('admin/views/partials/navbar')
    ->assign('links', [
                        'information' => [
                                            'link' => Http::getBaseUrl() . '/admin/information',
                                            'title' => __('admin_menu_profile'),
                                            'attributes' => ['class' => 'navbar-item active']
                                         ],
                      ])
    ->display();
Themes::view('admin/views/partials/content-start')->display();
?>

<?php echo __('admin_username'); ?>: <?php echo Session::get('username'); ?> <br>
<?php echo __('admin_role'); ?>: <?php echo Session::get('role'); ?> <br>

<br>

<a class="btn btn-default" href="<?php echo Http::getBaseUrl();?>/admin/logout?token=<?php echo Token::generate(); ?>"><?php echo __('admin_menu_logout'); ?></a>

<?php
Themes::view('admin/views/partials/content-end')->display();
Themes::view('admin/views/partials/footer')->display();
?>
