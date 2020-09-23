<?php
//insert in <ul>
$user = $_SESSION['username'];
if($_SESSION['username'] == null) {
    $html_not_loged = <<<EOD
                <li class="nav-item" style="">
                    <a class="nav-link" href="register.php">Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php"></a>
                </li>
EOD;

    echo $html_not_loged;
} else if ($_SESSION['is_admin']){

    $html_loged_admin = <<<EOD
                <li class="nav-item">
                    <a class="nav-link" href="admin.php">Admin Panel</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="profile.php">$user</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
EOD;

    echo $html_loged_admin;


}else if ($_SESSION['username']) {

    $html_loged_user = <<<EOD
                <li class="nav-item">
                    <a class="nav-link" href="new_post.php">New Post</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="profile.php">$user</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>

EOD;
    echo $html_loged_user;
}

