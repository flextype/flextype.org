<?php
namespace Flextype;
use Flextype\Component\{Http\Http, Registry\Registry, I18n\I18n, Token\Token};
?>

<?php
    Themes::view('admin/views/partials/head')->display();
    Themes::view('admin/views/partials/navbar')
        ->assign('links',   ['pages' => ['url' => Http::getBaseUrl() . '/admin/pages', 'title' => I18n::find('admin_pages_heading', Registry::get('system.locale'))]])
        ->assign('buttons', ['pages' => ['url' => Http::getBaseUrl() . '/admin/pages/add', 'title' => I18n::find('admin_pages_create_new', Registry::get('system.locale'))]])
        ->display();
    Themes::view('admin/views/partials/content-start')->display();
?>

<div class="card">
    <div class="card-body no-padding">
        <table class="table no-margin">
            <thead>
                <tr>
                    <th><?php echo I18n::find('admin_pages_name', Registry::get('system.locale')); ?></th>
                    <th><?php echo I18n::find('admin_pages_url', Registry::get('system.locale')); ?></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($pages_list as $page) { ?>
                <tr>
                    <td>
                        <a href="<?php echo Http::getBaseUrl(); ?>/admin/pages/edit?page=<?php if ($page['slug'] != '') echo $page['slug']; else echo Registry::get('system.pages.main'); ?>"><?php echo $page['title']; ?></a>
                    </td>
                    <td><a target="_blank"  href="<?php echo Http::getBaseUrl(); ?>/<?php echo $page['slug']; ?>">/<?php echo $page['slug']; ?></a></td>
                    <td class="text-right">
                        <a href="<?php echo Http::getBaseUrl(); ?>/admin/pages/rename?page=<?php if ($page['slug'] != '') echo $page['slug']; else echo Registry::get('system.pages.main'); ?>"><?php echo I18n::find('admin_pages_rename', Registry::get('system.locale')); ?></a>
                        &nbsp;
                        <a href="<?php echo Http::getBaseUrl(); ?>/admin/pages/delete?page=<?php echo $page['slug']; ?>&token=<?php echo Token::generate(); ?>"><?php echo I18n::find('admin_pages_delete', Registry::get('system.locale')); ?></a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<?php
    Themes::view('admin/views/partials/content-end')->display();
    Themes::view('admin/views/partials/footer')->display();
?>
