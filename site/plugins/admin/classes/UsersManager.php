<?php

namespace Flextype;

use Flextype\Component\Http\Http;
use Flextype\Component\Filesystem\Filesystem;
use Flextype\Component\Session\Session;
use Flextype\Component\Token\Token;
use Flextype\Component\Registry\Registry;
use Flextype\Component\Text\Text;
use Flextype\Component\Notification\Notification;
use function Flextype\Component\I18n\__;
use Symfony\Component\Yaml\Yaml;

class UsersManager
{

    public static function getProfilePage()
    {
        Registry::set('sidebar_menu_item', 'profile');

        Themes::view('admin/views/templates/users/profile')
                ->display();
    }

    public static function logout()
    {
        if (Token::check((Http::get('token')))) {
            Session::destroy();
            Http::redirect(Http::getBaseUrl().'/admin');
        } else {
            die('Request was denied because it contained an invalid security token. Please refresh the page and try again.');
        }
    }

    public static function getRegistrationPage()
    {
        $registration = Http::post('registration');

        if (isset($registration)) {
            if (Token::check((Http::post('token')))) {
                if (Filesystem::fileExists($_user_file = PATH['site'] . '/accounts/' . Text::safeString(Http::post('username')) . '.yaml')) {
                } else {
                    Filesystem::setFileContent(
                            PATH['site'] . '/accounts/' . Http::post('username') . '.yaml',
                                                   Yaml::dump(['username' => Text::safeString(Http::post('username')),
                                                               'hashed_password' => password_hash(trim(Http::post('password')), PASSWORD_BCRYPT),
                                                               'email' => Http::post('email'),
                                                               'role'  => 'admin',
                                                               'state' => 'enabled'], 10, 2)
                        );

                    Http::redirect(Http::getBaseUrl().'/admin/pages');
                }
            } else {
                die('Request was denied because it contained an invalid security token. Please refresh the page and try again.');
            }
        }

        Themes::view('admin/views/templates/auth/registration')
                ->display();
    }

    public static function isUsersExists()
    {
        // Get Users Profiles
        $users = Filesystem::getFilesList(PATH['site'] . '/accounts/', 'yaml');

        // If any users exists then return true
        return ($users && count($users) > 0) ? true : false;
    }

    public static function isLoggedIn()
    {
        return (Session::exists('role') && Session::get('role') == 'admin') ? true : false;
    }

    public static function getAuthPage()
    {
        $login = Http::post('login');

        if (isset($login)) {
            if (Token::check((Http::post('token')))) {
                if (Filesystem::fileExists($_user_file = PATH['site'] . '/accounts/' . Http::post('username') . '.yaml')) {
                    $user_file = Yaml::parseFile($_user_file);
                    if (password_verify(trim(Http::post('password')), $user_file['hashed_password'])) {
                        Session::set('username', $user_file['username']);
                        Session::set('role', $user_file['role']);
                        Http::redirect(Http::getBaseUrl().'/admin/pages');
                    } else {
                        Notification::set('error', __('admin_message_wrong_username_password'));
                    }
                } else {
                    Notification::set('error', __('admin_message_wrong_username_password'));
                }
            } else {
                die('Request was denied because it contained an invalid security token. Please refresh the page and try again.');
            }
        }

        Themes::view('admin/views/templates/auth/login')
                ->display();
    }
}
