<?php
namespace Flextype;
use Flextype\Component\{Http\Http, Html\Html, Registry\Registry, Event\Event, Token\Token, Session\Session};
use function Flextype\Component\I18n\__;
?>
<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="flextype-logo">
            <a href="<?php echo Http::getBaseUrl(); ?>/admin">
                FLEXTYPE
            </a>
        </div>
          <ul class="nav">
              <li class="nav-item">
                  <a class="nav-link" data-toggle="collapse" href="#user">
                      <i class="fas fa-user-circle"></i>
                      <p>
                          <?php echo Session::get('username'); ?>
                          <b class="caret"></b>
                      </p>
                  </a>
                  <div class="collapse" id="user">
                      <ul class="nav">
                          <li class="nav-item">
                              <a class="nav-link" target="_blank" href="<?php echo Http::getBaseUrl(); ?>">
                                  <span class="sidebar-normal"><?php echo __('admin_view_site', Registry::get('system.locale')); ?></span>
                              </a>
                          </li>
                          <li class="nav-item ">
                              <a class="nav-link" href="<?php echo Http::getBaseUrl(); ?>/admin/logout?token=<?php echo Token::generate(); ?>">
                                  <span class="sidebar-normal"><?php echo __('admin_menu_logout', Registry::get('system.locale')); ?></span>
                              </a>
                          </li>
                      </ul>
                  </div>
              </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#content">
                    <i class="far fa-file"></i>
                    <p>
                        <?php echo __('admin_menu_content', Registry::get('system.locale')); ?>
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse " id="content">
                    <ul class="nav">
                        <?php foreach (Admin::getSidebarMenu('content') as $item) { ?>
                            <li class="nav-item">
                                <?php echo Html::anchor('<span class="sidebar-normal">'.$item['title'].'</span>', $item['link'], $item['attributes']); ?>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#extends">
                    <i class="fas fa-plug"></i>
                    <p>
                        <?php echo __('admin_menu_extends', Registry::get('system.locale')); ?>
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="extends">
                    <ul class="nav">
                        <?php foreach (Admin::getSidebarMenu('extends') as $item) { ?>
                            <li class="nav-item">
                                <?php echo Html::anchor('<span class="sidebar-normal">'.$item['title'].'</span>', $item['link'], $item['attributes']); ?>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#system">
                    <i class="fas fa-cog"></i>
                    <p>
                        <?php echo __('admin_menu_system', Registry::get('system.locale')); ?>
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="system">
                    <ul class="nav">
                        <?php foreach (Admin::getSidebarMenu('settings') as $item) { ?>
                            <li class="nav-item">
                                <?php echo Html::anchor('<span class="sidebar-normal">'.$item['title'].'</span>', $item['link'], $item['attributes']); ?>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#help">
                    <i class="fas fa-info-circle"></i>
                    <p>
                        <?php echo __('admin_menu_help', Registry::get('system.locale')); ?>
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse " id="help">
                    <ul class="nav">
                        <?php foreach (Admin::getSidebarMenu('help') as $item) { ?>
                            <li class="nav-item">
                                <?php echo Html::anchor('<span class="sidebar-normal">'.$item['title'].'</span>', $item['link'], $item['attributes']); ?>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</div>
<div class="sidebar-off-canvas"></div>
