<?php
session_start();
$path = $_SERVER['REQUEST_URI'];
$path = substr($path, 1);
$explode = explode('/',$path);

$re = '/\?.+/m';
$explode[0] = preg_replace($re, '',$explode[0]);

switch ($explode[0]) {
    case '' :
        require "views/index.php";
        break;
    case 'categories' :
        require "views/category.php";
        break;
    case 'contact' :
        require "views/contact.php";
        break;
    case 'new-post' :
        require "views/new_post.php";
        break;
    case 'login' :
        require "views/login.php";
        break;
    case 'post' :
        require "views/post.php";
        break;
    case 'register' :
        require "views/register.php";
        break;
    case 'logout' :
        require "views/logout.php";
        break;
}
