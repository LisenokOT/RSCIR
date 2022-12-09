<?php
// On start
session_start();
date_default_timezone_set("Europe/Moscow");

# File from root directory

# Get class
function getClass($path, $classtype)
{
    $classpath = $_SERVER['DOCUMENT_ROOT'] . "/{$path}/_MVC.php"; // Задание пути к контроллеру
    $class = "{$path}{$classtype}"; // Задание пути к классу контроллера
    if (file_exists($classpath)) {
        require_once $classpath;
        if (class_exists($class))
            return $class;
    }
    throw new Exception('Missing Class');
}


$ControllerClass = main();

# Start
function main()
{
    # Redirect on missing files
    $server_path = $_SERVER["DOCUMENT_ROOT"] . $_SERVER["REQUEST_URI"];
    $server_path = strtok($server_path, '?');
    if (!file_exists($server_path)) {
        header("location: /home.php");
        return;
    };
    # Test MySQL server
    try {
        $connection = new mysqli("database", "user", "password", "appDB");
    }
    catch (Exception $e) {
        echo 'Service not available. Please try again later.';
        return;
    }
    # Current URL
    $current_url = trim($_SERVER['REQUEST_URI'], '/');
    $current_url_array = explode('/', $current_url);
    # Redirect from root directory
    if (count($current_url_array) == 1) {
        header('Location: /home.php');
        return;
    }
    # Get classes by URL
    $ModelClass = getClass($current_url_array[0], 'Model');
    $ViewClass = getClass($current_url_array[0], 'View');
    $ControllerClass = getClass($current_url_array[0], 'Controller');

    # Start controller
    $ControllerClass = new $ControllerClass(
        $ModelClass,
        $ViewClass,
        '/' . $current_url
    );
    return $ControllerClass;
}