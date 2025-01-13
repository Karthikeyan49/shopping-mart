<?php
foreach (glob("libs/includes/*.php") as $filename) { 
    include $filename; 
} 
foreach (glob("libs/app/*.php") as $filename) { 
    include $filename; 

} 


global $__site_config;
$__site_config = file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/../photogramconfig.json');

$array = json_decode($__site_config, true);

session::start();

function get_db_config($key,$default=false)
{
    global $__site_config;
    $array = json_decode($__site_config, true);
    if (isset($array[$key]))
        return $array[$key];
    else
        return $default;
}

function load($name)
{
    include $_SERVER['DOCUMENT_ROOT'] . "/htdocs/_templates/$name.php";
}
