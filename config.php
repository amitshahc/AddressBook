<?php

session_start();
error_reporting(E_ALL);

$config['basepath'] = realpath(dirname(__FILE__));

//require_once './class/AddressBook.class.php';

function adb_autoload_class($class_path)
{

    global $config;

    $class_name = basename($class_path);

    @include_once ($config['basepath'] . '/class/' . $class_name . '.class.php');
}

function adb_autoload_include($file_path)
{

    global $config;

    $file_name = basename($file_path);

    @include_once ($config['basepath'] . '/include/' . $file_name . '.php');
}

spl_autoload_register('adb_autoload_class');
spl_autoload_register('adb_autoload_include');


$_SESSION['person'] = array();
$_SESSION['group'] = array();
