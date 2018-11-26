<?php
namespace Flextype;
use Flextype\Component\{Http\Http, Registry\Registry, Token\Token, Form\Form, Event\Event};
use function Flextype\Component\I18n\__;
?>

<?php
    Themes::view('admin/views/partials/head')->display();
    Themes::view('admin/views/partials/navbar')
        ->assign('links',   ['settings' => ['url' => Http::getBaseUrl() . '/admin/settings', 'title' => __('admin_system_settings_heading', Registry::get('system.locale'))]])
        ->assign('buttons', ['settings' =>
                                            ['url' => Http::getBaseUrl() . '/admin/settings?clear_cache=1&token='.Token::generate(),
                                            'title' => __('admin_system_clear_cache', Registry::get('system.locale')),
                                            'class' => 'btn-light']])
        ->display();
    Themes::view('admin/views/partials/content-start')->display();
?>


<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <?php echo  __('admin_site', Registry::get('system.locale')); ?>
            </div>
            <div class="card-body">

                <?php echo Form::open(); ?>
                    <?php echo Form::hidden('token', Token::generate()); ?>
                    <div class="form-group">
                        <?php
                            echo (
                                Form::label('title', __('admin_system_settings_site_title', Registry::get('system.locale')), ['for' => 'systemSettingsSiteTitle']).
                                Form::input('title', $site_settings['title'], ['class' => 'form-control', 'id' => 'systemSettingsSiteTitle', 'required'])
                            );
                        ?>
                    </div>
                    <div class="form-group">
                        <?php
                            echo (
                                Form::label('description', __('admin_system_settings_site_description', Registry::get('system.locale')), ['for' => 'systemSettingsSiteDescription']).
                                Form::textarea('description', $site_settings['description'], ['class' => 'form-control margin-hard-bottom', 'id' => 'systemSettingsSiteDescription'])
                            );
                        ?>
                    </div>
                    <div class="form-group">
                        <?php
                            echo (
                                Form::label('keywords', __('admin_system_settings_site_keywords', Registry::get('system.locale')), ['for' => 'systemSettingsSiteKeywords']).
                                Form::input('keywords', $site_settings['keywords'], ['class' => 'form-control', 'id' => 'systemSettingsSiteKeywords', 'required'])
                            );
                        ?>
                    </div>
                    <div class="form-group">
                        <?php
                            echo (
                                Form::label('robots', __('admin_system_settings_site_robots', Registry::get('system.locale')), ['for' => 'systemSettingsSiteRobots']).
                                Form::input('robots', $site_settings['robots'], ['class' => 'form-control', 'id' => 'systemSettingsSiteRobots', 'required'])
                            );
                        ?>
                    </div>
                    <div class="form-group">
                        <?php
                            echo (
                                Form::label('author[name]', __('admin_system_settings_site_author_name', Registry::get('system.locale')), ['for' => 'systemSettingsSiteAuthorName']).
                                Form::input('author[name]', $site_settings['author']['name'], ['class' => 'form-control', 'id' => 'systemSettingsSiteAuthorName', 'required'])
                            );
                        ?>
                    </div>
                    <div class="form-group">
                        <?php
                            echo (
                                Form::label('author[email]', __('admin_system_settings_site_author_email', Registry::get('system.locale')), ['for' => 'systemSettingsSiteAuthorEmail']).
                                Form::input('author[email]', $site_settings['author']['email'], ['class' => 'form-control', 'id' => 'systemSettingsSiteAuthorEmail', 'required'])
                            );
                        ?>
                    </div>
            </div>
            <div class="card-footer text-center">
                <div class="form-group no-margin">
                    <?php echo Form::submit('settings_site_save', __('admin_save', Registry::get('system.locale')), ['class' => 'btn']); ?>
                </div>
            </div>
            <?php echo Form::close(); ?>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <?php echo  __('admin_settings', Registry::get('system.locale')); ?>
            </div>
            <div class="card-body">
                <?php echo Form::open(); ?>
                <?php echo Form::hidden('token', Token::generate()); ?>
                <div class="form-group">
                    <?php
                        echo (
                            Form::label('timezone', __('admin_system_settings_system_timezone', Registry::get('system.locale')), ['for' => 'systemSettingsSystemTimezone']).
                            Form::input('timezone', $system_settings['timezone'], ['class' => 'form-control', 'id' => 'systemSettingsSystemTimezone', 'required'])
                        );
                    ?>
                </div>
                <div class="form-group">
                    <?php
                        echo (
                            Form::label('date_format', __('admin_system_settings_system_date_format', Registry::get('system.locale')), ['for' => 'systemSettingsSystemDateFormat']).
                            Form::input('date_format', $system_settings['date_format'], ['class' => 'form-control', 'id' => 'systemSettingsSystemDateFormat', 'required'])
                        );
                    ?>
                </div>
                <div class="form-group">
                    <?php
                        echo (
                            Form::label('charset', __('admin_system_settings_system_charset', Registry::get('system.locale')), ['for' => 'systemSettingsSystemCharset']).
                            Form::input('charset', $system_settings['charset'], ['class' => 'form-control', 'id' => 'systemSettingsSystemCharset', 'required'])
                        );
                    ?>
                </div>
                <div class="form-group">
                    <?php
                        echo (
                            Form::label('theme', __('admin_system_settings_system_theme', Registry::get('system.locale')), ['for' => 'systemSettingsSystemTheme']).
                            Form::input('theme', $system_settings['theme'], ['class' => 'form-control', 'id' => 'systemSettingsSystemTheme', 'required'])
                        );
                    ?>
                </div>
                <div class="form-group">
                    <?php
                        echo (
                            Form::label('locale', __('admin_system_settings_system_locale', Registry::get('system.locale')), ['for' => 'systemSettingsSystemLocale']).
                            Form::select('locale', $locales, $system_settings['locale'], ['class' => 'form-control', 'id' => 'pageTemplate'])
                        );
                    ?>
                </div>
                <div class="form-group">
                    <?php
                        echo (
                            Form::label('pages[main]', __('admin_system_settings_system_pages_main', Registry::get('system.locale')), ['for' => 'systemSettingsSystemPagesMain']).
                            Form::input('pages[main]', $system_settings['pages']['main'], ['class' => 'form-control', 'id' => 'systemSettingsSystemPagesMain', 'required'])
                        );
                    ?>
                </div>
                <div class="form-group">
                    <?php
                        echo (
                            Form::label('errors[display]', __('admin_system_settings_system_errors_display', Registry::get('system.locale')), ['for' => 'systemSettingsSystemErrorsDisplay']).
                            Form::select('errors[display]', [0 => 'false', 1 => 'true'], $system_settings['errors']['display'], ['class' => 'form-control', 'id' => 'systemSettingsSystemErrorsDisplay', 'required'])
                        );
                    ?>
                </div>
                <div class="form-group">
                    <?php
                        echo (
                            Form::label('cache[enabled]', __('admin_system_settings_system_cache_enabled', Registry::get('system.locale')), ['for' => 'systemSettingsSystemCacheEnabled']).
                            Form::select('cache[enabled]', [0 => 'false', 1 => 'true'], $system_settings['cache']['enabled'], ['class' => 'form-control', 'id' => 'systemSettingsSystemCacheEnabled', 'required'])
                        );
                    ?>
                </div>
                <div class="form-group">
                    <?php
                        echo (
                            Form::label('cache[prefix]', __('admin_system_settings_system_cache_prefix', Registry::get('system.locale')), ['for' => 'systemSettingsSystemCachePrefix']).
                            Form::input('cache[prefix]', $system_settings['cache']['prefix'], ['class' => 'form-control', 'id' => 'systemSettingsSystemCachePrefix', 'required'])
                        );
                    ?>
                </div>
                <div class="form-group">
                    <?php
                        echo (
                            Form::label('cache[driver]', __('admin_system_settings_system_cache_driver', Registry::get('system.locale')), ['for' => 'systemSettingsSystemCacheDriver']).
                            Form::input('cache[driver]', $system_settings['cache']['driver'], ['class' => 'form-control', 'id' => 'systemSettingsSystemCacheDriver', 'required'])
                        );
                    ?>
                </div>
                <div class="form-group">
                    <?php
                        echo (
                            Form::label('cache[lifetime]', __('admin_system_settings_system_cache_lifetime', Registry::get('system.locale')), ['for' => 'systemSettingsSystemCacheLifetime']).
                            Form::input('cache[lifetime]', $system_settings['cache']['lifetime'], ['class' => 'form-control', 'id' => 'systemSettingsSystemCacheLifetime', 'required'])
                        );
                    ?>
                </div>
            </div>
            <div class="card-footer text-center">
                <div class="form-group no-margin">
                    <?php echo Form::submit('settings_system_save', __('admin_save', Registry::get('system.locale')), ['class' => 'btn']); ?>
                </div>
                <?php echo Form::close(); ?>
            </div>
        </div>
    </div>
</div>

<?php
    Themes::view('admin/views/partials/content-end')->display();
    Themes::view('admin/views/partials/footer')->display();
?>
