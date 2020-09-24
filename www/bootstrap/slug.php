
<?php

$pathArray = $_SERVER['REQUEST_URI'];
$explode = explode('/',$pathArray);

var_dump($explode[2]);

switch ($explode[2]) {
    case 'slug.php' :
        require  'category.php';
        break;
    case 'posts' :
        require  'post.php';
        break;
    case '/' :
        require  'index.php';
        break;
    case 'contact' :
        require  'contact.php';
        break;
    case '' :
        require  'index.php';
        break;
    case 'logout' :
        require  'logout.php';
        break;
    case 'login' :
        require  'login.php';
        break;
//    case 'profile' :
//        require  'profile.php';
//        break;
    case 'search' :
        require  'show_search.php';
        break;
    case 'register' :
        require  'register.php';
        break;
}
?>

