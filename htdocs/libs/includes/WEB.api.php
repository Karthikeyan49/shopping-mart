<?php

class WebAPI
{
    public $error;
    public function __construct()
    {
        if (php_sapi_name() == "cli") {
            global $__site_config;
            $__site_config_path = "/home/karthikeyan/vscode/photogramconfig.json";
            $__site_config = file_get_contents($__site_config_path);
        } elseif (php_sapi_name() == "apache2handler") {
            global $__site_config;
            $__site_config = file_get_contents(filename: $_SERVER['DOCUMENT_ROOT'] . '/../photogramconfig.json');
        } else {
            echo "Bad request";
        }

        database::pdo_getconnection();
    }

    public function initiateSession()
    {
        Session::start();
        if (Session::isset("session_token")) {
            try {
                Session::$usersession = UserSession::authorize(Session::get('session_token')); 
            } catch (Exception $e) {
                //TODO: Handle error
            }
        }
        // $__base_path = get_config('base_path');
    }
}
