<?php
namespace Flextype;
use Flextype\Component\{Http\Http, Registry\Registry, Token\Token, Text\Text};
use function Flextype\Component\I18n\__;

Themes::view('admin/views/partials/head')->display();
Themes::view('admin/views/partials/navbar')
    ->assign('links',   [
                            'pages' => [
                                            'link' => Http::getBaseUrl() . '/admin/pages',
                                            'title' => __('admin_pages_heading'),
                                            'attributes' => ['class' => 'navbar-item active']
                                       ]
                        ])
    ->assign('buttons', [
                            'pages' => [
                                            'link' => Http::getBaseUrl() . '/admin/pages/add',
                                            'title' => __('admin_pages_create_new'),
                                            'attributes' => ['class' => 'float-right btn']
                                       ]
                        ])
    ->display();
Themes::view('admin/views/partials/content-start')->display();
?>

<table class="table no-margin">
    <thead>
        <tr>
            <th><?php echo __('admin_pages_name'); ?></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($pages_list as $page) { ?>
        <tr>
            <td>
                <?php
                    $count = count(explode('/', $page['slug']));
                    for ($i=0; $i < $count; $i++) {
                        if ($i > 0) {
                            echo '<span class="page-tree-dash"></span>';
                        }
                    }
                ?>
                <a href="<?php echo Http::getBaseUrl(); ?>/admin/pages/edit?page=<?php echo $page['slug']; ?>"><?php echo $page['title']; ?></a>
            </td>
            <td class="text-right">
                <div class="btn-group">
                  <a class="btn btn-default" href="<?php echo Http::getBaseUrl(); ?>/admin/pages/edit?page=<?php echo $page['slug']; ?>"><?php echo __('admin_pages_edit'); ?></a>
                  <button type="button" class="btn btn-default dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="<?php echo Http::getBaseUrl(); ?>/admin/pages/add"><?php echo __('admin_pages_add'); ?></a>
                    <a class="dropdown-item" href="<?php echo Http::getBaseUrl(); ?>/admin/pages/clone?page=<?php echo $page['slug']; ?>&token=<?php echo Token::generate(); ?>"><?php echo __('admin_pages_clone'); ?></a>
                    <a class="dropdown-item" href="<?php echo Http::getBaseUrl(); ?>/admin/pages/rename?page=<?php echo $page['slug']; ?>"><?php echo __('admin_pages_rename'); ?></a>
                    <a class="dropdown-item" href="<?php echo Http::getBaseUrl(); ?>/admin/pages/move?page=<?php echo $page['slug']; ?>"><?php echo __('admin_pages_move'); ?></a>
                    <a class="dropdown-item" href="<?php echo Http::getBaseUrl(); ?>/<?php echo $page['slug']; ?>" target="_blank"><?php echo __('admin_pages_view'); ?></a>
                  </div>
                </div>
                <a class="btn btn-default" href="<?php echo Http::getBaseUrl(); ?>/admin/pages/delete?page=<?php echo $page['slug']; ?>&token=<?php echo Token::generate(); ?>"><?php echo __('admin_pages_delete'); ?></a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>

<?php
Themes::view('admin/views/partials/content-end')->display();
Themes::view('admin/views/partials/footer')->display();
?>
