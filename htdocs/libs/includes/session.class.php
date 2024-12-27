<?php

class session
{   
    public static $isError = false;
    public static $user = null;
    public static $usersession = null;

    public static function start()
    {
        session_start();
    }
    public static function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }
    public static function unset()
    {
        session_unset();
    }
    public static function destroy()
    {
        session_destroy();
    }
    public static function delete($key)
    {
        unset($_SESSION[$key]);
    }
    public static function isset($key)
    {
        return isset($_SESSION[$key]);
    }
    public static function get($key, $default=false)
    {
        if (session::isset($key)) {
            return $_SESSION[$key];
        } else {
            return $default;
        }
    }

    public static function getUser()
    {
        return Session::$user;
    }

    public static function renderPage()
    {
        Session::loadTemplate('_master');
    }

    public static function currentScript()
    {
        return basename($_SERVER['SCRIPT_NAME'], '.php');
    }

    public static function loadTemplate($name, $data = [])
    {
        extract($data);
        $script = $_SERVER['DOCUMENT_ROOT'] . "htdocs/_templates/$name.php";
        if (is_file($script)) {
            include $script;
        } else {
            Session::loadTemplate('_error');
        }
    }
}
