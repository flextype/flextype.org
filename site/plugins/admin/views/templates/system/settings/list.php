<?php
namespace Flextype;
use Flextype\Component\{Http\Http, Registry\Registry, Token\Token, Form\Form, Event\Event};
use function Flextype\Component\I18n\__;

Themes::view('admin/views/partials/head')->display();
Themes::view('admin/views/partials/navbar')
    ->assign('links',   [
                            'settings' => [
                                                'link' => Http::getBaseUrl() . '/admin/settings',
                                                'title' => __('admin_system_settings_heading'),
                                                'attributes' => ['class' => 'navbar-item active']
                                          ]
                        ])
    ->assign('buttons', [
                            'settings_clear_cache' => [
                                                'link' => Http::getBaseUrl() . '/admin/settings?clear_cache=1&token='.Token::generate(),
                                                'title' => __('admin_system_clear_cache'),
                                                'attributes' => ['class' => 'float-right btn']
                                          ],
                              'save' => [
                                                  'link'       => 'javascript:;',
                                                  'title'      => __('admin_save'),
                                                  'attributes' => ['class' => 'js-save-form-submit float-right btn']
                                              ]
                        ])
    ->display();
Themes::view('admin/views/partials/content-start')->display();
?>

<?php echo Form::open(null, ['id' => 'form']); ?>
<?php echo Form::hidden('token', Token::generate()); ?>
<?php echo Form::hidden('action', 'save-form'); ?>
<div class="row">
    <div class="col-md-6">

            <div class="form-group">
                <?php
                    echo (
                        Form::label('title', __('admin_system_settings_site_title'), ['for' => 'systemSettingsSiteTitle']).
                        Form::input('title', $site_settings['title'], ['class' => 'form-control', 'id' => 'systemSettingsSiteTitle', 'required'])
                    );
                ?>
            </div>
            <div class="form-group">
                <?php
                    echo (
                        Form::label('description', __('admin_system_settings_site_description'), ['for' => 'systemSettingsSiteDescription']).
                        Form::textarea('description', $site_settings['description'], ['class' => 'form-control margin-hard-bottom', 'id' => 'systemSettingsSiteDescription'])
                    );
                ?>
            </div>
            <div class="form-group">
                <?php
                    echo (
                        Form::label('keywords', __('admin_system_settings_site_keywords'), ['for' => 'systemSettingsSiteKeywords']).
                        Form::input('keywords', $site_settings['keywords'], ['class' => 'form-control', 'id' => 'systemSettingsSiteKeywords', 'required'])
                    );
                ?>
            </div>
            <div class="form-group">
                <?php
                    echo (
                        Form::label('robots', __('admin_system_settings_site_robots'), ['for' => 'systemSettingsSiteRobots']).
                        Form::input('robots', $site_settings['robots'], ['class' => 'form-control', 'id' => 'systemSettingsSiteRobots', 'required'])
                    );
                ?>
            </div>
            <div class="form-group">
                <?php
                    echo (
                        Form::label('author[name]', __('admin_system_settings_site_author_name'), ['for' => 'systemSettingsSiteAuthorName']).
                        Form::input('author[name]', $site_settings['author']['name'], ['class' => 'form-control', 'id' => 'systemSettingsSiteAuthorName', 'required'])
                    );
                ?>
            </div>
            <div class="form-group">
                <?php
                    echo (
                        Form::label('author[email]', __('admin_system_settings_site_author_email'), ['for' => 'systemSettingsSiteAuthorEmail']).
                        Form::input('author[email]', $site_settings['author']['email'], ['class' => 'form-control', 'id' => 'systemSettingsSiteAuthorEmail', 'required'])
                    );
                ?>
            </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <?php
                echo (
                    Form::label('timezone', __('admin_system_settings_system_timezone'), ['for' => 'systemSettingsSystemTimezone']).
                    Form::input('timezone', $system_settings['timezone'], ['class' => 'form-control', 'id' => 'systemSettingsSystemTimezone', 'required'])
                );
            ?>
        </div>
        <div class="form-group">
            <?php
                echo (
                    Form::label('date_format', __('admin_system_settings_system_date_format'), ['for' => 'systemSettingsSystemDateFormat']).
                    Form::input('date_format', $system_settings['date_format'], ['class' => 'form-control', 'id' => 'systemSettingsSystemDateFormat', 'required'])
                );
            ?>
        </div>
        <div class="form-group">
            <?php
                echo (
                    Form::label('charset', __('admin_system_settings_system_charset'), ['for' => 'systemSettingsSystemCharset']).
                    Form::input('charset', $system_settings['charset'], ['class' => 'form-control', 'id' => 'systemSettingsSystemCharset', 'required'])
                );
            ?>
        </div>
        <div class="form-group">
            <?php
                echo (
                    Form::label('theme', __('admin_system_settings_system_theme'), ['for' => 'systemSettingsSystemTheme']).
                    Form::input('theme', $system_settings['theme'], ['class' => 'form-control', 'id' => 'systemSettingsSystemTheme', 'required'])
                );
            ?>
        </div>
        <div class="form-group">
            <?php
                echo (
                    Form::label('locale', __('admin_system_settings_system_locale'), ['for' => 'systemSettingsSystemLocale']).
                    Form::select('locale', $locales, $system_settings['locale'], ['class' => 'form-control', 'id' => 'pageTemplate'])
                );
            ?>
        </div>
        <div class="form-group">
            <?php
                echo (
                    Form::label('pages[main]', __('admin_system_settings_system_pages_main'), ['for' => 'systemSettingsSystemPagesMain']).
                    Form::input('pages[main]', $system_settings['pages']['main'], ['class' => 'form-control', 'id' => 'systemSettingsSystemPagesMain', 'required'])
                );
            ?>
        </div>
        <div class="form-group">
            <?php
                echo (
                    Form::label('errors[display]', __('admin_system_settings_system_errors_display'), ['for' => 'systemSettingsSystemErrorsDisplay']).
                    Form::select('errors[display]', [0 => 'false', 1 => 'true'], $system_settings['errors']['display'], ['class' => 'form-control', 'id' => 'systemSettingsSystemErrorsDisplay', 'required'])
                );
            ?>
        </div>
        <div class="form-group">
            <?php
                echo (
                    Form::label('cache[enabled]', __('admin_system_settings_system_cache_enabled'), ['for' => 'systemSettingsSystemCacheEnabled']).
                    Form::select('cache[enabled]', [0 => 'false', 1 => 'true'], $system_settings['cache']['enabled'], ['class' => 'form-control', 'id' => 'systemSettingsSystemCacheEnabled', 'required'])
                );
            ?>
        </div>
        <div class="form-group">
            <?php
                echo (
                    Form::label('cache[prefix]', __('admin_system_settings_system_cache_prefix'), ['for' => 'systemSettingsSystemCachePrefix']).
                    Form::input('cache[prefix]', $system_settings['cache']['prefix'], ['class' => 'form-control', 'id' => 'systemSettingsSystemCachePrefix', 'required'])
                );
            ?>
        </div>
        <div class="form-group">
            <?php
                echo (
                    Form::label('cache[driver]', __('admin_system_settings_system_cache_driver'), ['for' => 'systemSettingsSystemCacheDriver']).
                    Form::input('cache[driver]', $system_settings['cache']['driver'], ['class' => 'form-control', 'id' => 'systemSettingsSystemCacheDriver', 'required'])
                );
            ?>
        </div>
        <div class="form-group">
            <?php
                echo (
                    Form::label('cache[lifetime]', __('admin_system_settings_system_cache_lifetime'), ['for' => 'systemSettingsSystemCacheLifetime']).
                    Form::input('cache[lifetime]', $system_settings['cache']['lifetime'], ['class' => 'form-control', 'id' => 'systemSettingsSystemCacheLifetime', 'required'])
                );
            ?>
        </div>
    </div>
</div>
<?php echo Form::close(); ?>

<?php
Themes::view('admin/views/partials/content-end')->display();
Themes::view('admin/views/partials/footer')->display();
?>
