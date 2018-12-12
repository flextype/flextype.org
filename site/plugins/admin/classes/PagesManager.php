<?php

namespace Flextype;

use Flextype\Component\Arr\Arr;
use Flextype\Component\Number\Number;
use Flextype\Component\I18n\I18n;
use Flextype\Component\Http\Http;
use Flextype\Component\Event\Event;
use Flextype\Component\Filesystem\Filesystem;
use Flextype\Component\Session\Session;
use Flextype\Component\Registry\Registry;
use Flextype\Component\Token\Token;
use Flextype\Component\Text\Text;
use Flextype\Component\Form\Form;
use Flextype\Component\Notification\Notification;
use function Flextype\Component\I18n\__;
use Symfony\Component\Yaml\Yaml;
use Gajus\Dindent\Indenter;
use Flextype\Navigation;

class PagesManager
{

    /**
     * Media
     *
     * @var array
     */
    public static $media = ['jpeg', 'png', 'gif', 'jpg'];

    public static function getPagesManagerPage()
    {
        Registry::set('sidebar_menu_item', 'pages');

        switch (Http::getUriSegment(2)) {
            case 'delete':
                if (Http::get('page') != '') {
                    if (Token::check((Http::get('token')))) {
                        Filesystem::deleteDir(PATH['pages'] . '/' . Http::get('page'));
                        Notification::set('success', __('admin_message_page_deleted'));
                        Http::redirect(Http::getBaseUrl().'/admin/pages');
                    } else {
                        die('Request was denied because it contained an invalid security token. Please refresh the page and try again.');
                    }
                }
            break;
            case 'add':
                $create_page = Http::post('create_page');

                if (isset($create_page)) {
                    if (Token::check((Http::post('token')))) {
                        $file = PATH['pages'] . '/' . Http::post('parent_page') . '/' . Text::safeString(Http::post('slug'), '-', true) . '/page.html';
                        if (!Filesystem::fileExists($file)) {
                            if (Filesystem::setFileContent(
                                $file,
                                  '---'."\n".
                                  'title: '.Http::post('title')."\n".
                                  'template: '.Http::post('template')."\n".
                                  '---'."\n"
                            )) {
                                Notification::set('success', __('admin_message_page_created'));
                                Http::redirect(Http::getBaseUrl().'/admin/pages/');
                            }
                        }
                    } else {
                        die('Request was denied because it contained an invalid security token. Please refresh the page and try again.');
                    }
                }

                Themes::view('admin/views/templates/content/pages/add')
                    ->assign('templates', Themes::getTemplatesBlueprints())
                    ->assign('pages_list', Content::getPages('', false, 'slug'))
                    ->display();
            break;
            case 'clone':
                if (Http::get('page') != '') {
                    if (Token::check((Http::get('token')))) {
                        Filesystem::recursiveCopy(PATH['pages'] . '/' . Http::get('page'), PATH['pages'] . '/' . Http::get('page') . '-clone-' . date("Ymd_His"));
                        Notification::set('success', __('admin_message_page_cloned'));
                        Http::redirect(Http::getBaseUrl().'/admin/pages/');
                    } else {
                        die('Request was denied because it contained an invalid security token. Please refresh the page and try again.');
                    }
                }
            break;
            case 'rename':
                $page = Content::processPage(PATH['pages'] . '/' . Http::get('page') . '/page.html', false, true);

                $rename_page = Http::post('rename_page');

                if (isset($rename_page)) {
                    if (Token::check((Http::post('token')))) {
                        if (!Filesystem::dirExists(PATH['pages'] . '/' . Http::post('name'))) {
                            if (rename(
                                PATH['pages'] . '/' . Http::post('page_path_current'),
                                       PATH['pages'] . '/' . Http::post('page_parent') . '/' . Http::post('name')
                            )) {
                                Notification::set('success', __('admin_message_page_renamed'));
                                Http::redirect(Http::getBaseUrl().'/admin/pages');
                            }
                        }
                    } else {
                        die('Request was denied because it contained an invalid security token. Please refresh the page and try again.');
                    }
                }

                Themes::view('admin/views/templates/content/pages/rename')
                    ->assign('name_current', Arr::last(explode("/", Http::get('page'))))
                    ->assign('page_path_current', Http::get('page'))
                    ->assign('page_parent', implode('/', array_slice(explode("/", Http::get('page')), 0, -1)))
                    ->assign('page', $page)
                    ->display();
            break;
            case 'move':
                $page = Content::processPage(PATH['pages'] . '/' . Http::get('page') . '/page.html', false, true);

                $move_page = Http::post('move_page');

                if (isset($move_page)) {
                    if (Token::check((Http::post('token')))) {
                        if (!Filesystem::dirExists(realpath(PATH['pages'] . '/' . Http::post('parent_page') . '/' . Http::post('name_current')))) {
                            if (rename(
                                PATH['pages'] . '/' . Http::post('page_path_current'),
                                PATH['pages'] . '/' . Http::post('parent_page') . '/' . Http::post('name_current')
                            )) {
                                Notification::set('success', __('admin_message_page_moved'));
                                Http::redirect(Http::getBaseUrl().'/admin/pages');
                            }
                        }
                    } else {
                        die('Request was denied because it contained an invalid security token. Please refresh the page and try again.');
                    }
                }

                $_pages_list = Content::getPages('', false, 'slug');
                $pages_list['/'] = '/';
                foreach ($_pages_list as $_page) {
                    if ($_page['slug'] != '') {
                        $pages_list[$_page['slug']] = $_page['slug'];
                    } else {
                        $pages_list[Registry::get('settings.pages.main')] = Registry::get('settings.pages.main');
                    }
                }

                Themes::view('admin/views/templates/content/pages/move')
                    ->assign('page_path_current', Http::get('page'))
                    ->assign('pages_list', $pages_list)
                    ->assign('name_current', Arr::last(explode("/", Http::get('page'))))
                    ->assign('page_parent', implode('/', array_slice(explode("/", Http::get('page')), 0, -1)))
                    ->assign('page', $page)
                    ->display();
            break;
            case 'edit':
                $page = Content::processPage(PATH['pages'] . '/' . Http::get('page') . '/page.html', false, true);

                if (Http::get('media') && Http::get('media') == 'true') {
                    PagesManager::processFilesManager();

                    Themes::view('admin/views/templates/content/pages/media')
                        ->assign('page_name', Http::get('page'))
                        ->assign('files', PagesManager::getMediaList(Http::get('page')), true)
                        ->assign('page', $page)
                        ->display();
                } elseif (Http::get('blueprint') && Http::get('blueprint') == 'true') {
                    $action = Http::post('action');

                    if (isset($action) && $action == 'save-form') {
                        if (Token::check((Http::post('token')))) {
                            Filesystem::setFileContent(
                                PATH['themes'] . '/' . Registry::get('settings.theme') . '/blueprints/' . $page['template'] . '.yaml',
                                Http::post('blueprint')
                            );
                            Notification::set('success', __('admin_message_page_changes_saved'));
                            Http::redirect(Http::getBaseUrl().'/admin/pages/edit?page='.Http::post('page_name').'&blueprint=true');
                        } else {
                            die('Request was denied because it contained an invalid security token. Please refresh the page and try again.');
                        }
                    }

                    $blueprint = Filesystem::getFileContent(PATH['themes'] . '/' . Registry::get('settings.theme') . '/blueprints/' . $page['template'] . '.yaml');

                    Themes::view('admin/views/templates/content/pages/blueprint')
                        ->assign('page_name', Http::get('page'))
                        ->assign('blueprint', $blueprint)
                        ->assign('page', $page)
                        ->display();
                } elseif (Http::get('template') && Http::get('template') == 'true') {
                    $action = Http::post('action');

                    if (isset($action) && $action == 'save-form') {
                        if (Token::check((Http::post('token')))) {
                            Filesystem::setFileContent(
                                PATH['themes'] . '/' . Registry::get('settings.theme') . '/views/templates/' . $page['template'] . '.php',
                                Http::post('template')
                            );
                            Notification::set('success', __('admin_message_page_changes_saved'));
                            Http::redirect(Http::getBaseUrl().'/admin/pages/edit?page='.Http::post('page_name').'&template=true');
                        } else {
                            die('Request was denied because it contained an invalid security token. Please refresh the page and try again.');
                        }
                    }

                    $template = Filesystem::getFileContent(PATH['themes'] . '/' . Registry::get('settings.theme') . '/views/templates/' . $page['template'] . '.php');

                    Themes::view('admin/views/templates/content/pages/template')
                        ->assign('page_name', Http::get('page'))
                        ->assign('template', $template)
                        ->assign('page', $page)
                        ->display();
                } else {
                    if (Http::get('source') && Http::get('source') == 'true') {
                        $action = Http::post('action');

                        if (isset($action) && $action == 'save-form') {
                            if (Token::check((Http::post('token')))) {
                                Filesystem::setFileContent(
                                    PATH['pages'] . '/' . Http::post('page_name') . '/page.html',
                                                          Http::post('page_content')
                                );
                                Notification::set('success', __('admin_message_page_changes_saved'));
                                Http::redirect(Http::getBaseUrl().'/admin/pages/edit?page='.Http::post('page_name').'&source=true');
                            } else {
                                die('Request was denied because it contained an invalid security token. Please refresh the page and try again.');
                            }
                        }

                        $page_content = Filesystem::getFileContent(PATH['pages'] . '/' . Http::get('page') . '/page.html');

                        Themes::view('admin/views/templates/content/pages/source')
                            ->assign('page_name', Http::get('page'))
                            ->assign('page_content', $page_content)
                            ->assign('page', $page)
                            ->assign('files', PagesManager::getMediaList(Http::get('page')), true)
                            ->display();
                    } else {
                        $action = Http::post('action');
                        $indenter = new Indenter();

                        if (isset($action) && $action == 'save-form') {
                            if (Token::check((Http::post('token')))) {
                                $page = Content::processPage(PATH['pages'] . '/' . Http::get('page') . '/page.html', false, true);
                                Arr::delete($page, 'content');
                                Arr::delete($page, 'url');
                                Arr::delete($page, 'slug');

                                $frontmatter = $_POST;
                                Arr::delete($frontmatter, 'token');
                                Arr::delete($frontmatter, 'action');
                                Arr::delete($frontmatter, 'content');
                                $frontmatter = Yaml::dump(array_merge($page, $frontmatter), 10, 2);

                                $content = Http::post('content');
                                $content = (isset($content)) ? $indenter->indent($content) : '';

                                Filesystem::setFileContent(
                                    PATH['pages'] . '/' . Http::get('page') . '/page.html',
                                                          '---'."\n".
                                                          $frontmatter."\n".
                                                          '---'."\n".
                                                          $content
                                );
                                Notification::set('success', __('admin_message_page_changes_saved'));
                                Http::redirect(Http::getBaseUrl().'/admin/pages/edit?page='.Http::get('page'));
                            }
                        }

                        // Blueprint for current page template
                        $blueprint_path = PATH['themes'] . '/' . Registry::get('settings.theme') . '/blueprints/' . $page['template'] . '.yaml';
                        $blueprint = Yaml::parse(Filesystem::getFileContent($blueprint_path));
                        is_null($blueprint) and $blueprint = [];

                        Themes::view('admin/views/templates/content/pages/content')
                            ->assign('page_name', Http::get('page'))
                            ->assign('page', $page)
                            ->assign('blueprint', $blueprint)
                            ->assign('templates', Themes::getTemplates())
                            ->assign('files', PagesManager::getMediaList(Http::get('page')), true)
                            ->display();

                    }
                }
            break;
            default:
                Themes::view('admin/views/templates/content/pages/list')
                    ->assign('pages_list', Content::getPages('', false, 'slug', 'ASC'))
                    ->display();
            break;
        }
    }

    public static function getMediaList($page, $path = false)
    {
        $files = [];
        foreach (array_diff(scandir(PATH['pages'] . '/' . $page), ['..', '.']) as $file) {
            if (in_array($file_ext = substr(strrchr($file, '.'), 1), PagesManager::$media)) {
                if (strpos($file, strtolower($file_ext), 1)) {
                    if ($path) {
                        $files[Http::getBaseUrl().'/'.$page.'/'.$file] = Http::getBaseUrl().'/'.$page.'/'.$file;
                    } else {
                        $files[$file] = $file;
                    }
                }
            }
        }
        return $files;
    }

    public static function displayPageForm(array $form, array $values = [], string $content)
    {
        echo Form::open(null, ['id' => 'editorForm', 'class' => 'row']);
        echo Form::hidden('token', Token::generate());
        echo Form::hidden('action', 'save-form');

        if (isset($form) > 0) {
            foreach ($form as $element => $property) {

                // Create attributes
                $property['attributes'] = Arr::keyExists($property, 'attributes') ? $property['attributes'] : [] ;

                // Create attribute class
                $property['attributes']['class'] = Arr::keyExists($property, 'attributes.class') ? 'form-control ' . $property['attributes']['class'] : 'form-control' ;

                // Create attribute size
                $property['size'] = Arr::keyExists($property, 'size') ? $property['size'] : 'col-12' ;

                // Create attribute value
                $property['value'] = Arr::keyExists($property, 'value') ? $property['value'] : '' ;

                $pos = strpos($element, '.');

                if ($pos === false) {
                    $form_element_name = $element;
                } else {
                    $form_element_name = str_replace(".", "][", "$element").']';
                }

                $pos = strpos($form_element_name, ']');

                if ($pos !== false) {
                    $form_element_name = substr_replace($form_element_name, '', $pos, strlen(']'));
                }

                // Form value
                $form_value = Arr::keyExists($values, $element) ? Arr::get($values, $element) : $property['value'];

                // Form label
                $form_label = Form::label($element, __($property['title']));

                // Form elements
                switch ($property['type']) {

                    // Simple text-input, for multi-line fields.
                    case 'textarea':
                        $form_element = Form::textarea($element, $form_value, $property['attributes']);
                    break;

                    // The hidden field is like the text field, except it's hidden from the content editor.
                    case 'hidden':
                        $form_element = Form::hidden($element, $form_value);
                    break;

                    // A WYSIWYG HTML field.
                    case 'html':
                        $property['attributes']['class'] .= ' js-html-editor';
                        $form_element = Form::textarea($element, $form_value, $property['attributes']);
                    break;

                    // A specific WYSIWYG HTML field for page content editing
                    case 'content':
                        $form_element = Form::textarea($element, $content, $property['attributes']);
                    break;

                    // Template select field for selecting page template
                    case 'template_select':
                        $form_element = Form::select($form_element_name, Themes::getTemplatesBlueprints(), $form_value, $property['attributes']);
                    break;

                    // Visibility select field for selecting page visibility state
                    case 'visibility_select':
                        $form_element = Form::select($form_element_name, ['draft' => __('admin_pages_draft'), 'visible' => __('admin_pages_visible'), 'hidden' => __('admin_pages_hidden')], (!empty($form_value) ? $form_value : 'visible'), $property['attributes']);
                    break;

                    // Media select field
                    case 'media_select':
                        $form_element = Form::select($form_element_name, PagesManager::getMediaList(Http::get('page'), false), $form_value, $property['attributes']);
                    break;

                    // Simple text-input, for single-line fields.
                    default:
                        $form_element = Form::input($form_element_name, $form_value, $property['attributes']);
                    break;
                }

                // Render form elments with labels
                echo '<div class="form-group '.$property['size'].'">';
                echo $form_label . $form_element;
                echo '</div>';
            }
        }

        echo Form::close();
    }

    protected static function processFilesManager()
    {
        $files_directory = PATH['pages'] . '/' . Http::get('page') . '/';

        if (Http::get('delete_file') != '') {
            if (Token::check((Http::get('token')))) {
                Filesystem::deleteFile($files_directory . Http::get('delete_file'));
                Notification::set('success', __('admin_message_page_file_deleted'));
                Http::redirect(Http::getBaseUrl().'/admin/pages/edit?page='.Http::get('page').'&media=true');
            } else {
                die('Request was denied because it contained an invalid security token. Please refresh the page and try again.');
            }
        }

        if (Http::post('upload_file')) {
            if (Token::check(Http::post('token'))) {
                Filesystem::uploadFile($_FILES['file'], $files_directory, PagesManager::$media, 7000000);
                Notification::set('success', __('admin_message_page_file_uploaded'));
                Http::redirect(Http::getBaseUrl().'/admin/pages/edit?page='.Http::get('page').'&media=true');
            } else {
                die('Request was denied because it contained an invalid security token. Please refresh the page and try again.');
            }
        }
    }
}
