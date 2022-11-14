<?php 
session_start(); 

if (!isset($_COOKIE['theme'])){
    if (isset($_SESSION['theme'])) {
        $_COOKIE['theme'] = $_SESSION['theme'];
    }
    $_COOKIE['theme'] = "dark";
    $_SESSION['theme'] = "dark";
}
if (isset($_COOKIE['theme'])){
    $_SESSION['theme'] = $_COOKIE['theme'];
}

if (!isset($_COOKIE['login'])){
    if (isset($_SESSION['login'])) {
        $_COOKIE['login'] = $_SESSION['login'];
    }
    $_COOKIE['login'] = "Войти";
    $_SESSION['login'] = "Войти";
}
if (isset($_COOKIE['login'])){
    $_SESSION['login'] = $_COOKIE['login'];
}

if (!isset($_COOKIE['login'])){
    if (isset($_SESSION['login'])) {
        $_COOKIE['login'] = $_SESSION['login'];
    }
    $_COOKIE['login'] = "denis";
    $_SESSION['login'] = "denis";
}
if (isset($_COOKIE['login'])){
    $_SESSION['login'] = $_COOKIE['login'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Сироткин Денис">
    <meta name="description" content="Личный сайт">
    <meta name="keywords" content="programm">
    <link rel="stylesheet" href="./assets/css/style.css">
    <title><?=$title?></title>
</head>

<body>
