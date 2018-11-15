<?php

namespace Flextype;

/**
 *
 * Flextype Admin Plugin
 *
 * @author Romanenko Sergey / Awilum <awilum@yandex.ru>
 * @link http://flextype.org
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Flextype\Component\{Arr\Arr, Number\Number, Http\Http, Event\Event, Filesystem\Filesystem, Session\Session, Registry\Registry, Token\Token, Text\Text, Form\Form, I18n\I18n};
use Symfony\Component\Yaml\Yaml;

//
// Add listner for onCurrentPageBeforeLoaded event
//
if (Admin::isAdminArea()) {
    Event::addListener('onCurrentPageBeforeLoaded', function () {
        Admin::getInstance();
    });
}

class Admin
{
    /**
     * An instance of the Admin class
     *
     * @var object
     * @access private
     */
    private static $instance = null;

    /**
     * Private clone method to enforce singleton behavior.
     *
     * @access private
     */
    private function __clone() { }

    /**
     * Private wakeup method to enforce singleton behavior.
     *
     * @access private
     */
    private function __wakeup() { }

    /**
     * Private construct method to enforce singleton behavior.
     *
     * @access private
     */
    protected function __construct()
    {
        Admin::init();
    }

    protected static function init()
    {
        Event::addListener('onAdminArea', function () {
            Admin::_pluginsChangeStatusAjax();
        });

        if (Admin::isLoggedIn()) {
            Admin::getAdminArea();
        } else {
            if (Admin::isUsersExists()) {
                Admin::getAuthPage();
            } else {
                Admin::getRegistrationPage();
            }
        }

        Http::requestShutdown();
    }

    protected static function getAdminArea()
    {

        // Event: onAdminArea
        Event::dispatch('onAdminArea');

        Http::getUriSegment(1) == ''             and Admin::getDashboard();
        Http::getUriSegment(1) == 'pages'        and Admin::getPagesManagerPage();
        Http::getUriSegment(1) == 'plugins'      and Admin::getPluginsPage();
        Http::getUriSegment(1) == 'themes'       and Admin::getThemesPage();
        Http::getUriSegment(1) == 'information'  and Admin::getInformationPage();
        Http::getUriSegment(1) == 'settings'     and Admin::getSettingsPage();
        Http::getUriSegment(1) == 'logout'       and Admin::logout();
    }

    /**
     * _pluginsChangeStatusAjax
     */
    protected static function _pluginsChangeStatusAjax()
    {
        if (Http::post('plugin_change_status')) {

            if (Token::check((Http::post('token')))) {

                $plugin_settings = Yaml::parseFile(PATH['plugins'] . '/' . Http::post('plugin')  . '/' . 'settings.yaml');

                Arr::set($plugin_settings, 'enabled', (Http::post('status') == 'true' ? true : false));

                $plugin_settings = Yaml::dump($plugin_settings);

                Filesystem::setFileContent(PATH['plugins'] . '/' . Http::post('plugin')  . '/' . 'settings.yaml', $plugin_settings);

            } else { die('Request was denied because it contained an invalid security token. Please refresh the page and try again.'); }
        }
    }

    protected static function logout()
    {
        if (Token::check((Http::get('token')))) {
            Session::destroy();
            Http::redirect(Http::getBaseUrl().'/admin');
        }
    }

    protected static function getDashboard() {
        Http::redirect(Http::getBaseUrl().'/admin/pages');
    }

    protected static function getInformationPage()
    {
        Themes::view('admin/views/templates/system/information/list')
            ->display();
    }

    protected static function getPluginsPage()
    {
        Themes::view('admin/views/templates/extends/plugins/list')
            ->assign('plugins_list', Registry::get('plugins'))
            ->display();
    }


    protected static function getThemesPage()
    {
        Themes::view('admin/views/templates/extends/themes/list')
            ->display();
    }

    protected static function getSettingsPage()
    {

        $settings_site_save = Http::post('settings_site_save');
        $settings_system_save = Http::post('settings_system_save');


        if (isset($settings_site_save)) {
            if (Token::check((Http::post('token')))) {

                Arr::delete($_POST, 'token');
                Arr::delete($_POST, 'settings_site_save');

                $settings = Yaml::dump($_POST);

                if (Filesystem::setFileContent(PATH['config'] . '/' . 'site.yaml', $settings)) {
                    Http::redirect(Http::getBaseUrl().'/admin/settings');
                }

            } else { die('Request was denied because it contained an invalid security token. Please refresh the page and try again.'); }
        }


        if (isset($settings_system_save)) {
            if (Token::check((Http::post('token')))) {

                Arr::delete($_POST, 'token');
                Arr::delete($_POST, 'settings_system_save');

                Arr::set($_POST, 'errors.display', (Http::post('errors.display') == '1' ? true : false));
                Arr::set($_POST, 'cache.enabled', (Http::post('cache.enabled') == '1' ? true : false));
                Arr::set($_POST, 'cache.lifetime', (int) Http::post('cache.lifetime'));

                $settings = Yaml::dump($_POST);

                if (Filesystem::setFileContent(PATH['config'] . '/' . 'system.yaml', $settings)) {
                    Http::redirect(Http::getBaseUrl().'/admin/settings');
                }

            } else { die('Request was denied because it contained an invalid security token. Please refresh the page and try again.'); }
        }

        $site_settings = [];
        $system_settings = [];

        // Set site items if site config exists
        if (Filesystem::fileExists($site_config = PATH['config'] . '/' . 'site.yaml')) {
            $site_settings = Yaml::parseFile($site_config);
        } else {
            throw new \RuntimeException("Flextype site config file does not exist.");
        }

        // Set site items if system config exists
        if (Filesystem::fileExists($system_config = PATH['config'] . '/' . 'system.yaml')) {
            $system_settings = Yaml::parseFile($system_config);
        } else {
            throw new \RuntimeException("Flextype system config file does not exist.");
        }


        Themes::view('admin/views/templates/system/settings/list')
            ->assign('site_settings', $site_settings)
            ->assign('system_settings', $system_settings)
            ->display();
    }

    protected static function getPagesManagerPage()
    {
        switch (Http::getUriSegment(2)) {
            case 'delete':
                if (Http::get('page') != '') {
                    if (Token::check((Http::get('token')))) {
                        Filesystem::deleteDir(PATH['pages'] . '/' . Http::get('page'));
                        Http::redirect(Http::getBaseUrl().'/admin/pages');
                    }
                }
            break;
            case 'add':
                $pages_list = Content::getPages('', false , 'slug');

                $create_page = Http::post('create_page');

                if (isset($create_page)) {
                    if (Token::check((Http::post('token')))) {
                        if (Filesystem::setFileContent(PATH['pages'] . '/' . Http::post('parent_page') . '/' . Text::safeString(Http::post('slug')) . '/page.html',
                                                  '---'."\n".
                                                  'title: '.Http::post('title')."\n".
                                                  '---'."\n")) {

                                            Http::redirect(Http::getBaseUrl().'/admin/pages/');
                        }
                    } else { die('Request was denied because it contained an invalid security token. Please refresh the page and try again.'); }
                }

                Themes::view('admin/views/templates/content/pages/add')
                    ->assign('pages_list', $pages_list)
                    ->display();
            break;
            case 'rename';
                $rename_page = Http::post('rename_page');

                if (isset($rename_page)) {
                    if (Token::check((Http::post('token')))) {

                        $page = Content::processPage(PATH['pages'] . '/' . Http::post('page_path_current') . '/page.html');

                        Arr::set($page, 'title', Http::post('title'));
                        $content = Arr::get($page, 'content');
                        Arr::delete($page, 'content'); // do not save 'content' into the frontmatter

                        $page_frontmatter = Yaml::dump($page);

                        $page_path_current = PATH['pages'] . '/' . Http::post('page_path_current') . '/page.html';
                        $page_new_current = PATH['pages'] . '/' . (Http::post('parent_page') == '/' ? '' : '/') . Http::post('name') . '/page.html';

                        Filesystem::setFileContent($page_path_current,
                                                  '---'."\n".
                                                  $page_frontmatter."\n".
                                                  '---'."\n".
                                                  $content);


                        $path = pathinfo($page_new_current);

                        if (!file_exists($path['dirname'])) {
                            mkdir($path['dirname'], 0777, true);
                        }

                        if (Filesystem::copy($page_path_current, $page_new_current)) {
                            Filesystem::deleteFile($page_path_current);
                        }

                        Http::redirect(Http::getBaseUrl().'/admin/pages');

                    } else { die('Request was denied because it contained an invalid security token. Please refresh the page and try again.'); }
                }

                $_pages_list = Content::getPages('', false , 'slug');
                $pages_list['/'] = '/';
                foreach ($_pages_list as $_page) {
                    if ($_page['slug'] != '') {
                        $pages_list[$_page['slug']] = $_page['slug'];
                    } else {
                        $pages_list[Registry::get('system.pages.main')] = Registry::get('system.pages.main');
                    }
                }

                Themes::view('admin/views/templates/content/pages/rename')
                    ->assign('page_name', Arr::last(explode("/", Http::get('page'))))
                    ->assign('page_title', Content::processPage(PATH['pages'] . '/' . Http::get('page') . '/page.html')['title'])
                    ->assign('page_parent', implode('/', array_slice(explode("/", Http::get('page')), 0, -1)))
                    ->assign('page_path_current', Http::get('page'))
                    ->assign('pages_list', $pages_list)
                    ->display();
            break;
            case 'edit':
                if (Http::get('expert') && Http::get('expert') == 'true') {

                    $page_save = Http::post('page_save_expert');

                    if (isset($page_save)) {
                        if (Token::check((Http::post('token')))) {
                            Filesystem::setFileContent(PATH['pages'] . '/' . Http::post('page_name') . '/page.html',
                                                      Http::post('page_content'));

                            Http::redirect(Http::getBaseUrl().'/admin/pages');

                        } else { die('Request was denied because it contained an invalid security token. Please refresh the page and try again.'); }
                    }

                    $page_content = Filesystem::getFileContent(PATH['pages'] . '/' . Http::get('page') . '/page.html');

                    Themes::view('admin/views/templates/content/pages/editor-expert')
                        ->assign('page_name', Http::get('page'))
                        ->assign('page_content', $page_content)
                        ->display();
                } else {

                    $page_save = Http::post('page_save');

                    if (isset($page_save)) {
                        if (Token::check((Http::post('token')))) {

                            $page = Content::processPage(PATH['pages'] . '/' . Http::post('page_name') . '/page.html');

                            Arr::set($page, 'title', Http::post('page_title'));
                            Arr::set($page, 'visibility', Http::post('page_visibility'));
                            Arr::set($page, 'template', Http::post('page_template'));

                            Arr::delete($page, 'content'); // do not save 'content' into the frontmatter
                            Arr::delete($page, 'url');     // do not save 'url' into the frontmatter
                            Arr::delete($page, 'slug');    // do not save 'slug' into the frontmatter

                            $page_frontmatter = Yaml::dump($page);

                            Filesystem::setFileContent(PATH['pages'] . '/' . Http::post('page_name') . '/page.html',
                                                      '---'."\n".
                                                      $page_frontmatter."\n".
                                                      '---'."\n".
                                                      Http::post('page_content'));

                            Http::redirect(Http::getBaseUrl().'/admin/pages');

                        } else { die('Request was denied because it contained an invalid security token. Please refresh the page and try again.'); }
                    }

                    $page = Content::processPage(PATH['pages'] . '/' . Http::get('page') . '/page.html');

                    // Array of forbidden types
                    $forbidden_types = array('html', 'htm', 'js', 'jsb', 'mhtml', 'mht',
                                             'php', 'phtml', 'php3', 'php4', 'php5', 'phps',
                                             'shtml', 'jhtml', 'pl', 'py', 'cgi', 'sh', 'ksh', 'bsh', 'c', 'htaccess', 'htpasswd',
                                             'exe', 'scr', 'dll', 'msi', 'vbs', 'bat', 'com', 'pif', 'cmd', 'vxd', 'cpl', 'empty');

                    // Array of image types
                    $image_types = array('jpg', 'png', 'bmp', 'gif', 'tif');

                    $files_path = PATH['pages'] . '/' . Http::get('page') . '/';

                    if (Http::get('delete_file') != '') {
                        if (Token::check((Http::get('token')))) {
                            Filesystem::deleteFile($files_path . Http::get('delete_file'));
                            Http::redirect(Http::getBaseUrl().'/admin/pages/edit?page='.Http::get('page'));
                        }
                    }

                    if (Http::post('upload_file')) {

                        if (Token::check(Http::post('token'))) {

                            $error = false;
                            if ($_FILES['file']) {
                                if ( ! in_array(Filesystem::fileExt($_FILES['file']['name']), $forbidden_types)) {
                                    $filepath = $files_path.Text::safeString(basename($_FILES['file']['name'], Filesystem::fileExt($_FILES['file']['name']))).'.'.Filesystem::fileExt($_FILES['file']['name']);
                                    $uploaded = move_uploaded_file($_FILES['file']['tmp_name'], $filepath);
                                    if ($uploaded !== false && is_file($filepath)) {
                                        //Notification::set('success', __('File was uploaded', 'filesmanager'));
                                    } else {
                                        $error = 'File was not uploaded';
                                    }
                                } else {
                                    $error = 'Forbidden file type';
                                }
                            } else {
                                $error = 'File was not uploaded';
                            }

                            if ($error) {
                                //Notification::set('error', __($error, 'filesmanager'));
                            }

                            //Request::redirect($site_url.'/admin/index.php?id=filesmanager&path='.$path);

                        } else { die('Request was denied because it contained an invalid security token. Please refresh the page and try again.'); }
                    }

                    Themes::view('admin/views/templates/content/pages/editor')
                        ->assign('page_name', Http::get('page'))
                        ->assign('page_title', $page['title'])
                        ->assign('page_description', (isset($page['description']) ? $page['description'] : ''))
                        ->assign('page_template',(isset($page['temlate']) ? $page['template'] : ''))
                        ->assign('page_date',(isset($page['date']) ? $page['date'] : ''))
                        ->assign('page_visibility', (isset($page['visibility']) ? $page['visibility'] : ''))
                        ->assign('page_content', $page['content'])
                        ->assign('files', Filesystem::getFilesList(PATH['pages'] . '/' . Http::get('page'), 'jpg'))
                        ->display();
                }
            break;
            default:
                $pages_list = Content::getPages('', false , 'slug', 'ASC');

                Themes::view('admin/views/templates/content/pages/list')
                    ->assign('pages_list', $pages_list)
                    ->display();
            break;
        }
    }

    protected static function getAuthPage()
    {

        $login = Http::post('login');

        if (isset($login)) {
            if (Token::check((Http::post('token')))) {
                if (Filesystem::fileExists($_user_file = PATH['site'] . '/accounts/' . Http::post('username') . '.yaml')) {
                    $user_file = Yaml::parseFile($_user_file);

                    if (Text::encryptPassword(Http::post('password')) == $user_file['password']) {
                        Session::set('username', $user_file['username']);
                        Session::set('role', $user_file['role']);
                        Http::redirect(Http::getBaseUrl().'/admin/pages');
                    }
                }
            } else { die('Request was denied because it contained an invalid security token. Please refresh the page and try again.'); }
        }

        Themes::view('admin/views/templates/auth/login')
            ->display();
    }

    protected static function getRegistrationPage()
    {

        $registration = Http::post('registration');

        if (isset($registration)) {
            if (Token::check((Http::post('token')))) {
                if (Filesystem::fileExists($_user_file = PATH['site'] . '/accounts/' . Text::safeString(Http::post('username')) . '.yaml')) {

                } else {
                    $user = ['username' => Text::safeString(Http::post('username')),
                             'password' => Text::encryptPassword(Http::post('password')),
                             'email' => Http::post('email'),
                             'role'  => 'admin',
                             'state' => 'enabled'];

                    Filesystem::setFileContent(PATH['site'] . '/accounts/' . Http::post('username') . '.yaml', Yaml::dump($user));

                    Http::redirect(Http::getBaseUrl().'/admin/pages');
                }
            } else { die('Request was denied because it contained an invalid security token. Please refresh the page and try again.'); }
        }

        Themes::view('admin/views/templates/auth/registration')
            ->display();
    }

    public static function isUsersExists()
    {
        $users = Filesystem::getFilesList(PATH['site'] . '/accounts/', 'yaml');

        if ($users && count($users) > 0) {
            return true;
        } else {
            return false;
        }
    }

    public static function isLoggedIn()
    {
        if (Session::exists('role') && Session::get('role') == 'admin') {
            return true;
        } else {
            return false;
        }
    }

    public static function addSidebarMenu(string $area, string $item, string $title, string $link)
    {
        Registry::set("sidebar_menu.{$area}.{$item}.title", $title);
        Registry::set("sidebar_menu.{$area}.{$item}.link", $link);
    }

    public static function getSidebarMenu(string $area)
    {
        return Registry::get("sidebar_menu.{$area}");
    }

    public static function isAdminArea() {
        if (Http::getUriSegment(0) == 'admin') {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Get the Admin instance.
     *
     * @access public
     * @return object
     */
     public static function getInstance()
     {
        if (is_null(Admin::$instance)) {
            Admin::$instance = new self;
        }

        return Admin::$instance;
     }
}

Admin::addSidebarMenu('content', 'pages', I18n::find('admin_menu_content_pages', Registry::get('system.locale')), Http::getBaseUrl() . '/admin/pages');
Admin::addSidebarMenu('extends', 'plugins', I18n::find('admin_menu_extends_plugins', Registry::get('system.locale')), Http::getBaseUrl() . '/admin/plugins');
Admin::addSidebarMenu('settings', 'settings', I18n::find('admin_menu_system_settings', Registry::get('system.locale')), Http::getBaseUrl() . '/admin/settings');
Admin::addSidebarMenu('settings', 'infomation', I18n::find('admin_menu_system_information', Registry::get('system.locale')), Http::getBaseUrl() . '/admin/information');
Admin::addSidebarMenu('help', 'documentation', I18n::find('admin_menu_help_documentation', Registry::get('system.locale')), 'http://flextype.org/documentation');
Admin::addSidebarMenu('help', 'support_forum', I18n::find('admin_menu_help_support_forum', Registry::get('system.locale')), 'http://forum.flextype.org');
