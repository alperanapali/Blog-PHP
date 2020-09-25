<?php
session_start();
$path = $_SERVER['REQUEST_URI'];

$re = '/\?.+/m';
$path = preg_replace($re, '',$path);
$path = substr($path, 1);

$explode = explode('/',$path);
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
    case 'search' :
        require "views/show_search.php";
        break;
    case 'profile' :
        require "views/profile.php";
        break;
    case 'admin' :
        require "views/admin_panel.php";
        break;
}
